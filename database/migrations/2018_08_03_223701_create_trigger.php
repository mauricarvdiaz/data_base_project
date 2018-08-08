<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER tr_after_reserva_insert AFTER INSERT ON `reserva` FOR EACH ROW
              BEGIN
                INSERT INTO historial (`descripcion`, `accion`, `fecha_hora`) VALUES (NEW.detalle, NEW.correo, NOW());
              END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER tr_after_reserva_insert');
    }
}
