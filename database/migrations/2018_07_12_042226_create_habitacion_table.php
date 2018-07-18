<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabitacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitacion', function (Blueprint $table) {
            $table->increments('id');
            //$table->primary(['nro_habitacion', 'fecha_entrada', 'fecha_salida']);
            $table->mediumInteger('nro_habitacion');
            $table->mediumInteger('rut_hotel')->unsigned();
            $table->foreign('rut_hotel')->references('rut_hotel')->on('hotel')->onDelete('cascade');
            $table->date('fecha_entrada');
            $table->date('fecha_salida');
            $table->mediumInteger('capacidad');
            $table->mediumInteger('precio_noche');
            //tipo = 1: habitacion con cama 1 plaza,
            //tipo = 2: habitacion con cama 2 plazas,
            //tipo = 3: habitacion con cama mixta. 
            $table->tinyInteger('tipo'); 
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
        Schema::dropIfExists('habitacion');
    }
}
