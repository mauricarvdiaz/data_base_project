<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Habitacion;
use DB;
use DateTime;

class HotelController extends Controller
{
    public function alojamientos()
    {
        return view('alojamientos');
    }

    /**
     * Display a listing of the resource.
     * Mostar los hoteles
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registro.add_data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotel = new Hotel($request->all());
        $hotel->save();
    }

    /**
     * Display the specified resource.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //global $hoteles_h2, $hoteles_h3;
        //Validacion de los datos de entrada.
        //dd($request);
        $validateData = $request->validate([
            'destino' => 'required',
            'fecha_entrada' => 'required|date', //|after:tomorrow ??
            'fecha_salida' => 'required|date|after:fecha_entrada', //|after:tomorrow ??
            'adultosh1' => 'numeric|required|min:1'
        ]);

        //Se calcula la cantidad de personas que compartiran una habitacion.
        $cantidadh1 = $request->adultosh1 + $request->menoresh1;
        $cantidadh2 = $request->adultosh2 + $request->menoresh2;
        $cantidadh3 = $request->adultosh3 + $request->menoresh3;
        $cantidad = $cantidadh1 + $cantidadh2 + $cantidadh3;

        //Se calculan las noches de alojamiento de acuerdo a las fechas de entrada y salida.
        $fecha_in = new DateTime($request->fecha_entrada);
        $fecha_out = new DateTime($request->fecha_salida);
        $noches_alojamiento = $fecha_in->diff($fecha_out);
        $noches = data_get($noches_alojamiento, 'days');


        //Se realizan las consulta a la base de datos de acuerdo a lo ingresado por el usuario. Obteniendo los hoteles que coincidan con el destino, fechas y habitaciones.
        //Consulta para la habitacion 1.
        $consulta_hoteles_h1 = DB::table('hotel')->join('habitacion', 'habitacion.rut_hotel', '=', 'hotel.rut_hotel')
            ->where('hotel.ciudad_hotel', $request->destino)
            ->where('habitacion.capacidad', $cantidadh1)
            ->where(function ($query) use ($request){
                $query->where('habitacion.fecha_entrada', '>', $request->fecha_salida)->orWhere('habitacion.fecha_salida', '<', $request->fecha_entrada);
            })
            ->orderBy('hotel.precio_minimo', 'ASC')
            ->get();
            $hoteles_h1 = $consulta_hoteles_h1->unique('nombre'); //Coleccion hoteles h1
        //Consulta para la habitacion 2
        if($cantidadh2 > 0){
            $consulta_hoteles_h2 = DB::table('hotel')->join('habitacion', 'habitacion.rut_hotel', '=', 'hotel.rut_hotel')
            ->where('hotel.ciudad_hotel', $request->destino)
            ->where('habitacion.capacidad', $cantidadh2)
            ->where(function ($query) use ($request, $cantidadh2){
                $query->where('habitacion.fecha_entrada', '>', $request->fecha_salida)->orWhere('habitacion.fecha_salida', '<', $request->fecha_entrada);
            })
            ->orderBy('hotel.precio_minimo', 'ASC')
            ->get();
            $hoteles_h2 = $consulta_hoteles_h2->unique('nombre'); //Coleccion hoteles h2
        }
        //Consulta para la habitacion 3
        if($cantidadh3 > 0){//Se consulta para la 3ra habitacion
            $consulta_hoteles_h3 = DB::table('hotel')->join('habitacion', 'habitacion.rut_hotel', '=', 'hotel.rut_hotel')
            ->where('hotel.ciudad_hotel', $request->destino)
            ->where('habitacion.capacidad', $cantidadh3)
            ->where(function ($query) use ($request){
                $query->where('habitacion.fecha_entrada', '>', $request->fecha_salida)->orWhere('habitacion.fecha_salida', '<', $request->fecha_entrada);
            })
            ->orderBy('hotel.precio_minimo', 'ASC')
            ->get();
            $hoteles_h3 = $consulta_hoteles_h3->unique('nombre'); //Coleccion hoteles h3
        }
        //Se crea una coleccion con los hoteles que tienen las habotaciones disponibles.
        $hoteles = collect();
        if($cantidadh2 > 0){
            foreach ($hoteles_h1 as $hotel_h1) {
                foreach ($hoteles_h2 as $hotel_h2) {
                    if($hotel_h2->nombre == $hotel_h1->nombre){
                        $hoteles->push($hotel_h1);
                    }
                }
            }
        }
        if($cantidadh3 > 0){
            $hoteles_aux = collect();
            foreach ($hoteles as $hotel) {
                foreach ($hoteles_h3 as $hotel_h3) {
                    if($hotel->nombre == $hotel_h3->nombre){
                        $hoteles_aux->push($hotel_h3);
                    }
                }
            }
            $hoteles = $hoteles_aux;
        }
        $info = array('noches' => $noches, 'capa1' => $cantidadh1, 'capa2' => $cantidadh2, 'capa3' => $cantidadh3);
        //Se llama a la vista que mostrara los hoteles al usuario.
        if($cantidadh1 > 0 && $cantidadh2 == 0 && $cantidadh3 == 0){
            return view('seleccion.hoteles')->with('hoteles', $hoteles_h1)->with('info', $info);
        }
        else{
            return view('seleccion.hoteles')->with('hoteles', $hoteles)->with('info', $info);
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
