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
            //$table->increments('id');
            $table->primary('patente');
            $table->string('patente');
            $table->string('tipo');
            $table->date('inicio_arriendo');
            $table->date('fin_arriendo');
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
