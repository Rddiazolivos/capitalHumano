@extends('layouts.menu')
@section('contenido')
    <div class="col-md-11 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Listado de actividades</div>                
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="container-fluid">
                    <div class='row'>
                        <form class='form-inline' role='search' method="GET" action="{{ route('actividad.all') }}">
                            <div class="col-md-6 form-group">
                                <select name="estado_id" id="estado_id" class="form-control">
                                    <option value="10" @if(10==old('estado_id', $estado_id)) selected='selected' @endif > Todas</option>         
                                  @foreach($estados as $estado)
                                    <option value="{{ $estado->id }}" @if($estado->id==old('estado_id', $estado_id)) selected='selected' @endif > {{ "Actividades ". $estado->nombre ."s"}}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 input-group form-group">
                                <input type='text' class='form-control' placeholder='Buscar' name="scope" value="{{ old('scope', $scope) }}">
                                <div class="input-group-btn">
                                    <button type='submit' class='btn btn-default' id='botonFiltro'><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>                    
                        </form>
                    </div>
                </div>
            </div>
            @if(count($todas)>0)
            <div class="table-responsive">           
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>Prioridad</th>
                            <th><strong>Estado</th>
                            <th></th>
                        </tr>
                    </thead>                    
                    @foreach($todas as $actividad)
                    <tr class="centrar">
                        <td>{{ $actividad->id }}</td>
                        <td>{{ $actividad->nombre }}</td>
                        <td>{{ $actividad->prioridad->nombre }}</td>
                        <td>{{ $actividad->estado->nombre }}</td>
                        <td><a data-toggle="tooltip" title="Ver Actividad" href="{{ route('comentario.crear', $actividad->id) }}"><span class="glyphicon glyphicon-eye-open text-success"></span></a></td>                        
                    </tr>
                    @endforeach
                </table>
            </div>
            {{ $todas->appends(Request::all())->links() }}
            @endIf            
        </div>       
    </div>
@endsection