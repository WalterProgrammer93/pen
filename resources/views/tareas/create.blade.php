@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Tarea</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('altaTarea') }}" enctype="multipart/form-data">
                        
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
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">Titulo</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo') }}" required autocomplete="titulo">

                                @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>

                            <div class="col-md-6">
                                <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}" rows="4" cols="50" required autocomplete="descripcion"></textarea>

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="autor" class="col-md-4 col-form-label text-md-right">Autor</label>

                            <div class="col-md-6">
                                <input id="autor" type="text" class="form-control" name="autor" required autocomplete="autor">

                                @error('autor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_envio" class="col-md-4 col-form-label text-md-right">Fecha envio</label>

                            <div class="col-md-6">
                                <input id="fecha_envio" type="text" class="form-control" name="fecha_envio" required autocomplete="fecha_envio">

                                @error('fecha_envio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_entrega" class="col-md-4 col-form-label text-md-right">Fecha Entrega</label>

                            <div class="col-md-6">
                                <input id="fecha_entrega" type="text" class="form-control" name="fecha_entrega" required autocomplete="fecha_entrega">

                                @error('fecha_entrega')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hora_entrega" class="col-md-4 col-form-label text-md-right">Hora Entrega</label>

                            <div class="col-md-6">
                                <input id="hora_entrega" type="text" class="form-control" name="hora_entrega" required autocomplete="hora_entrega">

                                @error('hora_entrega')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="archivo_tarea" class="col-md-4 col-form-label text-md-right">Archivo Tarea</label>

                            <div class="col-md-6">
                                <input id="archivo_tarea" type="file" class="form-control" name="archivo_tarea" value="Subir Tarea" required>

                                <a href="/descargarTarea/{{ $file }}" class="btn-success">Descargar Tarea</a>

                                @error('archivo_tarea')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="calificacion" class="col-md-4 col-form-label text-md-right">Calificacion</label>

                            <div class="col-md-6">
                                <input id="calificacion" type="text" class="form-control" name="calificacion" required autocomplete="calificacion">

                                @error('calificacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <form method="POST" action="{{ url('tareas') }}">
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">

                                    <button type="submit" class="btn btn-success">
                                        Añadir
                                    </button>

                                    <button type="submit" class="btn btn-primary">

                                        <a href="{{ url('tareas') }}" class="enlaceback">Cancelar</a>

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
