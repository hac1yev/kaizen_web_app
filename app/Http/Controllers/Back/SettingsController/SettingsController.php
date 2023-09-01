<?php

namespace App\Http\Controllers\Back\SettingsController;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    public function settingsIndex(){
        $settings = Settings::first();
        return view('back.settings.setting',compact('settings'));
    }

    public function settingsPost(Request $request){
        $request->validate([
           'about'=>'required|min:3'
        ]);
        $setting = Settings::first();
        $setting->about = $request->about;
        return redirect()->back()->with($setting->save() ? 'success' : 'error',true);
    }
    public function butaLogoPost(Request $request){
        $setting = Settings::first();
        $request->validate([
            'buta_image'=>'required|image|mimes:jpg,png,jpeg,gif,svg,webp,jfif,avif|max:1024',
        ]);
        if ($request->hasFile('buta_image')) {
            $image = $request->file('buta_image');
            $name = 'buta_logo_'.Str::random(13).'.' . $image->getClientOriginalExtension();
            $directory = 'assets/images/logo/';
            $old_image = $setting->logo_buta;
            if(file_exists($old_image)){
                unlink($old_image);
            }
            $image->move($directory, $name);
            $name = $directory.$name;
            $setting->logo_buta = $name;
        }
        return redirect()->back()->with($setting->save() ? 'success' : 'error',true);
    }
    public function kaizenHeaderPost(Request $request){
        $setting = Settings::first();
        $request->validate([
            'kaizen_header'=>'required|image|mimes:jpg,png,jpeg,gif,svg,webp,jfif,avif|max:1024',
        ]);
        if ($request->hasFile('kaizen_header')) {
            $image = $request->file('kaizen_header');
            $name = 'kaizen_header_'.Str::random(13).'.' . $image->getClientOriginalExtension();
            $directory = 'assets/images/logo/';
            $old_image = $setting->logo_kaizen_header;
            if(file_exists($old_image)){
                unlink($old_image);
            }
            $image->move($directory, $name);
            $name = $directory.$name;
            $setting->logo_kaizen_header = $name;
        }
        return redirect()->back()->with($setting->save() ? 'success' : 'error',true);
    }
    public function kaizenFooterPost(Request $request){
        $setting = Settings::first();
        $request->validate([
            'kaizen_footer'=>'required|image|mimes:jpg,png,jpeg,gif,svg,webp,jfif,avif|max:1024',
        ]);
        if ($request->hasFile('kaizen_footer')) {
            $image = $request->file('kaizen_footer');
            $name = 'kaizen_footer_'.Str::random(13).'.' . $image->getClientOriginalExtension();
            $directory = 'assets/images/logo/';
            $old_image = $setting->logo_kaizen_footer;
            if(file_exists($old_image)){
                unlink($old_image);
            }
            $image->move($directory, $name);
            $name = $directory.$name;
            $setting->logo_kaizen_footer = $name;
        }
        return redirect()->back()->with($setting->save() ? 'success' : 'error',true);
    }
    public function faviconPost(Request $request){
        $setting = Settings::first();
        $request->validate([
            'favicon'=>'required|image|mimes:jpg,png,jpeg,gif,svg,webp,jfif,avif|max:1024',
        ]);
        if ($request->hasFile('favicon')) {
            $image = $request->file('favicon');
            $name = 'favicon_'.Str::random(13).'.' . $image->getClientOriginalExtension();
            $directory = 'assets/images/logo/';
            $old_image = $setting->favicon;
            if(file_exists($old_image)){
                unlink($old_image);
            }
            $image->move($directory, $name);
            $name = $directory.$name;
            $setting->favicon = $name;
        }
        return redirect()->back()->with($setting->save() ? 'success' : 'error',true);
    }
}
