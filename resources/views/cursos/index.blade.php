@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('cursos') }}">Cursos</a></li>
              <li class="breadcrumb-item active" aria-current="page">Crear</li>
            </ol>
          </nav>
          <div class="card">
              <div class="card-header">Crear Curso</div>
                <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                      @endif
                      @if(Auth::check())
                        @if(Auth::user()->hasRole('admin'))
                          @if (!empty($cursos->id))
                              <form method="POST" action="{{ route('cursos/update', $cursos->id) }}" role="form">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group row">
                                    <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                    <div class="col-md-6">
                                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $cursos->nombre }}" required autocomplete="nombre" autofocus>
                                        @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>
                                    <div class="col-md-6">
                                        <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ $cursos->descripcion }}" rows="4" cols="50" required autocomplete="descripcion"></textarea>
                                        @error('descripcion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success">Actualizar</button>
                                        <a href="{{ route('cursos') }}" class="btn btn-primary">Cancelar</a>
                                    </div>
                                </div>
                            </form>
                          @else
                              <form method="POST" action="{{ route('cursos/store') }}">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group row">
                                    <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                    <div class="col-md-6">
                                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                                        @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="decripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>
                                    <div class="col-md-6">
                                        <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}" rows="4" cols="50" required autocomplete="descripcion"></textarea>
                                        @error('descripcion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success">Añadir</button>
                                        <a href="{{ route('cursos') }}" class="btn btn-primary">Cancelar</a>
                                    </div>
                                </div>
                            </form>
                          @endif
                        @else
                          @if(Auth::user()->hasRole('student'))
                            <div>No tiene permisos</div>
                          @else
                              @if(Auth::user()->hasRole('teacher'))
                                  <div>Tiene permisos</div>
                              @else
                                  @if(Auth::user()->hasRole('user'))
                                      <div>No tiene permisos</div>
                                  @endif
                              @endif
                          @endif
                        @endif
                      @endif
                  </div>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection
