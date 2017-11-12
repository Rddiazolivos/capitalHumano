@extends('layouts.menu')

@section('contenido')
<?php $index = 0; ?>
<div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">                
                <div class="panel-body">
                    Evaluación a {{$Usuario->full_name}}
                </div>
            </div>
            <div class="panel panel-default">    
                <form class="form-horizontal" method="POST" action="{{ route('evaluacion.actualizar') }}">
                    {{ csrf_field() }} 
                    {{ method_field('PUT') }}                                               

                    <div class="table-responsive">
                      <table class="table table-hover">
                        @foreach($areas as $area)
                        @if(count($area->pregunta) > 0)                        
                        <thead>
                            <tr>
                                <th>
                                    {{$area->nombre}}
                                </th>
                            </tr>
                        </thead>
                                                
                        @foreach($area->pregunta as $clave =>$pregunta)                        
                        <?php //echo($index) ?>
                        <tr>
                            <td>
                                <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-9 col-sm-8 col-xs-8">
                                        <strong>{{$pregunta->concepto}} </strong></br>
                                        {{$pregunta->explicacion}}
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-4">                            
                                        <select name="MiArray[]" id="prioridad_id" class="form-control" required>
                                            <option selected hidden value="">-No evaluado-</option>
                                            <option value="1" @if($prueba[$index]->valor == 1) selected='selected' @endif>Débil</option>
                                            <option value="2" @if($prueba[$index]->valor == 2) selected='selected' @endif>Regular</option>
                                            <option value="3" @if($prueba[$index]->valor == 3) selected='selected' @endif>Bueno</option>
                                            <option value="4" @if($prueba[$index]->valor == 4) selected='selected' @endif>Muy bueno</option>
                                            <option value="5" @if($prueba[$index]->valor == 5) selected='selected' @endif>Óptimo</option>
                                        </select>
                                        @if ($errors->has('{{$pregunta->id}}'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first($pregunta->id) }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                </div>
                            </td>
                        </tr>
                            <!-- el campo oculto -->
                            <input name="MiArray2[]" type="hidden" value="{{$pregunta->id}}">
                            <input name="MiArray3[]" type="hidden" value="{{$prueba[$index]->id_respuesta}}">
                        <?php $index++; ?>
                        @endforeach
                        @endif
                        @endforeach
                      </table>
                    </div>
                                      
                    <!-- el campo oculto -->
                    <input name="proyecto_id" type="hidden" value="{{$proyecto->id}}">
                    <input name="user_id" type="hidden" value="{{$Usuario->id}}">

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary center-block">
                                Evaluar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
</div>
@endsection