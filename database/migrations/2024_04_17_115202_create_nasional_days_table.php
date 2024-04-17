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
        Schema::create('nasional_days', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('holiday_date');
            $table->string('holiday_name');
            $table->boolean('is_national_holiday');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nasional_days');
    }
};
