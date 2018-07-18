<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    //
    protected $table = "vuelo";

    public function paquete(){
		return $this->belongsToMany('App\Paquete');
	}

	public function reserva(){
		return $this->belongsToMany('App\Reserva');
	}

	public function aeropuerto(){
		return $this->belongsToMany('App\Aeropuerto');
	}
}
