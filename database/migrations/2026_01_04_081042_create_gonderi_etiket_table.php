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
        Schema::create('gonderi_etiket', function (Blueprint $table) {
            // Pivot tablolarda genelde ID olmaz ama senin şemana göre ayarlıyorum.
        $table->foreignId('gonderi_id')->constrained('gonderiler')->onDelete('cascade');
        $table->foreignId('etiket_id')->constrained('etiketler')->onDelete('cascade');
    
    // Aynı etiketi aynı gönderiye iki kere eklememek için:
        $table->primary(['gonderi_id', 'etiket_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gonderi_etiket');
    }
};
