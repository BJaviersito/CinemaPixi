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
        Schema::create('historial', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->date('Fecha_Visualisacion');
            $table->bigInteger('Perfil_id')->unsigned();
            $table->bigInteger('Tipo_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('Perfil_id')->references('id')->on('perfil')->onDelete("cascade");
            $table->foreign('Tipo_id')->references('id')->on('tipo_video')->onDelete("cascade");
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
