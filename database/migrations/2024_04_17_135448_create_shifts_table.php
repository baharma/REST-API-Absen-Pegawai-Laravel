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
        Schema::create('shifts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('date');
            $table->string('status')->default('pagi');
            $table->string('description')->nullable();
            $table->uuid('id_absens')->nullable();
            $table->foreign('id_absens')->references('id')->on('absens')->onDelete('set null');

            $table->uuid('check_holiday_nasional')->nullable();
            $table->foreign('check_holiday_nasional')->references('id')->on('nasional_days')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};
