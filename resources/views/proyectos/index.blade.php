@extends('layouts.menu')
@section('contenido')
@if(count($proyectos) == 0)

<div class="col-md-12">
  <div class="jumbotron text-center">
    <h1>No posee proyectos.</h1> 
    <a href="{{ route('proyecto.create') }}" class="btn btn-success" role="button">Ir a crear proyecto</a>
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
    @foreach($proyectos as $proyecto)                
        <div class="col-sm-6 col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ $proyecto->nombre }}</div>
                <div class="panel-body">
                    <!-- Para contenr el limeite de caractes de comentarios-->
                    <p>{{ str_limit($proyecto->observaciones, $limit = 120, $end = ' ...') }}</p>
                    <p>Porcentaje de avance: {{$proyecto->porcentaje}}%</p>
                    <a href="{{ route('etapa.show', $proyecto->id) }}" class="btn btn-default btn-block" role="button"><span class="glyphicon glyphicon-folder-open text-primary"></span>  Inspeccionar</a>
                </div>
            </div>
        </div>                
    @endforeach 
</div>
{{$proyectos->links()}}  
@endif                
          
@endsection