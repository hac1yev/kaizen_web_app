<?php

namespace App\Http\Controllers\Back\SocialMediaController;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function socialIndex(){
        $social = SocialMedia::first();
        return view('back.social.social',compact('social'));
    }
    public function socialPost(Request $request){
        $request->validate([
           'facebook'=>'required',
           'twitter'=>'required',
           'instagram'=>'required',
           'linkedin'=>'required',
           'telegram'=>'required',
           'tiktok'=>'required',
        ]);
        $social = SocialMedia::first();
        $social->facebook = $request->facebook;
        $social->twitter = $request->twitter;
        $social->instagram = $request->instagram;
        $social->linkedin = $request->linkedin;
        $social->telegram = $request->telegram;
        $social->tiktok = $request->tiktok;
        return redirect()->back()->with($social->save() ? 'success' : 'error',true);

    }
}
