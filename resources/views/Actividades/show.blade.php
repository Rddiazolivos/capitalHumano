@extends('layouts.menu')
@section('contenido')
<div class="row">
    <div class="col-md-offset-2 col-md-8 ">
      <div class="panel panel-primary">    
        <div class="panel-body">
          <h4 class="text-center"> {{$etapa->nombre}} </h4>
          <p>{{$etapa->observaciones}}</p>
          <div class="row">
            <div class="col-md-6"><strong>Cantidad de actividades: </strong>{{count($actividades)}}</div>         
          </div>
          <div style="float: left;">
            <a href="{{ route('etapa.show' , $etapa->proyecto->id) }}"><span class="glyphicon glyphicon-circle-arrow-left"></span> Volver a las etapas</a>
          </div>
          <div style="float: right;">
            <a href="{{ route('actividad.crear' , $id_etapa) }}">Agregar Actividad <span class="glyphicon glyphicon-plus"></span></a>
          </div>
        </div>
      </div>
    </div>
@if(count($actividades) == 0)
<div class="col-md-12">
  <div class="jumbotron text-center animated zoomInDown">
    <h1>No posee Actividades.</h1>
    <div class="animated infinite pulse">
        <a href="{{route('actividad.crear', $id_etapa)}}">Agregar Actividad <span class="glyphicon glyphicon-plus"></span></a>
    </div>     
  </div>
</div>
@else
        <div class="col-md-12">
                @if(count($actividades)>0)
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
        @if(count($actividades)>0)
            <div class='row'>
                <div class="col-md-12">
                    <div class="panel panel-default">                        
                    <div class="table-responsive">          
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre</th>
                                    <th>Prioridad</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>                        
                        @foreach($actividades as $actividad)
                        <tr class="centrar">
                            <td>{{ $actividad->id }}</td>
                            <td>{{ $actividad->nombre }}</td>
                            <td>{{ $actividad->prioridad->nombre }}</td>
                            <td>{{ $actividad->estado->nombre }}</td>
                            <td>                            
                                <a data-toggle="tooltip" title="Ver Actividad" href="{{ route('comentario.crear', $actividad->id) }}"><span class="glyphicon glyphicon-edit text-success"></span></a>
                                @if($actividad->estado_id == 2 && $actividad->asignacion)
                                    @if($actividad->evaluacion_id == null)
                                    <a data-toggle="tooltip" title="Evaluar Actividad" href="{{ route('evaluar.crear' , $actividad->id) }}"><span class="glyphicon glyphicon-education text-danger"></span></a>
                                    @else
                                    <a data-toggle="tooltip" title="Editar evaluación" href="{{ route('evaluar.editar' , [$actividad->id , $actividad->evaluacion_id]) }}"><span class="glyphicon glyphicon-education text-primary"></span></a>
                                    @endif
                                @endif
                                @if($actividad->asignacion == 0 && $actividad->estado_id == 1)
                                <a data-toggle="tooltip" title="Asignar responsable" href="{{ route('responsable.crear' , $actividad->id) }}"><span class="glyphicon glyphicon-check text-danger"></span></a>
                                @elseif($actividad->asignacion == 1 && $actividad->estado_id == 1)
                                <a data-toggle="tooltip" title="Editar responsable" href="{{ route('responsable.editar' , $actividad->id) }}"><span class="glyphicon glyphicon-check text-primary"></span></a>
                                @endif
                            </td>                        
                        </tr>
                        @endforeach
                        </table>
                    </div>
                        {{ $actividades->appends(Request::all())->links() }}
                                  
                    </div>
                </div> 
            </div>
         @endIf              
        </div>
</div>
@endif
@endsection