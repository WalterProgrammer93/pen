@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('usuarios') }}">Usuarios</a></li>
                <li class="breadcrumb-item active" aria-current="page">Importar</li>
              </ol>
            </nav>
            <div class="card">
                <div class="card-header">Importar datos usuarios</div>
                <div class="card-body">
                    <!-- Obtengo la sesión actual del usuario -->
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <!-- Muestro el mensaje de validación -->
                    @include('alerts.request')
                    <form method="POST" action="{{ route('usuarios/importar') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group row">
                            <label for="file" class="col-md-4 col-form-label text-md-right">Archivo: </label>
                            <div class="col-md-6">
                                <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" accept=".csv">
                            </div>
                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              @if (Auth::check())
                                  @if (Auth::user()->hasRole('admin'))
                                    <button class="btn btn-success">Importar</button>
                                    <a href="{{ route('usuarios') }}" class="btn btn-primary">Cancelar</a>
                                  @else
                                    @if (Auth::user()->hasRole('student'))
                                      <button class="btn btn-success" disabled>Importar</button>
                                      <a href="{{ route('usuarios') }}" class="btn btn-primary">Cancelar</a>
                                    @else
                                      @if (Auth::user()->hasRole('teacher'))
                                        <button class="btn btn-success" disabled>Importar</button>
                                        <a href="{{ route('usuarios') }}" class="btn btn-primary">Cancelar</a>
                                      @else
                                        @if (Auth::user()->hasRole('user'))
                                          <button class="btn btn-success" disabled>Importar</button>
                                          <a href="{{ route('usuarios') }}" class="btn btn-primary">Cancelar</a>
                                        @endif
                                      @endif
                                    @endif
                                  @endif
                              @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
