<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paquete;
use App\Vuelo;
use App\Hotel;
use App\Habitacion;
use App\Vehiculo;
use App\Destino;
use App\Aeropuerto;

class PaqueteController extends Controller
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
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paquete = new Paquete($request->all());
        $paquete->save();
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
        //si se selecciona vuelo + hotel
        if ($request->radio == 1){
            $vuelosIda = Vuelo::where('destino', $request->destino)->where('origen', $request->origen)->where('fecha_salida', $request->fechaIngreso)->get();
            $vuelosRegreso = Vuelo::where('origen', $request->destino)->where('destino', $request->origen)->where('fecha_salida', $request->fechaRetorno)->get();
            $aero1 = Aeropuerto::where('ciudad_aeropuerto', $request->origen)->get();
            $aero2 = Aeropuerto::where('ciudad_aeropuerto', $request->destino)->get();
            
            //$capacidad_hab = $request->cantAdultos + $request->cantMenores;
            $ciudad = Destino::where('ciudad', $request->destino)->first();
            $hoteles = $ciudad->hoteles()->get();

            return view('seleccion.vuelosdisponibles2')->with('vuelosIda', $vuelosIda)->with('vuelosRegreso', $vuelosRegreso)->with('aeropuertoOrigen', $aero1)->with('aeropuertoDestino', $aero2)->with('cantidad_viajeros',$request->cantAdultos + $request->cantMenores)->with('claseVuelo', $request->claseVuelo)->with('tipoVuelo', 1)->with('paquete', 1);
            

            /*return view('seleccion.hoteles')->with('hoteles', $hoteles)->with('capa1', $capacidad_hab1)->with('capa2', $capacidad_hab2)->with('fecha_in', $request->fecha_entrada)->with('fecha_out', $request->fecha_salida);*/
        }
        else{
           
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
    public function update(Request $request, $id_paquete)
    {
        $paquete = Paquete::find($id_paquete);
        $uno = 1;
        $nuevo_cupo = $paquete->cupos - $uno;
        Paquete::where('id_paquete', $id_paquete)->update(['cupos' => $nuevo_cupo]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_paquete)
    {
        Paquete::where('id_paquete', $id_paquete)->delete();
    }
}
