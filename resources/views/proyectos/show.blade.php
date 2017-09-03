@extends('layouts.menu')
@section('contenido')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Proyecto</div>

                <div class="panel-body">
                    <strong>Nombre: </strong><p>{{ $proyecto->nombre }}</p>
                    <strong>Fecha de creación: </strong><p>{{ \Carbon\Carbon::parse($proyecto->fec_creaacion)->format('d/m/Y') }}</p>
                    <strong>Fecha de termino: </strong><p>{{ \Carbon\Carbon::parse($proyecto->fec_termino)->format('d/m/Y')}}</p>
                    <strong>Observación: </strong><p>{{ $proyecto->observaciones }}</p>
                    <strong>Encargado: </strong><p>{{ $proyecto->user->nombre }}</p>
                </div>
            </div>
        </div>
@endsection
