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
        Schema::create('booking_itineraries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained();
            $table->string('title');
            $table->integer('day_number');
            $table->string('time_of_day')->nullable(); // can be "morning", "afternoon", "07:00 AM"
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_itineraries');
    }
};
