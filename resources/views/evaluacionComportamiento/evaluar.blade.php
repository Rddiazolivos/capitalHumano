@extends('layouts.menu')

@section('contenido')
<div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">                
                <div class="panel-body">
                    Evaluación a {{$Usuario->full_name}}
                </div>
            </div>
            <div class="panel panel-default">    
                <form class="form-horizontal" method="POST" action="{{ route('actividad.store') }}">
                    {{ csrf_field() }}                                                

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
                        @foreach($area->pregunta as $pregunta)
                        <tr>
                            <td>
                                <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-9 col-sm-8 col-xs-8">
                                        <strong>{{$pregunta->concepto}} </strong></br>
                                        {{$pregunta->explicacion}}
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-4">                            
                                        <select name="prioridad_id" id="prioridad_id" class="form-control" required>
                                            <option selected hidden value="">-No evaluado-</option>
                                            <option value="1">Débil</option>
                                            <option value="1">Regular</option>
                                            <option value="1">Bueno</option>
                                            <option value="1">Muy bueno</option>
                                            <option value="1">Óptimo</option>
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
                        @endforeach
                        @endif
                        @endforeach
                      </table>
                    </div>
                                      
                    <!-- el campo oculto -->
                    <input name="etapa_id" type="hidden" value="">

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