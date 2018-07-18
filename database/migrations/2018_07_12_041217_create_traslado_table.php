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
            $table->mediumInteger('cantidad_pasajeros');
            $table->dateTime('fecha_hora_traslado');
            $table->string('tipo');
            $table->string('ubicacion_hotel');
            $table->string('ubicacion_aeropuerto');
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
