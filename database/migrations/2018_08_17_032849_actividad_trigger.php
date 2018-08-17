<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActividadTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {/*
        $usuario = \Auth::user();
        DB::unprepared('
            CREATE OR REPLACE FUNCTION actividad_trigger()
            RETURNS TRIGGER AS 
            $$
            BEGIN
                INSERT INTO reserva(correo,detalle,monto_reserva,fecha_reserva,hora_reserva)
                VALUES(NEW.correo,NEW.detalle,NEW.monto,NOW(),NOW());
                RETURN NULL;
            END;
            $$
            LANGUAGE plpgsql;

            CREATE TRIGGER reservar_actividad
            AFTER UPDATE ON actividad
            FOR EACH ROW EXECUTE PROCEDURE actividad_trigger();s
        ');*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('
            DROP TRIGGER IF EXISTS triggerTest ON actividad CASCADE;
            DROP FUNCTION IF EXISTS triggerTest() CASCADE;
        ');
    }
}
