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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("user_registrations_id")->index(); 
            $table->foreign("user_registrations_id")->on("user_registrations")->references("id")->onUpdate('cascade')->onDelete('cascade');



            $table->unsignedBigInteger("plants_id")->index(); 
            $table->foreign("plants_id")->on("plants")->references("id")->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
