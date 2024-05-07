<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;

use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    { 
        view()->composer('*', function ($view){
            $activeCategories=Category::where('status', '1')->get();
            Paginator::useBootstrap();
            $view->with(['activeCategories'=>$activeCategories]);
        });
    }
 
    /**
     * Bootstrap any application services.
     */
   
}
