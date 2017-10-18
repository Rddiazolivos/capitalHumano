<?php

namespace sdv\Http\Controllers;

use sdv\proyecto;
use sdv\User;
use auth;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = proyecto::paginate(6);
        return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = array(
            'userList' =>  user::all()->where('rol_id', '2')
        );
        return view('proyectos.nuevo',  $items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validación
        //almacenamiento
        //dd($request);
        //permite revisar lo contenido en el formulario
        $proyecto = new proyecto;
        $proyecto->nombre = $request->nombre;
        $proyecto->fec_creacion = $request->fec_creacion;
        $proyecto->fec_termino = $request->fec_termino;
        $proyecto->observaciones = $request->observaciones;
        $proyecto->user_id = $request->user_id;
        $proyecto->save();
        //redirección
        return redirect()->action(
            'ProyectoController@index'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \sdv\proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(proyecto $proyecto)
    {
        return view('proyectos.show', compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sdv\proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(proyecto $proyecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sdv\proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, proyecto $proyecto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sdv\proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(proyecto $proyecto)
    {
        //
    }
}
