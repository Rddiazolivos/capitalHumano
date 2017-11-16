<?php

namespace sdv\Http\Controllers;

use Illuminate\Http\Request;
use sdv\proyecto;
use sdv\actividad;
use sdv\userRespuesta;
use sdv\User;   

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
        $datos = array(
            'numeroProyectos' => proyecto::count(),
            'numeroActividades' => actividad::count(),
            'numeroEvaluaciones' => userRespuesta::count(),
            'numeroUsuarios' => User::count(),
        );
        return view('home', $datos);
    }
}
