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
        Schema::create('categoria', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('Nombre_Categoria');
            $table->bigInteger('Pelicula_id')->unsigned();
            $table->bigInteger('Serie_id')->unsigned();
            $table->timestamps();

            $table->foreign('Pelicula_id')->references('id')->on('pelicula')->onDelete("cascade");
            $table->foreign('Serie_id')->references('id')->on('serie')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
