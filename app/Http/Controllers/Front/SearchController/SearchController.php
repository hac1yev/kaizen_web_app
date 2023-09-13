<?php

namespace App\Http\Controllers\Front\SearchController;
use App\Models\Posts;
use App\Models\Search;
use App\Models\PostLike;
use Illuminate\Support\Str;
use App\Models\PostBookmark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function action(Request $request)
    {
        if (!$request->has('searching')){
            return abort(404);
        }           

        $searchingVal = $request->searching;
        if ($searchingVal) {
            
            if ($searchValue = Search::where('word', $searchingVal)->first())
            {
                $searchValue->count += 1;
                $searchValue->save();
            }
            else
            {
                $searchValue = Search::create([
                    'word' => $searchingVal,
                    'count' => 1
                ]);
            }

            $posts = Posts::with('getCategory')
                ->where(function ($query) use ($searchingVal) {
                    $query->where('title', 'like', '%' . $searchingVal . '%')
                          ->orWhere('slug', 'like', '%' . $searchingVal . '%')
                          ->orWhere('description', 'like', '%' . $searchingVal . '%')
                          ->orWhere('tags', 'like', '%' . $searchingVal . '%')
                          ->orWhere('content', 'like', '%' . $searchingVal . '%');
                })
                ->get();
        } else {
            $posts = collect(); 
        }


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

        return view('front.Search.search',get_defined_vars());
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
