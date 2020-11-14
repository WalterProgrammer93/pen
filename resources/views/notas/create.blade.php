@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Nota</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form method="POST" action="{{ url('altaNota', $alumno, $asignatura) }}" >
                        
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
                            <label for="eva1" class="col-md-4 col-form-label text-md-right">EVA1</label>

                            <div class="col-md-6">
                                <input id="eva1" type="text" class="form-control" name="eva1" required autocomplete="eva1">

                                @error('eva1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="eva2" class="col-md-4 col-form-label text-md-right">EVA2</label>

                            <div class="col-md-6">
                                <input id="eva2" type="text" class="form-control" name="eva2" required autocomplete="eva2">

                                @error('eva2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="eva3" class="col-md-4 col-form-label text-md-right">EVA3</label>

                            <div class="col-md-6">
                                <input id="eva3" type="text" class="form-control" name="eva3" required autocomplete="eva3">

                                @error('eva3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="media" class="col-md-4 col-form-label text-md-right">Media</label>

                            <div class="col-md-6">
                                <input id="media" type="text" class="form-control" name="media" required autocomplete="media">

                                @error('media')
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
                                    @foreach($alumno as $nombre => $id)
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
                                    <option value="">Selecciona una asignatura</option>
                                    @foreach($asignatura as $nombre => $id)
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

                       

                        <form method="POST" action="{{ url('notas') }}">
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">

                                    <button type="submit" class="btn btn-success">
                                        Añadir
                                    </button>

                                    <button type="submit" class="btn btn-primary">
                                        <a href="{{ url('notas') }}" class="enlaceback">Cancelar</a>
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
