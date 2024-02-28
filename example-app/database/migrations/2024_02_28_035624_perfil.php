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
        Schema::create('perfil', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('TipoPerfil');
            $table->string('NombrePerfil');
            $table->bigInteger('Usuario_id')->unsigned();
            $table->bigInteger('id_Lista')->unsigned();
            $table->bigInteger('Resena_id')->unsigned();
            $table->string('Imagen');
            $table->timestamps();

            $table->foreign('Usuario_id')->references('id')->on('usuario')->onDelete("cascade");
            $table->foreign('id_Lista')->references('id')->on('lista_rep')->onDelete("cascade");
            $table->foreign('Resena_id')->references('id')->on('resena')->onDelete("cascade");
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
