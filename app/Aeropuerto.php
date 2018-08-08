<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
    //
    protected $table = "aeropuerto";

    public function vuelos(){
		return $this->belongsToMany(Vuelo::class);
	}
}
