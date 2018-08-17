<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paquete;

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
        $paquetes = Paquete::where('tipo', $request->tipo)->where('destino', $request->destino)->get();
        return $paquetes;
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
