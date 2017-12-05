<?php

namespace sdv\Http\Controllers;

use Illuminate\Http\Request;
use sdv\User;
use sdv\responsable;
use sdv\proyecto;
use sdv\etapa;
use sdv\userRespuesta;

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
            ->join('evaluacion', 'actividades.id', '=', 'evaluacion.actividad_id')
            ->where('actividades.estado_id', 2)
            ->select('actividades.calificacion')
            ->avg('evaluacion.calificacion');
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
    public function actividad(Request $request)
    {        
        $datos =array(
            "proyecto" => proyecto::find($request->proyecto_id),
            "etapas" => etapa::all()
                ->where("proyecto_id", $request->proyecto_id),
        );
        
        $view =  \View::make('pdf.actividad', $datos)->render();  
        $pdf = \App::make('dompdf.wrapper');      
        $pdf->loadHTML($view);
        if($request->tipo == 1){
            return $pdf->download($request->proyecto_id.'.pdf');
        }else if($request->tipo == 2){
            return $pdf->stream();
        }     
        //return view('pdf.actividad', $datos);
    }
    public function SeleccionarProyecto()
    {       
        $datos = array(
            "proyectos" => proyecto::all(),
        );
        return view('pdf.vistaActividad', $datos);
    }

    public function vistaDesempeno()
    {       
        $datos = array(
            "proyectos" => proyecto::all(),
            "usuarios" => User::all(),
        );
        return view('pdf.vista.desempeno', $datos);
    }
    public function archivoDesempeno(Request $request)
    {        
        //dd($request);
        $datos =array(
            "proyecto" => proyecto::find($request->proyecto_id),
            "usuario" => User::find($request->user_id),
            "resultado" => userRespuesta::where('proyecto_id', $request->proyecto_id)
                ->where('user_id', $request->user_id)->first(),
        );
        
        $view =  \View::make('pdf.archivo.desempeno', $datos)->render();  
        $pdf = \App::make('dompdf.wrapper');      
        $pdf->loadHTML($view);
        if($request->tipo == 1){
            return $pdf->download($request->proyecto_id.'.pdf');
        }else if($request->tipo == 2){
            return $pdf->stream();
        }     
        //return view('pdf.actividad', $datos);
    }
}
