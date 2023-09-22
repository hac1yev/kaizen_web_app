<?php

namespace App\Http\Controllers\Front\İndexController;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Posts;
use App\Models\User;
use App\Models\Quotes;
use App\Models\PostLike;
use App\Models\PostBookmark;
use App\Models\AdvertFooter;
use Illuminate\Http\Request;

class İndexController extends Controller
{
    public function index(){
        $quote = Quotes::inRandomOrder()->where('status','1')->first();

        $sonposts = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at','posts.reading_time')
        ->where('posts.status','1')->orderBy('posts.created_at', 'DESC')->paginate(4);

        
        $famous = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at','posts.reading_time')
        ->where('posts.status','1')->orderBy('posts.view', 'DESC')->paginate(4);

        $diger1 = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at','posts.reading_time')
        ->where('posts.status','1')->where('category_id','3')->take(1)->get();

        
        $diger2 = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at','posts.reading_time')
        ->where('posts.status','1')->where('category_id','3')->skip(1)->take(2)->get();


        $diger3 = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at','posts.reading_time')
        ->where('posts.status','1')->where('category_id','3')->skip(3)->take(1)->get();


        $ferdi = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at','posts.reading_time')
        ->where('posts.status','1')->where('category_id','3')->skip(4)->take(4)->get();


        $travel = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at','posts.reading_time')
        ->where('posts.status','1')->where('category_id','4')->take(4)->get();


        $story = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at','posts.reading_time')
        ->where('posts.status','1')->where('category_id','13')->take(4)->get();

        $film = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at','posts.reading_time')
        ->where('posts.status','1')->where('category_id','14')->take(4)->get();


        $biznes = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at','posts.reading_time')
        ->where('posts.status','1')->where('category_id','15')->take(4)->get();

        $adverts = AdvertFooter::where('status','1')->get();
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

        return view('index',get_defined_vars());
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
