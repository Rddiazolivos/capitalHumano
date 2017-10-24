@extends('layouts.menu')
@section('contenido')
<div class="container-fluid">
  <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de actividades
                    <div style="float: right;">
                    <a data-toggle="tooltip" title="Agregar Actividad" href="{{ route('actividad.crear' , $id_etapa) }}"><span style="font-size:1.5em;" class="glyphicon glyphicon-plus-sign text-success"></span></a>
                  </div>
                </div>
            </div>
                @if(count($pendientes)>0)
                <div class='row'>
                    <div class="col-md-12">
                        <form class='navbar-form ' role='search' method="GET" action="{{ route('actividad.show', $id_etapa) }}">
                            <div class="row">
                                <div class="col-md-5 col-md-offset-7 input-group">
                                    <input type='text' class='form-control' placeholder='Buscar' name="scope" value="{{ old('scope', $scope) }}">
                                    <div class="input-group-btn">
                                        <button type='submit' class='btn btn-default' id='botonFiltro'><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                            </div>                         
                        </form>
                    </div>
                </div>
                @endif
        @if(count($pendientes)>0)
            <div class='row'>
                <div class="col-md-12">
                    <div class="panel panel-default">                        
                    <div class="table-responsive">          
                        <table class="table table-hover">
                        <tr>
                            <td><strong>N°: </strong></td>
                            <td><strong>Nombre: </strong></td>
                            <td class='text-center'><strong>Prioridad: </strong></td>
                            <td class='text-center'><strong>Estado: </strong></td>
                            <td class='text-center'><strong>Acciones: </strong></td>
                        </tr>
                        @foreach($pendientes as $actividad)
                        <tr>
                            <td>{{ $actividad->id }}</td>
                            <td><p>{{ $actividad->nombre }}</p></td>
                            <td><p class='text-center'>{{ $actividad->prioridad->nombre }}</p></td>
                            <td><p class='text-center'>{{ $actividad->estado->nombre }}</p></td>
                            <td class='text-center'>                            
                                <a data-toggle="tooltip" title="Ver Actividad" href="{{ route('comentario.crear', $actividad->id) }}"><span class="glyphicon glyphicon-eye-open text-success"></span></a>
                                @if($actividad->estado_id == 2 && $actividad->asignacion)
                                    @if($actividad->evaluacion_id == null)
                                    <a data-toggle="tooltip" title="Evaluar Actividad" href="{{ route('evaluar.crear' , $actividad->id) }}"><span class="glyphicon glyphicon-education text-danger"></span></a>
                                    @else
                                    <a data-toggle="tooltip" title="Editar evaluación" href="{{ route('evaluar.editar' , [$actividad->id , $actividad->evaluacion_id]) }}"><span class="glyphicon glyphicon-education text-primary"></span></a>
                                    @endif
                                @endif
                                @if($actividad->asignacion == 0)
                                <a data-toggle="tooltip" title="Asignar responsable" href="{{ route('responsable.crear' , $actividad->id) }}"><span class="glyphicon glyphicon-check text-danger"></span></a>
                                @elseif($actividad->asignacion == 1)
                                <a data-toggle="tooltip" title="Editar responsable" href="{{ route('responsable.editar' , $actividad->id) }}"><span class="glyphicon glyphicon-check text-primary"></span></a>
                                @endif
                            </td>                        
                        </tr>
                        @endforeach
                        </table>
                    </div>
                        {{ $pendientes->appends(Request::all())->links() }}
                                  
                    </div>
                </div> 
            </div>
         @endIf              
        </div>
    </div>
</div>
@endsection