@extends('layouts.menu')
@section('contenido')

<div class="col-md-12">
  <div class="page-header">
    <h1>{{ $usuario->full_name }}</h1>      
  </div> 
</div>
<div class="col-md-10 col-md-offset-1">
	<div>
		<h4>Desempeño: {{$promedioD}}</h4>
	</div>  
	<hr>
	<div class='col-xs-12 col-sm-12 col-md-8 col-md-offset-2'>
	    <div id="chart-div2"></div>    
	</div>
</div>
<div class="col-md-10 col-md-offset-1">
	<div>
		<h4>Resultado: {{$promedioR}}</h4>
	</div>  
	<hr>
	<div class='col-xs-12 col-sm-12 col-md-8 col-md-offset-2'>
	    <div id="chart-div"></div>    
	</div>
</div>
@endsection

@columnchart('Finances', 'chart-div2')
@columnchart('Resultado', 'chart-div')