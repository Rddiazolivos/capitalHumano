@extends('layouts.menu')
@section('contenido')
        <div class="col-md-11 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de actividades</div>                
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <div class='row'>
                    <div class="col-md-12">
                        <form class='navbar-form ' role='search' method="GET" action="{{ route('actividad.ver') }}">
                            <div class="row">
                                <div class="col-md-8">
                                    <select name="estado_id" id="estado_id" class="form-control">         
                                      @foreach($estados as $estado)
                                        <option value="{{ $estado->id }}" @if($estado->id==old('estado_id', $estado_id)) selected='selected' @endif > {{ "Actividades ". $estado->nombre ."s"}}</option>
                                      @endforeach
                                    </select>
                                    <select name="proyecto_id" id="proyecto_id" class="form-control">
                                        <option value="all" @if(10==old('proyecto_id', $proyecto_id)) selected='selected' @endif > -Proyectos- </option>         
                                      @foreach($proyectos as $proyecto)
                                        <option value="{{ $proyecto->id }}" @if($proyecto->id==old('proyecto_id', $proyecto_id)) selected='selected' @endif > {{  $proyecto->nombre }}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 input-group form-group">
                                    <input type='text' class='form-control' placeholder='Buscar' name="scope" value="{{ old('scope', $scope) }}">
                                    <div class="input-group-btn">
                                        <button type='submit' class='btn btn-default' id='botonFiltro'><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                            </div>                         
                        </form>
                        </div>
                    </div>
                    </div>
                    @if(count($pendientes)>0)          
                    <table class="table table-hover">
                    <tr>
                        <td><strong>Número: </strong></td>
                        <td><strong>Nombre: </strong></td>
                        <td class='text-center'><strong>Prioridad: </strong></td>
                        <td class='text-center'><strong>Estado: </strong></td>
                    </tr>
                    @foreach($pendientes as $actividad)
                    <tr>
                        <td>{{ $actividad->id_acti }}</td>
                        <td><p>{{ $actividad->nombre }}</p></td>
                        <td><p class='text-center'>{{ $actividad->prioridad->nombre }}</p></td>
                        <td><p class='text-center'>{{ $actividad->estado->nombre }}</p></td>
                        <td><a data-toggle="tooltip" title="Ver Actividad" href="{{ route('comentario.crear', $actividad->id_acti) }}"><span class="glyphicon glyphicon-eye-open text-success"></span></a></td>                        
                    </tr>
                    @endforeach
                    </table>
                    {{ $pendientes->appends(Request::all())->links() }}
                    @endIf            
                </div>
            </div>           
        </div>
@endsection