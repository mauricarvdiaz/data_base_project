<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaTrasladoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_traslado', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('reserva_id');
            $table->mediumInteger('traslado_id');
            $table->foreign('reserva_id')->references('id_reserva')->on('reserva');
            $table->foreign('traslado_id')->references('id_traslado')->on('traslado');
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
        Schema::dropIfExists('reserva_traslado');
    }
}
