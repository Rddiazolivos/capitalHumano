@extends('layouts.menu')
@section('contenido')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de actividades
                    <div style="float: right;">
                    <a data-toggle="tooltip" title="Agregar Actividad" href="{{ route('actividad.create') }}"><span style="font-size:1.5em;" class="glyphicon glyphicon-plus-sign text-success"></span></a>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Actividades Pendientes</div> 
                    @if(count($pendientes)>0)          
                    <table class="table table-hover">
                    <tr>
                        <td><strong>Nombre: </strong></td>
                        <td class='text-center'><strong>Prioridad: </strong></td>
                    </tr>
                    @foreach($pendientes as $actividad)
                    <tr>
                        <td><p>{{ $actividad->nombre }}</p></td>
                        <td><p class='text-center'>{{ $actividad->prioridad->nombre }}</p></td>
                        <td><a data-toggle="tooltip" title="Editar Actividad" href="{{ route('actividad.edit',$actividad->id) }}"><span class="glyphicon glyphicon-pencil text-warning"></span></a></td>
                        <td><form action="/actividad/{{ $actividad->id }}" method="post">
                                {{ method_field('delete') }}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <a data-toggle="tooltip" title="Borrar Actividad" href="#" onclick="this.parentNode.submit(); return false;"><span class="glyphicon glyphicon-trash text-danger"></span></a>
                            </form>
                        </td>                        
                    </tr>
                    @endforeach
                    </table>
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
                        <td><a data-toggle="tooltip" title="Editar Actividad" href="{{ route('actividad.create') }}"><span class="glyphicon glyphicon-pencil text-warning"></span></a></td> 
                    </tr>
                    @endforeach
                    </table> 
                    @endIf           
                </div>
            </div>           
        </div>
@endsection