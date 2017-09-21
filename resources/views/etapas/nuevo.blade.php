@extends('layouts.menu')

@section('contenido')
<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nueva etapa</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('etapa.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fec_creacion') ? ' has-error' : '' }}">
                            <label for="fec_creacion" class="col-md-4 control-label">Fecha inicio</label>

                            <div class="col-md-6">
                                <input id="fec_creacion" type="date" class="form-control" name="fec_creacion" value="{{ old('fec_creacion') }}" required autofocus>

                                @if ($errors->has('fec_creacion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fec_creacion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fec_termino') ? ' has-error' : '' }}">
                            <label for="fec_termino" class="col-md-4 control-label">Fecha termino</label>

                            <div class="col-md-6">
                                <input id="fec_termino" type="date" class="form-control" name="fec_termino" value="{{ old('fec_termino') }}" required autofocus>

                                @if ($errors->has('fec_termino'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fec_termino') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('observaciones') ? ' has-error' : '' }}">
                            <label for="observaciones" class="col-md-4 control-label">Observaciones</label>

                            <div class="col-md-6">
                                <textarea rows="4" cols="50" id="observaciones" type="text" class="form-control" name="observaciones" value="{{ old('observaciones') }}" autofocus></textarea>

                                @if ($errors->has('observaciones'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('observaciones') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--id del proyecto-->
                        <div class="invisible">
                                <input id="proyecto_id" type="text" class="form-control" name="proyecto_id" value="{{ $id }}">
                        </div>
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Crear etapa
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</div>
@endsection
