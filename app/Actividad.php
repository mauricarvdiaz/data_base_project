<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    //
    protected $table = "actividad";

    public function reservas(){
		return $this->belongsToMany(Reserva::class);
	}
}
