<?php

namespace sdv\Http\Controllers;

use Illuminate\Http\Request;
use sdv\User;
use sdv\responsable;

class pdfController extends Controller
{
    public function trabajador(Request $request)
    {
        $cantActividades = Responsable::where("responsable_id", $request->user)->count();
        $cantActividadesCerr = Responsable::where("responsable_id", $request->user)
            ->join('actividades', 'responsables.actividad_id', '=', 'actividades.id')
            ->where('actividades.estado_id', 2)
            ->count();
        $cantActividadesAbier = Responsable::where("responsable_id", $request->user)
            ->join('actividades', 'responsables.actividad_id', '=', 'actividades.id')
            ->where('actividades.estado_id', 1)
            ->count();
        $Promedio = Responsable::where("responsable_id", $request->user)
            ->join('actividades', 'responsables.actividad_id', '=', 'actividades.id')
            ->join('evaluacionActividad', 'actividades.id', '=', 'evaluacionActividad.actividad_id')
            ->where('actividades.estado_id', 2)
            ->select('actividades.calificacion')
            ->avg('evaluacionActividad.calificacion');
        $Porcentaje = (($cantActividadesAbier/100)*$cantActividades);

        $datos =array(
            "cantActividades" => $cantActividades,
            "cantActividadesCerr" => $cantActividadesCerr,
            "cantActividadesAbier" => $cantActividadesAbier,
            "promedio" => $Promedio,
            "porcentaje" => $Porcentaje,
            "usuario" => User::find($request->user)
        );    	
        
        $view =  \View::make('pdf.lol', $datos)->render();  
        $pdf = \App::make('dompdf.wrapper');      
        $pdf->loadHTML($view);
	    if($request->tipo == 1){
	        return $pdf->download($usuario->nombre . '_' . $usuario->ape_paterno.'.pdf');
    	}else if($request->tipo == 2){
	        return $pdf->stream();
    	}        
    }
    
    public function SeleccionarTrabajador()
    {    	
    	$datos = array(
            "usuarios" => User::all(),
        );
        return view('pdf.trabajador', $datos);
    }
    public function show()
    {      
        return view('Actividades.grafico');
    }
}
