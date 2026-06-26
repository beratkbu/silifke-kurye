<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\ProfileController;

// Giriş sayfasını direkt login ekranına yönlendirir
Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    
    // ANA KAPIMIZ: Canlı Takip Ekranı
    Route::get('/dashboard', [OrderController::class, 'index'])->name('dashboard');
    
    // Eğer birisi eski linke tıklarsa hata vermesin, dashboard'a yönlendirsin
    Route::get('/orders', function() {
        return redirect()->route('dashboard');
    });

    // Kurye sayfaları
    Route::resource('couriers', CourierController::class);
    
    // Sipariş form işlemleri
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::patch('/orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('orders.update-status');

    // Profil Düzenleme
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Canlı bip kontrol API'si
Route::get('/api/live-orders-check', function() {
    $todayOrders = \App\Models\Order::whereDate('created_at', \Carbon\Carbon::today())->count();
    return response()->json(['todayOrders' => $todayOrders]);
});

require __DIR__.'/auth.php';