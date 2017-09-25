@extends('layouts.menu')
@section('contenido')
        <div class="col-md-11 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de actividades</div>                
            </div>
            <div class="col-md-13">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <div class='row'>
                    <div class="col-md-11">
                        Actividades Pendientes
                        <form class='navbar-form navbar-right' role='search' method="GET" action="{{ route('actividad.ver') }}">
                            <div class='form-group'>
                                <input type='text' class='form-control' placeholder='Buscar' name="scope" value="{{ old('scope', $scope) }}">
                            </div>
                            <button type='submit' class='btn btn-default'>Buscar</button>
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
                        <td>{{ $actividad->id }}</td>
                        <td><p>{{ $actividad->nombre }}</p></td>
                        <td><p class='text-center'>{{ $actividad->prioridad->nombre }}</p></td>
                        <td><p class='text-center'>{{ $actividad->estado->nombre }}</p></td>
                        <td><a data-toggle="tooltip" title="Ver Actividad" href="{{ route('comentario.crear', $actividad) }}"><span class="glyphicon glyphicon-eye-open text-success"></span></a></td>                        
                    </tr>
                    @endforeach
                    </table>
                    {{ $pendientes->links() }}
                    @endIf            
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Actividades Terminadas</div> 
                    @if(count($terminadas)>0)          
                    <table class="table table-hover">                    
                    <tr>
                        <td><strong>Nombre: </strong></td>
                        <td class='text-center'><strong>Prioridad: </strong></td>                        
                    </tr>                    
                    @foreach($terminadas as $actividad)
                    <tr>
                        <td><p>{{ $actividad->nombre }}</p></td>
                        <td><p class='text-center'>{{ $actividad->prioridad->nombre }}</p></td>
                        <td><a data-toggle="tooltip" title="Ver Actividad" href="{{ route('actividad.edit',$actividad->id) }}"><span class="glyphicon glyphicon-eye-open text-success"></span></a></td> 
                    </tr>
                    @endforeach
                    </table> 
                    @endIf           
                </div>
            </div>           
        </div>
@endsection