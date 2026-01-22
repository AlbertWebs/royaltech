<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Facade;

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
        // Register Cart facade alias for global access
        if (!class_exists('Cart', false)) {
            class_alias(\Darryldecode\Cart\Facades\CartFacade::class, 'Cart');
        }
    }
}
