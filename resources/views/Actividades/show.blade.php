@extends('layouts.menu')
@section('contenido')
<div class="row">
    <div class="col-md-offset-2 col-md-8 ">
      <div class="panel panel-primary">    
        <div class="panel-body">
          <h4 class="text-center"> {{$etapa->nombre}} </h4>
          <p>{{$etapa->observaciones}}</p>
          <div class="row">
            <div class="col-md-6 col-sm-6"><strong>Estado etapa: </strong>{{$etapa->estado->nombre}}</div>          
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6"><strong>Cantidad de actividades: </strong>{{count($actividades)}}</div>
            <div class="col-md-6 col-sm-6"><strong>Cantidad de actividades pendientes: </strong>{{$etapa->actividadesPendientes()}}</div>
            <div class="col-md-6 col-sm-6"><strong>Evaluaciones realizadas: </strong>{{$etapa->actividadesEvaRealizadas()}}</div>
            <div class="col-md-6 col-sm-6"><strong>Evaluaciones pendientes: </strong>{{$etapa->actividadesEvaPendientes()}}</div>
          </div>

    @if(count($actividades) == 0)
      <div class="text-center">
          <form action='{{ route('etapa.destroy' , $etapa->id) }}' method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> </span> Eliminar etapa</button>
          </form>
      </div>
    @else  
          @if($etapa->estado_id == 1)
          <div class="text-center">
            @if($etapa->actividadesPendientes() == 0)
            <a href="{{ route('etapa.estado' , $etapa->id) }}"  class="btn btn-danger active btn-xs" role="button">Cerrar Etapa</a>
            @else
            <div data-toggle="tooltip" title="Posee actividades pendientes">
                <a href="#"  class="btn btn-danger disabled btn-xs" role="button">Cerrar Etapa</a>
            </div>            
            @endif
          </div>
          @elseif($etapa->estado_id == 2)
          <div class="text-center">
            <a href="{{ route('etapa.estado' , $etapa->id) }}"  class="btn btn-warning active btn-xs" role="button">Reabrir Etapa</a>
          </div>
          @endif
    @endif

          <div style="float: left;">
            <a href="{{ route('etapa.show' , $etapa->proyecto->id) }}"><span class="glyphicon glyphicon-circle-arrow-left"></span> Volver a las etapas</a>
          </div>
          @if($etapa->estado_id == 1)          
          <div style="float: right;">
            <a href="{{ route('actividad.crear' , $id_etapa) }}">Agregar Actividad <span class="glyphicon glyphicon-plus"></span></a>
          </div>
          @endif
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
                                <!--Evaluar  -->
                                @if($actividad->evaluacion == null && $actividad->estado_id == 2)
                                <a data-toggle="tooltip" title="Evaluar Actividad" href="{{ route('evaluar.crear' , $actividad->id) }}"><span class="glyphicon glyphicon-education text-danger"></span></a>
                                @elseif($actividad->evaluacion <> null && $actividad->estado_id == 2)
                                <a data-toggle="tooltip" title="Editar evaluación" href="{{ route('evaluar.edit' ,  $actividad->evaluacion->id) }}"><span class="glyphicon glyphicon-education text-primary"></span></a>
                                @endif
                                @if($actividad->asignacion == 0 && $actividad->estado_id == 1)
                                <!-- asignar responsable -->
                                <a data-toggle="tooltip" title="Asignar responsable" href="{{ route('responsable.crear' , $actividad->id) }}"><span class="glyphicon glyphicon-check text-danger"></span></a>
                                @elseif($actividad->asignacion == 1 && $actividad->estado_id == 1)
                                <a data-toggle="tooltip" title="Editar responsable" href="{{ route('responsable.editar' , $actividad->id) }}"><span class="glyphicon glyphicon-check glyphicon-check text-primary"></span></a>
                                @endif
                                @if($actividad->asignacion)
                                    <!-- Para comentar -->
                                    <a data-toggle="tooltip" title="Ver Actividad" href="{{ route('comentario.crear', $actividad->id) }}"><span class="glyphicon glyphicon-eye-open text-success"></span></a>
                                @endif
                                <!--Para eliminar-->
                                @if($actividad->estado_id == 1 &&  count($actividad->comentario) == 0 && count($actividad->responsables) == 0)
                                <form action="{{ route('actividad.destroy' , $actividad->id) }}" method="POST" style='display:inline;'>
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar actividad"><span class="glyphicon glyphicon-trash"></span></button>
                                </form>
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