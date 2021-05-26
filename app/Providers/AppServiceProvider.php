<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Article;

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
        // Get pinned articles
        if (Schema::hasTable('articles')) {
            $pinnedArticles = Article::where('pinned', '=', true)->get();
            View::share(['pinnedArticles' => $pinnedArticles]);
        }
    }
}
