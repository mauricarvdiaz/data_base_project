<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrasladoVehiculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traslado_vechiculo', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('traslado_id');
            $table->string('patente');
            $table->foreign('traslado_id')->references('id_traslado')->on('traslado');
            $table->foreign('patente')->references('patente')->on('vehiculo');
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
        Schema::dropIfExists('traslado_vechiculo');
    }
}
