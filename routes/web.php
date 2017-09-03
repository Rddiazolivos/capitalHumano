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
Route::resource('/departamento', 'DepartamentoController');
Route::resource('/proyecto', 'ProyectoController');
Route::resource('/actividad', 'ActivityController');

Route::middleware(['rol'])->group(function () {
    //Route::resource('/proyecto', 'ProyectoController');
});