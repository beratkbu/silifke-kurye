<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Veritabanı dosyası yoksa oluştur
        $path = database_path('database.sqlite');
        if (!File::exists($path)) {
            File::put($path, '');
        }

        // Tabloları kur
        Artisan::call('migrate --force');
    }
}