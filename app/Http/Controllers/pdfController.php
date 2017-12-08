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
        $todaRespuesta = userRespuesta::where('proyecto_id', $request->proyecto_id)
                ->where('user_id', $request->user_id)->first();
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

    public function vistaUsuario()
    {       
        $datos = array(
            "usuarios" => User::where('rol_id', 3)->get(),
        );
        return view('pdf.vista.usuario', $datos);
    }
    public function archivoUsuario(Request $request)
    {        
        //dd($request);
        //PAra el grafico
        //grafico 1
        $stocksTable = \Lava::DataTable();  // Lava::DataTable() if using Laravel

        $stocksTable->addDateColumn('Day of Month')
                    ->addNumberColumn('Projected')
                    ->addNumberColumn('Official');

        // Random Data For Example
        for ($a = 1; $a < 30; $a++) {
            $stocksTable->addRow([
              '2015-10-' . $a, rand(800,1000), rand(800,1000)
            ]);
        }

        //Selecciono el tipo de grafico
        $chart = \Lava::LineChart('MyStocks', $stocksTable);

        $todaRespuesta = userRespuesta::where('user_id', $request->user_id)->get();

        $promedio = 0;
        if(count($todaRespuesta) <> 0){
            foreach($todaRespuesta as $respuesta){
                $promedio = $respuesta->resultado;
            }
            $promedio = $promedio / count($todaRespuesta);
        }

        $datos =array(
            "usuario" => User::find($request->user_id),
            "promedio" => $promedio,
            "lava"=>$chart,
        );
        
        $view =  \View::make('pdf.archivo.usuario', $datos)->render();  
        $pdf = \App::make('dompdf.wrapper');      
        $pdf->loadHTML($view);
        if($request->tipo == 1){
            return $pdf->download($request->proyecto_id.'.pdf');
        }else if($request->tipo == 2){
            return $pdf->stream();
        }     
        //return view('pdf.actividad', $datos);
    }
    //visual informe de trabajador
    public function paginaUsuario(Request $request)
    {        
        //dd($request);
        $todaRespuesta = userRespuesta::where('user_id', $request->user_id)->get();
        //Para calcular el promedio
        $calificaciones = [];
        $promedio = 0;
        $notaMinima = 0;
        $notaMaxima = 0;
        if(count($todaRespuesta) <> 0){
            foreach($todaRespuesta as $respuesta){
                $calificaciones[] = $respuesta->resultado;
            }
            $promedio = array_sum($calificaciones)/count($calificaciones);
            $notaMinima = min($calificaciones);
            $notaMaxima = max($calificaciones);
        }

        //grafico de barras
        $finances = \Lava::DataTable();

        $finances->addstringColumn('Rango')
                 ->addNumberColumn('Calificación')
                 ->addRow(['Mínimo', $notaMinima])
                 ->addRow(['Máximo', $notaMaxima])
                 ->addRow(['Promedio', $promedio]);

        $chart2 = \Lava::ColumnChart('Finances', $finances, [
            'title' => 'Calificación',
            'titleTextStyle' => [
                'color'    => 'rgb(123, 65, 89)',
                'fontSize' => 16
            ],
            'isStacked'          => true,
        ]);


        $datos =array(
            "usuario" => User::find($request->user_id),
            "promedio" => $promedio,
            "lava2" => $chart2,
        );
        
        return view('pdf.pagina.usuario', $datos);
    }
}
    