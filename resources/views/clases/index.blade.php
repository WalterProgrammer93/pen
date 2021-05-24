@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('clases') }}">Clases</a></li>
              <li class="breadcrumb-item active" aria-current="page">Crear</li>
            </ol>
          </nav>
            <div class="card">
                <div class="card-header">Crear Clase</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::check())
                      @if(!empty($clases->id))
                        <form method="POST" action="{{ route('clases/actualizar', $clases->id) }}">
                          @csrf
                          <input type="hidden" name="_method" value="PUT">
                          <div class="form-group row">
                              <label for="asignatura_id" class="col-md-4 col-form-label text-md-right">Asignatura</label>
                              <div class="col-md-6">
                                  <select id="asignatura_id" class="form-control" name="asignatura_id[]" required>
                                      <option value="" disabled>Seleccione una asignatura</option>
                                      @foreach($asignaturas as $id => $nombre)
                                          <option value="{{ $id }}" {{ $id == $clases->asignatura_id ? 'selected' : '' }}>{{ $nombre }}</option>
                                      @endforeach
                                  </select>
                                  @error('asignatura_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="profesor_id" class="col-md-4 col-form-label text-md-right">Profesor</label>
                              <div class="col-md-6">
                                  <select id="profesor_id" class="form-control" name="profesor[]" required>
                                      <option value="" disabled>Seleccione un profesor</option>
                                      @foreach($profesores as $id => $nombre)
                                          <option value="{{ $id }}" {{ $id == $clases->profesor_id ? 'selected' : '' }}>{{ $nombre }}</option>
                                      @endforeach
                                  </select>
                                  @error('profesor_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="horario" class="col-md-4 col-form-label text-md-right">Horario</label>
                              <div class="col-md-6">
                                  <textarea id="horario" type="text" class="form-control @error('horario') is-invalid @enderror" name="horario" value="{{ $clases->horario }}" required autocomplete="horario" autofocus></textarea>
                                  @error('horario')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-success">Actualizar</button>
                                  <a href="{{ url('clases') }}" class="btn btn-primary">Cancelar</a>
                              </div>
                          </div>
                        </form>
                      @else
                        <form method="POST" action="{{ route('clases/guardar') }}">
                          @csrf
                          <input type="hidden" name="_method" value="PUT">
                          <div class="form-group row">
                              <label for="asignatura_id" class="col-md-4 col-form-label text-md-right">Asignatura</label>
                              <div class="col-md-6">
                                  <select id="asignatura_id" class="form-control" name="asignatura_id" required>
                                      <option value="">Seleccione un asignatura</option>
                                      @foreach($asignaturas as $id => $nombre)
                                          <option value="{{ $id }}" @if($id=='$id') selected @endif>{{ $nombre }}</option>
                                      @endforeach
                                  </select>
                                  @error('asignatura_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="profesor_id" class="col-md-4 col-form-label text-md-right">Profesor</label>
                              <div class="col-md-6">
                                  <select id="profesor_id" class="form-control" name="profesor_id" required>
                                      <option value="">Seleccione un profesor</option>
                                      @foreach($profesores as $id => $nombre)
                                          <option value="{{ $id }}" @if($id=='$id') selected @endif>{{ $nombre }}</option>
                                      @endforeach
                                  </select>
                                  @error('profesor_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="horario" class="col-md-4 col-form-label text-md-right">Horario</label>
                              <div class="col-md-6">
                                  <textarea id="horario" type="text" class="form-control @error('horario') is-invalid @enderror" name="horario" value="{{ old('horario') }}" required autocomplete="horario" autofocus></textarea>
                                  @error('horario')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-success">
                                      Añadir
                                  </button>
                                  <a href="{{ url('clases') }}" class="btn btn-primary">Cancelar</a>
                              </div>
                          </div>
                      @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
