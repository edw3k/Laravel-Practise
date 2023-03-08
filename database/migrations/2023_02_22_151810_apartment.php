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
        Schema::create('apartment', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('city');
            $table->string('postal_code', 5);
            $table->decimal('rented_price');
            $table->boolean('rented');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();

            // Add user_id column and foreign key
            $table->foreignId('user_id')->default(1)->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartment');
    }
};
