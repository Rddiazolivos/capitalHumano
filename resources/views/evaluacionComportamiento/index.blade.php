@extends('layouts.menu')
@section('contenido')
@if(count($proyectos) == 0)
<div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">No posee proyectos para evaluar</div>
        </div>
</div>
@else
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Evaluaciones</div>
        </div>        
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @foreach($proyectos as $proyecto)
                    <div class="panel panel-primary df" id="{{$proyecto->id}}">
                        <span role="button">
                            <div class="panel-body">{{$proyecto->nombre}}</div>
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>             
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div id="todo">
                        <div class="panel panel-info">
                            <div class="panel-heading">Seleccione un proyecto</div>
                        </div>                        
                    </div>                    
                </div>
            </div>     
        </div>
    </div>
@endif

@endsection