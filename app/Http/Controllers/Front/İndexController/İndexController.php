<?php

namespace App\Http\Controllers\Front\İndexController;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Posts;
use App\Models\User;
use App\Models\Quotes;
use App\Models\AdvertFooter;


use Illuminate\Http\Request;

class İndexController extends Controller
{
    public function index(){
        $quote = Quotes::inRandomOrder()->first();

        $sonposts = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
        ->where('posts.status','1')->orderBy('posts.created_at', 'DESC')->paginate(4);

        
        $famous = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
        ->where('posts.status','1')->orderBy('posts.view', 'DESC')->paginate(4);

        $diger1 = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
        ->where('posts.status','1')->where('category_id','3')->take(1)->get();

        
        $diger2 = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
        ->where('posts.status','1')->where('category_id','3')->skip(1)->take(2)->get();


        $diger3 = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
        ->where('posts.status','1')->where('category_id','3')->skip(3)->take(1)->get();


        $ferdi = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
        ->where('posts.status','1')->where('category_id','3')->skip(4)->take(4)->get();


        $travel = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
        ->where('posts.status','1')->where('category_id','4')->take(4)->get();


        $story = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
        ->where('posts.status','1')->where('category_id','13')->take(4)->get();

        $film = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
        ->where('posts.status','1')->where('category_id','14')->take(4)->get();


        $biznes = Posts::join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.tags','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at')
        ->where('posts.status','1')->where('category_id','15')->take(4)->get();

        $adverts = AdvertFooter::all();


        return view('index',get_defined_vars());
    }
}
