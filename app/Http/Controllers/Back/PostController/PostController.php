<?php

namespace App\Http\Controllers\Back\PostController;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Comment;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        $categories = Categories::all();
        return view('back.posts.add',compact('categories'));
    }
    public function postAddPost(Request $request){
        
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
        $post->content = $request->contentt;
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
        
        $post->reading_time = estimatedReadingTime($post->content, 200);

        return redirect()->route('postListIndex')->with($post->save() ? 'success' : 'error',true);

    }
}
