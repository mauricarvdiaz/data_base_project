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
            $table->string('nombre');
            $table->string('ciudad_hotel');
            $table->mediumInteger('nro_calle_hotel');  //cambiar por alguna direccion.
            $table->mediumInteger('precio_minimo');
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
