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
        $status1 = Posts::where('status','1')->where('user_id',$user->id)->get();
        $status0 = Posts::where('status','0')->where('user_id',$user->id)->get();

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

    
        return redirect()->back()->with('success', 'Şifrə uğurla dəyişdirildi.');
    }
    
    
    public function forgetpassSetting(Request $request) {
        $newPassword = $request->input('password');
        $confirmNewPassword = $request->input('password_confirmation');
    
        if ($newPassword !== $confirmNewPassword) {
            return redirect()->back()->with('error', 'Yeni şifrələr uyğun gəlmir.');
        }
    
        $user = auth()->user();
        $user->password = bcrypt($newPassword); 
        $user->save();

    
        return redirect()->back()->with('success', 'Şifrə uğurla dəyişdirildi.');
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
    


}
