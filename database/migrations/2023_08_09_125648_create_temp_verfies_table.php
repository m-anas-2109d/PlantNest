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
        Schema::create('temp_verfies', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('code')->nullable();
            // $table->integer('password')->nullable();
            $table->integer("status")->nullable();
            // $table->date("date_of_complain")->format('dd/mm/yy')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp_verfies');
    }
};