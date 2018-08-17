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
Route::get("/", "HotelController@alojamientos");
Route::get("/alojamientos", "HotelController@alojamientos");
Route::get("/autos", "EstructuraControlador@autos");
Route::get("/vuelos", "EstructuraControlador@vuelos");
Route::get("/traslados", "EstructuraControlador@traslados");
Route::get("/paquetes", "EstructuraControlador@paquetes");
Route::get("/actividades", "EstructuraControlador@actividades");
Route::get("/ingresar", "EstructuraControlador@actividades");
Route::get("/registro", "EstructuraControlador@registrar");
Route::get("/añadirFondos", "EstructuraControlador@actividades");

//Rutas para CRUD.
Route::resource('actividad', 'ActividadControlador');
Route::resource('hoteles', 'HotelController');
Route::resource('habitaciones', 'HabitacionController');
Route::resource('paquete', 'PaqueteController');
Route::resource('actividad', 'ActividadControlador');
Route::resource('vuelos', 'VueloController');
Route::resource('aeropuerto', 'AeropuertoController');
Route::resource('vehiculos', 'VehiculoController');
Route::resource('companias', 'CompaniaController');
Route::resource('usuario', 'UsersController');
Route::resource('reserva', 'ReservaController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
