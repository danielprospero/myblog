<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\View;
use App\Models\Setting;


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
        PaginationPaginator::useBootstrap();

        $categories = Category::withCount('posts')->orderBy('posts_count', 'DESC')->take(10)->get();
        View::share('navbar_categories', $categories);

        $setting = Setting::find(1);
        View::share('setting', $setting);
    }
}
