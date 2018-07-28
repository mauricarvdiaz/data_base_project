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
Route::resource('hoteles', 'HotelController');
Route::resource('habitaciones', 'HabitacionController');
Route::resource('actividad', 'ActividadControlador');

//Ruta para las habitaciones del hotel escogido...
Route::get("/habitaciones/{rut_hotel}/{capa1}/{noches}/{capa2}/{capa3}", "HabitacionController@mostrar_habitaciones");

Route::get("/reserva/alojamientos/{nro_habitacion}", "ReservaControlador@reserva_habitacion");


Route::get('/insertarHoteles', function(){

	//Hoteles Tokio
	DB::insert("INSERT INTO hotel (rut_hotel, nombre, ciudad_hotel, nro_calle_hotel, precio_minimo, calle_hotel) VALUES(?,?,?,?,?,?)", [19185, "Paleta", "Tokio", 123, 35000, "Calle falsa"]);
	//Hoteles Hawai
	DB::insert("INSERT INTO hotel (rut_hotel, nombre, ciudad_hotel, nro_calle_hotel, precio_minimo, calle_hotel) VALUES(?,?,?,?,?,?)", [22568, "Kame house", "Hawai", 125, 30000, "nube"]);
	//Hoteles Nueva York
	DB::insert("INSERT INTO hotel (rut_hotel, nombre, ciudad_hotel, nro_calle_hotel, precio_minimo, calle_hotel) VALUES(?,?,?,?,?,?)", [21546, "Sanctum", "Nueva York", 177, 70000, "Bleecker Street"]);

	//Hoteles Lima
	DB::insert("INSERT INTO hotel (rut_hotel, nombre, ciudad_hotel, nro_calle_hotel, precio_minimo, calle_hotel) VALUES(?,?,?,?,?,?)", [22968, "Dazzler Lima", "Lima", 707, 85590, "Av. Jose Pardo"]);
	DB::insert("INSERT INTO hotel (rut_hotel, nombre, ciudad_hotel, nro_calle_hotel, precio_minimo, calle_hotel) VALUES(?,?,?,?,?,?)", [22842, "Hotel Estelar Miraflores", "Lima", 521, 89479, "Av. Jose Larco"]);
	DB::insert("INSERT INTO hotel (rut_hotel, nombre, ciudad_hotel, nro_calle_hotel, precio_minimo, calle_hotel) VALUES(?,?,?,?,?,?)", [22425, "Sol de Oro Hotel & Suites", "Lima", 974, 88760, "Calle San Martin"]);
	DB::insert("INSERT INTO hotel (rut_hotel, nombre, ciudad_hotel, nro_calle_hotel, precio_minimo, calle_hotel) VALUES(?,?,?,?,?,?)", [22864, "Hotel Las Palmas", "Lima", 954, 40736, "Calle Bellavista"]);

	//Hoteles Santiago
	DB::insert("INSERT INTO hotel (rut_hotel, nombre, ciudad_hotel, nro_calle_hotel, precio_minimo, calle_hotel) VALUES(?,?,?,?,?,?)", [11647, "Hotel Capital San Pablo", "Santiago", 504, 59304, "San Pablo"]);
	DB::insert("INSERT INTO hotel (rut_hotel, nombre, ciudad_hotel, nro_calle_hotel, precio_minimo, calle_hotel) VALUES(?,?,?,?,?,?)", [11574, "Icon Hotel", "Santiago", 618, 90342, "San Pablo"]);
	DB::insert("INSERT INTO hotel (rut_hotel, nombre, ciudad_hotel, nro_calle_hotel, precio_minimo, calle_hotel) VALUES(?,?,?,?,?,?)", [12874, "Hotel Kennedy", "Santiago", 714, 81408, "Av. Presidente Kennedy"]);
	DB::insert("INSERT INTO hotel (rut_hotel, nombre, ciudad_hotel, nro_calle_hotel, precio_minimo, calle_hotel) VALUES(?,?,?,?,?,?)", [12145, "Hotel Gran Palace", "Santiago", 423, 81902, "Paseo Huerfanos"]);
	//Hoteles Bogota
	DB::insert("INSERT INTO hotel (rut_hotel, nombre, ciudad_hotel, nro_calle_hotel, precio_minimo, calle_hotel) VALUES(?,?,?,?,?,?)", [179654, "Hotel Tequendama Bogota", "Bogota", 7865, 45101, "Carrera 10"]);
	DB::insert("INSERT INTO hotel (rut_hotel, nombre, ciudad_hotel, nro_calle_hotel, precio_minimo, calle_hotel) VALUES(?,?,?,?,?,?)", [178624, "Wyndham Bogotá Art", "Bogota", 2463, 52764, "Avenida Calle 24"]);
	DB::insert("INSERT INTO hotel (rut_hotel, nombre, ciudad_hotel, nro_calle_hotel, precio_minimo, calle_hotel) VALUES(?,?,?,?,?,?)", [123648, "TRYP Bogota Usaquen", "Bogota", 8795, 36468, "Calle 120"]);
	DB::insert("INSERT INTO hotel (rut_hotel, nombre, ciudad_hotel, nro_calle_hotel, precio_minimo, calle_hotel) VALUES(?,?,?,?,?,?)", [115271, "Hotel Fontibon", "Bogota", 2458, 17016, "Carrera 97"]);
	//Hoteles Buenos Aires
	DB::insert("INSERT INTO hotel (rut_hotel, nombre, ciudad_hotel, nro_calle_hotel, precio_minimo, calle_hotel) VALUES(?,?,?,?,?,?)", [76541, "Carsson Hotel Downtown Buenos Aires", "Buenos Aires", 2458, 48714, "Viamonte"]);
	DB::insert("INSERT INTO hotel (rut_hotel, nombre, ciudad_hotel, nro_calle_hotel, precio_minimo, calle_hotel) VALUES(?,?,?,?,?,?)", [65841, "Broadway Hotel & Suites", "Buenos Aires", 6542, 63522, "Av. Corrientes"]);
	DB::insert("INSERT INTO hotel (rut_hotel, nombre, ciudad_hotel, nro_calle_hotel, precio_minimo, calle_hotel) VALUES(?,?,?,?,?,?)", [98543, "Globales Republica", "Buenos Aires", 9654, 31200, "Cerrito"]);
	DB::insert("INSERT INTO hotel (rut_hotel, nombre, ciudad_hotel, nro_calle_hotel, precio_minimo, calle_hotel) VALUES(?,?,?,?,?,?)", [98423, "Rochester Classic Hotel", "Buenos Aires", 8452, 53799, "Esmeralda"]);
});


