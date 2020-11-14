@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-20 justify-content-center m-3">
        <div class="row justify-content-center m-3">
            <div class="col-md-3">
                <input id="buscar" type="text" class="form-control" name="buscar" autocomplete="buscar" placeholder="Buscar" autofocus>
            </div>
            <div class="col-md-3">
                <select id="ordenar" class="form-control" name="ordenar" required>
                    <option value="Ascendente">Ascendente</option>
                    <option value="Descendente">Descendente</option>
                </select>
            </div>
            <form action="{{ url('buscarAlumno') }}" method="POST">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('alumnos') }}">Alumnos</a></li>
              <li class="breadcrumb-item active" aria-current="page">Modificar</li>
            </ol>
          </nav>
            <div class="card">
                <div class="card-header">Modificar Alumno</div>

                <div class="card-body">

                    <!--@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif-->

                    <!-- Obtengo la sesión actual del usuario -->
                    {{ $message=Session::get('message') }}

                    <!-- Muestro el mensaje de validación -->
                    @include('alerts.request')

                    <form method="POST" action="{{ route('alumnos/update', $alumno->id) }}" role="form" enctype="multipart/form-data">

                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        @include('alumnos.index')
                    </form>

                        <!--<input type="hidden" name="_method" value="PUT">

                        <div class="form-group row">
                            <label for="codigo" class="col-md-4 col-form-label text-md-right">Codigo</label>

                            <div class="col-md-6">
                                <input id="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ $alumno->codigo }} }}" required autocomplete="codigo" autofocus>

                                @error('codigo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $alumno->nombre }}" required autocomplete="nombre" autofocus>

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
                                <input id="apellido1" type="text" class="form-control @error('apellido1') is-invalid @enderror" name="apellido1" value="{{ $alumno->apellido1 }}" required autocomplete="apellido1">

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
                                <input id="apellido2" type="text" class="form-control @error('apellido2') is-invalid @enderror" name="apellido2" value="{{ $alumno->apellido2 }}" required autocomplete="apellido2">

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
                                <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ $alumno->dni }}" required autocomplete="dni">

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
                                <input id="fecha_nacimiento" type="text" class="form-control" name="fecha_nacimiento" value="{{ $alumno->fecha_nacimiento }}" required autocomplete="fecha_nacimiento">

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
                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ $alumno->telefono }}" required autocomplete="telefono">

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
                                <input id="correo" type="text" class="form-control" name="correo" value="{{ $alumno->correo }}" required autocomplete="correo">

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
                                    <option value="{{ $alumno->sexo }}">Femenino</option>
                                    <option value="{{ $alumno->sexo }}">Masculino</option>
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
                                <input id="ciudad" type="text" class="form-control" name="ciudad" value="{{ $alumno->ciudad }}" required autocomplete="ciudad">

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
                                <input id="provincia" type="text" class="form-control" name="provincia" value="{{ $alumno->provincia }}" required autocomplete="provincia">

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
                                <input id="nacionalidad" type="text" class="form-control" name="nacionalidad" value="{{ $alumno->nacionalidad }}" required autocomplete="nacionalidad">

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
                                <input id="codigo_postal" type="text" class="form-control" name="codigo_postal" value="{{ $alumno->codigo_postal }}" required autocomplete="codigo_postal">

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
                                <input id="direccion" type="text" class="form-control" name="direccion" value="{{ $alumno->direccion }}" required autocomplete="direccion">

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
                                <input id="portal" type="text" class="form-control" name="portal" value="{{ $alumno->portal }}" required autocomplete="portal">

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
                                <input id="piso" type="text" class="form-control" name="piso" value="{{ $alumno->piso }}" required autocomplete="piso">

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
                                <input id="letra" type="text" class="form-control" name="letra" value="{{ $alumno->letra }}" required autocomplete="letra">

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
                                <input id="repite" type="checkbox" class="form-control" name="repite" value="{{ $alumno->repite }}" required>
                                <input id="repite" type="checkbox" class="form-control" name="repite" value="{{ $alumno->repite }}" required>

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

                                <input id="foto" type="file" class="form-control" name="foto" value="{{ alumno->foto }}">

                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="curso" class="col-md-4 col-form-label text-md-right">Curso</label>

                            <div class="col-md-6">
                                <select id="curso" class="form-control" name="curso" required>
                                    <option value="">Seleccione un Curso</option>
                                    <option value="{{ $alumno->curso }}">{{ $alumno->curso }}</option>
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

                                <button type="submit" class="btn btn-success">
                                    Actualizar
                                </button>

                                <button type="submit" class="btn btn-primary">
                                    <a href="{{ url('alumnos') }}" class="enlaceback">Cancelar</a>
                                </button>
                            </div>
                        </form>
                    </form>-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
