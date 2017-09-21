@extends('layouts.menu')
@section('contenido')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Usuario</div>

                <div class="panel-body">
                    <strong>Nombre: </strong><p>{{ $usuario->nombre }}</p>
                </div>
            </div>
        </div>
@endsection