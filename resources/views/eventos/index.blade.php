@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('eventos') }}">Eventos</a></li>
              <li class="breadcrumb-item active" aria-current="page">Crear</li>
            </ol>
          </nav>
          <div class="card">
              <div class="card-header">Crear Curso</div>
                <div class="card-body">
                    @if (Session('status'))
                        <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
                      @if(Auth::check())
                        @if (!empty($eventos->id))
                          <form method="POST" action="{{ route('eventos/actualizar', $eventos->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $eventos->nombre }}" required autocomplete="nombre">
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
                                    <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ $eventos->descripcion }}" rows="4" cols="50" required autocomplete="descripcion"></textarea>
                                    @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="disponibilidad" class="col-md-4 col-form-label text-md-right">Disponibilidad</label>
                                <div class="col-md-6">
                                    <select id="disponibilidad" class="form-control" name="disponibilidad" required>
                                        <option value="{{ $evento->disponibilidad }}">{{ $evento->disponibilidad }}</option>
                                        <option value="No Disponible">No Disponible</option>
                                    </select>
                                    @error('disponibilidad')
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
                                        <a href="{{ url('eventos') }}" class="enlaceback">Cancelar</a>
                                    </button>
                                </div>
                            </div>
                          </form>
                        @else
                          <form method="POST" action="{{ route('eventos/guardar') }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre">
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
                                    <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}" rows="4" cols="50" required autocomplete="descripcion"></textarea>
                                    @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="disponibilidad" class="col-md-4 col-form-label text-md-right">Disponibilidad</label>
                                <div class="col-md-6">
                                    <select id="disponibilidad" class="form-control" name="disponibilidad" required>
                                        <option value="">Seleccione una disponibilidad</option>
                                        <option value="Disponible">Disponible</option>
                                        <option value="No Disponible">No Disponible</option>
                                    </select>
                                    @error('disponibilidad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">Añadir</button>
                                    <a href="{{ route('eventos') }}" class="btn btn-primary">Cancelar</a>
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
