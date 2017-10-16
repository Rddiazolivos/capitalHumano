@extends('layouts.menu')

@section('contenido')
<div class="col-md-8 col-md-offset-2">
    <div class="container-fluid">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Asignación de responsables</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{ route('responsable.update', $supervisor->id_res) }}">
                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group{{ $errors->has('supervisor_id') ? ' has-error' : '' }}">
                          <label for="supervisor_id" class="col-md-4 control-label">Supervisor</label>

                            <div class="col-md-7">
                                <select name="supervisor_id" id="supervisor_id" class="form-control" required>
                                    <option selected hidden value="">Seleccione el Supervisor</option>
                                  @foreach($responsables as $responsable)
                                    <option value="{{ $responsable->id }}" @if($supervisor->id==$responsable->id) selected='selected' @endif>{{ $responsable->nombre }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="encargados[]" class="col-md-4 control-label">Encargado</label>
                            <div class="col-md-7">
                                <select class="js-example-basic-multiple form-control" name="encargados[]" multiple="multiple" required>
                                  <option hidden value="">Seleccione el Encargado</option>
                                  @foreach($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}" 
                                        @foreach($encargados as $encargado) 
                                            @if($encargado->id==$usuario->id)
                                                selected='selected'
                                            @endif 
                                        @endforeach
                                    >{{ $usuario->nombre." " .$usuario->ape_paterno }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>                   
                        <!-- el campo oculto -->
                        <input name="id_actividad" type="hidden" value="{{$actividad->id}}">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar responsable
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