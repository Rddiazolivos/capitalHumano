@extends('layouts.menu')
@section('contenido')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Informe Desempeño del trabajador</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{ route('pdf.desempeno') }}" target="_blank">
                        {{ csrf_field() }}                

                <div class="form-group{{ $errors->has('proyecto_id') ? ' has-error' : '' }}">
                  <label for="proyecto_id" class="col-md-4 control-label">Proyecto</label>

                    <div class="col-md-6">
                        <select name="proyecto_id" id="proyecto_id_des" class="form-control" required>
                            <option selected hidden value="">Seleccione un proyecto</option>
                            @foreach($proyectos as $proyecto)
	                            <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
	                        @endforeach

                        </select>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                  <label for="user_id" class="col-md-4 control-label">Usuario</label>

                    <div class="col-md-6">
                        <select name="user_id" id="user_id_des" class="form-control" required>
                            <option>Debe escoger un proyecto primero</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <button name="tipo" value="1" type="submit" class="btn btn-primary">Descargar</button>
  						<button name="tipo" value="2" type="submit" class="btn btn-primary">Visualizar</button>
                    </div>
                </div>
            </form>
                </div>

            </div>
        </div>
@endsection