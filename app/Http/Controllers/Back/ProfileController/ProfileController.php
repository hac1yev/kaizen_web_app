<?php

namespace App\Http\Controllers\Back\ProfileController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function profileIndex(){
        return view('back.profile.profile');
    }
    public function profilePost(Request $request){
        $request->validate([
            'id'=>'required',
            'fullname'=>'required|min:3',
            'username'=>'required|min:3',
        ]);
        $user = User::find($request->id);
        if(!$user){
            return redirect()->route('admin')->with('error',true);
        }
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $slug = Str::slug($request->username);
        if(User::where([['slug',$slug],['id','<>',$request->id]])->first()){
            $slug = $slug.'_'.rand(1000,9999);
        }
        $user->slug = $slug;
        $user->about = $request->about;
        if ($request->hasFile('image')) {
            $request->validate([
                'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg,webp,jfif,avif|max:1024',
            ]);
            $image = $request->file('image');
            $name = 'admin_'.Str::random(13).'.' . $image->getClientOriginalExtension();
            $directory = 'assets/images/user/';
            $old_image = $user->image;
            if(file_exists($old_image) && $old_image != 'assets/images/user/default_user.png'){
                unlink($old_image);
            }
            $image->move($directory, $name);
            $name = $directory.$name;
            $user->image = $name;
        }
        return redirect()->route('profileIndex')->with($user->save() ? 'success' : 'error',true);
    }
}
