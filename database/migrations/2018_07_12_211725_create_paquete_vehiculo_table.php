<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaqueteVehiculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquete_vehiculo', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('paquete_id');
            $table->mediumInteger('id_vehiculo');
            $table->foreign('paquete_id')->references('id_paquete')->on('paquete');
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
        Schema::dropIfExists('paquete_vehiculo');
    }
}
