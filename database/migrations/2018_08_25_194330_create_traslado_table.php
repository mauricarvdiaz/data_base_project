<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrasladoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traslado', function (Blueprint $table) {
            $table->increments('id_traslado');
            $table->mediumInteger('id_vehiculo');
            $table->foreign('id_vehiculo')->references('id_vehiculo')->on('vehiculo');
            $table->mediumInteger('tipo');
            $table->string('nombre_hotel');
            $table->string('nombre_aeropuerto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('traslado');
    }
}