Route::get('/insertarHabitaciones', function(){
	//---Habitaciones Buenos aires..
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [100, 76541, '2018-07-30', '2018-08-15', 1, 48714, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [101, 76541, '2018-07-30', '2018-08-15', 1, 48714, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [102, 76541, '2018-07-30', '2018-08-15', 1, 48714, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [103, 76541, '2018-07-30', '2018-08-15', 1, 48714, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [200, 76541, '2018-07-30', '2018-08-15', 2, 48714, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [201, 76541, '2018-07-30', '2018-08-15', 2, 48714, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [202, 76541, '2018-07-30', '2018-08-15', 2, 48714, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [203, 76541, '2018-07-30', '2018-08-15', 2, 48714, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [300, 76541, "2018-08-01", "2018-08-11", 3, 58613, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [301, 76541, "2018-07-30", "2018-08-11", 3, 58613, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [301, 76541, "2018-07-30", "2018-08-11", 3, 58613, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [302, 76541, "2018-07-30", "2018-08-11", 3, 58613, 3]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [400, 76541, "2018-07-27", "2018-08-09", 4, 69842, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [401, 76541, "2018-07-27", "2018-08-09", 4, 69842, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [402, 76541, "2018-07-27", "2018-08-09", 4, 69842, 3]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [403, 76541, "2018-07-27", "2018-08-09", 4, 69842, 3]);

	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [100, 65841, '2018-08-07', '2018-08-20', 1, 48714, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [101, 65841, '2018-08-07', '2018-08-20', 1, 48714, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [102, 65841, '2018-08-07', '2018-08-20', 1, 48714, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [103, 65841, '2018-08-07', '2018-08-20', 1, 48714, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [200, 65841, '2018-08-07', '2018-08-20', 2, 48714, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [201, 65841, '2018-08-07', '2018-08-20', 2, 48714, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [202, 65841, '2018-08-07', '2018-08-20', 2, 48714, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [203, 65841, '2018-08-07', '2018-08-20', 2, 48714, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [301, 65841, "2018-07-20", "2018-08-01", 3, 58613, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [302, 65841, "2018-07-13", "2018-07-20", 3, 58613, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [303, 65841, "2018-07-13", "2018-07-20", 3, 58613, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [304, 65841, "2018-07-13", "2018-07-20", 3, 58613, 3]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [305, 65841, "2018-07-13", "2018-07-20", 3, 58613, 3]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [400, 65841, "2018-07-20", "2018-08-09", 4, 69842, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [401, 65841, "2018-07-20", "2018-08-09", 4, 69842, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [402, 65841, "2018-07-20", "2018-08-09", 4, 69842, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [403, 65841, "2018-07-20", "2018-08-09", 4, 69842, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [404, 65841, "2018-07-20", "2018-08-09", 4, 69842, 3]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [405, 65841, "2018-07-20", "2018-08-09", 4, 69842, 3]);

	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [100, 98543, '2018-07-15', '2018-07-20', 1, 48714, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [102, 98543, '2018-07-15', '2018-07-20', 1, 48714, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [103, 98543, '2018-07-15', '2018-07-20', 1, 48714, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [104, 98543, '2018-07-15', '2018-07-20', 1, 48714, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [201, 98543, '2018-07-15', '2018-07-20', 2, 48714, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [202, 98543, '2018-07-15', '2018-07-20', 2, 48714, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [203, 98543, '2018-07-15', '2018-07-20', 2, 48714, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [204, 98543, '2018-07-15', '2018-07-20', 2, 48714, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [300, 98543, "2018-07-10", "2018-07-14", 3, 58613, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [301, 98543, "2018-07-30", "2018-08-07", 3, 58613, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [302, 98543, "2018-07-30", "2018-08-07", 3, 58613, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [303, 98543, "2018-07-30", "2018-08-07", 3, 58613, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [304, 98543, "2018-07-30", "2018-08-07", 3, 58613, 3]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [305, 98543, "2018-07-30", "2018-08-07", 3, 58613, 3]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [400, 98543, "2018-07-02", "2018-07-14", 4, 69842, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [401, 98543, "2018-07-02", "2018-07-14", 4, 69842, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [402, 98543, "2018-07-02", "2018-07-14", 4, 69842, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [403, 98543, "2018-07-02", "2018-07-14", 4, 69842, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [404, 98543, "2018-07-02", "2018-07-14", 4, 69842, 3]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [405, 98543, "2018-07-02", "2018-07-14", 4, 69842, 3]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [406, 98543, "2018-07-02", "2018-07-14", 4, 69842, 3]);

	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [100, 98423, '2018-07-07', '2018-07-20', 1, 48714, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [101, 98423, '2018-07-07', '2018-07-20', 1, 48714, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [102, 98423, '2018-07-07', '2018-07-20', 1, 48714, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [103, 98423, '2018-07-07', '2018-07-20', 1, 48714, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [201, 98423, '2018-07-07', '2018-07-20', 2, 48714, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [202, 98423, '2018-07-07', '2018-07-20', 2, 48714, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [203, 98423, '2018-07-07', '2018-07-20', 2, 48714, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [204, 98423, '2018-07-07', '2018-07-20', 2, 48714, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [301, 98423, "2018-07-18", "2018-07-25", 3, 58613, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [302, 98423, "2018-08-05", "2018-08-11", 3, 58613, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [303, 98423, "2018-08-05", "2018-08-11", 3, 58613, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [304, 98423, "2018-08-05", "2018-08-11", 3, 58613, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [305, 98423, "2018-08-05", "2018-08-11", 3, 58613, 3]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [306, 98423, "2018-08-05", "2018-08-11", 3, 58613, 3]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [400, 98423, "2018-07-30", "2018-08-09", 4, 69842, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [401, 98423, "2018-07-30", "2018-08-09", 4, 69842, 1]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [402, 98423, "2018-07-30", "2018-08-09", 4, 69842, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [403, 98423, "2018-07-30", "2018-08-09", 4, 69842, 2]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [404, 98423, "2018-07-30", "2018-08-09", 4, 69842, 3]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche, tipo) VALUES(?,?,?,?,?,?,?)", [405, 98423, "2018-07-30", "2018-08-09", 4, 69842, 3]);
	//Habitaciones Hoteles Lima
	/*
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche) VALUES(?,?,?,?,?,?)", [200, 22968, '2018-07-30', '2018-08-15', 2, 48714]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche) VALUES(?,?,?,?,?,?)", [300, 22968, "2018-08-01", "2018-08-11", 3, 58613]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche) VALUES(?,?,?,?,?,?)", [301, 22968, "2018-07-30", "2018-08-11", 3, 58613]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche) VALUES(?,?,?,?,?,?)", [400, 22968, "2018-07-27", "2018-08-09", 4, 69842]);

	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche) VALUES(?,?,?,?,?,?)", [200, 22842, '2018-08-07', '2018-08-20', 2, 48714]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche) VALUES(?,?,?,?,?,?)", [300, 22842, "2018-07-20", "2018-08-01", 3, 58613]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche) VALUES(?,?,?,?,?,?)", [301, 22842, "2018-07-13", "2018-07-20", 3, 58613]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche) VALUES(?,?,?,?,?,?)", [400, 22842, "2018-07-20", "2018-08-09", 4, 69842]);

	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche) VALUES(?,?,?,?,?,?)", [200, 22425, '2018-07-15', '2018-07-20', 2, 48714]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche) VALUES(?,?,?,?,?,?)", [302, 22425, "2018-07-10", "2018-07-14", 3, 58613]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche) VALUES(?,?,?,?,?,?)", [301, 22425, "2018-07-30", "2018-08-07", 3, 58613]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche) VALUES(?,?,?,?,?,?)", [400, 22425, "2018-07-02", "2018-07-14", 4, 69842]);

	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche) VALUES(?,?,?,?,?,?)", [200, 22864, '2018-07-07', '2018-07-20', 2, 48714]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche) VALUES(?,?,?,?,?,?)", [300, 22864, "2018-07-18", "2018-07-25", 3, 58613]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche) VALUES(?,?,?,?,?,?)", [301, 22864, "2018-08-05", "2018-08-11", 3, 58613]);
	DB::insert("INSERT INTO habitacion (nro_habitacion, rut_hotel, fecha_entrada, fecha_salida, capacidad, precio_noche) VALUES(?,?,?,?,?,?)", [400, 22864, "2018-07-30", "2018-08-09", 4, 69842]);
	*/
});

Route::get('/insertarActividades', function(){
	DB::insert("INSERT INTO actividad (ubicacion,tipo_actividad, fecha, descripcion, nro_menores_edad, nro_mayores_edad, precio_actividad) VALUES(?,?,?,?,?,?,?)", ['Lima', 'Tour Ciudad', '2018-08-07', 'Conoce en profundidad todas las maravillas de esta hermosa ciudad.', 10, 10, 100]);
	DB::insert("INSERT INTO actividad (ubicacion,tipo_actividad, fecha, descripcion, nro_menores_edad, nro_mayores_edad, precio_actividad) VALUES(?,?,?,?,?,?,?)", ['Lima', 'Tour Museor', '2018-08-08', 'Conoce en profundidad todas los museos de esta hermosa ciudad.', 10, 10, 105]);
	DB::insert("INSERT INTO actividad (ubicacion,tipo_actividad, fecha, descripcion, nro_menores_edad, nro_mayores_edad, precio_actividad) VALUES(?,?,?,?,?,?,?)", ['Buenos Aires', 'Tour Ciudad', '2018-08-07', 'Conoce en profundidad todas las maravillas de esta hermosa ciudad.', 10, 10, 100]);
	DB::insert("INSERT INTO actividad (ubicacion,tipo_actividad, fecha, descripcion, nro_menores_edad, nro_mayores_edad, precio_actividad) VALUES(?,?,?,?,?,?,?)", ['Buenos Aires', 'Tour Ciudad', '2018-08-07', 'Conoce en profundidad todas los museos de esta hermosa ciudad.', 10, 10, 100]);
	DB::insert("INSERT INTO actividad (ubicacion,tipo_actividad, fecha, descripcion, nro_menores_edad, nro_mayores_edad, precio_actividad) VALUES(?,?,?,?,?,?,?)", ['Brasilia', 'Tour Ciudad', '2018-08-07', 'Conoce en profundidad todas las maravillas de esta hermosa ciudad.', 10, 10, 100]);
	DB::insert("INSERT INTO actividad (ubicacion,tipo_actividad, fecha, descripcion, nro_menores_edad, nro_mayores_edad, precio_actividad) VALUES(?,?,?,?,?,?,?)", ['Brasilia', 'Tour Ciudad', '2018-08-07', 'Conoce en profundidad todas los museos de esta hermosa ciudad.', 10, 10, 100]);
	DB::insert("INSERT INTO actividad (ubicacion,tipo_actividad, fecha, descripcion, nro_menores_edad, nro_mayores_edad, precio_actividad) VALUES(?,?,?,?,?,?,?)", ['Bogota', 'Tour Ciudad', '2018-08-07', 'Conoce en profundidad todas las maravillas de esta hermosa ciudad.', 10, 10, 100]);
	DB::insert("INSERT INTO actividad (ubicacion,tipo_actividad, fecha, descripcion, nro_menores_edad, nro_mayores_edad, precio_actividad) VALUES(?,?,?,?,?,?,?)", ['Bogota', 'Tour Ciudad', '2018-08-07', 'Conoce en profundidad todas los museos de esta hermosa ciudad.', 10, 10, 100]);
	DB::insert("INSERT INTO actividad (ubicacion,tipo_actividad, fecha, descripcion, nro_menores_edad, nro_mayores_edad, precio_actividad) VALUES(?,?,?,?,?,?,?)", ['Barranquilla', 'Tour Ciudad', '2018-08-07', 'Conoce en profundidad todas las maravillas de esta hermosa ciudad.', 10, 10, 100]);
	DB::insert("INSERT INTO actividad (ubicacion,tipo_actividad, fecha, descripcion, nro_menores_edad, nro_mayores_edad, precio_actividad) VALUES(?,?,?,?,?,?,?)", ['Barranquilla', 'Tour Ciudad', '2018-08-07', 'Conoce en profundidad todas los museos de esta hermosa ciudad.', 10, 10, 100]);
	DB::insert("INSERT INTO actividad (ubicacion,tipo_actividad, fecha, descripcion, nro_menores_edad, nro_mayores_edad, precio_actividad) VALUES(?,?,?,?,?,?,?)", ['Cuzco', 'Tour Ciudad', '2018-08-07', 'Conoce en profundidad todas las maravillas de esta hermosa ciudad.', 10, 10, 100]);
	DB::insert("INSERT INTO actividad (ubicacion,tipo_actividad, fecha, descripcion, nro_menores_edad, nro_mayores_edad, precio_actividad) VALUES(?,?,?,?,?,?,?)", ['Cuzco', 'Tour Ciudad', '2018-08-07', 'Conoce en profundidad todas los museos de esta hermosa ciudad.', 10, 10, 100]);
	DB::insert("INSERT INTO actividad (ubicacion,tipo_actividad, fecha, descripcion, nro_menores_edad, nro_mayores_edad, precio_actividad) VALUES(?,?,?,?,?,?,?)", ['Sao Paulo', 'Tour Ciudad', '2018-08-07', 'Conoce en profundidad todas las maravillas de esta hermosa ciudad.', 10, 10, 100]);
	DB::insert("INSERT INTO actividad (ubicacion,tipo_actividad, fecha, descripcion, nro_menores_edad, nro_mayores_edad, precio_actividad) VALUES(?,?,?,?,?,?,?)", ['Sao Paulo', 'Tour Ciudad', '2018-08-07', 'Conoce en profundidad todas los museos de esta hermosa ciudad.', 10, 10, 100]);
	DB::insert("INSERT INTO actividad (ubicacion,tipo_actividad, fecha, descripcion, nro_menores_edad, nro_mayores_edad, precio_actividad) VALUES(?,?,?,?,?,?,?)", ['Santiago', 'Tour Ciudad', '2018-08-07', 'Conoce en profundidad todas las maravillas de esta hermosa ciudad.', 10, 10, 100]);
	DB::insert("INSERT INTO actividad (ubicacion,tipo_actividad, fecha, descripcion, nro_menores_edad, nro_mayores_edad, precio_actividad) VALUES(?,?,?,?,?,?,?)", ['Santiago', 'Tour Ciudad', '2018-08-07', 'Conoce en profundidad todas los museos de esta hermosa ciudad.', 10, 10, 100]);
});

/*
Route::get('/borrar', function(){

	//DB::insert("DELETE FROM hotel WHERE rut_hotel=?", [19185]);
	DB::insert("DELETE FROM habitacion WHERE rut_hotel=?", [76541]);
});
*/
