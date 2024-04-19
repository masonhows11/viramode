<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        // dump('hi , registered');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        // dump('hi again , boot');
        // exit();
    }
}
