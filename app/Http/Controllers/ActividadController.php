<?php

namespace sdv\Http\Controllers;

use sdv\actividad;
use sdv\prioridad;
use sdv\tipo;
use sdv\estado;
use sdv\User;
use sdv\etapa;
use sdv\comentario;
use sdv\responsable;
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
    public function create($id)
    {
        $formulario = array(
            'prioridades' =>  prioridad::all(),
            'tipos' =>  tipo::all(),
            'estados' =>  estado::all(),
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
        $actividad->tipo_id = $request->tipo_id;
        $actividad->estado_id = $request->estado_id;
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
    public function show(Request $request, $id)
    {        
        $actividades = array(
            'pendientes' =>  actividad::nombre($request->get('scope'))
                ->where('etapa_id', $id)
                ->paginate(5),
            'scope' => $request->scope,
            'estado_id' => $request->estado_id,
            'estados' =>  estado::all(),
            'id_etapa' => $id
        );
        return view('Actividades.show', $actividades);
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
            'tipos' =>  tipo::all(),
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
            'pendientes' =>  actividad::nombre($request->get('scope'))
                ->estado($request->get('estado_id'))
                ->join('responsables', 'actividades.id', '=', 'responsables.actividad_id')
                ->where('responsables.responsable_id', Auth::user()->id)
                ->select('*','actividades.id as id_acti')
                ->paginate(5),
            'scope' => $request->scope,
            'estado_id' => $request->estado_id,
            'estados' =>  estado::all()
        );
        return view('Actividades.evaluado.actividadesAsignadas',$actividades);
    }
    public function all(Request $request)
    {
        $actividades = array(
            'todas' =>  actividad::nombre($request->get('scope'))
                ->EstadoAll($request->get('estado_id'))
                ->paginate(5),
            'scope' => $request->scope,
            'estado_id' => $request->estado_id,
            'estados' =>  estado::all()
        );
        return view('Actividades.all',$actividades);
    }
    
}
