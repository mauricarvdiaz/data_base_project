<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo;
use App\Compania;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Vehiculo::all();

        return $data;
        //return view($this->path.'.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        

            //$table->primary('patente');
            //$table->string('patente');
            

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehiculo = new vehiculo($request->all()); 
        $vehiculo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //ciudad, fechas, hora de arriendo, hora de devolucion
        $vehiculos = Vehiculo::where('fecha_inicio_arriendo', $request->fecha_inicio_arriendo)
            ->where('fecha_fin_arriendo', $request->fecha_fin_arriendo)
            ->where('hora_inicio_arriendo', $request->hora_inicio_arriendo)
            ->where('hora_fin_arriendo', $request->hora_fin_arriendo)->get();

           // return $vehiculos;

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
    public function update(Request $request, $id_vehiculo)
    {
        Vehiculo::where('id_vehiculo', $id_vehiculo)->update(['precio_dia' => $request->nuevo_precio]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_vehiculo)
    {
        Vehiculo::where('id_vehiculo', $id_vehiculo)->delete();
    }
}
