@extends('layouts.menu')

@section('contenido')
<div class="col-md-8 col-md-offset-2">
    <div class="container-fluid">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Asignación de responsables</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('responsable.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('supervisor_id') ? ' has-error' : '' }}">
                          <label for="supervisor_id" class="col-md-4 control-label">Supervisor</label>

                            <div class="col-md-7">
                                <select name="supervisor_id" id="supervisor_id" class="form-control" required>
                                    <option selected hidden value="">Seleccione el Supervisor</option>
                                  @foreach($responsables as $responsable)
                                    <option value="{{ $responsable->id }}">{{ $responsable->nombre }}</option>
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
                                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>                   
                        <!-- el campo oculto -->
                        <input name="id_actividad" type="hidden" value="{{$id_actividad}}">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Asignar responsable
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