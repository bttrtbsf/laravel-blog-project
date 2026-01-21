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
        Schema::create('gonderi_kategori', function (Blueprint $table) {
        $table->foreignId('gonderi_id')->constrained('gonderiler')->onDelete('cascade');
        $table->foreignId('kategori_id')->constrained('kategoriler')->onDelete('cascade');
    
        $table->primary(['gonderi_id', 'kategori_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gonderi_kategori');
    }
};
