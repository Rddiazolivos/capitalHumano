@extends('layouts.menu')

@section('contenido')
<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">

                    

                    <div class="row">
                        <div class="col-md-8"><strong>Nombre: </strong>{{$actividad->nombre}}</div>
                        <div class="col-md-4"><strong>Estado: </strong>{{$actividad->estado->nombre}}
                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">Cambiar</button>

                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">C</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>confirmar .</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                  </div>
                                </div>

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

                                <textarea rows="4" cols="50" id="nombre" type="text" class="form-control" name="nombre" required autofocus>{{ old('nombre') }}</textarea>

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <!-- el campo oculto -->
                        <input name="actividad_id" type="hidden" value="{{$actividad->id}}">
                        <input name="activida" type="hidden" value="{{$actividad->id}}">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar cambios
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

</div>

@endsection