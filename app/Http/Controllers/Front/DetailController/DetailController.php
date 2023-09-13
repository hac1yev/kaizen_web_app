<?php

namespace App\Http\Controllers\Front\DetailController;

use App\Models\User;
use App\Models\Posts;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\PostLike;
use Illuminate\View\View;
use App\Models\AdvertFooter;
use App\Models\PostBookmark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class DetailController extends Controller
{
    // public function detail($id){
    //     $post = Posts::find($id);
    //     if (!$post || $post->status == 0) {
    //         abort(404);
    //     }
    //     $postdetail = Posts::join('categories', 'categories.id', '=', 'posts.category_id')
    //     ->where('posts.id', $id)
    //     ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
    //     ->first();

    //     $elaqeli = Posts::join('categories', 'categories.id', '=', 'posts.category_id')
    //     ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
    //     ->where('posts.status', '1')
    //     ->where('posts.id', '!=', $postdetail->id)
    //     ->where('posts.category_id', $postdetail->category_id)
    //     ->paginate(5);
    //     $adverts = AdvertFooter::all();

    //     $comments = $post->comments;
    //     if(auth()->check()){
    //         $likes = PostLike::whereUserId(auth()->user()->id)->get()->pluck('post_id')->toArray();}
    //         else {
    //         $likes = [];
    //     }
    //     if(auth()->check()){
    //         $book = PostBookmark::whereUserId(auth()->user()->id)->get()->pluck('post_id')->toArray();}
    //         else {
    //         $book = [];
    //     }


    //     return view('front.Details.detail',get_defined_vars());
    // }

    public function showPost(Posts $post): View
    {
        $book = [];
        $likes = [];

        $this->increaseViewCount($post);
        $userId = $post->getUser()->id;
        $postscount = Posts::where('user_id', $userId)->get();

        return view('front.Details.detail', compact(
            'post',
            'book',
            'likes',
            'postscount'
        ));
    }

    public function increaseViewCount(Posts $post): void 
    {
        $post->view += 1;
        $post->save();
    }

    public function commentPost(Request $request){
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->post_id = $request->post;
        $comment->save();
        $commentData = [
            'user_fullname' => Auth::user()->fullname,
            'user_image' => asset(Auth::user()->image),
            'created_at' => now()->format('d.m.Y'),
            'comment' => $comment->comment,
        ];

    return response()->json(['commentData' => $commentData, 'bool'=>true]);
        
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
