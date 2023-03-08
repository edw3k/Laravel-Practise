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
        Schema::create('platformApartment', function (Blueprint $table) {
            $table->id();
            $table->date('register_date');
            $table->boolean('premium');
            $table->timestamps();

            // Add apartment_id column
            $table->unsignedBigInteger('apartment_id');

            // Add foreign key constraint to reference the id column of the apartment table
            $table->foreign('apartment_id')->references('id')->on('apartment')->onDelete('cascade');

            // Use the existing platform_id column
            $table->foreignId('platform_id')->constrained('platform');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platformApartment');
    }
};
