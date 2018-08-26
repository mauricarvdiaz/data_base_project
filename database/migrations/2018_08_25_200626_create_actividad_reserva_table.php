<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadReservaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_reserva', function (Blueprint $table) {
            //$table->increments('id');
            $table->unsignedInteger('id_actividad');
            $table->mediumInteger('reserva_id');
            $table->foreign('id_actividad')->references('id_actividad')->on('actividad');
            $table->foreign('reserva_id')->references('id_reserva')->on('reserva');
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
        Schema::dropIfExists('actividad_reserva');
    }
}
