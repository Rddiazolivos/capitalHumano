@extends('layouts.menu')
@section('contenido')
@if(count($proyectos) == 0)
<div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">No posee proyectos para evaluar</div>
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
        <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="panel panel-success">
                <div class="panel-heading">{{ $proyecto->nombre }}</div>
                <div class="panel-body">
                    <!-- Para contenr el limeite de caractes de comentarios-->
                    <p>{{ str_limit($proyecto->observaciones, $limit = 40, $end = ' ...') }}</p>
                    <p>Evaluaciones realizadas: {{count($proyecto->respuestas)}}</p>
                    <a href="{{ route('evaluacion.ver', $proyecto->id) }}" class="btn btn-default btn-block" role="button"><span class="glyphicon glyphicon-folder-open text-primary"></span>  Evaluaciones</a>
                </div>
            </div>
        </div>                
    @endforeach 
</div>
{{$proyectos->links()}}  
@endif

@endsection