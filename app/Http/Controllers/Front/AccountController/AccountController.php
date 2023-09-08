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
use Illuminate\Support\Str;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



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

        try {
            DB::beginTransaction();

            $user_verification = User::where('email_verification_code', $verification)->first();

            if ($user_verification && $user_verification->status !== NULL) {
                $user_verification->email_verification_code = "";
                $user_verification->status = 1;
                $user_verification->save();

                DB::commit();

                return redirect()->route('index')->with('success', 'Yeni parolunu daxil edin');
            }
            else {
                return redirect()->back();
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return redirect()->back();
    }
    


    public function confirm_post(Request $request){
        try {
            DB::beginTransaction();

            $user = User::where('email', $request->email)->first();

            if ($user) {
                $user->email_verification_code = "";
                $user->password = bcrypt($request->password);
                $user->save();

                DB::commit();

                return redirect()->route('index')->with('success', 'Təbriklər');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

    }


    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }

    
}
