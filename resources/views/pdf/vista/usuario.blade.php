@extends('layouts.menu')
@section('contenido')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Informe del trabajador</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{ route('pagina.Usuario') }}">
                        {{ csrf_field() }}                

                <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                  <label for="user_id" class="col-md-4 control-label">Usuario</label>

                    <div class="col-md-6">
                        <select name="user_id" id="user_id" class="form-control" required>
                            <option selected hidden value="">Seleccione un usuario</option>
                            @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id }}">{{ $usuario->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
  						<button name="tipo" value="1" type="submit" class="btn btn-primary">Visualizar</button>
                    </div>
                </div>
            </form>
                </div>

            </div>
        </div>
@endsection