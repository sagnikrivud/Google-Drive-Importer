<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Rap2hpoutre\LaravelLogViewer\LaravelLogViewerServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->register(LumenLogViewerServiceProvider::class);
    }
}
