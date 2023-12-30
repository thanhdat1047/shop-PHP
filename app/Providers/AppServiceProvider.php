<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Brand;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //bien global

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $brands = Brand::limit(10)->get();
        view()->share(compact('brands'));
        
        Paginator::useBootstrap();

        // view()->composer('*',function($view){
        //     $brands = Brand::limit(10)->get();
        //     $view->with(compact('brands'));
        // });
    }
}
