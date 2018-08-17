<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrasladoVehiculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traslado_vechiculo', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('traslado_id');
            $table->mediumInteger('id_vehiculo');
            $table->foreign('traslado_id')->references('id_traslado')->on('traslado');
            $table->foreign('id_vehiculo')->references('id_vehiculo')->on('vehiculo');
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
        Schema::dropIfExists('traslado_vechiculo');
    }
}
