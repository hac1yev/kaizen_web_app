<?php

namespace App\Http\Controllers\Front\ProfilController;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\PostLike;
use App\Models\PostBookmark;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfilController extends Controller
{
    public function profil(){
       
        $userId = auth()->user()->id;
        $users = User::where('id', $userId)->first();
        $posts = Posts::join('categories', 'categories.id', '=', 'posts.category_id')
        ->where('user_id', $userId)
        ->select('posts.id','posts.description','posts.content','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at','posts.reading_time')
        ->orderBy('posts.created_at','DESC')
        ->get();

        $favorits = User::join('post_like', 'post_like.user_id', '=', 'users.id')
            ->join('posts', 'post_like.post_id', '=', 'posts.id')
            ->join('categories','categories.id','=','posts.category_id')
            ->select('posts.id','posts.description','posts.content','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at','posts.reading_time')
            ->where('post_like.user_id', $userId)
            ->distinct('post_like.post_id')
            ->get();
            
        $marks = User::join('post_bookmark', 'post_bookmark.user_id', '=', 'users.id')
        ->join('posts', 'post_bookmark.post_id', '=', 'posts.id')
        ->join('categories','categories.id','=','posts.category_id')
        ->select('posts.id','posts.description','posts.content','posts.image','posts.view','posts.status','posts.category_id as category_id','categories.title as cat_title','posts.title as post_title','posts.created_at','posts.reading_time')
        ->where('post_bookmark.user_id', $userId)
        ->distinct('post_bookmark.post_id')
        ->get();

        if(auth()->check()){
            $likes = PostLike::whereUserId(auth()->user()->id)->get()->pluck('post_id')->toArray();}
            else {
            $likes = [];
        }
        if(auth()->check()){
            $book = PostBookmark::whereUserId(auth()->user()->id)->get()->pluck('post_id')->toArray();}
            else {
            $book = [];
        }

        return View('front.Profil.profil', get_defined_vars());    
    }

    public function editprofile(){
        $userId = auth()->user()->id;
        $users = User::where('id', $userId)->first();
        $postscount = Posts::where('user_id', $userId)->count();

        return view('front.Profil.edit',get_defined_vars());
    }

    public function updateprofile(Request $request){
        try {
            $userId = auth()->user()->id;
            $user = User::find($userId);


            if(!$user){
                return abort(404);
            }
            
            $user->fullname = $request->fullname;
            $user->username = $request->username;
    
            $slug = Str::slug($request->fullname);
            if(User::where([['slug',$slug],['id','<>',$user->id]])->first()){
                $slug = $slug.rand(1000,9999);
            }
            $user->slug = $slug;
            $user->about = $request->about;
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = 'user_'.Str::random(6).'.'.$image->getClientOriginalExtension();
                $old_image = $user->image;
                if(file_exists($old_image)){
                    unlink($old_image);
                }
                $directory = 'back/assets/img/users/';
                $image->move($directory, $name);
                $name = $directory.$name;
                $user->image = $name;
            }
            $selectedAvatarUrl = $request->input('selected-avatar-url');
            if ($selectedAvatarUrl) {
                $user->image = $selectedAvatarUrl;
            }
            
            $user->save();
    
            return redirect()->route('profil')->with('success', 'Profiliniz uğurla yeniləndi');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Nəsə xəta baş verdi');

        }
        
        return view('front.Profil.edit',get_defined_vars());
    }


    public function like(Request $request){
        $post_id = $request->input('post_id'); 
        $user_id = auth()->user()->id;

        $favorite = new PostLike();
        $favorite->post_id = $post_id;
        $favorite->user_id = $user_id;
        $favorite->save();

        return response()->json(['success' => true]); 
    }


    public function dislike(Request $request){
        $post_id = $request->input('post_id');
        $user_id = auth()->user()->id;

        $favorite = PostLike::where('user_id', $user_id)->where('post_id', $post_id)->first();
        $favorite->delete();

        return response()->json(['success' => true]);
        
    }

    public function book(Request $request){
        $post_id = $request->input('post_id'); 
        $user_id = auth()->user()->id;

        $bookmark = new PostBookmark();
        $bookmark->post_id = $post_id;
        $bookmark->user_id = $user_id;
        $bookmark->save();

        return response()->json(['success' => true]); 
    }


    public function disbook(Request $request){

        $post_id = $request->input('post_id');
        $user_id = auth()->user()->id;

        $bookmark = PostBookmark::where('user_id', $user_id)->where('post_id', $post_id)->first();
        $bookmark->delete();

        return response()->json(['success' => true]);
        
    }
}
