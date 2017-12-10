<?php

namespace sdv\Http\Controllers;

use Illuminate\Http\Request;
use sdv\proyecto;
use sdv\actividad;
use sdv\userRespuesta;
use sdv\User; 
use sdv\responsable;   


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        if( \Auth::user()->rol_id == 1){
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

            //grafico 2
            $todas = actividad::count();
            $pendientes = actividad::where('estado_id', '1')->count();
            $finalizadas = actividad::where('estado_id', '2')->count();
            $cerradas = actividad::where('estado_id', '3')->count();
            $actividadesTable = \Lava::DataTable();  // Lava::DataTable() if using Laravel

            $actividadesTable->addStringColumn('Reasons')
                    ->addNumberColumn('Percent')
                    ->addRow(['Finalizadas', $finalizadas])
                    ->addRow(['Pendientes', $pendientes])
                    ->addRow(['Cerradas', $cerradas]);

            $chart2 = \Lava::PieChart('IMDB', $actividadesTable, [
                'title'  => 'Actividades',
                'is3D'   => true,
            ]);

            //para el numero de proyecto
            $datos = array(
                'numeroProyectos' => proyecto::count(),
                'numeroActividades' => actividad::count(),
                'numeroEvaluaciones' => userRespuesta::count(),
                'numeroUsuarios' => User::count(),
                "lava"=>$chart,
                "lava2"=>$chart2,
            );
            return view('dashboard/administrador', $datos);
        }elseif( \Auth::user()->rol_id == 2 ){            
            //grafico 2
            $todas = actividad::count();
            $pendientes = actividad::where('estado_id', '1')->count();
            $finalizadas = actividad::where('estado_id', '2')->count();
            $cerradas = actividad::where('estado_id', '3')->count();
            $actividadesTable = \Lava::DataTable();  // Lava::DataTable() if using Laravel

            $actividadesTable->addStringColumn('Reasons')
                    ->addNumberColumn('Percent')
                    ->addRow(['Finalizadas', $finalizadas])
                    ->addRow(['Pendientes', $pendientes])
                    ->addRow(['Cerradas', $cerradas]);

            $chart2 = \Lava::PieChart('IMDB', $actividadesTable, [
                'title'  => 'Actividades',
                'is3D'   => true,
            ]);

            $datos = array(
                'numeroProyectos' => proyecto::where('user_id', \Auth::user()->id)->count(),
                'numeroActividades' => actividad::count(),
                'numeroEvaluaciones' => userRespuesta::count(),
                "lava2"=>$chart2,
            );
            return view('dashboard/evaluador', $datos);

        }elseif( \Auth::user()->rol_id == 3 ){
            //grafico 2
            $todas = responsable::where('responsable_id',  \Auth::user()->id)->count();
            $pendientes = actividad::where('estado_id', '1')->
                whereHas('responsables', function ($query) {
                    $query->where('responsable_id', 'like', \Auth::user()->id);
                })->count();

            $finalizadas = actividad::where('estado_id', '2')->
                whereHas('responsables', function ($query) {
                    $query->where('responsable_id', 'like', \Auth::user()->id);
                })->count();

            $cerradas = actividad::where('estado_id', '3')->
                whereHas('responsables', function ($query) {
                    $query->where('responsable_id', 'like', \Auth::user()->id);
                })->count();

            $actividadesTable = \Lava::DataTable();  // Lava::DataTable() if using Laravel

            $actividadesTable->addStringColumn('Reasons')
                    ->addNumberColumn('Percent')
                    ->addRow(['Finalizadas', $finalizadas])
                    ->addRow(['Pendientes', $pendientes])
                    ->addRow(['Cerradas', $cerradas]);

            $chart2 = \Lava::PieChart('IMDB', $actividadesTable, [
                'title'  => 'Actividades',
                'is3D'   => true,
            ]);

            $datos = array(
                'numeroActividades' => $pendientes,
                "lava2"=>$chart2,
            );
            return view('dashboard/evaluado', $datos);

        }elseif( \Auth::user()->rol_id == 4 ){
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

            //grafico 2
            $todas = actividad::count();
            $pendientes = actividad::where('estado_id', '1')->count();
            $finalizadas = actividad::where('estado_id', '2')->count();
            $cerradas = actividad::where('estado_id', '3')->count();
            $actividadesTable = \Lava::DataTable();  // Lava::DataTable() if using Laravel

            $actividadesTable->addStringColumn('Reasons')
                    ->addNumberColumn('Percent')
                    ->addRow(['Finalizadas', $finalizadas])
                    ->addRow(['Pendientes', $pendientes])
                    ->addRow(['Cerradas', $cerradas]);

            $chart2 = \Lava::PieChart('IMDB', $actividadesTable, [
                'title'  => 'Actividades',
                'is3D'   => true,
            ]);

            //para el numero de proyecto
            $datos = array(
                'numeroProyectos' => proyecto::count(),
                'numeroActividades' => actividad::count(),
                'numeroEvaluaciones' => userRespuesta::count(),
                'numeroUsuarios' => User::count(),
                "lava"=>$chart,
                "lava2"=>$chart2,
            );
            return view('dashboard/gerente', $datos);
        }else{
            return view('home', $datos);
        }
        
    }
}
