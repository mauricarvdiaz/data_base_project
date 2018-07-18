<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    //
    protected $table = "vehiculo";

    //Relacion muchos a uno con Compañia.
    public function compania(){
      return $this->belongsTo('App\Compania');
    }

 	public function paquete(){
		return $this->belongsToMany('App\Paquete');
	}

	public function reserva(){
		return $this->belongsToMany('App\Reserva');
	}

	public function traslado(){
		return $this->belongsToMany('App\Traslado');
	}
}
