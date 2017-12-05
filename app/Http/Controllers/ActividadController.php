<?php

namespace sdv\Http\Controllers;

use sdv\actividad;
use sdv\prioridad;
use sdv\estado;
use sdv\User;
use sdv\etapa;
use sdv\proyecto;
use sdv\comentario;
use sdv\responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Notification;

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
    public function create($id)
    {
        $formulario = array(
            'prioridades' =>  prioridad::all(),
            'estados' =>  estado::all()->where('nombre', '<>', 'Cerrada'),
            'usuarios' =>  User::all()->where("rol_id", "3"),
            'etapas' =>  etapa::all(),
            'id_etapa' =>  $id
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
        $this->validate($request, ['nombre' => 'required|string']);
        $actividad = new actividad;
        $actividad->nombre = $request->nombre;
        $actividad->descripcion = $request->descripcion;
        $actividad->fec_entrega = $request->fec_entrega;
        $actividad->prioridad_id = $request->prioridad_id;
        $actividad->estado_id = $request->estado_id;
        $actividad->etapa_id = $request->etapa_id;
        $actividad->save();
        //redirección

        //para la notificación
        //Auth::user()->notify(new actividadThread());
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
    public function show(Request $request, $id)
    {        
        $datos = array(
            'actividades' =>  actividad::nombre($request->get('scope'))
                ->where('etapa_id', $id)
                ->paginate(8),
            'scope' => $request->scope,
            'estado_id' => $request->estado_id,
            'estados' =>  estado::all(),
            'id_etapa' => $id,
            'etapa' => etapa::find($id),
        );
        return view('Actividades.show', $datos);
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
        $idActi = $actividad->etapa->id;
        $actividad->delete();
        return redirect()->action(
            'ActividadController@show', ['id' => $idActi]
        );   
    }

    public function ver(Request $request)
    {
        $actividades = array(
            'pendientes' =>  actividad::nombre($request->get('scope'))
                ->estado($request->get('estado_id'))
                ->Proyecto($request->get('proyecto_id'))
                ->join('responsables', 'actividades.id', '=', 'responsables.actividad_id')
                ->where('responsables.responsable_id', Auth::user()->id)
                ->select('*','actividades.id as id_acti')
                ->paginate(8),
            'scope' => $request->scope,
            'estado_id' => $request->estado_id,
            'estados' =>  estado::all(),
            'proyecto_id' => $request->proyecto_id,
            'proyectos' =>  proyecto::all(),
        );
        return view('Actividades.evaluado.actividadesAsignadas',$actividades);
    }
    public function all(Request $request)
    {
        $actividades = array(
            'todas' =>  actividad::nombre($request->get('scope'))
                ->EstadoAll($request->get('estado_id'))
                ->Proyecto($request->get('proyecto_id'))
                ->paginate(8),
            'scope' => $request->scope,
            'estado_id' => $request->estado_id,
            'estados' =>  estado::all(),
            'proyecto_id' => $request->proyecto_id,
            'proyectos' =>  proyecto::all(),
        );
        return view('Actividades.all',$actividades);
    }
    
}
