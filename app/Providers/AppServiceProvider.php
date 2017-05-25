<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\BlogArticle, App\BlogCategory, App\Tag, App\Redirect;
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
        // first, check if this url needs redirecting?
        $request_uri = array_get($_SERVER, 'REQUEST_URI');
        if ($request_uri) {
            // we the server returned sumin
            $url = array_filter(explode('/', $request_uri));
            $no_prefix_suffix = implode('/', $url);
            $suffix = "{$no_prefix_suffix}/";
            $preffix = "/{$no_prefix_suffix}";
            $both = "/{$no_prefix_suffix}/";
            // See if we can find this
            $exists = Redirect::where('status', 'active')->whereIn('from', [
                $no_prefix_suffix,
                $suffix,
                $preffix,
                $both
            ])->first();
            if ($exists) {
                // got it, send them there
                header("Location: {$exists->to}");
                die();
            }
        }
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
