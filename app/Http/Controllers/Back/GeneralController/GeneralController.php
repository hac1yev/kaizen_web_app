<?php

namespace App\Http\Controllers\Back\GeneralController;

use App\Http\Controllers\Back\HelperController\HelperController;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function admin(){
        $comments = Comment::all();
        $posts = Posts::all();
        $messages = Contact::all();
        $users = User::all();
        $home_posts = Posts::orderBy('id','DESC')->limit('10')->get();
        return view('back.index',compact('comments','posts','messages','users','home_posts'));
    }
}
