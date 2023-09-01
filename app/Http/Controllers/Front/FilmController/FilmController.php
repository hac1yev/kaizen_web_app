<?php

namespace App\Http\Controllers\Front\FilmController;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AdvertFooter;

class FilmController extends Controller
{
    public function film(){

        $film = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
        ->where('posts.status','1')->where('category_id','14')->get()->toArray();

        $slayd = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
        ->where('posts.status','1')->where('category_id','14')->skip(11)->take(3)->get();
        $adverts = AdvertFooter::all();


        return view('front.Film.film',get_defined_vars());
    }
}
