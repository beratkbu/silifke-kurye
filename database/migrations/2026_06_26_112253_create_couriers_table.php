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
    Schema::create('couriers', function (Blueprint $table) {
        $table->id();
        $table->string('name');          // Kuryenin Adı Soyadı
        $table->string('phone');         // Telefon Numarası
        $table->string('plate_number');   // Motor Plakası
        $table->boolean('is_active')->default(true); // Aktif mi? (Varsayılan: Evet)
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('couriers');
    }
};
