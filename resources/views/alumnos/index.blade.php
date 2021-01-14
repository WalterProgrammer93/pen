@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header">Crear Alumno</div>
                <div class="card-body">
                    @if (Session('status'))
                        <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
                      @if(Auth::check())
                          @if(Auth::user()->hasRole('admin'))
                            @if(!empty($alumnos->id))
                                <form method="POST" action="{{ route('alumnos/update', $alumnos->id) }}" role="form">
                                  @csrf
                                  <input type="hidden" name="_method" value="PUT">
                                  <div class="form-group row">
                                      <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                      <div class="col-md-6">
                                          <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $alumnos->nombre }}" required autocomplete="nombre" autofocus>
                                          @error('nombre')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="apellido1" class="col-md-4 col-form-label text-md-right">Primer Apellido</label>
                                      <div class="col-md-6">
                                          <input id="apellido1" type="text" class="form-control @error('apellido1') is-invalid @enderror" name="apellido1" value="{{ $alumnos->apellido1 }}" required autocomplete="apellido1">
                                          @error('apellido1')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="apellido2" class="col-md-4 col-form-label text-md-right">Segundo Apellido</label>
                                      <div class="col-md-6">
                                          <input id="apellido2" type="text" class="form-control @error('apellido2') is-invalid @enderror" name="apellido2" value="{{ $alumnos->apellido2 }}" required autocomplete="apellido2">
                                          @error('apellido2')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="dni" class="col-md-4 col-form-label text-md-right">DNI</label>
                                      <div class="col-md-6">
                                          <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ $alumnos->dni }}" required autocomplete="dni">
                                          @error('dni')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">Fecha de Nacimiento</label>
                                      <div class="col-md-6">
                                          <input id="fecha_nacimiento" type="text" class="form-control" name="fecha_nacimiento" value="{{ $alumnos->fecha_nacimiento }}" required autocomplete="fecha_nacimiento">
                                          @error('fecha_nacimiento')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono</label>
                                      <div class="col-md-6">
                                          <input id="telefono" type="text" class="form-control" name="telefono" value="{{ $alumnos->telefono }}" required autocomplete="telefono">
                                          @error('telefono')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="correo" class="col-md-4 col-form-label text-md-right">Correo</label>
                                      <div class="col-md-6">
                                          <input id="correo" type="text" class="form-control" name="correo" value="{{ $alumnos->correo }}" required autocomplete="correo">
                                          @error('correo')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="sexo" class="col-md-4 col-form-label text-md-right">Sexo</label>
                                      <div class="col-md-6">
                                          <select id="sexo" class="form-control" name="sexo" required>
                                              <option value="{{ $alumnos->sexo }}">Femenino</option>
                                              <option value="{{ $alumnos->sexo }}">Masculino</option>
                                          </select>
                                          @error('sexo')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="ciudad" class="col-md-4 col-form-label text-md-right">Ciudad</label>
                                      <div class="col-md-6">
                                          <input id="ciudad" type="text" class="form-control" name="ciudad" value="{{ $alumnos->ciudad }}" required autocomplete="ciudad">
                                          @error('ciudad')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="provincia" class="col-md-4 col-form-label text-md-right">Provincia</label>
                                      <div class="col-md-6">
                                          <input id="provincia" type="text" class="form-control" name="provincia" value="{{ $alumnos->provincia }}" required autocomplete="provincia">
                                          @error('provincia')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="nacionalidad" class="col-md-4 col-form-label text-md-right">Nacionalidad</label>
                                      <div class="col-md-6">
                                          <input id="nacionalidad" type="text" class="form-control" name="nacionalidad" value="{{ $alumnos->nacionalidad }}" required autocomplete="nacionalidad">
                                          @error('nacionalidad')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="codigo_postal" class="col-md-4 col-form-label text-md-right">Código postal</label>
                                      <div class="col-md-6">
                                          <input id="codigo_postal" type="text" class="form-control" name="codigo_postal" value="{{ $alumnos->codigo_postal }}" required autocomplete="codigo_postal">
                                          @error('codigo_postal')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="direccion" class="col-md-4 col-form-label text-md-right">Direccion</label>
                                      <div class="col-md-6">
                                          <input id="direccion" type="text" class="form-control" name="direccion" value="{{ $alumnos->direccion }}" required autocomplete="direccion">
                                          @error('direccion')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="portal" class="col-md-4 col-form-label text-md-right">Portal</label>
                                      <div class="col-md-6">
                                          <input id="portal" type="text" class="form-control" name="portal" value="{{ $alumnos->portal }}" required autocomplete="portal">
                                          @error('portal')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="piso" class="col-md-4 col-form-label text-md-right">Piso</label>
                                      <div class="col-md-6">
                                          <input id="piso" type="text" class="form-control" name="piso" value="{{ $alumnos->piso }}" required autocomplete="piso">
                                          @error('piso')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="letra" class="col-md-4 col-form-label text-md-right">Letra</label>
                                      <div class="col-md-6">
                                          <input id="letra" type="text" class="form-control" name="letra" value="{{ $alumnos->letra }}" required autocomplete="letra">
                                          @error('letra')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="repite" class="col-md-4 col-form-label text-md-right">Repite</label>
                                      <div class="col-md-6">
                                          <input id="repite" type="checkbox" class="form-control" name="repite" value="{{ $alumnos->repite }}" required>
                                          <input id="repite" type="checkbox" class="form-control" name="repite" value="{{ $alumnos->repite }}" required>
                                          @error('repite')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="foto" class="col-md-4 col-form-label text-md-right">Selecciona una foto:</label>
                                    <div class="col-md-6">
                                        <input name="foto" type="file" id="foto">
                                        @if (!empty($alumnos->foto))
                                          <span>Foto actual: </span>
                                          <img src="../../../fotos/{{ $alumnos->foto }}" width="200" class="img-fluid">
                                        @else
                                          Aún no se ha cargado la foto del alumno
                                        @endif
                                        @error('foto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="curso_id" class="col-md-4 col-form-label text-md-right">Curso</label>
                                      <div class="col-md-6">
                                          <select id="curso_id" class="form-control" name="curso_id" required>
                                              <option value="" disabled selected>Seleccione un Curso</option>
                                              @foreach($alumnos as $alumno)
                                                <option value="{{ $alumno->curso_id }}" @if($nombre=='$nombre')selected @endif>{{ $alumno->curso_id }}</option>
                                              @endforeach
                                          </select>
                                          @error('curso_id')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="form-group row mb-0">
                                      <div class="col-md-6 offset-md-4">
                                          <button type="submit" class="btn btn-success">Actualizar</button>
                                          <a href="{{ route('alumnos') }}" class="btn btn-primary">Cancelar</a>
                                      </div>
                                  </div>
                                </form>
                              @else
                                  <form method="POST" action="{{ route('alumnos/store') }}">
                                      @csrf
                                      <input type="hidden" name="_method" value="PUT">
                                    <div class="form-group row">
                                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre alumno</label>
                                            <div class="col-md-6">
                                                  <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                                                  @error('nombre')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                            </div>
                                      </div>
                                      <div class="form-group row">
                                            <label for="apellido1" class="col-md-4 col-form-label text-md-right">Primer apellido</label>
                                              <div class="col-md-6">
                                                  <input id="apellido1" type="text" class="form-control @error('apellido1') is-invalid @enderror" name="apellido1" value="{{ old('apellido1') }}" required autocomplete="apellido1">
                                                  @error('apellido1')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="apellido2" class="col-md-4 col-form-label text-md-right">Segundo apellido</label>
                                              <div class="col-md-6">
                                                  <input id="apellido2" type="text" class="form-control @error('apellido2') is-invalid @enderror" name="apellido2" value="{{ old('apellido2') }}" required autocomplete="apellido2">
                                                  @error('apellido2')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="dni" class="col-md-4 col-form-label text-md-right">DNI</label>
                                              <div class="col-md-6">
                                                  <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" required autocomplete="dni">
                                                  @error('dni')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">Fecha de nacimiento</label>
                                              <div class="col-md-6">
                                                  <input id="fecha_nacimiento" type="text" class="form-control" name="fecha_nacimiento" required autocomplete="fecha_nacimiento">
                                                  @error('fecha_nacimiento')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono</label>
                                              <div class="col-md-6">
                                                  <input id="telefono" type="text" class="form-control" name="telefono" required autocomplete="telefono">
                                                  @error('telefono')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="correo" class="col-md-4 col-form-label text-md-right">Correo</label>
                                              <div class="col-md-6">
                                                  <input id="correo" type="text" class="form-control" name="correo" required autocomplete="correo">
                                                  @error('correo')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="sexo" class="col-md-4 col-form-label text-md-right">Sexo</label>
                                              <div class="col-md-6">
                                                  <select id="sexo" class="form-control" name="sexo" required>
                                                      <option value="F">Femenino</option>
                                                      <option value="M">Masculino</option>
                                                  </select>
                                                  @error('sexo')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="ciudad" class="col-md-4 col-form-label text-md-right">Ciudad</label>
                                              <div class="col-md-6">
                                                  <input id="ciudad" type="text" class="form-control" name="ciudad" required autocomplete="ciudad">
                                                  @error('ciudad')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="provincia" class="col-md-4 col-form-label text-md-right">Provincia</label>
                                              <div class="col-md-6">
                                                  <input id="provincia" type="text" class="form-control" name="provincia" required autocomplete="provincia">
                                                  @error('provincia')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="nacionalidad" class="col-md-4 col-form-label text-md-right">Nacionalidad</label>
                                              <div class="col-md-6">
                                                  <input id="nacionalidad" type="text" class="form-control" name="nacionalidad" required autocomplete="nacionalidad">
                                                  @error('nacionalidad')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="codigo_postal" class="col-md-4 col-form-label text-md-right">Codigo Postal</label>
                                              <div class="col-md-6">
                                                  <input id="codigo_postal" type="text" class="form-control" name="codigo_postal" required autocomplete="codigo_postal">
                                                  @error('codigo_postal')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="direccion" class="col-md-4 col-form-label text-md-right">Direccion</label>
                                              <div class="col-md-6">
                                                  <input id="direccion" type="text" class="form-control" name="direccion" required autocomplete="direccion">
                                                  @error('direccion')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="portal" class="col-md-4 col-form-label text-md-right">Portal</label>
                                              <div class="col-md-6">
                                                  <input id="portal" type="text" class="form-control" name="portal" required autocomplete="portal">
                                                  @error('portal')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="piso" class="col-md-4 col-form-label text-md-right">Piso</label>
                                              <div class="col-md-6">
                                                  <input id="piso" type="text" class="form-control" name="piso" required autocomplete="piso">
                                                  @error('piso')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="letra" class="col-md-4 col-form-label text-md-right">Letra</label>
                                              <div class="col-md-6">
                                                  <input id="letra" type="text" class="form-control" name="letra" required autocomplete="letra">
                                                  @error('letra')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="repite" class="col-md-4 col-form-label text-md-right">Repite</label>
                                              <div class="col-md-6">
                                                  Si &nbsp;<input id="repite" type="radio" name="repite" value="Si">&nbsp; No &nbsp;<input id="repite" type="radio" name="repite" value="No">
                                                  @error('repite')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="foto" class="col-md-4 col-form-label text-md-right">Foto</label>
                                              <div class="col-md-6">
                                                  <input id="foto" type="file" class="form-control" name="foto" required>
                                                  @error('foto')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="curso_id" class="col-md-4 col-form-label text-md-right">Curso</label>
                                              <div class="col-md-6">
                                                  <select id="curso_id" class="form-control" name="curso_id" required>
                                                      <option value="" disabled selected>Seleccione un Curso</option>
                                                      @foreach($cursos as $id => $nombre)
                                                          <option value="{{ $id }}" @if($id=='$id')selected @endif >{{ $nombre }}</option>
                                                      @endforeach
                                                  </select>
                                                  @error('curso')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row mb-0">
                                              <div class="col-md-6 offset-md-4">
                                                  <button type="submit" class="btn btn-success">Añadir</button>
                                                  <a href="{{ route('alumnos') }}" class="btn btn-primary">Cancelar</a>
                                              </div>
                                          </div>
                                    </form>

                                @endif
                            @else
                                @if(Auth::user()->hasRole('student'))
                                    <div>No tiene permisos</div>
                                @else
                                    @if(Auth::user()->hasRole('teacher'))
                                        <div>Tiene permisos</div>
                                    @else
                                        @if(Auth::user()->hasRole('user'))
                                            <div>No tiene permisos</div>
                                        @endif
                                    @endif
                                @endif
                            @endif
                      @endif
                  </div>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection
