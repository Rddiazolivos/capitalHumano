@extends('layouts.menu')
@section('contenido')
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
                    </div>                    
                </div>
            </div>     
        </div>
    </div>


@endsection