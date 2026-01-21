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
        Schema::create('yorumlar', function (Blueprint $table) {
        $table->id();
        $table->foreignId('kullanici_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('gonderi_id')->constrained('gonderiler')->onDelete('cascade');
        $table->string('icerik');
        $table->timestamps(); // SQL'de sadece created_at vardı ama Laravel ikisini yönetir.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yorumlar');
    }
};
