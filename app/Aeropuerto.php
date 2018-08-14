<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
    //
    protected $table = "aeropuerto";
    protected $primaryKey = "id_aeropuerto";

    public function vuelos(){
		return $this->belongsToMany(Vuelo::class);
	}
}
