<?php

namespace App\Http\Controllers\Front\PostFrontController;

use App\Models\User;
use App\Models\Emoji;
use App\Models\Posts;
use App\Models\Tag;

use App\Mail\SendPostMail;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail; 

class PostFrontController extends Controller
{
    public function share(){
        $user = Auth::user();

        $categories = Categories::where('status','1')->get();
        $tags = Tag::distinct()->get(['label']);
        $emoji = Emoji::get();

        return view('front.Postadd.add',get_defined_vars());
    }

    public function postadd(Request $request){
        $request->validate([
            'tags' => 'required|array'
        ]);

        $post = new Posts();
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category;
        $post->title = $request->title;
        $slug = Str::slug($request->title);
        if(Posts::where('slug',$slug)->first()){
            $slug = $slug.'_'.rand(1000,9999);
        }
        $post->slug = $slug;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->emoji_id = $request->emoji_id;
        $post->reading_time = estimatedReadingTime($post->content, 200);
        
        $selectedTags = $request->input('tags');
        $tagsAsString = implode(',', $selectedTags);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'post_'.Str::random(13).'.' . $image->getClientOriginalExtension();
            $directory = 'assets/images/posts/';
            $image->move($directory, $name);
            $name = $directory.$name;
            $post->image = $name;
        }

        $post->save();

        foreach($request->tags as $tagValue)
        {
            $tagSlug = Str::slug($tagValue);
            
            if (!$tag = Tag::where('slug', $tagSlug)->first())
            {
                $tag = Tag::create([
                    'label' => $tagValue,
                    'slug'  => $tagSlug
                ]);
            }

            $post->tags()->attach($tag->id);
        }

        $data = [
            'email_name' => 'Kaizen.az',
            'subject' => 'Məqalə yaratmaq',
            'text' => 'Sizin məqaləniz uğurla yaradıldı',
        ];

        if (app()->environment('production'))
        {
            Mail::to(Auth::user()->email)->send(new SendPostMail($data));
        }

        return redirect()->route('share')->with('success','Məqalə uğurla əlavə edildi');

    }

    public function postEdit($id){
        $post = Posts::find($id);
        if(!$post){
            return redirect()->back()->with('error',true);
        }
        $activePosts = Posts::where('status','1')->get();
        $categories = Categories::get();
        $emoji = Emoji::get();

        return view('front.Postadd.edit',get_defined_vars());
    }

    public function postEditPost(Request $request){
        $post = Posts::find($request->id);
        
        $post->category_id = $request->category;
        $post->title = $request->title;
        $slug = Str::slug($request->title);
        if(Posts::where([['slug',$slug],['id','<>',$post->id]])->first()){
            $slug = $slug.'_'.rand(1000,9999);
        }
        $post->slug = $slug;
        $post->description = $request->description;
        $post->content = $request->contentt;
        $post->tags = $request->tags;
        if ($request->hasFile('image')) {
            $request->validate([
                'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg,webp,jfif,avif|max:1024',
            ]);
            $image = $request->file('image');
            $name = 'post_'.Str::random(13).'.' . $image->getClientOriginalExtension();
            $directory = 'assets/images/posts/';
            $old_image = $post->image;
            if(file_exists($old_image)){
                unlink($old_image);
            }
            $image->move($directory, $name);
            $name = $directory.$name;
            $post->image = $name;
        }
        $post->save();

        return redirect()->route('editPost')->with('success','Məqalə uğurla yeniləndi');
    }

}
