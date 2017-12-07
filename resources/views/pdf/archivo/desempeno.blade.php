<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>Reporte de desempeño de trabajador</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
<style>

</style>
</head>
<body>    
    <div class="col-md-12">

          <div class="page-header">
            <h1>{{ $usuario->full_name }}</h1>      
          </div> 

          <div>
            <h4>Proyecto: {{$proyecto->nombre}}</h4>
            @if($resultado <> null)
            <h4>Calificación evaluación comportamiento: {{$resultado->resultado}}</h4>
            @else
            <h4>Calificación evaluación comportamiento: Sin evaluar</h4>
            @endif
          </div>        
    </div>
    <div>
        <table class="table">
            <thead>
              <tr>
                <th>Actividad</th>
                <th>Calificación</th>
                <th>Observación</th>
              </tr>
            </thead>
            <tbody>
            @foreach($proyecto->actividades as $actividad)
              <tr>
                <td>{{$actividad->nombre}}</td>
                <!-- nota-->
                @if($actividad->evaluacion <> null)
                <td>{{$actividad->evaluacion->calificacion}}</td>
                @else
                <td>Sin evaluar</td>
                @endif
                <!-- Observación-->
                @if($actividad->evaluacion <> null)
                <td>{{$actividad->evaluacion->observacion}}</td>
                @else
                <td></td>
                @endif                  
              </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>