@extends('layouts.menu')

@section('contenido')
<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">                    

                    <div class="row">
                        <div class="col-md-8"><strong>Nombre: </strong>{{$actividad->nombre}}</div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-7" id="estadoTexto"><strong>Estado: </strong>{{$actividad->estado->nombre}}</div>
                                <div class="col-md-5">
                                <!-- Trigger the modal with a button -->
                                @if($actividad->estado_id == 1)
                                <button id="btnModal" type="button" class="btn btn-link btn-xs" data-toggle="modal" data-target="#modalFinalizar">Cambiar</button>
                                @elseif($actividad->estado_id == 2)
                                <button id="btnModal" type="button" class="btn btn-link btn-xs" data-toggle="modal" data-target="#modalReanuadar">Cambiar</button>
                                @endif
                                
                                </div>
                            </div>
                                                        
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12"><strong>Descripción: </strong>{{$actividad->descripcion}}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><strong>Fecha entrega: </strong>{{$actividad->fec_entrega}}</div>
                        <div class="col-md-4"><strong>Prioridad: </strong>{{$actividad->prioridad->nombre}}</div>
                        <div class="col-md-4"><strong>Tipo: </strong>{{$actividad->tipo->nombre}}</div>
                    </div> 
                </div>
                <div class="panel-body">                    

                    <!-- The scrollable area -->
                    <div class="panel panel-info" id="data" style="overflow-y: scroll; height:200px;">
                    <div class="container-fluid">
                        @foreach ($actividad->comentario as $comentario)                        
                            <div class="row">
                                <div class="col-md-2"><strong>Fecha: </strong></br>
                                {{ \Carbon\Carbon::parse($comentario->created_at)->format('d/m/Y H:i') }}
                                </div>
                                <div class="col-md-10">{{$comentario->nombre}}</div>
                            </div>
                            </br>                        
                        @endforeach
                    </div>                      
                    </div>

                    <form  method="post" action="{{ route('comentario.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="control-label">Comentar</label>

                                <textarea rows="4" cols="50" id="nombre" type="text" class="form-control" name="nombre" autofocus>{{ old('nombre') }}</textarea>

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <!-- el campo oculto -->
                        <input name="actividad_id" type="hidden" value="{{$actividad->id}}">
                        <input name="estadoActividad" id="campoFinalizar" type="hidden" value="{{$actividad->estado_id}}">                       
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ route('actividad.show', $actividad->etapa_id)}}" class="btn btn-info" role="button">Cancelar</a>
                                <button type="submit" class="btn btn-primary">
                                    Guardar cambios
                                </button>
                            </div>
                        </div>
                    </form> 
                    <!--<button type="button" class="btn btn-danger lol" data-dismiss="modal" id="finalizar">Finalizar</button> -->                  
                </div>
            </div>

</div>

<!-- Modal Pendiente-->
<div id="modalFinalizar" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Finalizar actividad</h4>
        </div>
        <div class="modal-body">
            <p>Una vez finalizada un actividad, dejara de tener acceso.</p>
            <small>*El cambio se reflejara al guardar los cambios.</small>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger lol" data-dismiss="modal" id="finalizar">Finalizar</button>
        </div>
    </div>

    </div>
</div>
<!-- Modal Reanuadar-->
<div id="modalReanuadar" class="modal fade" role="dialog">
    <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Reanuadar</h4>
        </div>
        <div class="modal-body">
            <p>Reanudar la activadad dejara el estado como "Pendiente".</p>
            <small>*El cambio se reflejara al guardar los cambios.</small>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-warning lol" data-dismiss="modal" id="pendiente">Reanudar</button>
        </div>
    </div>

    </div>
</div>

<!-- div con el usuario actual -->
<div id='usuarioActual' data-user='{{Auth::user()->rol_id}}'></div>
@endsection