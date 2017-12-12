<?php
use Illuminate\Support\Facades\Input;
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
	Route::get('/etapa/estado/{etapa}', 'EtapaController@estado')->name('etapa.estado');

	Route::resource('/departamento', 'DepartamentoController');

	Route::get('/proyecto/estado/{proyecto}', 'ProyectoController@estado')->name('proyecto.estado');
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
	Route::resource('evaluar', 'EvaluacionController', ['parameters' => [
	    'evaluar' => 'evaluacion'
	]]);

	Route::get('responsable/create/{actividad}', 'ResponsableController@create')->name('responsable.crear');
	Route::get('responsable/{actividad}/edit', 'ResponsableController@edit')->name('responsable.editar');
	Route::put('responsable/actualizar', 'ResponsableController@update')->name('responsable.actualizar');
	Route::resource('/responsable', 'ResponsableController');

	Route::post('pdf', 'pdfController@trabajador')->name('pdf.trabajador');
	Route::get('grafico', 'pdfController@show')->name('pdf.show');
	Route::get('reporteTrabajador', 'pdfController@SeleccionarTrabajador')->name('reporte.trabajador');

	Route::post('pdf2', 'pdfController@actividad')->name('pdf.actividad');
	Route::get('reporteActividad', 'pdfController@SeleccionarProyecto')->name('reporte.actividad');
	//Para reporte de desempeño
	Route::post('pdf3', 'pdfController@archivoDesempeno')->name('pdf.desempeno');
	Route::get('reporteDesempeno', 'pdfController@vistaDesempeno')->name('reporte.desempeno');
	//Para reporte por trabajador
	Route::post('pdf4', 'pdfController@archivoUsuario')->name('pdf.Usuario');
	Route::get('reporteUsuario', 'pdfController@vistaUsuario')->name('reporte.Usuario');
	Route::post('archivo4', 'pdfController@paginaUsuario')->name('pagina.Usuario');
	Route::get('miUsuario', 'pdfController@paginaMiUsuario')->name('pagina.MiUsuario');

	Route::get('evaluacion/datos', 'EvaluacionProyectoController@datos')->name('evaluacion.datos');
	Route::get('evaluaciones/{userrespuesta}/edit', 'EvaluacionProyectoController@edit')->name('evaluacion.editar');
	Route::get('evaluacion/{user}/{proyecto}', 'EvaluacionProyectoController@evaluar')->name('evaluacion.ok');
	Route::get('evaluacion/', 'EvaluacionProyectoController@index')->name('evaluacion.index');
	Route::get('evaluacion/{proyecto_id}', 'EvaluacionProyectoController@show')->name('evaluacion.ver');	
	Route::put('evaluacion/actualizar', 'EvaluacionProyectoController@update')->name('evaluacion.actualizar');
	Route::resource('/evaluacion', 'EvaluacionProyectoController');	

	//Route::get('ascendente/datos', 'ascendeteController@datos')->name('ascendente.datos');
	//Route::get('ascendente/{userrespuesta}/edit', 'ascendeteController@edit')->name('ascendente.editar');
	Route::get('ascendente/{proyecto}', 'AscendenteController@evaluar')->name('ascendente.ok');
	//Route::get('ascendente/{proyecto_id}', 'ascendeteController@show')->name('ascendente.ver');	
	//Route::put('ascendente/actualizar', 'ascendeteController@update')->name('ascendente.actualizar');
	Route::resource('/ascendente', 'AscendenteController');	

	//Para habilitar la edicion
	Route::put('userRes/habilitar', 'EvaluacionProyectoController@HabilitarEdición')->name('userRes.habilitar');

	//Para recuperar os usuario dentor del informe de resultados
	Route::get('dropdown', function(){
		$id = Input::get('option');
		$procesos = \sdv\proyecto::find($id)->responsables;
		return $procesos->pluck('nombre', 'id');
	});


	Route::get('pruebas', function () {
	    return view('pruebas.1');
	});
});



Route::middleware(['rol'])->group(function () {
    //Route::resource('/proyecto', 'ProyectoController');
});

