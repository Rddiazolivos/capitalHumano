@extends('layouts.menu')

@section('contenido')
<div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">                
                <div class="panel-body">
                    Evaluación a {{$Usuario->full_name}}
                </div>
            </div>
            <div class="panel panel-default">    
                <form class="form-horizontal" method="POST" action="{{ route('evaluacion.store') }}">
                    @if(Auth::user()->rol->nombre === 'Evaluador')
                    {{ csrf_field() }}  
                    @endif                                              

                    <div class="table-responsive">
                      <table class="table table-hover">
                        @foreach($areas as $area)
                        @if(count($area->pregunta->where('encuesta_id', $proyecto->encuDescendente_id)) > 0)                        
                        <thead>
                            <tr>
                                <th>
                                    {{$area->nombre}}
                                </th>
                            </tr>
                        </thead>                        
                        @foreach($area->pregunta->where('encuesta_id', $proyecto->encuDescendente_id) as $pregunta)
                        <tr>
                            <td>
                                <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-9 col-sm-8 col-xs-8">
                                        <strong>{{$pregunta->concepto}} </strong></br>
                                        {{$pregunta->explicacion}}
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-4">                            
                                        <select name="MiArray[]" id="prioridad_id" class="form-control" required @if(Auth::user()->rol->nombre != 'Evaluador') disabled @endif >
                                            <option selected hidden value="">-No evaluado-</option>
                                            <option value="1">Débil</option>
                                            <option value="2">Regular</option>
                                            <option value="3">Bueno</option>
                                            <option value="4">Muy bueno</option>
                                            <option value="5">Óptimo</option>
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
                        @endforeach
                        @endif
                        @endforeach
                      </table>
                    </div>
                                      
                    <!-- el campo oculto -->
                    <input name="proyecto_id" type="hidden" value="{{$proyecto->id}}">
                    <input name="user_id" type="hidden" value="{{$Usuario->id}}">

                    @if(Auth::user()->rol->nombre == 'Evaluador')
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary center-block">
                                Evaluar
                            </button>
                        </div>
                    </div>
                    @endif
                </form>
            </div>
</div>
@endsection