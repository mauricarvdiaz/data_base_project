<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    //
    protected $table = "vuelo";
    protected $primaryKey = "nro_vuelo";
    protected $fillable = [
      'nro_vuelo', 'origen', 'destino', 'fecha_salida', 'hora_salida', 'fecha_llegada', 'hora_llegada', 'cantidad_turista', 'cantidad_ejecutivo', 'cantidad_primera_clase', 'cantidad_equipaje', 'precio_vuelo', 'aerolinea', 'nro_escala'
    ];

    public function paquetes(){
		return $this->belongsToMany(Paquete::class);
	}

	public function reservas(){
		return $this->belongsToMany(Reserva::class);
	}

	public function aeropuertos(){
		return $this->belongsToMany(Aeropuerto::class);
	}
}
