<?php

namespace App\Providers;

use App\Views\Composer\navigatorComposer;
use Illuminate\Support\ServiceProvider;
use App\Views\Composers\NavigationComposer;
use App\Category;
use App\Post;

class ComposerServiceProvider extends ServiceProvider
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

        view()->composer('layouts.sidebar', Navigation::class);

//        view()->composer('layouts.sidebar', function($view) {
//            $categories = Category::with(['posts' => function($query){
//                $query->published();
//            }])->orderBy('title', 'asc')->get();
//
//            return $view->with('categories', $categories);
//        });
//
//        view()->composer('layouts.sidebar', function($view){
//            $popularPosts = Post::published()->popular()->take(3)->get();
//            return $view->with('popularPosts', $popularPosts);
//        });
    }
}
