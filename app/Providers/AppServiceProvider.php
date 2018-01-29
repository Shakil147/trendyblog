<?php

namespace App\Providers;
use View;
use App\Category;
use App\Blog;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('frontend.includs.navbar', function ($view) {
            $view->with('publishedCategories', Category::where('publication_status', 1)->get());
        });

        View::composer('frontend.includs.sidebar', function ($view) {
            $view->with('lastblog', Blog::where('publication_status', 1)->orderBy('id', 'desc')->take(1)->get());
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
