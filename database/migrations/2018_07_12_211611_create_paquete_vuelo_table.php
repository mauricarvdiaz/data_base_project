<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaqueteVueloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquete_vuelo', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('paquete_id');
            $table->mediumInteger('nro_vuelo');
            $table->foreign('paquete_id')->references('id')->on('paquete');
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
        Schema::dropIfExists('paquete_vuelo');
    }
}
