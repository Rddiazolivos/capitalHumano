@section('estiloPersonalisado')
  <link href="{{ asset('css/estiloEtapas.css') }}" rel="stylesheet">
@endsection

@extends('layouts.menu')
@section('contenido')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Listado de usuarios</div>
        </div>
        <div class="panel panel-default">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Nombre y apellidos</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach($usuarios as $usuario)
                <tbody class="centrar">                        
                    <tr @if($usuario->condicion == 0) class="danger" @endif>
                        <td><p>{{ $usuario->email }}</p></td>
                        <td><p>{{ $usuario->full_name }}</p></td>
                        <td><p>{{ $usuario->condicion_nombre }}</p></td>
                        <td>
                            <a href="{{ route('usuario.detalle', $usuario->id) }}">
                                <i class="icon-lg ion-eye"></i>
                            </a>
                            <a href="{{ route('usuario.edit', $usuario->id) }}">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                        </td>                     
                    </tr>
                </tbody>                    
                @endforeach
            </table>                                    
            {{$usuarios->links()}}
        </div>
    </div>
@endsection