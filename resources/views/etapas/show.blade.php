@extends('layouts.menu')
@section('contenido')

<div class="row">
<div class="col-md-offset-2 col-md-8 ">
  <div class="panel panel-primary">    
    <div class="panel-body">
      <h4 class="text-center"> {{$proyecto->nombre}} </h4>
      <p>{{$proyecto->observaciones}}</p>
      <div class="row">
        <div class="col-md-6"><strong>Responsable: </strong>{{$proyecto->user->Full_Name}}</div> 
        <div class="col-md-6"><strong>Cantidad de etapas: </strong>{{count($etapas)}}</div>         
      </div>
      <div style="float: left;">
        <a href="{{ route('proyecto.index') }}"><span class="glyphicon glyphicon-circle-arrow-left"></span> Volver a los proyectos</a>
      </div>
      <div style="float: right;">
        <a href="{{route('etapa.crear', $proyecto->id)}}">Agregar Etapa <span class="glyphicon glyphicon-plus"></span></a>
      </div>
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
            <div class="panel panel-primary">
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