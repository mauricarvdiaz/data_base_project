<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    ///
    protected $table = "historial";
    protected $fillable = [
      'accion', 'fecha_hora', 'descripcion'
    ];

    //Relacion uno a muchos con Habitacion.
    public function usuario(){
      return $this->hasMany('App\User');
    }
}
