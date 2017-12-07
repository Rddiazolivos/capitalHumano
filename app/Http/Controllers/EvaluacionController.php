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
    public function create($id)
    {
        $actividad = actividad::find($id);
        $metricas = array(
            'actividad' =>  $actividad,
            'encargados' =>  responsable::where('responsables.actividad_id', $actividad->id)
            ->join('users', 'responsables.responsable_id', '=', 'users.id')
            ->where('users.rol_id', 3)->get(),
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
        //$this->validate($request, ['actividad_id' => 'required|unique:evaluacion']);
        $evaluacion = new evaluacion;
        $evaluacion->conforme = $request->conforme;
        $evaluacion->calificacion = $request->calificacion;
        $evaluacion->observacion = $request->observacion;
        $evaluacion->actividad_id = $request->actividad_id;
        $evaluacion->save();

        $actividad = actividad::find($request->actividad_id);

        //redirección
        return ($url = \Session::get('backUrl')) 
           ? \Redirect::to($url) 
           : \Redirect::route('actividad.show', $actividad->etapa_id);

        //return redirect()->route('actividad.show', $actividad->etapa_id);
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
        $formulario = array(
            'actividad' => actividad::find($evaluacion->actividad_id),
            'evaluacion' =>  $evaluacion,
            'encargados' =>  responsable::where('responsables.actividad_id', $evaluacion->actividad_id)
            ->join('users', 'responsables.responsable_id', '=', 'users.id')
            ->where('users.rol_id', 3)->get(),
        );
        return view('evaluaciones.editar', $formulario);
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
        $evaluacion->conforme = $request->conforme;
        $evaluacion->calificacion = $request->calificacion;
        $evaluacion->observacion = $request->observacion;
        $evaluacion->save();

        $actividad = actividad::find( $request->actividad_id);
        return redirect()->route('actividad.show', $actividad->etapa_id);
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
