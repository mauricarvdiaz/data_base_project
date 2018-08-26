<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad', function (Blueprint $table) {
            $table->increments('id_actividad');
            $table->mediumInteger('id_ciudad');
            $table->foreign('id_ciudad')->references('id_destino')->on('destinos')->onDelete('cascade');
            $table->string('tipo_actividad');
            $table->date('fecha');
            $table->mediumText('descripcion');
            $table->mediumInteger('nro_menores_edad');
            $table->mediumInteger('nro_mayores_edad');
            $table->mediumInteger('precio_actividad');
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
        Schema::dropIfExists('actividad');
    }
}
