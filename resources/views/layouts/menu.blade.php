@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="menu">
        <div class="col-sm-3 col-md-3">

            <div class="panel-group menu-desktop" id="accordion">
            @if ( Auth::user()->rol->nombre === 'Administrador')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                            </span> Usuarios</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-user text-primary"></span><a href="{{ url('/register') }}">Registrar</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-tasks text-primary"></span><a href="{{ url('/usuario') }}">Usuarios registrados</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
            @if ( Auth::user()->rol->nombre === 'Administrador' || Auth::user()->rol->nombre === 'Evaluador')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th"></span>Proyectos</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-list text-primary"></span><a href="{{ route('proyecto.index') }}">Mis proyectos </a><span class="label label-info">
                                        {{ DB::table('proyectos')
                                        ->where('user_id', Auth::user()->id)
                                        ->count() }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-list text-primary"></span><a href="{{ route('proyecto.create') }}">Crear proyecto</a>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            @endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#actividadesEvaluado"><span class="glyphicon glyphicon-list-alt"></span>Actividades</a>
                        </h4>
                    </div>
                    <div id="actividadesEvaluado" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-list text-primary"></span><a href="{{ route('actividad.ver') }}">Actividades asignadas  </a><span class="label label-info"> {{ DB::table('actividades')
                                        ->join('responsables', 'actividades.id', '=', 'responsables.actividad_id')
                                        ->where('estado_id', '1')
                                        ->where('responsables.responsable_id', Auth::user()->id)
                                        ->count() }}</span>
                                    </td>
                                </tr>
                                @if ( Auth::user()->rol->nombre === 'Administrador' || Auth::user()->rol->nombre === 'Evaluador')
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-list text-primary"></span><a href="{{ route('actividad.all') }}">Listar actividades</a>
                                    </td>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-file">
                            </span>Reportes</a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">                                
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-tasks"></span><a href="{{ route('reporte.trabajador') }}">Reporte por trabajador</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-print text-primary"></span><a href="{{ route('reporte.actividad') }}">Reporte avance actividades</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-user">
                            </span>Cuenta</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="{{ route('usuario.show') }}">Mi cuenta</a>
                                    </td>
                                </tr>
                                <!--<tr>
                                    <td>
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                        ¿Cambiar Contraseña
                                        </a>
                                    </td>
                                </tr>-->
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-trash text-danger"></span>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="text-danger">
                                            Cerrar sesión
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
        <div class="col-sm-9 col-md-9">
            @yield('contenido')
        </div>
    </div>
</div>
@endsection