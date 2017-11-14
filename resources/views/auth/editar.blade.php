@extends('layouts.menu')

@section('contenido')
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Editar</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('usuario.update', $User->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <?php
                            //dd($User);
                        ?>

                        <div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
                            <label for="rut" class="col-md-4 control-label">Rut</label>

                            <div class="col-md-6">
                                <input id="rut" type="text" class="form-control" name="rut" value="{{ old('rut', $User->rut) }}" required autofocus>

                                @if ($errors->has('rut'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rut') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre', $User->nombre) }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ape_paterno') ? ' has-error' : '' }}">
                            <label for="ape_paterno" class="col-md-4 control-label">Apellido Paterno</label>

                            <div class="col-md-6">
                                <input id="ape_paterno" type="text" class="form-control" name="ape_paterno" value="{{ old('ape_paterno', $User->ape_paterno) }}" required autofocus>

                                @if ($errors->has('ape_paterno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ape_paterno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ape_materno') ? ' has-error' : '' }}">
                            <label for="ape_materno" class="col-md-4 control-label">Apellido Materno</label>

                            <div class="col-md-6">
                                <input id="ape_materno" type="text" class="form-control" name="ape_materno" value="{{ old('ape_materno', $User->ape_materno) }}" required autofocus>

                                @if ($errors->has('ape_materno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ape_materno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $User->email) }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                       

                        <div class="form-group{{ $errors->has('fec_nacimiento') ? ' has-error' : '' }}">
                            <label for="fec_nacimiento" class="col-md-4 control-label">Fecha Nacimiento</label>

                            <div class="col-md-6">
                                <input id="fec_nacimiento" type="date" class="form-control" name="fec_nacimiento" value="{{ old('fec_nacimiento', $User->fec_nacimiento) }}" required autofocus>

                                @if ($errors->has('fec_nacimiento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fec_nacimiento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">
                            <label for="sexo" class="col-md-4 control-label">Sexo</label>

                            <div class="col-md-3">
                                <label class="form-check-label"><input id="sexo" type="radio" class="form-check-input" name="sexo" value="F"  @if(old('sexo', $User->sexo) ==  'F') checked="checked" @endif required autofocus> Mujer</label>

                                @if ($errors->has('sexo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sexo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <label class="form-check-label"><input id="sexo" type="radio" class="form-check-input" name="sexo" value="M"  @if(old('sexo', $User->sexo) ==  'M') checked="checked" @endif required autofocus> Hombre</label>

                                @if ($errors->has('sexo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sexo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fec_ingreso') ? ' has-error' : '' }}">
                            <label for="fec_ingreso" class="col-md-4 control-label">Fecha Ingreso</label>

                            <div class="col-md-6">
                                <input id="fec_ingreso" type="date" class="form-control" name="fec_ingreso" value="{{ old('fec_ingreso', $User->fec_ingreso) }}" required autofocus>

                                @if ($errors->has('fec_ingreso'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fec_ingreso') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fec_ingreso') ? ' has-error' : '' }}">
                          <label for="fec_ingreso" class="col-md-4 control-label">Perfil</label>

                            <div class="col-md-6">
                                <select name="rol_id" id="rol_id" class="form-control" required>
                                    <option selected hidden value="">Seleccione el perfil</option>
                                  @foreach($rolesList as $item)
                                    <option value="{{ $item->id }}" @if($item->id==old('rol_id',$User->rol_id)) selected='selected' @endif >{{ $item->nombre }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('departamento_id') ? ' has-error' : '' }}">
                          <label for="departamento_id" class="col-md-4 control-label">Departamento</label>

                            <div class="col-md-6">
                                <select name="departamento_id" id="departamento_id" class="form-control" required>
                                    <option selected hidden value="">Seleccione el departamento</option>
                                  @foreach($departamentosList as $item)
                                    <option value="{{ $item->id }}" @if($item->id==old('departamento_id',$User->departamento_id)) selected='selected' @endif >{{ $item->nombre }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('condicion') ? ' has-error' : '' }}">
                          <label for="condicion" class="col-md-4 control-label">Estado</label>

                            <div class="col-md-6">
                                <select name="condicion" id="condicion" class="form-control" required>
                                    <option selected hidden value="">Seleccione la condición</option>
                                    <option value="1" @if($User->condicion==1) selected='selected' @endif>Activo</option>
                                    <option value="0" @if($User->condicion==0) selected='selected' @endif>Desactivado</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
