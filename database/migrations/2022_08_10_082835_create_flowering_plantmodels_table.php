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
        Schema::create('flowering_plantmodels', function (Blueprint $table) {
            $table->id();
            $table->String("name");
            $table->String("description",'1000');
            $table->String("price");
            $table->String("quantity");
            $table->String("image");
            $table->String("plant_genes")->nullable();
            $table->unsignedBigInteger("categories_id")->index(); 
            $table->foreign("categories_id")->on("categories")->references("id")->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flowering_plantmodels');
    }
};
