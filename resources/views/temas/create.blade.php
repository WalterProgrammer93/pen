@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Tema</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('altaTema') }}" enctype="multipart/form-data">
                        
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
                            <label for="contenido" class="col-md-4 col-form-label text-md-right">Contenido</label>

                            <div class="col-md-6">
                                <textarea id="contenido" class="form-control @error('contenido') is-invalid @enderror" name="contenido" value="{{ old('contenido') }}" rows="4" cols="50" required autocomplete="contenido"></textarea> 
                                @error('contenido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="documento_tema" class="col-md-4 col-form-label text-md-right">Documento Tema</label>

                            <div class="col-md-6">
                                <input id="documento_tema" type="file" class="form-control @error('documento_tema') is-invalid @enderror" name="documento_tema" value="Subir Tema" required>

                                <a href="href='/descargarTema/{{$file}}" class="btn-success">Descargar Tema</a>

                                @error('documento_tema')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="documento_tarea" class="col-md-4 col-form-label text-md-right">Documento Tarea</label>

                            <div class="col-md-6">
                                <input id="documento_tarea" type="file" class="form-control" name="documento_tarea" value="Subir Tarea" required>

                                <a href="href='/descargarTarea/{{$file}}" class="btn-success">Descargar Tarea</a>

                                @error('documento_tarea')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <form method="POST" action="{{ url('temas') }}">
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">

                                    <button type="submit" class="btn btn-success">
                                        Añadir
                                    </button>

                                    <button type="submit" class="btn btn-primary">

                                        <a href="{{ url('temas') }}" class="enlaceback">Cancelar</a>

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
