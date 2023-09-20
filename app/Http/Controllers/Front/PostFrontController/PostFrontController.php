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
use Illuminate\Support\Facades\Storage;

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
        $post->slug = Str::slug($request->title . "-" . uniqid());
        $post->description = $request->description;
        $post->content = $request->content;
        $post->emoji_id = $request->emoji_id;
        $post->reading_time = estimatedReadingTime($post->content, 200);

        if ($request->hasFile('image')) {
            $request->validate([
                'image'=>'image|mimes:jpg,png,jpeg,gif,svg,webp,jfif,avif',
            ]);

            $path = $request->file('image')->store('', 'post-images');
            $post->image = $path;
        }
        else
        {
            return redirect()->route('share')->with(['error' => 'Xəta baş verdi']);
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

        
        if (app()->environment('production') && Auth::user()->subscribed == 1)
        {
            $data = [
                'email_name' => 'Kaizen.az',
                'subject' => 'Məqalə yaratmaq',
                'text' => 'Sizin məqaləniz uğurla yaradıldı',
            ];
            Mail::to(Auth::user()->email)->send(new SendPostMail($data));
        }

        return redirect()->route('share')->with('success','Məqalə uğurla əlavə edildi');

    }

    public function postEdit(Posts $post){
        $activePosts = Posts::where('status','1')->get();
        $categories = Categories::get();
        $emoji = Emoji::get();

        return view('front.Postadd.edit',get_defined_vars());
    }

    public function postEditPost(Request $request, Posts $post){
        $request->validate([
            'tags' => 'required|array'
        ]);

        $post->category_id = $request->category;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title . "-" . uniqid());
        $post->description = $request->description;
        $post->content = $request->content;

        if ($request->hasFile('image'))
        {
            $request->validate([
                'image'=>'image|mimes:jpg,png,jpeg,gif,svg,webp,jfif,avif',
            ]);

            Storage::disk('post-images')->delete($post->image);
            
            $path = $request->file('image')->store('', 'post-images');

            $post->image = $path;
        }
        else
        {
            if (!Storage::disk('post-images')->exists($post->image))
            {
                return redirect()->route('editPost', ['post' => $post->id])->with([
                    'error' => 'Xəta baş verdi'
                ]);
            }
        }

        $post->save();

        $post->tags()->detach();

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

        return redirect()->route('editPost', ['post' => $post->id])->with('success','Məqalə uğurla yeniləndi');
    }
}
