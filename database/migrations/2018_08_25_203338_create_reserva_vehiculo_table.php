<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaVehiculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_vehiculo', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('reserva_id');
            $table->mediumInteger('vehiculo_id');
            $table->foreign('reserva_id')->references('id_reserva')->on('reserva');
            $table->foreign('vehiculo_id')->references('id_vehiculo')->on('vehiculo');
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
        Schema::dropIfExists('reserva_vehiculo');
    }
}
