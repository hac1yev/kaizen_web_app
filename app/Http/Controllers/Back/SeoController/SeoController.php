<?php

namespace App\Http\Controllers\Back\SeoController;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function seoIndex(){
        $seo = Seo::first();
        return view('back.seo.seo',compact('seo'));
    }
    public function seoPost(Request $request){
        $request->validate([
           'meta_title'=>'required',
           'meta_description'=>'required',
            'tags'=>'required'
        ]);
        $seo = Seo::first();
        $seo->meta_title = $request->meta_title;
        $seo->meta_description = $request->meta_description;
        $seo->meta_keywords = $request->tags;
        return redirect()->back()->with($seo->save() ? 'success' : 'error',true);
    }
}
