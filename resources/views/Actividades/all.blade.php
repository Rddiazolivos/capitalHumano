@extends('layouts.menu')
@section('contenido')
    <div class="col-md-11 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Listado de actividades</div>                
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="container-fluid">
                    <div class='row'>
                        <form class='form-inline' role='search' method="GET" action="{{ route('actividad.all') }}">
                            <div class="col-md-8 form-group">
                                <select name="estado_id" id="estado_id" class="form-control">
                                    <option value="10" @if(10==old('estado_id', $estado_id)) selected='selected' @endif > Todas</option>         
                                  @foreach($estados as $estado)
                                    <option value="{{ $estado->id }}" @if($estado->id==old('estado_id', $estado_id)) selected='selected' @endif > {{ "Actividades ". $estado->nombre ."s"}}</option>
                                  @endforeach
                                </select>
                                <select name="proyecto_id" id="proyecto_id" class="form-control">
                                    <option value="all" @if(10==old('proyecto_id', $proyecto_id)) selected='selected' @endif > -Proyectos- </option>         
                                  @foreach($proyectos as $proyecto)
                                    <option value="{{ $estado->id }}" @if($estado->id==old('proyecto_id', $proyecto_id)) selected='selected' @endif > {{ "Actividades ". $proyecto->nombre }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 input-group form-group">
                                <input type='text' class='form-control' placeholder='Buscar' name="scope" value="{{ old('scope', $scope) }}">
                                <div class="input-group-btn">
                                    <button type='submit' class='btn btn-default' id='botonFiltro'><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>                    
                        </form>
                    </div>
                </div>
            </div>
            @if(count($todas)>0)
            <div class="table-responsive">           
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>Prioridad</th>
                            <th><strong>Estado</th>
                            <th></th>
                        </tr>
                    </thead>                    
                    @foreach($todas as $actividad)
                    <tr class="centrar">
                        <td>{{ $actividad->id }}</td>
                        <td>{{ $actividad->nombre }}</td>
                        <td>{{ $actividad->prioridad->nombre }}</td>
                        <td>{{ $actividad->estado->nombre }}</td>
                        <td>
                            @if($actividad->estado_id == 2 && $actividad->asignacion)
                                @if($actividad->evaluacion_id == null)
                                <a data-toggle="tooltip" title="Evaluar Actividad" href="{{ route('evaluar.crear' , $actividad->id) }}"><span class="glyphicon glyphicon-education text-danger"></span></a>
                                @else
                                <a data-toggle="tooltip" title="Editar evaluación" href="{{ route('evaluar.editar' , [$actividad->id , $actividad->evaluacion_id]) }}"><span class="glyphicon glyphicon-education text-primary"></span></a>
                                @endif
                            @endif
                            <a data-toggle="tooltip" title="Ver Actividad" href="{{ route('comentario.crear', $actividad->id) }}"><span class="glyphicon glyphicon-eye-open text-success"></span></a>
                        </td>                        
                    </tr>
                    @endforeach
                </table>
            </div>
            {{ $todas->appends(Request::all())->links() }}
            @endIf            
        </div>       
    </div>
@endsection