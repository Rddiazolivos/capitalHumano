@extends('layouts.menu')
@section('contenido')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de proyectos</div>            
                <table class="table table-hover">
                <tr>
                    <td><strong>Nombre: </strong></td>
                    <td class='text-center'><strong>Avance: </strong></td>
                </tr>
                @foreach($proyectos as $proyecto)
                <tr>
                    <td><p>{{ $proyecto->nombre }}</p></td>
                    <td><p class='text-center'>{{ $proyecto->porcentaje }}%</p></td>
                    <td><a href="{{ route('etapa.show', $proyecto->id) }}"><span class="glyphicon glyphicon-folder-open"></span></a></td>
                </tr>
                @endforeach
                </table>            
            {{$proyectos->links()}}
            </div>
        </div>
@endsection