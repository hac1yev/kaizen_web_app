<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\Emoji;
use App\Models\Categories;
use App\Models\AdvertFooter;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('front.Details.detail', function() {

            View::share('adverts', AdvertFooter::get());
            
        });

        View::composer(['index'], function() {

            View::share('emojis', Emoji::get());

        });

        View::composer('front.Postadd.edit', function() {
            
            View::share('tags', Tag::get());

        });

        View::composer(['back.posts.add', 'back.posts.edit'], function() {

            View::share('categories', Categories::get());
            View::share('emojis', Emoji::get());
            View::share('tags', Tag::get());

        });;
    }
}
