<?php

namespace App\Http\Controllers\Front\UsersController;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function user(){
        $users= User::where('is_admin','0')->orderBy('created_at','DESC')->get();

        return view('front.User.user', get_defined_vars());
    }

    
}
