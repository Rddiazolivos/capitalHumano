<?php

namespace sdv\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use sdv\rol;

class VerificarRol
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    private $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id_rol = $this->auth->user()->rol_id;
        $rol_nombre = rol::find($id_rol)->nombre;
        if ($rol_nombre === 'Evaluador') {
            $this->auth->logout();
            if ($request->ajax()){
                return response('Unauthorized.', 401);
            }else{
                return redirect()->to('login');
            }
        }
        return $next($request);
    }
}
