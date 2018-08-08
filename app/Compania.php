<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
    //
    protected $table = "compania";

    //Relacion uno a muchos con Vehiculos.
    public function vehiculos(){
      return $this->hasMany(Vehiculo::class);
    }
}
