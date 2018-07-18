<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaVueloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_vuelo', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('reserva_id');
            $table->mediumInteger('nro_vuelo');
            $table->foreign('reserva_id')->references('id_reserva')->on('reserva');
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
        Schema::dropIfExists('reserva_vuelo');
    }
}
