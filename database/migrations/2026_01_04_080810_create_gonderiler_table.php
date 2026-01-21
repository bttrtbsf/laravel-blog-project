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
        Schema::create('gonderiler', function (Blueprint $table) {
        $table->id();
    
    // kullanici_id -> users tablosundaki id'ye bağlanır.
    // constrained('users') -> Tablo adının users olduğunu belirttik.
        $table->foreignId('kullanici_id')->constrained('users')->onDelete('cascade');
    
        $table->string('baslik')->unique(); // Türkçe karakter (ı) yerine i kullandım, veritabanında sorun olmasın diye.
        $table->text('icerik');
        $table->boolean('taslak')->default(true); // Taslak mı?
    
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gonderiler');
    }
};
