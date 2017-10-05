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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/usuario', 'UserController@index')->name('usuario');
Route::get('/usuario/cuenta', 'UserController@show')->name('usuario.show');
Route::get('/etapa/crear/{etapa}', 'EtapaController@crear')->name('etapa.crear');
Route::get('/actividad/ver', 'ActividadController@ver')->name('actividad.ver');
Route::get('/actividad/{actividad}/comentar', 'ActividadController@comentar')->name('actividad.comentar');
Route::resource('/departamento', 'DepartamentoController');
Route::resource('/proyecto', 'ProyectoController');
Route::resource('/etapa', 'EtapaController');

Route::get('actividad/create/{actividad}', 'ActividadController@create')->name('actividad.crear');
Route::resource('actividad', 'ActividadController');

Route::get('comentario/create/{actividad}', 'ComentarioController@create')->name('comentario.crear');
Route::resource('comentario', 'ComentarioController');
Route::resource('evaluar', 'EvaluacionController');

Route::middleware(['rol'])->group(function () {
    //Route::resource('/proyecto', 'ProyectoController');
});