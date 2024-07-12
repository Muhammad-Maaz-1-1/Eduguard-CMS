<?php

namespace App\Providers;

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

    public function boot()
    {
        // Load the helper file
        require_once app_path('Helpers/help.php');

        // Share the profileModel with all views
        View::composer('*', function ($view) {
            $view->with('profileModel', getProfileModel());
        });
        View::composer('*', function ($view) {
            $view->with('cartModel', getCartModel());
        });
    }


}
