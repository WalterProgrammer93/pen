@extends('layouts.app')

@section('content')
@if(Auth::check())
  @if(!empty($eventos->id))
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('eventos') }}">Eventos</a></li>
              <li class="breadcrumb-item active" aria-current="page">Modificar</li>
            </ol>
          </nav>
          <div class="card">
              <div class="card-header">Modificar Evento</div>
                <div class="card-body">
                    @if(Session('status'))
                        <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif

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
                                        <option value="" disabled>Seleccionar disponibilidad</option>
                                        <option value="Disponible" @if(@$eventos->disponibilidad == "Disponible") selected @endif>Disponible</option>
                                        <option value="No Disponible" @if(@$eventos->disponibilidad == "No Disponible") selected @endif>No Disponible</option>
                                    </select>
                                    @error('disponibilidad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="aula_id" class="col-md-4 col-form-label text-md-right">Aula</label>
                                <div class="col-md-6">
                                    <select id="aula_id" class="form-control" name="aula_id[]" required>
                                        <option value="" disabled>Seleccione una aula</option>
                                        @foreach($aulas as $id => $etiqueta)
                                            <option value="{{ $id }}" {{ $id == $eventos->aula->aula_id ? 'selected' : '' }}>{{ $etiqueta }}</option>
                                        @endforeach
                                    </select>
                                    @error('aula_id')
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
                                    <a href="{{ url('eventos') }}" class="btn btn-primary">Cancelar</a>
                                </div>
                            </div>
                          </form>

                        </div>
                    </div>
                </div>
              </div>
          </div>
      </div>
  @else
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
                  <div class="card-header">Crear Evento</div>
                    <div class="card-body">
                        @if(Session('status'))
                            <div class="alert alert-success" role="alert">
                                  {{ session('status') }}
                              </div>
                          @endif
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
                                      <option value="" disabled>Seleccionar disponibilidad</option>
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
                            <div class="form-group row">
                                <label for="aula_id" class="col-md-4 col-form-label text-md-right">Aula</label>
                                <div class="col-md-6">
                                    <select id="aula_id" class="form-control" name="aula_id" required>
                                        <option value="" disabled>Seleccione una aula</option>
                                        @foreach($aulas as $id => $etiqueta)
                                            <option value="{{ $id }}" @if($id=='$id') selected @endif>{{ $etiqueta }}</option>
                                        @endforeach
                                    </select>
                                    @error('aula_id')
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

                  </div>
              </div>
          </div>
        </div>
    </div>
</div>
@endif
@endif
@endsection
