@extends('layouts.menu')
@section('contenido')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Proyecto</div>
                @foreach($proyectos as $proyecto)
                <div class="panel-body">
                    <strong>Nombre: </strong><p>{{ $proyecto->nombre }}</p>
                </div>
                @endforeach
            </div>
            {{$proyectos->links()}}
        </div>
@endsection