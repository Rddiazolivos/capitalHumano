<?php

namespace sdv\Http\Controllers;

use sdv\responsable;
use Illuminate\Http\Request;
use sdv\User;
use sdv\actividad;

class ResponsableController extends Controller
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
        $formulario = array(
            'responsables' =>  User::all()->where("rol_id", "2"),
            'usuarios' =>  User::all()->where("rol_id", "3"),
            'id_actividad' =>  $id ,
        );
        return view('responsable.nuevo', $formulario);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['supervisor_id' => 'required']);
        $supervisor = new responsable;
        $supervisor->responsable_id = $request->supervisor_id;
        $supervisor->actividad_id = $request->id_actividad;
        $supervisor->save();
        foreach($request->encargados as $encargado_id ){
            $encargado = new responsable;
            $encargado->responsable_id = $encargado_id;
            $encargado->actividad_id = $request->id_actividad;
            $encargado->save();
        }
        $actividad = actividad::find($request->id_actividad);
        $actividad->asignacion = true;
        $actividad->save();
        return redirect()->action(
            'ActividadController@show', ['id' => $actividad->etapa_id]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \sdv\responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function show(responsable $responsable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sdv\responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function edit(actividad $actividad)
    {
        $formulario = array(
            'responsables' =>  User::all()->where("rol_id", "2"),
            'usuarios' =>  User::all()->where("rol_id", "3"),
            'supervisor' =>  responsable::where('responsables.actividad_id', $actividad->id)
                ->join('users', 'responsables.responsable_id', '=', 'users.id')
                ->where('users.rol_id', 2)
                ->select('*','responsables.id as id_res')
                ->first(),
            'encargados' =>  responsable::where('responsables.actividad_id', $actividad->id)
            ->join('users', 'responsables.responsable_id', '=', 'users.id')
            ->where('users.rol_id', 3)->get(),
            'actividad' => $actividad,
        );
        return view('responsable.editar', $formulario);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sdv\responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, responsable $responsable)
    {
        //actualizar evaluador
        $responsable->responsable_id = $request->supervisor_id;
        $responsable->save();
        //actualizar evaluado
        $encargadosActual =  responsable::where('responsables.actividad_id', $request->id_actividad)
            ->join('users', 'responsables.responsable_id', '=', 'users.id')
            ->where('users.rol_id', 3)
            ->select('*','responsables.id as id_res')
            ->get(); 


        //Permite determinar los elementos que no estan en el array 1, y asi eliminarlos
        foreach ($encargadosActual as $encargadoActual) {
            $encontrado=false;
            foreach ($request->encargados as $encargadoActualizado) {
                if ($encargadoActual->id_res == $encargadoActualizado){
                    $encontrado=true;
                    $break;
                }
            }
            if ($encontrado == false){
                    responsable::destroy($encargadoActual->id_res);
            }
        }

        //Permite determinar los elementos que no estan en el array 2, y asi agregarlos
        foreach ($request->encargados as $encargadoActualizado) {
            $encontrado=false;
            foreach ($encargadosActual as $encargadoActual) {
                if ($encargadoActualizado == $encargadoActual->id_res){
                    $encontrado=true;
                    $break;
                }
            }
            if ($encontrado == false){
                $encargado = new responsable;
                $encargado->responsable_id = $encargadoActualizado;
                $encargado->actividad_id = $request->id_actividad;
                $encargado->save();
            }
        }


        $actividad = actividad::find($request->id_actividad);
        return redirect()->action(
            'ActividadController@show', ['id' => $actividad->etapa_id]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sdv\responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function destroy(responsable $responsable)
    {
        //
    }
}
