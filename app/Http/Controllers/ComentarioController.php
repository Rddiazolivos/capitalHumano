<?php

namespace sdv\Http\Controllers;

use sdv\comentario;
use sdv\estado;
use sdv\actividad;
use sdv\responsable;
use Illuminate\Http\Request;

class ComentarioController extends Controller
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
    public function create(actividad $actividad)
    {
        $formulario = array(
            'estados' =>  estado::all(),
            'actividad' => $actividad,
        );
        return view('Actividades.evaluado.actividadesAsignadasComentar', $formulario);
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
        $actividad = actividad::find($request->actividad_id);
        if($actividad->estado_id == $request->estadoActividad){            
            $this->validate($request, ['nombre' => 'required']);
            $comentario = new comentario;
            $comentario->fill($request->all());
            $comentario->save();
            return redirect()->route('comentario.crear', $request->actividad_id);
        }else{
            $actividad->estado_id = $request->estadoActividad;
            $actividad->save();
            if($request->nombre <> null){
                $comentario = new comentario;
                $comentario->fill($request->all());
                $comentario->save();
            }            
            return redirect()->route('actividad.show', $actividad->etapa_id);
        }
                
    }

    /**
     * Display the specified resource.
     *
     * @param  \sdv\comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sdv\comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sdv\comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sdv\comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(comentario $comentario)
    {
        //
    }
}
