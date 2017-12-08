@extends('layouts.menu')
@section('contenido')

<div class="col-md-12">
  <div class="page-header">
    <h1>{{ $usuario->full_name }}</h1>      
  </div> 

  <div>
    <h4>Calificación obtenida: {{$promedio}}</h4>
  </div>  
</div>
<hr>
<div class='col-xs-12 col-sm-12 col-md-8 col-md-offset-2'>
    <div id="chart-div2"></div>    
</div>

@endsection

@columnchart('Finances', 'chart-div2')