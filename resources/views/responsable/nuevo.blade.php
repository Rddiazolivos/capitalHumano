@extends('layouts.menu')

@section('contenido')
<div class="col-md-8 col-md-offset-2">
    <div class="container-fluid">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Asignación de responsables</div>
                
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('responsable.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('encargados') ? ' has-error' : '' }}">
                            <label for="encargados[]" class="col-md-4 control-label">Encargado</label>
                            <div class="col-md-7">
                                <select class="js-example-basic-multiple form-control" name="encargados[]" multiple="multiple" id="encargados" style="width: 100%">
                                  <option hidden value="">Seleccione el Encargado</option>
                                  @foreach($responsables as $responsable)
                                    <option value="{{ $responsable->id }}">{{ $responsable->full_name }}</option>
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