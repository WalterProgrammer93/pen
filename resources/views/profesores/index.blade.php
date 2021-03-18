@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('profesores') }}">Profesores</a></li>
              <li class="breadcrumb-item active" aria-current="page">Crear</li>
            </ol>
          </nav>
          <div class="card">
              <div class="card-header">Crear Curso</div>
                <div class="card-body">
                      @if(Session('status'))
                        <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
                      @if(Auth::check())
                        @if(!empty($profesores->id))
                          <form method="POST" action="{{ route('profesores/actualizar', $profesores->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ profesores->nombre }}" required autocomplete="nombre" autofocus>
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="apellido1" class="col-md-4 col-form-label text-md-right">Primer Apellido</label>
                                <div class="col-md-6">
                                    <input id="apellido1" type="text" class="form-control @error('apellido1') is-invalid @enderror" name="apellido1" value="{{ profesores->apellido1 }}" required autocomplete="apellido1">
                                    @error('apellido1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="apellido2" class="col-md-4 col-form-label text-md-right">Segundo Apellido</label>
                                <div class="col-md-6">
                                    <input id="apellido2" type="text" class="form-control @error('apellido2') is-invalid @enderror" name="apellido2" value="{{ profesores->apellido2 }}" required autocomplete="apellido2">
                                    @error('apellido2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dni" class="col-md-4 col-form-label text-md-right">DNI</label>
                                <div class="col-md-6">
                                    <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ profesores->dni }}" required autocomplete="dni">
                                    @error('dni')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ profesores->email }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono</label>
                                <div class="col-md-6">
                                    <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ profesores->telefono }}" required autocomplete="telefono">
                                    @error('telefono')
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
                                        <option value="" disabled>Seleccione la disponibilidad</option>
                                        <option value="Disponible" @if(@$profesores->disponibilidad == "Disponible") selected @endif>Disponible</option>
                                        <option value="No Disponible" @if(@$profesores->disponibilidad == "No Disponible") selected @endif>No Disponible</option>
                                    </select>
                                    @error('disponibilidad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="departamento_id" class="col-md-4 col-form-label text-md-right">Departamento</label>
                                <div class="col-md-6">
                                    <select id="departamento_id" class="form-control" name="departamento_id[]" required>
                                        <option value="" disabled>Seleccione un departamento</option>
                                        @foreach($departamentos as $id => $nombre)
                                            <option value="{{ $id }}" {{ $id == $id ? 'selected' : '' }}>{{ $nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('departamento_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                    <a href="{{ route('profesores') }}" class="btn btn-primary">Cancelar</a>
                                </div>
                            </div>
                          </form>
                      @else
                        <form method="POST" action="{{ route('profesores/guardar') }}">
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
                              <label for="apellido1" class="col-md-4 col-form-label text-md-right">Primer Apellido</label>
                              <div class="col-md-6">
                                  <input id="apellido1" type="text" class="form-control @error('apellido1') is-invalid @enderror" name="apellido1" value="{{ old('apellido1') }}" required autocomplete="apellido1">
                                  @error('apellido1')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="apellido2" class="col-md-4 col-form-label text-md-right">Segundo Apellido</label>
                              <div class="col-md-6">
                                  <input id="apellido2" type="text" class="form-control @error('apellido2') is-invalid @enderror" name="apellido2" value="{{ old('apellido2') }}" required autocomplete="apellido2">
                                  @error('apellido2')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="dni" class="col-md-4 col-form-label text-md-right">DNI</label>
                              <div class="col-md-6">
                                  <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" required autocomplete="dni">
                                  @error('dni')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                              <div class="col-md-6">
                                  <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono</label>
                              <div class="col-md-6">
                                  <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono">
                                  @error('telefono')
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
                              <label for="departamento_id" class="col-md-4 col-form-label text-md-right">Departamento</label>
                              <div class="col-md-6">
                                  <select id="departamento_id" class="form-control" name="departamento_id" required>
                                      <option value="">Seleccione un departamento</option>
                                      @foreach($departamento as $id => $nombre)
                                          <option value="{{ $id }}" @if($id=='$id') selected @endif>{{ $nombre }}</option>
                                      @endforeach
                                  </select>
                                  @error('departamento_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-success">Añadir</button>
                                  <a href="{{ route('profesores') }}" class="btn btn-primary">Cancelar</a>
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
