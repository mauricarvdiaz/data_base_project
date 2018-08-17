<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    //
    protected $table = "historial";
    protected $primaryKey = "id_historial";
    protected $fillable = [
      'accion', 'fecha_hora', 'descripcion'
    ];

    //Relacion uno a muchos con Habitacion.
    public function usuarios(){
      return $this->hasMany(Usuario::class);
    }
}
