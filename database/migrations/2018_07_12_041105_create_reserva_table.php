<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva', function (Blueprint $table) {
            $table->increments('id_reserva');
            //$table->string('correo');
            $table->mediumInteger('id_usuario');
            //$table->foreign('correo')->references('email')->on('users')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->mediumText('detalle');
            $table->mediumInteger('monto_reserva');
            $table->date('fecha_reserva');
            $table->time('hora_reserva');
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
        Schema::dropIfExists('reserva');
    }
}
