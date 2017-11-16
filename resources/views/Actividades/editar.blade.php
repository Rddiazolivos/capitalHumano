@extends('layouts.menu')

@section('contenido')
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar actividad</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{ route('actividad.update', $actividad) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre', $actividad->nombre) }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label for="descripcion" class="col-md-4 control-label">Descripcion</label>

                            <div class="col-md-6">
                                <textarea rows="4" cols="50" id="descripcion" type="text" class="form-control" name="descripcion" required autofocus>{{ old('descripcion', $actividad->descripcion) }}</textarea>

                                @if ($errors->has('descripcion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fec_entrega') ? ' has-error' : '' }}">
                            <label for="fec_entrega" class="col-md-4 control-label">Fecha entrega</label>

                            <div class="col-md-6">
                                <input id="fec_entrega" type="date" class="form-control" name="fec_entrega" value="{{ old('fec_entrega', $actividad->fec_entrega) }}" required autofocus>

                                @if ($errors->has('fec_entrega'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fec_entrega') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('observaciones') ? ' has-error' : '' }}">
                            <label for="observaciones" class="col-md-4 control-label">Observaciones</label>

                            <div class="col-md-6">
                                <textarea rows="4" cols="50" id="observaciones" type="text" class="form-control" name="observaciones" autofocus>{{ old('observaciones', $actividad->observaciones) }}</textarea>

                                @if ($errors->has('observaciones'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('observaciones') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('prioridad_id') ? ' has-error' : '' }}">
                          <label for="prioridad_id" class="col-md-4 control-label">Prioridad</label>

                            <div class="col-md-6">
                                <select name="prioridad_id" id="prioridad_id" class="form-control" required>
                                    <option selected hidden value="">Seleccione la prioridad</option>
                                  @foreach($prioridades as $prioridad)
                                   <option value="{{ $prioridad->id }}"  @if($prioridad->id==$actividad->prioridad_id) selected='selected' @endif >{{ $prioridad->nombre }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>                        

                        <div class="form-group{{ $errors->has('estado_id') ? ' has-error' : '' }}">
                          <label for="estado_id" class="col-md-4 control-label">Estado</label>

                            <div class="col-md-6">
                                <select name="estado_id" id="estado_id" class="form-control" required>
                                    <option selected hidden value="">Seleccione el estado</option>
                                  @foreach($estados as $estado)
                                    <option value="{{ $estado->id }}"  @if($estado->id==$actividad->estado_id) selected='selected' @endif >{{ $estado->nombre }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('responsable_id') ? ' has-error' : '' }}">
                          <label for="responsable_id" class="col-md-4 control-label">Responsable</label>

                            <div class="col-md-6">
                                <select name="responsable_id" id="responsable_id" class="form-control" required>
                                    <option selected hidden value="">Seleccione el responsable</option>
                                  @foreach($usuarios as $user)
                                    <option value="{{ $user->id }}"  @if($user->id==$actividad->responsable_id) selected='selected' @endif >{{ $user->nombre }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('etapa_id') ? ' has-error' : '' }}">
                          <label for="etapa_id" class="col-md-4 control-label">Etapa</label>

                            <div class="col-md-6">
                                <select name="etapa_id" id="etapa_id" class="form-control" required>
                                    <option selected hidden value="">Seleccione la etapa</option>
                                  @foreach($etapas as $etapa)
                                    <option value="{{ $etapa->id }}"  @if($etapa->id==$actividad->etapa_id) selected='selected' @endif >{{ $etapa->nombre }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

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