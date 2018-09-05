<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividad;
use App\Destino;

class ActividadControlador extends Controller
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
    public function reservar()
    {
        $carrito = \Session::get('carrito');
        $subtotal = \Session::get('subtotal');
        foreach ($carrito as $key => $actividades) {
            if($key == "actividad" && count($actividades) > 0){
                foreach ($actividades as $actividad) {
                    if ($actividad->id_actividad != Null){
                        $actividad2 = Actividad::find($actividad->id_actividad);
                        $nro_menores_edad = $actividad2->nro_menores_edad + $actividad->nro_menores_edad;
                        $nro_mayores_edad = $actividad2->nro_mayores_edad + $actividad->nro_mayores_edad;
                        Vuelo::where('nro_vuelo', $vuelo->nro_vuelo)->update(['nro_menores_edad' =>$nro_menores_edad, 'nro_mayores_edad' => $nro_mayores_edad]);

                    }
                    else{
                    $actividad->save();
                    }
                }
            }
        }
        return redirect('vuelo/reserva');
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

    public function detalleActividad($id_actividad)
    {
        $actividad = Actividad::find($id_actividad);
        return view('seleccion.actividadDetalle')->with('actividad', $actividad);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actividad = new Actividad($request->all());
        $actividad->save();
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     Se buca una actividad en especifico                    */
    public function show(Request $request)
    {
        //Aca se busca en la base de datos con el destino....
        $ciudad = Destino::where('ciudad', $request->destino)->first();
        $actividades = $ciudad->actividades()->get();
 
        return view('seleccion.actividad')->with('actividades', $actividades);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_actividad)
    {
        $actividad = Actividad::find($id_actividad);
        return $actividad;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_actividad)
    {/*
        $actividad = Actividad::find($id_actividad);
        $nro_menores_edad = $actividad->nro_menores_edad - $request->nro_menores_edad;
        $nro_mayores_edad = $actividad->nro_mayores_edad - $request->nro_mayores_edad;
        Actividad::where('id_actividad', $id_actividad)
            ->update(['nro_menores_edad' => $nro_menores_edad, 'nro_mayores_edad' => $nro_mayores_edad]);*/

        Actividad::find($id_actividad)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_actividad)
    {
        Actividad::where('id_actividad', $id_actividad)->delete();
    }
}
