<?php

namespace App\Http\Controllers\Front\DetailController;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AdvertFooter;
use Illuminate\Support\Facades\Auth;


class DetailController extends Controller
{
    public function detail($id){
        $post = Posts::find($id);
        if (!$post || $post->status == 0) {
            abort(404);
        }
        $postdetail = Posts::join('categories', 'categories.id', '=', 'posts.category_id')
        ->where('posts.id', $id)
        ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
        ->first();

        $elaqeli = Posts::join('categories', 'categories.id', '=', 'posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
        ->where('posts.status', '1')
        ->where('posts.id', '!=', $postdetail->id)
        ->where('posts.category_id', $postdetail->category_id)
        ->paginate(5);
        $adverts = AdvertFooter::all();

        $comments = $post->comments;


        return view('front.Details.detail',get_defined_vars());
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
    

    
}
