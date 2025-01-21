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
        Schema::create('llibres', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
      
            Schema::table('llibres', function (Blueprint $table) {
                $table->string('titol');
                $table->date('dataP');
                $table->integer('vendes');
                $table->unsignedBigInteger('autor_id')->nullable();; // Si un id es BigInteger en la base de dades, aqui possem UnsignedBigInteger, aixi no hi haura problemes amb la FK.
            });
        if (Schema::hasTable('autors')) {
            Schema::table('llibres', function (Blueprint $table) {
                $table->foreign('autor_id')->references('id')->on('autors');
            });
        }
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('llibres');
    }
};
