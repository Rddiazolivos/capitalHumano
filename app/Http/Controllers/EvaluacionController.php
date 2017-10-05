<?php

namespace sdv\Http\Controllers;

use sdv\evaluacion;
use sdv\actividad;
use sdv\responsable;
use Illuminate\Http\Request;

class EvaluacionController extends Controller
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
        $metricas = array(
            'actividad' =>  actividad::all()->find('1'),
            'responsable_evaluador' =>  responsable::all()
                ->where('actividad_id', '1')
                ->where('responsable_id', '1')
        );
        return view ("evaluaciones.nuevo", $metricas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \sdv\evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function show(evaluacion $evaluacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sdv\evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function edit(evaluacion $evaluacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sdv\evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, evaluacion $evaluacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sdv\evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(evaluacion $evaluacion)
    {
        //
    }
}
