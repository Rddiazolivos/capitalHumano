@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nueva actividad</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
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

                        <div class="form-group{{ $errors->has('porcentaje') ? ' has-error' : '' }}">
                            <label for="number" class="col-md-4 control-label">Porcentaje</label>

                            <div class="col-md-6">
                                <input id="porcentaje" type="number" class="form-control" name="porcentaje" value="{{ old('porcentaje') }}" required>

                                @if ($errors->has('porcentaje'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('porcentaje') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                        

                        
                        <div class="form-group{{ $errors->has('observacion') ? ' has-error' : '' }}">
                            <label for="number" class="col-md-4 control-label">Observacion</label>

                            <div class="col-md-6">
                                <input id="observacion" type="text" class="form-control" name="observacion" value="{{ old('observacion') }}" required>

                                @if ($errors->has('observacion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('observacion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Crear actividad
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
