<?php

namespace App\Http\Controllers\Front\PostFrontController;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Support\Str;
use App\Mail\SendPostMail;
use Illuminate\Support\Facades\Mail; 
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PostFrontController extends Controller
{
    public function share(){
        $user = Auth::user();

        $categories = Categories::where('status','1')->get();
        $tags = Posts::where('status','1')->get();

        return view('front.Postadd.add',get_defined_vars());
    }

    public function postadd(Request $request){
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
        
        $selectedTags = $request->input('tags');
        $tagsAsString = implode(',', $selectedTags);
        $post->tags = $tagsAsString;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'post_'.Str::random(13).'.' . $image->getClientOriginalExtension();
            $directory = 'assets/images/posts/';
            $image->move($directory, $name);
            $name = $directory.$name;
            $post->image = $name;
        }
        $post->save();

        $data = [
            'email_name' => 'Kaizen.az',
            'subject' => 'Məqalə yaratmaq',
            'text' => 'Sizin məqaləniz uğurla yaradıldı',
        ];

        Mail::to(Auth::user()->email)->send(new SendPostMail($data));

        return redirect()->route('share')->with('success','Məqalə uğurla əlavə edildi');

    }

    public function postEdit($id){
        $post = Posts::find($id);
        if(!$post){
            return redirect()->back()->with('error',true);
        }
        $categories = Categories::all();
        return view('front.Postadd.edit',get_defined_vars());
    }

}
