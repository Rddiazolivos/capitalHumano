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
use sdv\userRespuesta;
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
            'proyectos'     =>  Proyecto::where('estado_id', '<>', '1')->paginate(6),
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
        //para calcular el resultado
        $resultado = 0;
        foreach($request->MiArray as $clave => $elemento){
            $resultado = $resultado + ($elemento * 2);
        }
        $resultado = $resultado / count($request->MiArray);

        //dd($request);
        $usuarioR = new userRespuesta;
        $usuarioR->user_id = $request->user_id;
        $usuarioR->evaluador_id = \Auth::user()->id;
        $usuarioR->proyecto_id = $request->proyecto_id;
        $usuarioR->status = true;
        $usuarioR->nivel = 1;
        $usuarioR->resultado = $resultado;
        $usuarioR->save();

        if($usuarioR){
            foreach($request->MiArray as $clave => $elemento){
                $respuesta = new respuestas_proyecto;
                $respuesta->valor = $elemento;
                $respuesta->pregunta_id = $request->MiArray2[$clave];
                $respuesta->userRespuesta_id = $usuarioR->id;
                $respuesta->save();
            }
        }        
        
        //redirección
        return redirect()->action(
            'EvaluacionProyectoController@show', $request->proyecto_id
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \sdv\evaluacionProyecto  $evaluacionProyecto
     * @return \Illuminate\Http\Response
     */
    public function show($proyecto_id)
    {
        $etapaAsociadas = etapa::where('proyecto_id', $proyecto_id)->get();

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
            ->select('responsable_id')
            ->distinct()
            ->get();

        $arrResponsables[] = 0;
        foreach($responsables as $responsable){
            $arrResponsables[] = $responsable->responsable_id;
        }
        $usuarioAsociados = User::whereIn('users.id', $arrResponsables)
            ->leftJoin('userrespuesta', function ($join) use ($proyecto_id){
                $join->on('users.id', '=', 'userrespuesta.user_id')
                     ->where('userrespuesta.proyecto_id', $proyecto_id);
            })
            ->select('*', "users.id as id_user")
            ->paginate(12);

        return view("evaluacionComportamiento/show", compact("usuarioAsociados"), compact("proyecto_id"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sdv\evaluacionProyecto  $evaluacionProyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(userRespuesta $userrespuesta)
    {      
        $respuestas = respuestas_proyecto::all()->where("userrespuesta_id", $userrespuesta->id);
        $evaluacion = array(
            'areas'     =>  area::all(),            
            'Usuario'   =>  User::find($userrespuesta->user_id),
            'proyecto' =>   proyecto::find($userrespuesta->proyecto_id),
            'prueba'  => respuestas_proyecto::
                join('preguntas', 'respuestas_proyectos.pregunta_id', '=', 'preguntas.id')
                ->where("userrespuesta_id", $userrespuesta->id)
                ->select('*', "respuestas_proyectos.id as id_respuesta")
                ->get(),
            'respuestas' => $respuestas,
            'userRespuesta' => $userrespuesta,
        );
        //dd($evaluacion);
        return view('evaluacionComportamiento.editar', $evaluacion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sdv\evaluacionProyecto  $evaluacionProyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request);
        //Para quitar el campo de edición.
        $userRespuesta = userRespuesta::find($request->id_userRes);
        $userRespuesta->editable = false;
        $userRespuesta->save();
        //Para guardar las evaluaciones
        foreach($request->MiArray as $clave => $elemento){
            $idRespuesta = $request->MiArray3[$clave];
            $respuesta = respuestas_proyecto::find($idRespuesta);
            $respuesta->valor = $elemento;
            $respuesta->pregunta_id = $request->MiArray2[$clave];
            $respuesta->save();
        }
       
        
        //redirección
        return redirect()->action(
            'EvaluacionProyectoController@show', $request->proyecto_id
        );
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
            ->select('responsable_id')
            ->distinct()
            ->get();

        $arrResponsables[] = 0;
        foreach($responsables as $responsable){
            $arrResponsables[] = $responsable->responsable_id;
        }
        $usuarioAsociados = User::whereIn('users.id', $arrResponsables)
            ->leftJoin('userrespuesta', function ($join) use ($request){
                $join->on('users.id', '=', 'userrespuesta.user_id')
                     ->where('userrespuesta.proyecto_id', $request->id);
            })
            ->select('*', "users.id as id_user")
            ->get();

        return response()->json([ 'responsables' => $responsables, 'proyecto_id' => $request->id , 'asoc' => $usuarioAsociados]);
          
    }

    //Para habilitar la edición de una evaluación
    public function HabilitarEdición(Request $request)
    {
        //dd($request);
        $userRespuesta = userRespuesta::find($request->id_userRes);
        $userRespuesta->editable = $request->habilitar;
        $userRespuesta->save();
           
        //redirección
        return back();
    }

}
