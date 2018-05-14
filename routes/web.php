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

/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get("/", "EstructuraControlador@alojamientos");
Route::get("/alojamientos", "EstructuraControlador@alojamientos");
Route::get("/autos", "EstructuraControlador@autos");
Route::get("/vuelos", "EstructuraControlador@vuelos");
Route::get("/traslados", "EstructuraControlador@traslados");
Route::get("/paquetes", "EstructuraControlador@paquetes");
Route::get("/actividades", "EstructuraControlador@actividades");
