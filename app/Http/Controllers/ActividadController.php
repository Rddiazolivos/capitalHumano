<?php

namespace sdv\Http\Controllers;

use sdv\actividad;
use sdv\prioridad;
use sdv\tipo_tarea;
use sdv\estado;
use sdv\User;
use sdv\etapa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividades = array(
            'pendientes' =>  actividad::all()->where('estado_id', '==', '1'),
            'terminadas' =>  actividad::all()->where('estado_id', '==', '2')
        );
        return view('Actividades.index', $actividades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formulario = array(
            'prioridades' =>  prioridad::all(),
            'tipos' =>  tipo_tarea::all(),
            'estados' =>  estado::all(),
            'usuarios' =>  User::all(),
            'etapas' =>  etapa::all()
        );
        return view('Actividades.nuevo', $formulario);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actividad = new actividad;
        $actividad->nombre = $request->nombre;
        $actividad->descripcion = $request->descripcion;
        $actividad->fec_entrega = $request->fec_entrega;
        $actividad->observaciones = $request->observaciones;
        $actividad->prioridad_id = $request->prioridad_id;
        $actividad->tipo_id = $request->tipo_id;
        $actividad->estado_id = $request->estado_id;
        $actividad->responsable_id = $request->responsable_id;
        $actividad->etapa_id = $request->etapa_id;
        $actividad->save();
        //redirección
        return redirect()->action(
            'ActividadController@show', ['id' => $request->etapa_id]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \sdv\activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $actividades = array(
            'pendientes' =>  actividad::where('etapa_id', $id)
                    ->where('estado_id', 1)->get(),
            'terminadas' =>  actividad::where('etapa_id', $id)
                    ->where('estado_id', 2)->get()
        );
        return view('Actividades.index', $actividades);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sdv\activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(actividad $actividad)
    {
        $formulario = array(
            'prioridades' =>  prioridad::all(),
            'tipos' =>  tipo_tarea::all(),
            'estados' =>  estado::all(),
            'usuarios' =>  User::all(),
            'etapas' =>  etapa::all(),
            'actividad' => $actividad
        );
        return view('Actividades.editar', $formulario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sdv\activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, actividad $actividad)
    {
        $actividad->fill($request->all());
        $actividad->save();
        return redirect()->action(
            'ActividadController@show', ['id' => $request->etapa_id]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sdv\activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(actividad $actividad)
    {
        dd($actividad);    }

    public function ver(Request $request)
    {
        $actividades = array(
            'pendientes' =>  actividad::where('nombre','like', "%$request->scope%")->where('estado_id', '1')->where('responsable_id', Auth::user()->id)->paginate(4),
            'terminadas' =>  actividad::where('estado_id', '2')->where('responsable_id', Auth::user()->id)->paginate(4),
            'scope' => $request->scope
        );
        return view('Actividades.actividadesAsignadas',$actividades);
    }
}
