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
                    <div class="col-md-6">Fecha de entrega: {{ \Carbon\Carbon::parse($actividad->fec_entrega)->format('d/m/Y') }}</div>
                    <div class="col-md-6">Fecha de cierre: {{ \Carbon\Carbon::parse($actividad->updated_at)->format('d/m/Y')}}</div>
                </div>
                <div class="row">
                    <div class="col-md-12">Responsable: {{$responsable_evaluador}}</div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('evaluar.store') }}">
                        {{ csrf_field() }}
                <div class="form-group{{ $errors->has('conforme') ? ' has-error' : '' }}">
                    <label for="conforme" class="col-md-4 control-label">¿?</label>

                    <div class="col-md-6">                        
                        <label class="radio-inline"><input type="radio" name="conforme" value="1" required>Conforme</label>
                        <label class="radio-inline"><input type="radio" name="conforme" value="0">Disconforme</label>

                        @if ($errors->has('conforme'))
                            <span class="help-block">
                                <strong>{{ $errors->first('conforme') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>   

                <div class="form-group{{ $errors->has('calificacion') ? ' has-error' : '' }}">
                  <label for="calificacion" class="col-md-4 control-label">Calificación</label>

                    <div class="col-md-6">
                        <select name="calificacion" id="calificacion" class="form-control" required>
                            <option selected hidden value="">Seleccione la calificacion</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>

                        </select>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('observacion') ? ' has-error' : '' }}">
                            <label for="observacion" class="col-md-4 control-label">Observaciones</label>

                    <div class="col-md-6">
                        <textarea rows="4" cols="50" id="observacion" type="text" class="form-control" name="observacion" value="{{ old('observacion') }}" autofocus></textarea>

                        @if ($errors->has('observacion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('observacion') }}</strong>
                            </span>
                        @endif
                    </div>
                </div> 

                <!-- el campo oculto -->
                        <input name="actividad_id" type="hidden" value="{{$actividad->id}}">

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
