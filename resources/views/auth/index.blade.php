@extends('layouts.menu')
@section('contenido')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de usuarios</div>            
                <table class="table table-hover">
                <tr>
                    <td><strong>Email: </strong></td>
                    <td><strong>Nombre: </strong></td>
                </tr>
                @foreach($usuarios as $usuario)
                <tr>
                    <td><p>{{ $usuario->email }}</p></td>
                    <td><p>{{ $usuario->nombre }} {{ $usuario->ape_paterno }}</p></td>
                </tr>
                @endforeach
                </table>                        
            </div>
            {{$usuarios->links()}}
        </div>
@endsection