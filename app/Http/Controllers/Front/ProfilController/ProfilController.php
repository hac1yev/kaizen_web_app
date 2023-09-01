<?php

namespace App\Http\Controllers\Front\ProfilController;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\PostLike;
use App\Models\PostBookmark;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function profil(){
       
        $userId = auth()->user()->id;
        $users = User::where('id', $userId)->first();
        $posts = Posts::join('categories', 'categories.id', '=', 'posts.category_id')
        ->where('user_id', $userId)
        ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
        ->get();

        $favorits = User::join('post_like', 'post_like.user_id', '=', 'users.id')
            ->join('posts', 'post_like.post_id', '=', 'posts.id')
            ->join('categories','categories.id','=','posts.category_id')
            ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
            ->where('post_like.user_id', $userId)
            ->distinct('post_like.post_id')
            ->get();

        $marks = User::join('post_bookmark', 'post_bookmark.user_id', '=', 'users.id')
            ->join('posts', 'post_bookmark.post_id', '=', 'posts.id')
            ->join('categories','categories.id','=','posts.category_id')
            ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
            ->where('post_bookmark.user_id', $userId)
            ->distinct('post_bookmark.post_id')
            ->get();

        return View('front.Profil.profil', get_defined_vars());    }

    
}
