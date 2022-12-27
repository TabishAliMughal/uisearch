<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UISearchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // From Tabish ALi Mughal To Publish Files
        $this->publishes([
            base_path().'/vendor/tabishalimughal/uisearch' => public_path('assets/admin/uisearch'),
        ], 'uisearch');
    }
}
