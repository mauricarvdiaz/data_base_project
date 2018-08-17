<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traslado extends Model
{
    //
    protected $table = "traslado";

    public function reservas(){
		return $this->belongsToMany(Reserva::class);
	}

	public function vehiculos(){
		return $this->belongsToMany(Vehiculo::class);
	}

}
