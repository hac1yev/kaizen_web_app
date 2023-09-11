<?php

namespace App\Http\Controllers\Front\AccountController;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendForgetMail ;
use App\Mail\SendContactMail ;
use Illuminate\Support\Str;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



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
        $data=[];
        $data['email_name']='1is.az';
        $data['subject']='Email verification';
        $data['link']=env('APP_URL').'/user-verification/'.$user->email_verification_code;
        $data['text']='Emailniz tesdiqleyin';

        if (env("APP_ENV") === "local")
        {
            $user->verified = '1';
            $user->email_verification_code = '';
            
        }
        else
        {
            Mail::to($user->email)->send(new SendMail($data));
        }
        $user->save();

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

            $data = [
                'email_name' => 'Kaizen.az',
                'subject' => 'Abunə olmaq',
                'text' => 'Təbriklərr, saytımıza uğurla abunə oldunuz',
            ];
    
            Mail::to($contact->email)->send(new SendContactMail($data));
    
    
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


    public function forget_post(Request $request){
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Belə bir email yoxdur');
        }
        
        $user->email_verification_code = Str::random(40);
        $user->save();

        $data = [
            'email_name' => 'Kaizen.az',
            'subject' => 'Şifrə yeniləmə',
            'text' => 'Şifrənizi yeniləmək üçün bu linkə tıklayın:',
            'link' => env('APP_URL') . '/email-verification/' . $user->email_verification_code,
        ];

        Mail::to($user->email)->send(new SendForgetMail($data));

        return redirect()->back()->with('success', 'Emailinizə gələn linkdən parolunuzu yeniləyin');
    }

    public function forget_verification(Request $request){
        $verification = $request->verification;
        
        if ($user = User::where('email_verification_code', $verification)->first())
        {
            return redirect()->route('index')->with([
                'success' => 'Yeni parolunu daxil edin',
                'forgot-password-h78he129' => true,
                'email_verification_code' => $user->email_verification_code
            ]);
        }

        return redirect()->route('index');
    }

    public function confirm_post(Request $request){
        $verificationCode = $request->email_verification_code;

        if ($user = User::where('email_verification_code', $verificationCode)->first())
        {
            $newPass = $request->password;
            $newPassRepeat = $request->password_confirmation;
            if ($newPass === $newPassRepeat)
            {
                $user->password = bcrypt($request->password);
                $user->email_verification_code = "";
                $user->verified = '0';
                $user->save();
                return redirect()->back()->with('success', 'Şifrəniz uğurla dəyişdirildi');

            }
        }

        return redirect()->back();

    }


    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }

    
}
