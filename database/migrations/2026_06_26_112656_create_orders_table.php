<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('courier_id')->nullable()->constrained('couriers')->onDelete('set null'); // Siparişi taşıyan kurye
        $table->string('customer_name');     // Müşteri Adı
        $table->text('pickup_address');     // Paketin alınacağı adres
        $table->text('delivery_address');   // Paketin teslim edileceği adres
        $table->decimal('price', 8, 2);     // Sipariş ücreti (Örn: 150.00 TL)
        $table->string('status')->default('Hazırlanıyor'); // Durum: Hazırlanıyor, Yolda, Teslim Edildi
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
