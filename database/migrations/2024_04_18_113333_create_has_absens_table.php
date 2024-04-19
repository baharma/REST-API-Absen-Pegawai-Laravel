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
        Schema::create('has_absens', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('id_data_diri')->references('id')->on('data_diris');
            $table->foreignUuid('id_absen')->references('id')->on('absens');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('has_absens');
    }
};
