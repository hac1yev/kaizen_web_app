<?php

namespace App\Http\Controllers\Back\PostController;

use App\Models\Tag;
use App\Models\Posts;
use App\Models\Comment;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function postListIndex(){
        $posts = Posts::orderBy('id','DESC')->get();
        return view('back.posts.list',compact('posts'));
    }
    public function postStatus(Request $request){
        $post = Posts::find($request->id);
        if(!$post){
            return response()->json('0');
        }
        $post->status = $post->status == '1' ? '0' : '1';
        return $post->save() ? response()->json('1') : response()->json('0');
    }
    public function postDelete(Request $request){
        $post = Posts::find($request->id);
        if(!$post){
            return response()->json('0');
        }
        $old_image= $post->image;
        if(file_exists($old_image)){
            unlink($old_image);
        }
        $comments = Comment::where('post_id',$request->id)->get();
        foreach ($comments as $comment){
            $comment->delete();
        }
        return $post->delete() ? response()->json('1') : response()->json('0');
    }
    public function postEdit($id){
        $post = Posts::find($id);
        if(!$post){
            return redirect()->route('postListIndex')->with('error',true);
        }
        $categories = Categories::all();
        return view('back.posts.edit',compact('post','categories'));
    }
    public function postEditPost(Request $request){
        $request->validate([
            'id'=>'required|numeric',
            'category'=>'required|numeric',
            'title'=>'required|min:3|max:255',
            'description'=>'required|min:3',
            'contentt'=>'required',
            'tags'=>'required'
        ]);
        $post = Posts::find($request->id);
        if(!$post){
            return redirect()->route('postListIndex')->with('error',true);
        }
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
        return redirect()->route('postEdit',$post->id)->with($post->save() ? 'success' : 'error',true);
    }
    public function postAdd(){
        return view('back.posts.add');
    }
    public function postAddPost(Request $request){
        $request->validate([
            'tags' => 'required|array'
        ]);

        $post = new Posts();
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title . '-' . uniqid());
        $post->description = $request->description;
        $post->content = $request->contentt;
        $post->emoji_id = $request->emoji;
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
            return redirect()->route('postListIndex')->with(['error' => 'Xəta baş verdi']);
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

        return redirect()->route('postListIndex')->with($post->save() ? 'success' : 'error',true);
    }
}
