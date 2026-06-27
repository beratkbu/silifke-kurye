<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;

class AppServiceProvider extends ServiceProvider
{
public function boot(): void
{
    if ($this->app->environment('production')) {
        // Eğer veritabanı dosyası yoksa önce oluştur
        $databasePath = storage_path('database.sqlite');
        if (!file_exists($databasePath)) {
            touch($databasePath);
        }
        
        // Şimdi migration'ları çalıştır
        \Illuminate\Support\Facades\Artisan::call('migrate --force');
    }
}