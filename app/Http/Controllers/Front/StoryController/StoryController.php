<?php

namespace App\Http\Controllers\Front\StoryController;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Posts;
use App\Models\User;
use App\Models\PostLike;
use App\Models\PostBookmark;
use Illuminate\Http\Request;
use App\Models\AdvertFooter;

class StoryController extends Controller
{

    public function all(){
        $posts = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
        ->where('posts.status','1')->where('category_id','13')->orderBy('posts.created_at','DESC')->get();
        return view('front.İnkisaf.all',get_defined_vars());

    }


    public function story(){

        $story = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
        ->where('posts.status','1')->where('category_id','13')->get()->toArray();

        $slayd = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
        ->where('posts.status','1')->where('category_id','13')->skip(11)->take(3)->get();
        $adverts = AdvertFooter::all();
        if(auth()->check()){
            $likes = PostLike::whereUserId(auth()->user()->id)->get()->pluck('post_id')->toArray();}
            else {
            $likes = [];
        }
        if(auth()->check()){
            $book = PostBookmark::whereUserId(auth()->user()->id)->get()->pluck('post_id')->toArray();}
            else {
            $book = [];
        }
        return view('front.Story.story',get_defined_vars());
    }

    public function like(Request $request){
        $post_id = $request->input('post_id'); 
        $user_id = auth()->user()->id;

        $favorite = new PostLike();
        $favorite->post_id = $post_id;
        $favorite->user_id = $user_id;
        $favorite->save();

        return response()->json(['success' => true]); 
    }


    public function dislike(Request $request){
        $post_id = $request->input('post_id');
        $user_id = auth()->user()->id;

        $favorite = PostLike::where('user_id', $user_id)->where('post_id', $post_id)->first();
        $favorite->delete();

        return response()->json(['success' => true]);
        
    }

    public function book(Request $request){
        $post_id = $request->input('post_id'); 
        $user_id = auth()->user()->id;

        $bookmark = new PostBookmark();
        $bookmark->post_id = $post_id;
        $bookmark->user_id = $user_id;
        $bookmark->save();

        return response()->json(['success' => true]); 
    }


    public function disbook(Request $request){

        $post_id = $request->input('post_id');
        $user_id = auth()->user()->id;

        $bookmark = PostBookmark::where('user_id', $user_id)->where('post_id', $post_id)->first();
        $bookmark->delete();

        return response()->json(['success' => true]);
        
    }

}
