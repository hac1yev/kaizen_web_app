<?php

namespace App\Http\Controllers\Back\UserController;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function userListIndex()
    {
        $users= User::where('is_admin','0')->orderBy('id','DESC')->get();
        return view('back.users.list',compact('users'));
    }
    public function userEdit($id)
    {
        $user=User::find($id);
        if(!$user){
            return redirect()->route('userListIndex')->with('error',true);
        }
        return view('back.users.edit',compact('user'));
    }
    public function userEditPost(Request $request){
        $request->validate([
           'id'=>'required',
           'fullname'=>'required|min:3',
           'username'=>'required|min:3',
           'about'=>'required|min:3',
        ]);
        $user = User::find($request->id);
        if(!$user){
            return redirect()->route('userListIndex')->with('error',true);
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
        return redirect()->route('userEdit',$request->id)->with($user->save() ? 'success' : 'error',true);
    }
    public function userDelete(Request $request){
        $user = User::find($request->id);
        if(!$user){
            return response()->json('0');
        }
        $old_image = $user->image;
        if(file_exists($old_image) && $old_image != 'assets/images/user/default_user.png'){
            unlink($old_image);
        }
        $posts = Posts::where('user_id',$request->id)->get();
        foreach ($posts as $post){
            $comments = Comment::where('post_id',$post->id)->get();
            foreach ($comments as $comment){
                $comment->delete();
            }
            $post->delete();
        }

        return $user->delete() ? response()->json('1') : response()->json('0');
    }
}
