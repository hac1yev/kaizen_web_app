<?php

namespace App\Providers;

use App\Models\Categories;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Posts;
use App\Models\Settings;
use App\Models\Seo;
use App\Models\SocialMedia;


use App\Models\AdvertFooter;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $last_posts = Posts::where('status','0')->get();
        View::share('last_posts',$last_posts);
        $last_comments = Comment::where('status','0')->get();
        View::share('last_comments',$last_comments);
        $last_messages = Contact::where('status','0')->get();
        View::share('last_messages',$last_messages);
        $setting = Settings::first();
        View::share('setting',$setting);
        $seo = Seo::first();
        View::share('seo',$seo);
        $social = SocialMedia::first();
        View::share('social',$social);
        view()->composer('*', function($view) {
            $view->with('admin', auth()->user());
        });

    }
}
