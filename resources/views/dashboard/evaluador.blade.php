@extends('layouts.menu')
@section('estiloPersonalisado')
    <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
@endsection

@section('contenido')
      <div class="page-header">
        <h1>Panel</h1>      
      </div>   

    <div class="col-xs-12 col-sm-4 col-md-4">
		<div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="ion icon-lg ion-ios-briefcase"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$numeroProyectos}}</div>
                        <div>Proyectos</div>
                    </div>
                </div>
            </div>
			<a href="{{ route('proyecto.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">Abrir proyectos</span>
                    <span class="pull-right"><i class="ion ion-arrow-right-c"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a> 
		</div>
	</div>

    <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="ion icon-lg ion-ios-paper"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$numeroActividades}}</div>
                        <div>Actividades</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('actividad.all') }}">
                <div class="panel-footer">
                    <span class="pull-left">Abrir actividades</span>
                    <span class="pull-right"><i class="ion ion-arrow-right-c"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a> 
        </div>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="ion icon-lg ion-university"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{$numeroEvaluaciones}}</div>
                        <div>Evaluaciones</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('evaluacion.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">Abrir evaluaciones</span>
                    <span class="pull-right"><i class="ion ion-arrow-right-c"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a> 
        </div>
    </div>

        <div class='col-xs-12 col-sm-12 col-md-8 col-md-offset-2'>
            <div id="chart-div"></div>         
        </div>  
@endsection
@piechart('IMDB', 'chart-div')