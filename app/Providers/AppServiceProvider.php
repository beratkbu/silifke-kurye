<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Render gibi canlı ortamlarda veritabanını otomatik kur
        if ($this->app->environment('production')) {
            Artisan::call('migrate --force');
        }
    }

    public function register(): void
    {
        //
    }
}