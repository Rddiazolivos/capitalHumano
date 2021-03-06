@extends('layouts.menu')
@section('contenido')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Fases del proyecto
                  <div style="float: right;">
                    <a data-toggle="tooltip" title="Agregar Etapa" href="{{ route('etapa.crear', $id_proyecto) }}"><span style="font-size:1.5em;" class="glyphicon glyphicon-plus-sign text-success"></span></a>
                  </div> 
                </div>

            </div>
            
            <div class="panel-group" id="accordion">              
              @foreach($etapas as $etapa)
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#{{ $etapa->id }}">{{ $etapa->nombre }}</a>
                  </h4>
                </div>
                <div id="{{ $etapa->id }}" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>{{ $etapa->observaciones }}</p>
                    <p><strong>Porcentaje de avance: </strong>{{ $etapa->porcentaje }}%</p>
                    <p><strong>Estado: </strong>{{ $etapa->estado->nombre }}</p>
                    <strong>Fecha de creación: </strong><p>{{ \Carbon\Carbon::parse($etapa->fec_creacion)->format('d/m/Y') }}</p>
                    <strong>Fecha de termino: </strong><p>{{ \Carbon\Carbon::parse($etapa->fec_termino)->format('d/m/Y')}}</p>
                    <a class="btn btn-primary btn-block" role="button" href="{{ route('actividad.show', $etapa->id) }}">Ver Actividades</a>                    
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div style="float: left;"><a href="{{ route('proyecto.index') }}"><span class="glyphicon glyphicon-circle-arrow-left"></span> Volver a los proyectos</a></div>
            <div style="float: right;"><a href="{{ route('etapa.crear', $id_proyecto) }}">Agregar Etapa <span class="glyphicon glyphicon-plus"></span></a></div> 

        </div>
@endsection