<?php

namespace App\Http\Controllers\Back\CategoryController;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function categoryListIndex(){
        $categories = Categories::all();
        return view('back.categories.list',compact('categories'));
    }
    public function categoryEdit(Request $request){
        $category = Categories::find($request->id);
        return $category ?? response()->json('0');
    }
    public function categoryEditPost(Request $request){
            $request->validate([
                'id'=>'required|numeric',
                'title'=>'required|min:3',
            ]);
            $category = Categories::find($request->id);
            if(!$category){
                return redirect()->back()->with('error',true);
            }
            $category->title = $request->title;
            $slug = Str::slug($request->title);
            if(Categories::where([['slug',$slug],['id','<>',$category->id]])->first()){
                $slug = $slug.'_'.rand(1000,9999);
            }
            $category->slug = $slug;
            return redirect()->back()->with($category->save() ? 'success' : 'error',true);
    }
    public function categoryAddPost(Request $request){
        $request->validate([
            'title'=>'required|min:3',
        ]);
        $category = new Categories();
        $category->title = $request->title;
        $slug = Str::slug($request->title);
        if(Categories::where('slug',$slug)->first()){
            $slug = $slug.'_'.rand(1000,9999);
        }
        $category->slug = $slug;
        return redirect()->back()->with($category->save() ? 'success' : 'error',true);
    }
}
