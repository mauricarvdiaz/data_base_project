<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo;
use App\Compania;
use App\Destino;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function vehiculos()
    {
        return view('autos');
    }

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


    public function reservar()
    {
        $carrito = \Session::get('carrito');
        $subtotal = \Session::get('subtotal');
        foreach ($carrito as $key => $autos) 
        {
            if ($key == "vehiculo" && count($autos) > 0)
            {
                foreach ($autos as $auto) 
                {
                    $auto->save();
                }
            }
        }
        return redirect('traslados/reserva');
        //reservar/habitacion
    }

    public function vehiculos_disponibles($id_compania, $end, $start, $hora1, $hora2)
    {
        $vehiculos = collect();
        $vehiculos1 = Vehiculo::where('id_compania', $id_compania)->where('fecha_inicio_arriendo', '>' , $end)->get();
        $vehiculos2 = Vehiculo::where('id_compania', $id_compania)->where('fecha_fin_arriendo', '<' , $start)->get();

        $vehiculos3 = Vehiculo::where('id_compania', $id_compania)->where('fecha_inicio_arriendo', '=' , $end)
            ->where('hora_fin_arriendo', '>',$hora1)->get();

        $vehiculos4 = Vehiculo::where('id_compania', $id_compania)->where('fecha_fin_arriendo', '=' , $start)
            ->where('hora_inicio_arriendo', '<',$hora2)->get();

        $vehiculos = $vehiculos1->concat($vehiculos2)->concat($vehiculos3)->concat($vehiculos4);

        //$vehiculos = \Session::get('vehiculos');
        //$vehiculos_compania = $vehiculos->get($pos);
 
        //return view('seleccion.autosEncontrados')->with('vehiculos', $vehiculos_compania);
        return view('seleccion.autosEncontrados')->with('vehiculos', $vehiculos);
    }

    public function show(Request $request)
    {
        $ciudad = Destino::where('ciudad', $request->destino)->first();

        if ($ciudad != Null) 
        {
            $companias = $ciudad->companias()->get();
            $vehiculos = collect();
            foreach ($companias as $compania) 
            {
                $vehiculos_comp = collect();
                $vehiculos1 = Vehiculo::where('fecha_inicio_arriendo', '>' , $request->dateend)
                    ->where('id_compania', $compania->id_compania)->get();
                $vehiculos2 = Vehiculo::where('fecha_fin_arriendo', '<' , $request->datestart)
                    ->where('id_compania', $compania->id_compania)->get();

                $vehiculos3 = Vehiculo::where('fecha_inicio_arriendo', '=' , $request->dateend)
                    ->where('hora_fin_arriendo', '>',$request->hora1)
                    ->where('id_compania', $compania->id_compania)->get();

                $vehiculos4 = Vehiculo::where('fecha_fin_arriendo', '=' , $request->datestart)
                    ->where('hora_inicio_arriendo', '<',$request->hora2)
                    ->where('id_compania', $compania->id_compania)->get();

                $vehiculos_comp = $vehiculos1->concat($vehiculos2)->concat($vehiculos3)->concat($vehiculos4);
                $vehiculos->push($vehiculos_comp);
            }
            return view('seleccion.companias')
            ->with('autosEncontrados', $vehiculos)
            ->with('companias', $companias)
            ->with('request', $request);
        }
        else 
        {
            $vehiculos = collect();
            return view('seleccion.companias')
            ->with('autosEncontrados', $vehiculos);
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
