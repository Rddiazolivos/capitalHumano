@extends('layouts.menu')
@section('contenido')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading text-center">Datos</div>

                <div class="panel-body">
                <div class="container-fluid">
                	<div class="row">
                		<div class="text-center">{{ $usuario->full_name }}</div>
                	</div>
                	<div class="row">
                        <div class="col-md-6"><strong>Rut: </strong>{{ $usuario->rut }}</div>
                		<div class="col-md-6"><strong>Fecha de nacimiento: </strong>{{ $usuario->fec_nacimiento }}</div>                		
                	</div>
                	<div class="row">
                		<div class="col-md-6"><strong>Email: </strong>{{ $usuario->email }}</div>
                        <div class="col-md-6"><strong>Perfil de cuenta: </strong>{{ $usuario->rol->nombre }}</div>
                	</div>
                	<div class="row">
                		<div class="col-md-6"><strong>Departamento: </strong>{{ $usuario->departamento->nombre }}</div>
                		<div class="col-md-6"><strong>Fecha de ingreso: </strong>{{ $usuario->fec_ingreso }}</div>
                	</div>
                	<div class="row">                		
                        <div class="col-md-6"><strong>Estado: </strong>{{ $usuario->Condicion_nombre }}</div>
                	</div>
                </div>
                </div>
            </div>
        </div>
@endsection