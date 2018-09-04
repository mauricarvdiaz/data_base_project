<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vuelo;
use App\Aeropuerto;

class VueloController extends Controller
{
    public function vuelos(){
        return view('vuelos');
    }
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
        //return $request;

        //Solo ida
        if($request->radio == 2){
            if ($request->claseVuelo == "Economica") {
                $vuelos = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->datestart)->get();
            }
            else if ($request->claseVuelo == "Primera Clase") {
                $vuelos = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->datestart)->get();
            }
            else{
                $vuelos = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->datestart)->get();
            }
            $aero1 = Aeropuerto::where('ciudad_aeropuerto', $request->origen)->get();
            $aero2 = Aeropuerto::where('ciudad_aeropuerto', $request->destino)->get();
            return view('seleccion.vuelosdisponibles1')->with('vuelosEncontrados', $vuelos)->with('aeropuertoOrigen', $aero1)->with('aeropuertoDestino', $aero2)->with('claseVuelo', $request->claseVuelo)->with('cantidad_viajeros',$request->nroAdultos + $request->nroMenores);
        }
        //Ida y vuelta
        else if($request->radio == 1){
            if ($request->claseVuelo == 1) {
                $vuelosIda = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->datestart)->get();
                $vuelosRegreso = Vuelo::where('origen', $request->destino)->where('destino', $request->origen)->where('fecha_salida', $request->dateend)->get();
            }
            else if ($request->claseVuelo == 2) {
                $vuelosIda = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->datestart)->get();
                $vuelosRegreso = Vuelo::where('origen', $request->destino)->where('destino', $request->origen)->where('fecha_salida', $request->dateend)->get();
            }
            else{
                $vuelosIda = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->datestart)->get();
                $vuelosRegreso = Vuelo::where('origen', $request->destino)->where('destino', $request->origen)->where('fecha_salida', $request->dateend)->get();
            }
            $aero1 = Aeropuerto::where('ciudad_aeropuerto', $request->origen)->get();
            $aero2 = Aeropuerto::where('ciudad_aeropuerto', $request->destino)->get();
            return view('seleccion.vuelosdisponibles2')->with('vuelosIda', $vuelosIda)->with('vuelosRegreso', $vuelosRegreso)->with('tipoVuelo', $request->radio)->with('aeropuertoOrigen', $aero1)->with('aeropuertoDestino', $aero2)->with('claseVuelo', $request->claseVuelo)->with('cantidad_viajeros',$request->nroAdultos + $request->nroMenores);
           // $vuelos = [$vuelosIda, $vuelosRegreso];
        }
        //Multiples destinos
        else if($request->radio == 3){
            return $request;
        }
        //return $vuelos;

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
