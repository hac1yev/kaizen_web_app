<?php

namespace App\Http\Controllers\Front\SettingController;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Posts;
use App\Models\User;
use App\Models\Whydeleted;
use Illuminate\Http\Request;
use App\Mail\SendActivite ;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function settings(){
        $user = Auth::user();

        return view('front.Settings.settings',get_defined_vars());
    }

    public function activation(){
        $user = Auth::user();
        $user->email_verification_code = Str::random(40);
        $user->save();
    
        $data = [
            'email_name' => 'Kaizen.az',
            'subject' => 'Kaizen.az | VERIFICATION',
            'text' => 'Hörmətli İzləyici,

            Hesabı aktivləşdirmək üçün aşağıdaki linkə keçid edin:',
            'link' => route('activateUser', $user->email_verification_code),
        ];

        Mail::to($user->email)->send(new SendActivite($data));
        $user->save();

        return back()->with('success', 'Emailinizdəki linkdən profilinizi aktivləşdirin');
    }

    public function activateUser($code){
        $user = Auth::user();
        if ($user->email_verification_code === $code) {
            $user->verified = '1';
            $user->email_verification_code = null;
            $user->save();

            return redirect('/')->with('success', 'Profiliniz uğurla aktivləşdirildi');
        }

        return redirect('/')->with('error', 'Nəsə xəta baş verdi');
    }

    public function changeEmail(Request $request) {
        $newEmail = $request->input('email');
    
        if (!empty($newEmail)) {
            $oldEmail = auth()->user()->email; 
            
            if ($newEmail !== $oldEmail) {
                $userWithNewEmail = User::where('email', $newEmail)->first();
    
                if ($userWithNewEmail) {
                    return redirect()->back()->with('error', 'Bu email artıq mövcuddur');
                }
    
                $user = auth()->user();
                $user->email = $newEmail;
                $user->verified = 0;
                $user->save();
    
                return redirect()->back()->with('success', 'E-poçt uğurla dəyişdirilmişdir! Yeni e-poçtunuzu aktivləşdirin');
            } else {
                return redirect()->back()->with('error', 'Yeni email ilə köhnə email eyni ola bilməz!');
            }
        } else {
            return redirect()->back()->with('error', 'E-poçt boş ola bilməz');
        }
    }
    
    public function changePass(Request $request) {
        $currentPassword = $request->input('password');
        $newPassword = $request->input('newpass');
        $confirmNewPassword = $request->input('connewpass');
    
        if (!Hash::check($currentPassword, auth()->user()->password)) {
            return redirect()->back()->with('error', 'Hazırki şifrə yanlışdır.');
        }
    
        if ($newPassword !== $confirmNewPassword) {
            return redirect()->back()->with('error', 'Yeni şifrələr uyğun gəlmir.');
        }
    
        $user = auth()->user();
        $user->password = bcrypt($newPassword); 
        $user->save();
        Auth::logout();

    
        return redirect()->route('index')->with('success', 'Şifrə uğurla dəyişdirildi.');
    }
    
    
    public function forgetpassSetting(Request $request) {
        $newPassword = $request->input('password');
        $confirmNewPassword = $request->input('password_confirmation');
    
        if ($newPassword !== $confirmNewPassword) {
            return redirect()->back()->with('error', 'Yeni şifrələr uyğun gəlmir.');
        }
    
        $user = auth()->user();
        $user->password = bcrypt($newPassword); 
        $user->verified = 0; 
        $user->save();
        Auth::logout();

    
        return redirect()->route('index')->with('success', 'Şifrə uğurla dəyişdirildi.');
    }

    public function whydelete(Request $request) {
        $user = auth()->user(); 
    
        Whydeleted::create([
            'user_id' => $user->id,
            'reason' => $request->input('reason')
        ]);
        $user->delete();
    
        return redirect()->route('index')->with('success', 'Hesabınız uğurla silindi');
    }

    public function downloadinfo(Request $request) {
        $user = auth()->user();
    
        $content = "Fullname: " . $user->fullname . "\n";
        $content .= "Username: " . $user->username . "\n";
        $content .= "Email: " . $user->email . "\n";
        $content .= "About me: " . $user->about . "\n";
        $content .= "Created at: " . $user->created_at . "\n";
    
        $headers = [
            'Content-type' => 'text/plain',
            'Content-Disposition' => sprintf('attachment; filename="%s"', 'user_info.txt'),
        ];
    
        return response($content, 200, $headers);
    }


    public function subc(Request $request) {
        $user = auth()->user();
        $newStatus = ($user->subscribed == 1) ? 0 : 1;
        $user->subscribed = $newStatus;
        $user->save();
    
        $message = ($newStatus == 1) ? 'Siz artıq e-poçt bildirişləri alacaqsınız' : 'Siz artıq e-poçt bildirişləri almayacaqsınız';
        
        return redirect()->back()->with('success', $message);
    }
    

    // public function forget()
    //     {

    //     return view('front.Account.forget');
    // }

    // public function confirmpass()
    //     {
    //     return view('front.Account.confirmpass');
    // }
    
    // public function forget_post(Request $request)
    //     {
    //         $request->validate([
    //             'email' => 'required|email|max:255',
    //         ]);

    //         $user = User::where('email', $request->email)->first();

    //         if (!$user) {
    //             return redirect()->route('forget')->with('error', __('messages.melyox'));
    //         }

    //         $user->email_verification_code = Str::random(40);
    //         $user->save();

    //         $data = [
    //             'email_name' => '1is.az',
    //             'subject' => 'Şifrə yeniləmə',
    //             'text' => 'Şifrənizi yeniləmək üçün bu linkə tıklayın:',
    //             'link' => env('APP_URL') . '/reset-password/' . $user->email_verification_code,
    //         ];

    //         Mail::to($user->email)->send(new SendForgetMail($data));

    //         return redirect()->route('forget')->with('success', __('messages.sendpass'));
    // }

    

    // public function forget_verification(Request $request)
    //     {
    //         $verification = $request->verification;

    //         try {
    //             DB::beginTransaction();

    //             $user_verification = User::where('email_verification_code', $verification)->first();

    //             if ($user_verification && $user_verification->status !== NULL) {
    //                 $user_verification->email_verification_code = "";
    //                 $user_verification->status = 1;
    //                 $user_verification->save();

    //                 DB::commit();

    //                 return redirect()->route('confirmpass')->with('success', __('messages.passyaz'));
    //             }
    //             else {
    //                 return redirect()->route('login');
    //             }

    //             DB::commit();
    //         } catch (\Exception $e) {
    //             DB::rollBack();
    //         }

    //         return redirect()->route('confirmpass');
    // }

    // public function confirm_post(Request $request)
    //     {
    //         $request->validate([
    //             'password' => 'required|min:8|confirmed',
    //         ]);

    //         try {
    //             DB::beginTransaction();

    //             $user = User::where('email', $request->email)->first();

    //             if ($user) {
    //                 $user->email_verification_code = "";
    //                 $user->password = bcrypt($request->password);
    //                 $user->save();

    //                 DB::commit();

    //                 return redirect()->route('index')->with('success', __('messages.parollogin'));
    //             }

    //             DB::commit();
    //         } catch (\Exception $e) {
    //             DB::rollBack();
    //         }

    //         return redirect()->back()->with('error', __('messages.errorpasyeni'));
    // }


}
