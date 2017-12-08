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
            <h4>Calificación obtenida: {{$promedio}}</h4>
          </div>  


    </div>
</body>
</html>
