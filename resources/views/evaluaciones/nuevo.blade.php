@extends('layouts.menu')

@section('contenido')
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="container-fluid">
                <div class="row">
                    <div class=" text-center">Evaluar</div>
                </div>
                <div class="row">
                    <div class="col-md-6">Fecha de entrega: {{$actividad->fec_entrega}}</div>
                    <div class="col-md-6">Fecha de cierre: {{$actividad->updated_at}}</div>
                </div>
                <div class="row">
                    <div>Responsable: {{$responsable_evaluador}}</div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('evaluar.store') }}">
                        {{ csrf_field() }}
                <div class="form-group{{ $errors->has('nota') ? ' has-error' : '' }}">
                    <label for="nota" class="col-md-4 control-label">Nota</label>

                    <div class="col-md-6">
                        <input id="nota" type="number" class="form-control" name="nota" value="{{ old('nota') }}" required autofocus min="1" max="7" step="0.1">

                        @if ($errors->has('nota'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nota') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>                       
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
