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
        Schema::create('biblioteca_llibre', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::table('biblioteca_llibre', function (Blueprint $table) {
            $table->unsignedBigInteger('llibre_id');
            $table->foreign('llibre_id')->references('id')->on('llibres')->onDelete('cascade');
            
            $table->unsignedBigInteger('biblioteca_id');
            $table->foreign('biblioteca_id')->references('id')->on('bibliotecas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biblioteca_llibre');
    }
};
