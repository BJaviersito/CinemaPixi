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
        Schema::create('serie', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('Titulo_serie');
            $table->bigInteger('N_Episodio');
            $table->bigInteger('N_Temporada');
            $table->string('Imagen');
            $table->string('Descripcion');
            $table->date('Ano_Lanzamiento');
            $table->string('Clasificacion');
            $table->string('URL');

            $table->timestamps();
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
