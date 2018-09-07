<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traslado;
use App\vehiculo;

class TrasladoController extends Controller
{
    public function traslado(){
        return view('traslado');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $autos = Traslado::where('nombre_aeropuerto', $request->nomAeropuerto)->where('nombre_hotel', $request->nomHotel)->get();
        $vehiculos = collect();
        if ($autos != Null) {
            foreach ($autos as $auto) {
                $vehiculo = Vehiculo::where('id_vehiculo', $auto->id_vehiculo)->where('capacidad', '>=', $request->numPasajeros)->where(function ($query) use ($request){$query->where('fecha_inicio_arriendo', '>', $request->datestart)->orWhere('fecha_fin_arriendo', '<', $request->datestart);})->get();
                $vehiculos = $vehiculos->concat($vehiculo);

                foreach ($vehiculos as $v ) {
                    $decimales = ($v->precio_dia / 24 )*2;
                    $v->precio_dia = floor($decimales);
                }
            }
        }
        else {
            $vehiculos = collect();
        }
        
        return view('seleccion.trasladosEncontrados')->with('vehiculos', $vehiculos)->with('datestart',$request->datestart)->with('numPasajeros',$request->numPasajeros);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
