@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('temas') }}">Temas</a></li>
              <li class="breadcrumb-item active" aria-current="page">Crear</li>
            </ol>
          </nav>
          <div class="card">
              <div class="card-header">Crear Tema</div>
                <div class="card-body">
                    @if (Session('status'))
                        <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
                      @if(Auth::check())
                        @if (!empty($temas->id))
                          <form method="POST" action="{{ route('temas/actualizar', $temas->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $temas->nombre }}" required autocomplete="nombre" autofocus>
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="contenido" class="col-md-4 col-form-label text-md-right">Contenido</label>
                                <div class="col-md-6">
                                    <textarea id="contenido" class="form-control @error('contenido') is-invalid @enderror" name="contenido" value="{{ $temas->contenido }}" rows="4" cols="50" required autocomplete="contenido"></textarea>
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
                                    <input id="documento_tema" type="file" class="form-control @error('documento_tema') is-invalid @enderror btn-success" name="documento_tema" value="{{ $temas->documento_tema }}" required>
                                    @if (!empty($temas->documento_tema))
                                      <span>Archivo actual: </span>
                                      <img src="/fotos/{{ $temas->documento_tema }}" width="200" class="img-fluid">
                                    @else
                                      Aún no se ha cargado el archivo
                                    @endif
                                    @error('documento_tema')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                    <a href="{{ route('temas') }}" class="btn btn-primary">Cancelar</a>
                                </div>
                            </div>
                          </form>
                        @else
                          <form method="POST" action="{{ route('temas/guardar') }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                <div class="col-md-6">
                                    <textarea id="nombre" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" rows="4" cols="50" required autocomplete="contenido"></textarea>
                                    @error('nombre')
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
                                    @error('documento_tema')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">Añadir</button>
                                    <a href="{{ route('temas') }}" class="btn btn-primary">Cancelar</a>
                                </div>
                            </div>
                          </form>
                        @endif
                      @endif
                  </div>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection
