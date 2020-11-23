@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('clases') }}">Clases</a></li>
              <li class="breadcrumb-item active" aria-current="page">Crear</li>
            </ol>
          </nav>
            <div class="card">
                <div class="card-header">Crear Clase</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!empty($clase->id))
                        <div class="form-group row">
                            <label for="asignatura" class="col-md-4 col-form-label text-md-right">Asignatura</label>
                            <div class="col-md-6">
                                <select id="asignatura" class="form-control" name="asignatura" required>
                                    @foreach($clases as $clase)
                                        <option value="{{ $clase->id }}">{{ $clase->id }}</option>
                                    @endforeach
                                </select>
                                @error('asignatura')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profesor" class="col-md-4 col-form-label text-md-right">Profesor</label>
                            <div class="col-md-6">
                                <select id="profesor" class="form-control" name="profesor" required>
                                    @foreach($clases as $clase)
                                        <option value="{{ $clase->id }}">{{ $clase->id }}</option>
                                    @endforeach
                                </select>
                                @error('profesor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="horario" class="col-md-4 col-form-label text-md-right">Horario</label>
                            <div class="col-md-6">
                                <textarea id="horario" type="text" class="form-control @error('horario') is-invalid @enderror" name="horario" value="{{ clase->horario }}" required autocomplete="horario" autofocus></textarea>
                                @error('horario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    @else
                        <div class="form-group row">
                            <label for="asignatura" class="col-md-4 col-form-label text-md-right">Asignatura</label>
                            <div class="col-md-6">
                                <select id="asignatura" class="form-control" name="asignatura" required>
                                    <option value="">Seleccione un asignatura</option>
                                    @foreach($asignaturas as $nombre => $id)
                                        <option value="{{ $nombre }}">{{ $id }}</option>
                                    @endforeach
                                </select>
                                @error('asignatura')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profesor" class="col-md-4 col-form-label text-md-right">Profesor</label>
                            <div class="col-md-6">
                                <select id="profesor" class="form-control" name="profesor" required>
                                    <option value="">Seleccione un profesor</option>
                                    @foreach($profesores as $nombre => $id)
                                        <option value="{{ $nombre }}">{{ $id }}</option>
                                    @endforeach
                                </select>
                                @error('profesor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="horario" class="col-md-4 col-form-label text-md-right">Horario</label>
                            <div class="col-md-6">
                                <textarea id="horario" type="text" class="form-control @error('horario') is-invalid @enderror" name="horario" value="{{ old('horario') }}" required autocomplete="horario" autofocus></textarea>
                                @error('horario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('clases') }}">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Añadir
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <a href="{{ url('aulas') }}" class="enlaceback">Cancelar</a>
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
