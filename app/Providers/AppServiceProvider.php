<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Promotions\Category;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // TODO: sharing witn each view including subview? how many useless queries are executed? Check in debugbar.
        $categories = Category::where('parent_id', null)->with('subcategories')->get();
        View::share(compact('categories'));
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
