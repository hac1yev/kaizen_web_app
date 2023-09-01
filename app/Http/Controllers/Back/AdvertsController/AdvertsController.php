<?php

namespace App\Http\Controllers\Back\AdvertsController;

use App\Http\Controllers\Controller;
use App\Models\AdvertFooter;
use App\Models\AdvertPosts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdvertsController extends Controller
{
    public function advertPostIndex(){
        $adverts = AdvertPosts::all();
        return view('back.adverts.advert_posts',compact('adverts'));
    }
    public function advertPost(Request $request){
        $request->validate([
            'link'=>'required|min:3',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg,webp,jfif,avif|max:1024',
        ]);
        $advert = new AdvertPosts();
        $advert->redirect_link = $request->link;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'advert_'.Str::random(13).'.' . $image->getClientOriginalExtension();
            $directory = 'assets/images/adverts/';
            $image->move($directory, $name);
            $name = $directory.$name;
            $advert->image = $name;
        }
        return redirect()->back()->with($advert->save() ? 'success' : 'error',true);
    }
    public function advertPostStatus(Request $request){
        $advert = AdvertPosts::find($request->id);
        if(!$advert){
            return response()->json('0');
        }
        $advert->status = $advert->status == '1' ? '0' : '1';
        return $advert->save() ? response()->json('1') : response()->json('0');
    }
    public function advertPostDelete(Request $request){
        $advert = AdvertPosts::find($request->id);
        if(!$advert){
            return response()->json('0');
        }
        return $advert->delete() ? response()->json('1') : response()->json('0');
    }
    public function advertFooterIndex(){
        $adverts = AdvertFooter::all();
        return view('back.adverts.advert_footer',compact('adverts'));
    }
    public function advertFooter(Request $request){
        $request->validate([
            'link'=>'required|min:3',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg,webp,jfif,avif|max:1024',
        ]);
        $advert = new AdvertFooter();
        $advert->redirect_link = $request->link;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'advert_'.Str::random(13).'.' . $image->getClientOriginalExtension();
            $directory = 'assets/images/adverts/';
            $image->move($directory, $name);
            $name = $directory.$name;
            $advert->image = $name;
        }
        return redirect()->back()->with($advert->save() ? 'success' : 'error',true);
    }
    public function advertFooterStatus(Request $request){
        $advert = AdvertFooter::find($request->id);
        if(!$advert){
            return response()->json('0');
        }
        $advert->status = $advert->status == '1' ? '0' : '1';
        return $advert->save() ? response()->json('1') : response()->json('0');
    }
    public function advertFooterDelete(Request $request){
        $advert = AdvertFooter::find($request->id);
        if(!$advert){
            return response()->json('0');
        }
        return $advert->delete() ? response()->json('1') : response()->json('0');
    }
}
