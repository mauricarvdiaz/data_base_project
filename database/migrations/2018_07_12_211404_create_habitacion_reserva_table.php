<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabitacionReservaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitacion_reserva', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('habitacion_id');
            //$table->mediumInteger('nro_habitacion');
            //$table->date('fecha_entrada');
            //$table->date('fecha_salida');
            $table->mediumInteger('reserva_id');
            $table->foreign('reserva_id')->references('id_reserva')->on('reserva');
            $table->foreign('habitacion_id')->references('id')->on('habitacion');
            //$table->foreign('nro_habitacion')->references('nro_habitacion')->on('habitacion');
            //$table->foreign('fecha_entrada')->references('fecha_entrada')->on('habitacion');
            //$table->foreign('fecha_salida')->references('fecha_salida')->on('habitacion');
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
        Schema::dropIfExists('habitacion_reserva');
    }
}
