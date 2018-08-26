<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVueloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vuelo', function (Blueprint $table) {
            $table->primary('nro_vuelo');
            $table->mediumInteger('nro_vuelo');
            $table->string('origen');
            $table->string('destino');
            $table->date('fecha_salida');
            $table->time('hora_salida');
            $table->date('fecha_llegada');
            $table->time('hora_llegada');
            $table->mediumInteger('cantidad_turista');
            $table->mediumInteger('cantidad_ejecutivo');
            $table->mediumInteger('cantidad_primera_clase');
            $table->mediumInteger('cantidad_equipaje');
            $table->mediumInteger('precio_vuelo');
            $table->string('aerolinea');
            $table->mediumInteger('nro_escala');
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
        Schema::dropIfExists('vuelo');
    }
}
