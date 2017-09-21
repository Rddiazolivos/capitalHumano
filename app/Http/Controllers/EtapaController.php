<?php

namespace sdv\Http\Controllers;

use Illuminate\Http\Request;
use sdv\etapa;

class EtapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etapas.index');
    }
    //creacion desde proyecto
    public function crear($id)
    {
        return view('etapas.nuevo',  compact('id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $etapa = new etapa;
        $etapa->nombre = $request->nombre;
        $etapa->proyecto_id = $request->proyecto_id;
        $etapa->fec_creacion = $request->fec_creacion;
        $etapa->fec_termino = $request->fec_termino;
        $etapa->observaciones = $request->observaciones;
        $etapa->estado_id = '1';
        $etapa->save();
        //redirección
        return redirect()->action(
            'EtapaController@show', ['id' => $request->proyecto_id]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)    
    {
        $id_proyecto = $id;
        $etapas = etapa::where('proyecto_id', '=', $id)->get();
        return view('etapas.show', compact('etapas', 'id_proyecto'));
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
