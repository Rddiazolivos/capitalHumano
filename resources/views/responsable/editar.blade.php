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
                    <form class="form-horizontal" method="post" action="{{ route('responsable.actualizar') }}">
                        {{ csrf_field() }}
                        {{ method_field('put') }}                        

                        <div class="form-group{{ $errors->has('encargados') ? ' has-error' : '' }}">
                            <label for="encargados[]" class="col-md-4 control-label">Encargado</label>
                            <div class="col-md-7">
                                <select class="js-example-basic-multiple form-control" name="encargados[]" multiple="multiple" style="width: 100%">
                                  <option hidden value="">Seleccione el Encargado</option>
                                  @foreach($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}" 
                                        @foreach($encargados as $encargado) 
                                            @if($encargado->id==$usuario->id)
                                                selected='selected'
                                            @endif 
                                        @endforeach
                                    >{{ $usuario->full_name }}</option>
                                  @endforeach
                                </select>

                            </div>
                        </div>                   
                        <!-- el campo oculto -->
                        <input name="id_actividad" type="hidden" value="{{$actividad->id}}">

                        <div class="form-group">
                            <div class="text-center">
                                <a href="{{ route('actividad.show', $actividad->etapa_id)}}" class="btn btn-info" role="button">Cancelar</a>
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