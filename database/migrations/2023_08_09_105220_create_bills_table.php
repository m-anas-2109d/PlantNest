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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->String('quantity');
            $table->String('unit_price');
            $table->String('total_price');
            // $table->unsignedBigInteger("accessories_id")->index(); 
            // $table->foreign("accessories_id")->on("accessories")->references("id")->onUpdate('cascade')->onDelete('cascade');


            // $table->unsignedBigInteger("plants_id")->index(); 
            // $table->foreign("plants_id")->on("plants")->references("id")->onUpdate('cascade')->onDelete('cascade');


            $table->unsignedBigInteger("orders_id")->index(); 
            $table->foreign("orders_id")->on("orders")->references("id")->onUpdate('cascade')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
