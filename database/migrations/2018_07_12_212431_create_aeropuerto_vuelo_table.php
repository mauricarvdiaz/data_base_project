<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAeropuertoVueloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aeropuerto_vuelo', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('nro_vuelo');
            $table->mediumInteger('aeropuerto_id');
            $table->foreign('aeropuerto_id')->references('id_aeropuerto')->on('aeropuerto');
            $table->foreign('nro_vuelo')->references('nro_vuelo')->on('vuelo');
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
        Schema::dropIfExists('aeropuerto_vuelo');
    }
}
