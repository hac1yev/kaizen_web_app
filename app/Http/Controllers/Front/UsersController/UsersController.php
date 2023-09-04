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
        $users= User::where('is_admin','0')->orderBy('created_at','DESC')->paginate(40);

        return view('front.User.user', get_defined_vars());
    }


    public function useraxtar(Request $request)
    {
        if (!$request->has('searching')){
            return abort(404);
        }           

        $searchingVal = $request->searching;
        if ($searchingVal) {
            $users = User::where(function ($query) use ($searchingVal) {
                    $query->where('fullname', 'like', '%' . $searchingVal . '%')
                          ->orWhere('username', 'like', '%' . $searchingVal . '%')
                          ->orWhere('slug', 'like', '%' . $searchingVal . '%');
                })
                ->get();
        } else {
            $users = collect(); 
        }

        return view('front.User.axtar',get_defined_vars());
    }

    
}
