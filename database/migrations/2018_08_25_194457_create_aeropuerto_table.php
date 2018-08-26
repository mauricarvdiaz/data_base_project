<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAeropuertoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aeropuerto', function (Blueprint $table) {
            $table->increments('id_aeropuerto');
            $table->mediumInteger('id_ciudad');
            $table->foreign('id_ciudad')->references('id_destino')->on('destinos')->onDelete('cascade');
            $table->string('calle_aeropuerto');
            $table->string('nro_calle_aeropuerto');
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
        Schema::dropIfExists('aeropuerto');
    }
}
