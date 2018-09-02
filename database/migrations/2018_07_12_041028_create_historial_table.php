<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial', function (Blueprint $table) {
            $table->increments('id_historial');
            //$table->string('email');
            //$table->foreign('email')->references('email')->on('users')->onDelete('cascade');
            $table->mediumInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->string('accion');
            $table->dateTime('fecha_hora');
            $table->mediumText('descripcion');
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
        Schema::dropIfExists('historial');
    }
}
