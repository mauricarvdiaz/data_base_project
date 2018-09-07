<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Con el @ llama al controlador que esta en app/controller
Auth::routes();
Route::get("/", "HotelController@alojamientos");
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/alojamientos', 'HotelController@alojamientos')->name('alojamientos');

Route::get("/buscar/vuelos", "VueloController@vuelos");
Route::get("/traslados", "TrasladoController@traslado");
Route::get("/paquetes", "EstructuraControlador@paquetes");
Route::get("/actividades", "EstructuraControlador@actividades");
Route::get('autos', 'VehiculoController@vehiculos');
//Rutas para CRUD.
Route::resource('actividad', 'ActividadControlador');
Route::resource('hoteles', 'HotelController');
Route::resource('habitaciones', 'HabitacionController');
Route::resource('paquete', 'PaqueteController');
Route::resource('actividad', 'ActividadControlador');
Route::resource('/vuelos', 'VueloController');
Route::resource('aeropuerto', 'AeropuertoController');
Route::resource('autos', 'VehiculoController');
Route::resource('companias', 'CompaniaController');
Route::resource('historial', 'HistorialController');
Route::resource('usuario', 'UsersController');
Route::resource('reserva', 'ReservaController');
Route::resource('destino', 'DestinoController');
Route::resource('traslado', 'TrasladoController');

Route::get('habitaciones/{hotel}/{fecha_in}/{fecha_out}/{hab1}/{hab2?}', 'HabitacionController@buscar_habitaciones');
Route::get('habitacion/reserva', 'HabitacionController@reservar');
Route::get('actividades/reserva', 'ActividadControlador@reservar');
Route::get('vuelo/reserva', 'VueloController@reservar');
Route::get('reservar/habitacion', 'ReservaController@reservar_habitacion');
Route::get('vehiculos/disponibles/{pos}', 'VehiculoController@vehiculos_disponibles');

//Carrito
Route::get('carrito/compras', [
	'as' => 'carrito-compras',
	'uses' => 'CarritoController@show'
]);
Route::get('carrito/agregar/habitacion/{id_habitacion1}/{id_habitacion2}/{in}/{out}', 'CarritoController@agregar_habitacion');
Route::get('carrito/agregar/actividad/{id_actividad}', 'CarritoController@agregar_actividad');
Route::get('carrito/agregar/vuelo/{nro_vuelo}/{claseVuelo}/{cantidad_viajeros}', 'CarritoController@agregar_vuelo');

Route::get('carrito/vaciar', 'CarritoController@vaciar');
Route::get('carrito/borrar/{llave}/{posicion}', 'CarritoController@borrar');

Route::get('detalle/orden', [
	'middleware' => 'auth',
	'as' => 'detalle-orden',
	'uses' => 'CarritoController@detalle_orden'
]);



Route::get('actividad/detalle/{id}', 'ActividadControlador@detalleActividad');
Route::get('/anadir/fondo', 'UsersController@nuevo_saldo');

