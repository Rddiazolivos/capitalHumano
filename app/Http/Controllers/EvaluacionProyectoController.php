<?php

namespace sdv\Http\Controllers;

use sdv\evaluacionProyecto;
use sdv\pregunta;
use sdv\area;
use sdv\proyecto;
use sdv\etapa;
use sdv\User;
use sdv\responsable;
use sdv\actividad;
use sdv\respuestas_proyecto;
use Illuminate\Http\Request;

class EvaluacionProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = array(
            'proyectos'     =>  Proyecto::all(),
        );
        return view('evaluacionComportamiento.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, ['proyecto_id' => 'unique:respuestas_proyecto,proyecto_id']);
        foreach($request->MiArray as $clave => $elemento){
            $respuesta = new respuestas_proyecto;
            $respuesta->valor = $elemento;
            $respuesta->pregunta_id = $request->MiArray2[$clave];
            $respuesta->user_id = $request->user_id;
            $respuesta->proyecto_id = $request->proyecto_id;
            $respuesta->save();
        }
        
        //redirección
        return redirect()->action(
            'EvaluacionProyectoController@index'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \sdv\evaluacionProyecto  $evaluacionProyecto
     * @return \Illuminate\Http\Response
     */
    public function show(evaluacionProyecto $evaluacionProyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sdv\evaluacionProyecto  $evaluacionProyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(evaluacionProyecto $evaluacionProyecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sdv\evaluacionProyecto  $evaluacionProyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, evaluacionProyecto $evaluacionProyecto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sdv\evaluacionProyecto  $evaluacionProyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(evaluacionProyecto $evaluacionProyecto)
    {
        //
    }

    public function evaluar(User $user, proyecto $proyecto)
    {
        $evaluacion = array(
            'areas'     =>  area::all(),
            'preguntas' =>  pregunta::all()->where('encuesta_id', '==', 1),
            'Usuario'   =>  $user,
            'proyecto' => $proyecto,
        );
        //dd($user);
        return view('evaluacionComportamiento.evaluar', $evaluacion);
    }

    public function datos(Request $request)
    {
        $etapaAsociadas = etapa::where('proyecto_id', $request->id)->get();

        $arregloEtapas[] = 0;
        foreach($etapaAsociadas as $etapa){
            $arregloEtapas[] = $etapa->id; 
        }
        $actividadAsociadas = actividad::whereIn('etapa_id', $arregloEtapas)->get();

        $arrActividades[] = 0;
        foreach($actividadAsociadas as $actividad){
            $arrActividades[] = $actividad->id;
        }
        $responsables = responsable::whereIn('actividad_id', $arrActividades)
             ->join('users', 'users.id', '=', 'responsables.responsable_id')
            ->distinct()
            ->select('users.*', 'responsables.responsable_id')
            ->get();

        return response()->json([ 'responsables' => $responsables, 'proyecto_id' => $request->id]);
          
    }
}
