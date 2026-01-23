<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Facade;
use App\Helpers\ActivityLogger;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ActivityLogger::class, function ($app) {
            return new ActivityLogger();
        });
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
