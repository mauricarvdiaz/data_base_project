<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paquete;
use App\Vuelo;
use App\Hotel;
use App\Habitacion;
use App\Vehiculo;
use App\Destino;

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
        
        if ($request->radio == 1){ //si se selecciona vuelo + hotel
            $capacidad_hab1 = $request->cantAdultos + $request->cantMenores;

            $ciudad = Destino::where('ciudad', $request->destino)->first();
            $hoteles = $ciudad->hoteles()->get();
            
            return view('seleccion.paqueteVueloHotel')->with('hoteles', $hoteles)->with('capa1', $capacidad_hab1)->with('fecha_in', $request->fecha_entrada)->with('fecha_out', $request->fecha_salida);

            
            $vuelo = Vuelo::where('', $request->tipo)->where('destino', $request->destino)->get();
        }
        else{
            return "ayy lmao";
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
