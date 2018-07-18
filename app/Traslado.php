<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traslado extends Model
{
    //
    protected $table = "traslado";

    public function reserva(){
		return $this->belongsToMany('App\Reserva');
	}

	public function vehiculo(){
		return $this->belongsToMany('App\Vehiculo');
	}

}
