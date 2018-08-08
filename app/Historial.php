<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    //
    protected $table = "historial";

    //Relacion uno a muchos con Habitacion.
    public function usuarios(){
      return $this->hasMany(Usuario::class);
    }
}
