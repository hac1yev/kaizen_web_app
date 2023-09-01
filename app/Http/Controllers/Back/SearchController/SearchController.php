<?php

namespace App\Http\Controllers\Back\SearchController;

use App\Http\Controllers\Controller;
use App\Models\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchListIndex(){
        $keywords = Search::all();
        return view('back.search.list',compact('keywords'));
    }
}
