<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $table = "paquete";
    protected $primaryKey =  'id_paquete';
    protected $fillable = [
    	'tipo', 'detalle', 'descuento', 'destino', 'cupos'
    ];

    public function habitaciones(){
		return $this->belongsToMany(Habitacion::class);
	}

	public function vuelos(){
		return $this->belongsToMany(Vuelo::class);
	}

	public function vehiculos(){
		return $this->belongsToMany(Vehiculo::class);
	}
}
