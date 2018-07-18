<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    //
    protected $table = "paquete";

    public function habitacion(){
		return $this->belongsToMany('App\Habitacion');
	}

	public function vuelo(){
		return $this->belongsToMany('App\Vuelo');
	}

	public function vehiculo(){
		return $this->belongsToMany('App\Vehiculo');
	}
}
