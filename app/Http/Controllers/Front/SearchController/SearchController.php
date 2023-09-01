<?php

namespace App\Http\Controllers\SearchController;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function action(Request $request)
    {
        if (!$request->has('searching')){
            return abort(404);
        }           

        $searchingVal = $request->searching;
        if ($searchingVal) {
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

        return view('front.Search.search',get_defined_vars());
    }
}
