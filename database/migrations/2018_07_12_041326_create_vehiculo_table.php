<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculo', function (Blueprint $table) {
            $table->increments('id_vehiculo');
            $table->primary('patente');
            $table->string('patente');
            $table->mediumInteger('id_compania')->unsigned();
            $table->foreign('id_compania')->references('id_compania')->on('compania');
            $table->string('tipo');
            $table->date('fecha_inicio_arriendo');
            $table->date('fecha_fin_arriendo');
            $table->time('hora_inicio_arriendo');
            $table->time('hora_fin_arriendo');
            $table->mediumInteger('capacidad');
            //compañia no va creo
            $table->mediumInteger('precio_dia');
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
        Schema::dropIfExists('vehiculo');
    }
}
