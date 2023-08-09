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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("user_registrations_id")->index(); 
            $table->foreign("user_registrations_id")->on("user_registrations")->references("id")->onUpdate('cascade')->onDelete('cascade');


            $table->unsignedBigInteger("orders_id")->index(); 
            $table->foreign("orders_id")->on("orders")->references("id")->onUpdate('cascade')->onDelete('cascade');
            $table->String("address",'1000');
            $table->String("city");
            $table->String("state");
            $table->String("order_note")->null();


            $table->String("country");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
