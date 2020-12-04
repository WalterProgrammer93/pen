@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('perfiles') }}">Perfiles</a></li>
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
                      @if (!empty($perfil->id))
                          <div class="form-group row">
                              <label for="perfil" class="col-md-4 col-form-label text-md-right">Perfil</label>
                              <div class="col-md-6">
                                  <input id="perfil" type="text" class="form-control @error('perfil') is-invalid @enderror" name="perfil" value="{{ $perfil->perfil }}" required autocomplete="nombre" autofocus>
                                  @error('perfil')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="perfil" class="col-md-4 col-form-label text-md-right">Descripcion</label>
                              <div class="col-md-6">
                                  <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ $perfil-descripcion }}" required autocomplete="nombre" autofocus>
                                  @error('descripcion')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                      @else
                          <div class="form-group row">
                              <label for="perfil" class="col-md-4 col-form-label text-md-right">Perfil</label>
                              <div class="col-md-6">
                                  <input id="perfil" type="text" class="form-control @error('perfil') is-invalid @enderror" name="perfil" value="{{ old('perfil') }}" required autocomplete="perfil" autofocus>
                                  @error('perfil')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>
                              <div class="col-md-6">
                                  <textarea id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}" required autocomplete="descripcion" autofocus>
                                  @error('descripcion')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                      @endif
                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-success">Añadir</button>
                              <a href="{{ route('perfiles') }}" class="btn btn-primary">Cancelar</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection
