<?php

namespace App\Providers;
use App\Models\toplevelcategory;
use App\Models\middlelevelcategory;
use App\Models\endlevelcategory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $toplevelcategories = toplevelcategory::get();
        $middlelevelcategories = middlelevelcategory::get();
        $endlevelcategories = endlevelcategory::get();

        view::share('toplevelcategories', $toplevelcategories);
        view::share('middlelevelcategories', $middlelevelcategories);
        view::share('endlevelcategories', $endlevelcategories);

    }
}
