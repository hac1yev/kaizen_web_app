<?php

namespace App\Http\Controllers\Front\EmojiController;
use App\Models\Posts;
use App\Models\Search;
use App\Models\PostLike;
use Illuminate\Support\Str;
use App\Models\PostBookmark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmojiController extends Controller
{
   
    public function emoji($emojiId)
    {
        $posts = Posts::where('emoji_id', $emojiId)->get();

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
        return view('front.Search.emoji',get_defined_vars());
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
