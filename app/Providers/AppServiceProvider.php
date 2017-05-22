<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\BlogArticle, App\BlogCategory, App\Tag;
use App\Observers\BlogArticleObserver, App\Observers\BlogCategoryObserver, App\Observers\TagObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        BlogArticle::observe(BlogArticleObserver::class);
        BlogCategory::observe(BlogCategoryObserver::class);
        Tag::observe(TagObserver::class);
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
