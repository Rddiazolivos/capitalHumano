@extends('layouts.menu')

@section('contenido')
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de actividad</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('actividad.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}"  autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label for="descripcion" class="col-md-4 control-label">Descripción</label>

                            <div class="col-md-6">
                                <textarea rows="4" cols="50" id="descripcion" type="text" class="form-control" name="descripcion" required autofocus>{{ old('descripcion') }}</textarea>

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
                                <input id="fec_entrega" type="date" class="form-control" name="fec_entrega" value="{{ old('fec_entrega') }}" required autofocus>

                                @if ($errors->has('fec_entrega'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fec_entrega') }}</strong>
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
                                    <option value="{{ $prioridad->id }}">{{ $prioridad->nombre }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>     
                                          
                        <!-- el campo oculto -->
                        <input name="estado_id" type="hidden" value="1">
                        <input name="etapa_id" type="hidden" value="{{$id_etapa}}">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar actividad
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</div>
@endsection