<?php

namespace App\Providers;

use App\Models\Blog\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class GlobalDataShearProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $categoryData = Category::all();

        View::share('categoryData', $categoryData);
    }
}
