<?php

namespace App\Http\Controllers\Front\AccountController;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Redirect;
use Illuminate\Http\Request;


class AccountController extends Controller
{
    public function registerpost(Request $request){
        $request->validate([
            'fullname' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $slug = Str::slug($request->fullname);
        $count = 2;
        while (User::where('slug', $slug)->first()) {
            $slug = Str::slug($request->fullname) . '-' . $count;
            $count++;
        }

        $user = User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'slug' => $slug,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'email_verification_code' => Str::random(40),
        ]);
        return redirect()->back()->with('success', 'Qeydiyyat uğurla tamamlandı');
    }

    
    public function contactpost(Request $request){
        try {
            $request->validate([
                'name'=>'required',
                'email'=>'required|email',                
                'message'=>'required'

            ]);

            $contact = new Contact();            
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->message = $request->message;
    

            $contact->save();
    
            return back()->with('success',  'aferin');
    
        } catch (\Throwable $e) {
            return back()->with('error',$e->getMessage());
        }
    }

    public function loginpost(Request $request){
        Redirect::setIntendedUrl(url()->previous()); 

        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $login = $request->only(['email', 'password']);
        $user = User::where([['email', $request->email]])->first();
        if ($user) {
            if (Auth::attempt($login)) {
                return redirect()->intended();
            } else {
                return redirect()->back()->withInput()->with('error', 'Email və ya parol yanlışdır');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Belə istifadəçi yoxdur');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    
}
