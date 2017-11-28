@extends('layouts.menu')
@section('contenido')

<div class="row">
<div class="col-md-offset-2 col-md-8 ">
  <div class="panel panel-primary">    
    <div class="panel-body">
      <h4 class="text-center"> {{$proyecto->nombre}} </h4>
      <p>{{$proyecto->observaciones}}</p>
      <div class="row">
        <div class="col-md-6 col-sm-6"><strong>Estado: </strong>{{$proyecto->estado->nombre}}</div>
        <div class="col-md-6 col-sm-6"><strong>Responsable: </strong>{{$proyecto->user->Full_Name}}</div>         
        <div class="col-md-6 col-sm-6"><strong>Cantidad de etapas: </strong>{{count($etapas)}}</div>
        <div class="col-md-6 col-sm-6"><strong>Cantidad de etapas pendientes: </strong>{{$proyecto->etapasPendientes()}}</div>
      </div>

    @if(count($etapas) == 0)
      <div class="text-center">
          <form action='{{ route('proyecto.destroy' , $proyecto->id) }}' method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> </span> Eliminar proyecto</button>
          </form>
      </div>
    @else
        @if($proyecto->estado_id == 1)
        <div class="text-center">
          @if($proyecto->etapasPendientes() == 0)
          <a href="{{ route('proyecto.estado' , $proyecto->id) }}"  class="btn btn-danger active btn-xs" role="button">Cerrar proyecto</a>
          @else
          <div data-toggle="tooltip" title="Posee etapas pendientes">
              <a href="#"  class="btn btn-danger disabled btn-xs" role="button">Cerrar proyecto</a>
          </div>            
          @endif
        </div>
        @elseif($proyecto->estado_id == 2)
        <div class="text-center">
          <a href="{{ route('proyecto.estado' , $proyecto->id) }}"  class="btn btn-warning active btn-xs" role="button">Reabrir proyecto</a>
        </div>
        @endif
    @endif

      <div style="float: left;">
        <a href="{{ route('proyecto.index') }}"><span class="glyphicon glyphicon-circle-arrow-left"></span> Volver a los proyectos</a>
      </div>
      @if($proyecto->estado_id == 1)
      <div style="float: right;">
        <a href="{{route('etapa.crear', $proyecto->id)}}">Agregar Etapa <span class="glyphicon glyphicon-plus"></span></a>
      </div>
      @endif
    </div>
  </div>
</div>

@if(count($etapas) == 0)
<div class="col-md-12">
  <div class="jumbotron text-center animated zoomInDown">
    <h1>No posee etapas.</h1>
    <div class="animated infinite pulse"> 
      <a href="{{route('etapa.crear', $proyecto->id)}}">Agregar Etapa <span class="glyphicon glyphicon-plus"></span></a>
    </div>
  </div>
</div>
@else
<div class='row'>
    <div class="col-md-12">
        <form class='navbar-form ' role='search' method="GET" action="">
            <div class="row">
                <div class="col-md-5 col-md-offset-7 input-group">
                    <input type='text' class='form-control' placeholder='Buscar' name="scope" value="">
                    <div class="input-group-btn">
                        <button type='submit' class='btn btn-default' id='botonFiltro'>
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </div>                         
        </form>
    </div>
</div>
<div class="row">  
    @foreach($etapas as $etapa)                
        <div class="col-sm-6 col-md-6">
            @if($etapa->estado_id == 1)
            <div class="panel panel-primary">
            @else
            <div class="panel panel-info">
            @endif
                <div class="panel-heading">{{ $etapa->nombre }}</div>
                <div class="panel-body">
                    <!-- Para contenr el limeite de caractes de comentarios-->
                    <p>{{ str_limit( $etapa->observaciones, $limit = 120, $end = ' ...') }}</p>
                    <!--<p>Porcentaje de avance: {{$etapa->porcentaje}}%</p>-->
                    <p><strong>Estado: </strong>{{ $etapa->estado->nombre }}</p>
                    <p><strong>Fecha de inicio: </strong>{{ \Carbon\Carbon::parse($etapa->fec_creacion)->format('d/m/Y') }} - <strong>Fecha de término: </strong>{{ \Carbon\Carbon::parse($etapa->fec_termino)->format('d/m/Y')}}</p>
                    <a href="{{ route('actividad.show', $etapa->id) }}" class="btn btn-default btn-block" role="button"><span class="glyphicon glyphicon-folder-open text-primary"></span>  Inspeccionar</a>
                </div>
            </div>
        </div>                
    @endforeach 
</div> 
{{$etapas->links()}} 

</div>
@endif
@endsection