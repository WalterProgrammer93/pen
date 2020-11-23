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
             <form action="{{ url('buscarClase') }}" method="POST">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modificar Clase</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('ClaseController@update', $id) }}" >
                        
                        @csrf

                        <div class="form-group row">
                            <label for="codigo" class="col-md-4 col-form-label text-md-right">Codigo</label>

                            <div class="col-md-6">
                                <input id="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ clase->codigo }}" required autocomplete="codigo" autofocus>

                                @error('codigo')
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
                        
                        <form method="POST" action="{{ url('clases') }}">
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
