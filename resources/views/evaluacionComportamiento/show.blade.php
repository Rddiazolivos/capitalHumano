@extends('layouts.menu')
@section('contenido')
@if(count($usuarioAsociados) == 0)
<div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">No posee Usuarios para evaluar</div>
        </div>
</div>
@else
<div class='row'>
    <div class="col-md-12">
        <form class='navbar-form ' role='search' method="GET" action="">
            <div class="row">
                <div class="col-md-5 col-md-offset-7 input-group">
                    <input type='text' class='form-control' placeholder='Buscar' name="scope" value="">
                    <div class="input-group-btn">
                        <button type='submit' class='btn btn-default' id='botonFiltro'>
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </div>                         
        </form>
    </div>
</div>
<div class="row">
    @foreach($usuarioAsociados as $user)                
        <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="panel panel-success">
                <div class="panel-body">
                    <div class="media">
                      <div class="media-left">
                        <img src="../img/img_avatar1.png" class="media-object" style="width:60px">
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">{{$user->full_name}}</h4>
                        @if($user->status == 1)
                            <p>Nota: {{$user->resultado}}</p>
                        @else
                            <p>&nbsp;</p>
                        @endif
                        </br>                  
                      </div>
                    </div>
                    @if($user->status != 1)
                    <a href="{{ route('evaluacion.ok', [$user->id_user, $proyecto_id])}}" class="btn btn-default btn-block" role="button"><span class="glyphicon glyphicon-education text-primary"></span>  Evaluar</a>
                    @else
                    <a href="{{ route('evaluacion.editar', $user->id)}}" class="btn btn-default btn-block" role="button"><span class="glyphicon glyphicon-education text-primary"></span>  Revisar evaluación</a>
                    @endif
                </div>
            </div>
        </div>                
    @endforeach 
</div>
{{$usuarioAsociados->links()}}  
@endif

@endsection