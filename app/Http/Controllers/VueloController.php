<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vuelo;

class VueloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vuelo = new Vuelo($request->all());
        $vuelo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //Solo ida
        if($request->tipo == 1){
            $vuelos = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->fecha_salida)->get();
            return $vuelos;
        }
        //Ida y vuelta
        else if($request->tipo == 2){
            $vuelosIda = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->fecha_salida)->get();
            $vuelosRegreso = Vuelo::where('origen', $request->destino)->where('destino', $request->origen)->get();
            $vuelos = [$vuelosIda, $vuelosRegreso];
            return $vuelos;
        }
        //Multiples destinos
        else if($request->tipo == 3){
            //No listo
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nro_vuelo)
    {
        $vuelo = Vuelo::find($nro_vuelo);
        //Clase Turista
        if($request->tipo == 1){
            $capacidad_clase_turista = $vuelo->cantidad_turista - $request->cantidad_pasajes;
            Vuelo::where('nro_vuelo', $nro_vuelo)->update(['cantidad_turista' => $capacidad_clase_turista]);
        }
        //Clase Ejecutivo
        else if ($request->tipo == 2) {
            $capacidad_clase_ejecutivo = $vuelo->cantidad_ejecutivo - $request->cantidad_pasajes;
            Vuelo::where('nro_vuelo', $nro_vuelo)->update(['cantidad_ejecutivo' => $capacidad_clase_ejecutivo]);
        }
        //Primera Clase
        else if ($request->tipo == 3) {
            $capacidad_primera_clase = $vuelo->cantidad_primera_clase - $request->cantidad_pasajes;
            Vuelo::where('nro_vuelo', $nro_vuelo)->update(['cantidad_primera_clase' => $capacidad_primera_clase]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nro_vuelo)
    {
        Vuelo::where('nro_vuelo', $nro_vuelo)->delete();
    }
}
