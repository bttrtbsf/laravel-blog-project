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
        Schema::table('gonderiler', function (Blueprint $table) {
            $table->string('resim')->nullable()->after('baslik');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gonderiler', function (Blueprint $table) {
            $table->dropColumn('resim');
        });
    }
};
