<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    //
    protected $table = "vuelo";

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
