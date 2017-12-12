@extends('layouts.menu')
@section('contenido')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Informe avance de actividades</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{ route('pdf.actividad') }}" target="_blank">
                        {{ csrf_field() }}                

                <div class="form-group{{ $errors->has('proyecto_id') ? ' has-error' : '' }}">
                  <label for="proyecto_id" class="col-md-4 control-label">Proyecto</label>

                    <div class="col-md-6">
                        <select name="proyecto_id" id="proyecto_id" class="form-control" required>
                            <option selected hidden value="">Seleccione un proyecto</option>
                            @foreach($proyectos as $proyecto)
	                            <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
	                        @endforeach

                        </select>
                    </div>
                </div>

                    <div class="col-md-12 text-center">
                        <button name="tipo" value="1" type="submit" class="btn btn-primary">Descargar</button>
  						<button name="tipo" value="2" type="submit" class="btn btn-primary">Visualizar</button>
                    </div>
            </form>
                </div>

            </div>
        </div>
@endsection