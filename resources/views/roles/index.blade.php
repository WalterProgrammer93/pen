@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('roles') }}">Roles</a></li>
              <li class="breadcrumb-item active" aria-current="page">Crear</li>
            </ol>
          </nav>
          <div class="card">
              <div class="card-header">Crear Rol</div>
                <div class="card-body">
                      @if (Session('status'))
                        <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
                      @if (Auth::check())
                        @if (!empty($roles->id))
                          <form method="POST" action="{{ route('roles/actualizar', $roles->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label for="usuario_id" class="col-md-4 col-form-label text-md-right">Usuario</label>
                                <div class="col-md-6">
                                    <select id="usuario_id" class="form-control" name="usuario_id[]" required>
                                        <option value="" disabled>Seleccione un usuario</option>
                                        @foreach($usuarios as $id => $nombre)
                                            <option value="{{ $id }}" {{ $id == $roles->usuario_id ? 'selected' : '' }}>{{ $nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('usuario_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="perfil_id" class="col-md-4 col-form-label text-md-right">Perfil</label>
                                <div class="col-md-6">
                                    <select id="perfil_id" class="form-control" name="perfil_id[]" required>
                                        <option value="" disabled>Seleccione un perfil</option>
                                        @foreach($perfiles as $id => $nombre)
                                            <option value="{{ $id }}" {{ $id == $roles->perfil_id ? 'selected' : '' }}>{{ $nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('perfil_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                    <a href="{{ route('roles') }}" class="btn btn-primary">Cancelar</a>
                                </div>
                            </div>
                          </form>
                        @else
                          <form method="POST" action="{{ route('roles/guardar') }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label for="usuario_id" class="col-md-4 col-form-label text-md-right">Usuario</label>
                                <div class="col-md-6">
                                    <select id="usuario_id" class="form-control" name="usuario_id" required>
                                        <option value="" disabled>Seleccione un usuario</option>
                                        @foreach($usuarios as $id => $nombre)
                                            <option value="{{ $id }} " @if($id=='$id') selected @endif>{{ $nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('usuario_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="perfil_id" class="col-md-4 col-form-label text-md-right">Perfil</label>
                                <div class="col-md-6">
                                    <select id="perfil_id" class="form-control" name="perfil_id" required>
                                        <option value="" disabled>Seleccione un tema</option>
                                        @foreach($perfiles as $id => $nombre)
                                            <option value="{{ $id }}" @if($id=='$id') selected @endif>{{ $nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('perfil_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">Añadir</button>
                                    <a href="{{ route('roles') }}" class="btn btn-primary">Cancelar</a>
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
