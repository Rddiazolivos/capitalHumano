<?php

namespace sdv\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use sdv\User;
use sdv\rol;
use sdv\departamento;

class UserController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::paginate(6);
        return view('auth.index', compact('usuarios'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $usuario = User::find(Auth::user()->id);        
        return view('auth.show', compact('usuario'));
    }
    public function detalle(User $user)
    {
        $usuario = $user;        
        return view('auth.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formulario = array(
            'rolesList' =>  rol::all(),
            'departamentosList' =>  departamento::all(),
            'User' => User::find($id)
        );
        return view('auth.editar', $formulario );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Usuario = User::find($id);
        $Usuario->fill($request->all());
        $Usuario->save();
        return redirect()->action(
            'UserController@detalle', ['id' => $Usuario->id]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
