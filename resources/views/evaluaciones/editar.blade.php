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
                    <div class="col-md-12">Encargados: 
                        <?php
                        $i = 0;
                        $len = count($encargados);
                        foreach($encargados as $encargado){
                            if ($i == $len - 1) {
                                echo $encargado->nombre . ' ' . $encargado->ape_paterno . '.';
                            } else{
                                echo $encargado->nombre . ' ' . $encargado->ape_paterno . ', ';
                            }
                            // …
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('evaluar.update' , $evaluacion) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                <div class="form-group{{ $errors->has('conforme') ? ' has-error' : '' }}">
                    <label for="conforme" class="col-md-4 control-label">Conformidad</label>

                    <div class="col-md-6">                        
                        <label class="radio-inline"><input type="radio" name="conforme" value="1" @if($evaluacion->conforme ==  '1') checked="checked" @endif required autofocus>Conforme</label>
                        <label class="radio-inline"><input type="radio" name="conforme" value="0" @if($evaluacion->conforme ==  '0') checked="checked" @endif>Disconforme</label>

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
                            <option value="1" @if($evaluacion->calificacion==1) selected='selected' @endif>1</option>
                            <option value="2" @if($evaluacion->calificacion==2) selected='selected' @endif>2</option>
                            <option value="3" @if($evaluacion->calificacion==3) selected='selected' @endif>3</option>
                            <option value="4" @if($evaluacion->calificacion==4) selected='selected' @endif>4</option>
                            <option value="5" @if($evaluacion->calificacion==5) selected='selected' @endif>5</option>
                            <option value="6" @if($evaluacion->calificacion==6) selected='selected' @endif>6</option>
                            <option value="7" @if($evaluacion->calificacion==7) selected='selected' @endif>7</option>
                            <option value="8" @if($evaluacion->calificacion==8) selected='selected' @endif>8</option>
                            <option value="9" @if($evaluacion->calificacion==9) selected='selected' @endif>9</option>
                            <option value="10" @if($evaluacion->calificacion==10) selected='selected' @endif>10</option>

                        </select>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('observacion') ? ' has-error' : '' }}">
                            <label for="observacion" class="col-md-4 control-label">Observaciones</label>

                    <div class="col-md-6">
                        <textarea rows="4" cols="50" id="observacion" type="text" class="form-control" name="observacion" >{{ old('observacion', $evaluacion->observacion) }}</textarea>

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
                    <div class="text-center">
                        <a href="{{ route('actividad.show', $actividad->etapa_id)}}" class="btn btn-info" role="button">Cancelar</a>
                        <button type="submit" class="btn btn-primary">
                            Editar evaluación
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
