<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compania', function (Blueprint $table) {
            $table->increments('id_compania');
            $table->string('calle_compania');
            $table->string('nro_calle_compania');
            $table->string('ciudad_compania');
            $table->string('nombre_compania');
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
        Schema::dropIfExists('compania');
    }
}
