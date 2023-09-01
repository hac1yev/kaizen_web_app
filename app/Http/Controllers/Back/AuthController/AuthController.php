<?php

namespace App\Http\Controllers\Back\AuthController;

use App\Http\Controllers\Back\HelperController\HelperController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginIndex(){
        return view('back.login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginIndex');
    }
    public function loginPost(Request$request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $login = $request->only(['email', 'password']);
        $user = User::where([['email', $request->email],['is_admin','<>','0']])->first();
        if ($user){
            if (Auth::attempt($login)){
                return redirect()->route('admin');
            }else{
                return redirect()->back()->withInput()->with('password',true);
            }
        }else{
            return redirect()->back()->withInput()->with('non_user',true);
        }
    }
}
