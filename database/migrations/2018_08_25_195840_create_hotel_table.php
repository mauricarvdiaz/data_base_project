<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel', function (Blueprint $table) {
            $table->primary('rut_hotel');
            $table->mediumInteger('rut_hotel')->unsigned();
            $table->mediumInteger('id_ciudad');
            $table->foreign('id_ciudad')->references('id_destino')->on('destinos')->onDelete('cascade');
            $table->string('nombre');
            $table->mediumInteger('nro_calle_hotel'); 
            $table->string('calle_hotel');
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
        Schema::dropIfExists('hotel');
    }
}
