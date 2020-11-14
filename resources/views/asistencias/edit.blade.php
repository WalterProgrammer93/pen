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
            <form action="{{ url('buscarAsistencia') }}" method="POST">
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
              <li class="breadcrumb-item"><a href="{{ url('asistencias') }}">Asistencias</a></li>
              <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
          </nav>
            <div class="card">
                <div class="card-header">Modificar Asistencia</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ action('AsistenciaController@update', $alumnos, $cursos, $asignaturas) }}">

                        {{csrf_field()}}

                        <input type="hidden" name="_method" value="PATCH">

                        <div class="form-group row">
                            <label for="codigo" class="col-md-4 col-form-label text-md-right">Codigo</label>

                            <div class="col-md-6">
                                <input id="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ $asistencia->codigo }}" required autocomplete="codigo" autofocus>

                                @error('codigo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="numero_horas" class="col-md-4 col-form-label text-md-right">Numero Horas</label>

                            <div class="col-md-6">
                                <input id="numero_horas" type="text" class="form-control @error('numero_horas') is-invalid @enderror" name="numero_horas" value="{{ $asistencia->numero_horas }}" required autocomplete="numero_horas" autofocus>

                                @error('numero_horas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alumno" class="col-md-4 col-form-label text-md-right">Alumno</label>

                            <div class="col-md-6">
                                <select id="alumno" class="form-control" name="alumno" required>
                                    @foreach($asistencias as $asistencia)
                                        <option value="{{ $asistencia->alumno }}">{{ $asistencia->alumno }}</option>
                                    @endforeach
                                </select>

                                @error('alumno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="asignatura" class="col-md-4 col-form-label text-md-right">Asignatura</label>

                            <div class="col-md-6">

                                <select id="asignatura" class="form-control" name="asignatura" required>
                                    @foreach($asistencias as $asistencia)
                                        <option value="{{ $asistencia->asignatura }}">{{ $asistencia->asignatura }}</option>
                                    @endforeach
                                </select>

                                @error('asignatura')
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

                                    <a href="{{ url('asignaturas') }}" class="enlaceback">Cancelar</a>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
