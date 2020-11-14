@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Convalidacion</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('altaConvalidacion')}}" >
                        
                        @csrf

                        <div class="form-group row">
                            <label for="codigo" class="col-md-4 col-form-label text-md-right">Codigo</label>

                            <div class="col-md-6">
                                <input id="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ old('codigo') }}" required autocomplete="codigo" autofocus>

                                @error('codigo')
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
                                    <option value="">Seleccione un alumno</option>
                                    @foreach($alumnos as $nombre => $id)
                                        <option value="{{ $nombre }}">{{ $id }}</option>
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
                                    <option value="">Seleccione una asignatura</option>
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
                        
                        <form method="POST" action="{{ url('convalidaciones') }}">
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">

                                    <button type="submit" class="btn btn-success">
                                        Añadir
                                    </button>

                                    <button type="submit" class="btn btn-primary">
                                        <a href="{{ url('convalidaciones') }}" class="enlaceback">Cancelar</a>
                                    </button>
                                </div>             
                            </div>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
