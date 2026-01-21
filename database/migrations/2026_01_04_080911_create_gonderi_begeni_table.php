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
        Schema::create('gonderi_begeni', function (Blueprint $table) {
        $table->id();
        $table->foreignId('kullanici_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('gonderi_id')->constrained('gonderiler')->onDelete('cascade');
        $table->timestamps(); // Beğeni zamanı
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gonderi_begeni');
    }
};
