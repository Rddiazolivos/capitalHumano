<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>Reporte de avance de actividades</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
<style>

</style>
</head>
<body>    
    <div class="col-md-12">

          <div class="page-header">
            <h1>{{ $proyecto->nombre }}</h1>      
          </div>
          <p>{{ $proyecto->user->full_name }}</p>   

        @foreach($etapas as $etapa)
        <div class="panel panel-info">
          <div class="panel-heading">{{ $etapa->nombre }}</div>
          <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Actividad</th>
                        <th>Responsable</th>
                        <th>Estado</th>
                    </tr>
                </thead>                
                @foreach($etapa->actividades as $actividad)
                <tr>
                    <td>{{ $actividad->nombre }}</td>
                    @if(count($actividad->responsables)==0)
                    <td>Sin responsable</td>
                    @else
                    <td>
                        @foreach($actividad->responsables as $responsable)
                            {{$responsable->usuario->full_name}}
                        @endforeach
                    </td>
                    @endif
                    <td>{{ $actividad->estado->nombre }}</td>
                </tr>
                @endforeach                
            </table>
          </div>
        </div>
        @endforeach
    </div>
</body>
</html>