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
        Schema::create('mesajlar', function (Blueprint $table) {
        $table->id();
    // gonderen -> users tablosuna, alici -> users tablosuna
        $table->foreignId('gonderen_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('alici_id')->constrained('users')->onDelete('cascade');
        $table->string('icerik');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesajlar');
    }
};
