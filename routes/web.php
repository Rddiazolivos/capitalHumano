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

Route::group(['middleware' => ['auth']], function () {
	Route::get('/home', 'HomeController@index')->name('home');

	Route::resource('/usuario', 'UserController');
	Route::get('/usuario', 'UserController@index')->name('usuario');
	Route::get('/usuario/detalles/{user}', 'UserController@detalle')->name('usuario.detalle');
	Route::get('/usuario/cuenta', 'UserController@show')->name('usuario.show');


	Route::get('/etapa/crear/{etapa}', 'EtapaController@crear')->name('etapa.crear');

	Route::resource('/departamento', 'DepartamentoController');
	Route::resource('/proyecto', 'ProyectoController');
	Route::resource('/etapa', 'EtapaController');

	Route::get('/actividad/ver', 'ActividadController@ver')->name('actividad.ver');
	Route::get('/actividad/{actividad}/comentar', 'ActividadController@comentar')->name('actividad.comentar');
	Route::get('actividad/create/{actividad}', 'ActividadController@create')->name('actividad.crear');
	Route::get('/actividad/all', 'ActividadController@all')->name('actividad.all');
	Route::resource('actividad', 'ActividadController');

	Route::get('comentario/create/{actividad}', 'ComentarioController@create')->name('comentario.crear');
	Route::resource('comentario', 'ComentarioController');

	Route::get('evaluar/create/{id}', 'EvaluacionController@create')->name('evaluar.crear');
	Route::get('evaluar/{actividad}/{evaluacion}/edit', 'EvaluacionController@edit')->name('evaluar.editar');
	Route::resource('evaluar', 'EvaluacionController');

	Route::get('responsable/create/{actividad}', 'ResponsableController@create')->name('responsable.crear');
	Route::get('responsable/{actividad}/edit', 'ResponsableController@edit')->name('responsable.editar');
	Route::put('responsable/actualizar', 'ResponsableController@update')->name('responsable.actualizar');
	Route::resource('/responsable', 'ResponsableController');

	Route::post('pdf', 'pdfController@trabajador')->name('pdf.trabajador');
	Route::get('grafico', 'pdfController@show')->name('pdf.show');
	Route::get('reporteTrabajador', 'pdfController@SeleccionarTrabajador')->name('reporte.trabajador');

	Route::post('pdf2', 'pdfController@actividad')->name('pdf.actividad');
	Route::get('reporteActividad', 'pdfController@SeleccionarProyecto')->name('reporte.actividad');

	Route::get('evaluacion/datos', 'EvaluacionProyectoController@datos')->name('evaluacion.datos');
	Route::get('evaluacion/{user}', 'EvaluacionProyectoController@evaluar')->name('evaluacion.ok');
	Route::get('evaluacion/', 'EvaluacionProyectoController@index')->name('evaluacion.index');	

	Route::get('pruebas', function () {
    return view('pruebas.1');
});
});



Route::middleware(['rol'])->group(function () {
    //Route::resource('/proyecto', 'ProyectoController');
});

