@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('asistencias') }}">Asistencias</a></li>
              <li class="breadcrumb-item active" aria-current="page">Crear</li>
            </ol>
          </nav>
            <div class="card">
                <div class="card-header">Crear Asistencia</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::check())
                      @if (!empty($asistencias->id))
                        <form method="POST" action="{{ route('asistencias/actualizar', $asignaturas->id) }}">
                          @csrf
                          <input type="hidden" name="_method" value="PUT">
                          <div class="form-group row">
                              <label for="numero_horas" class="col-md-4 col-form-label text-md-right">Numero Horas</label>
                              <div class="col-md-6">
                                  <input id="numero_horas" type="text" class="form-control @error('numero_horas') is-invalid @enderror" name="numero_horas" value="{{ $asistencia->numero_horas }}" required autocomplete="numero_horas" autofocus>
                                  @error('numero_horas')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="alumno_id" class="col-md-4 col-form-label text-md-right">Alumno</label>
                              <div class="col-md-6">
                                  <select id="alumno_id" class="form-control" name="alumno_id[]" required>
                                      <option value="" disabled>Seleccione un alumno</option>
                                      @foreach($alumnos as $id => $nombre)
                                          <option value="{{ $id }}" {{ $id == $id ? 'selected' : '' }}>{{ $nombre }}</option>
                                      @endforeach
                                  </select>
                                  @error('alumno_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="asignatura_id" class="col-md-4 col-form-label text-md-right">Asignatura</label>
                              <div class="col-md-6">
                                  <select id="asignatura_id" class="form-control" name="asignatura_id[]" required>
                                      <option value="" disabled>Seleccione una asignatura</option>
                                      @foreach($asignaturas as $id => $nombre)
                                          <option value="{{ $id }}" {{ $id == $id ? 'selected' : '' }}>{{ $nombre }}</option>
                                      @endforeach
                                  </select>
                                  @error('asignatura_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-success">Actualizar</button>
                                  <a href="{{ route('asistencias') }}" class="btn btn-primary">Cancelar</a>
                              </div>
                          </div>
                        </form>
                      @else
                        <form method="POST" action="{{ route('asistencias/guardar') }}">
                          @csrf
                          <input type="hidden" name="_method" value="PUT">
                          <div class="form-group row">
                              <label for="numero_horas" class="col-md-4 col-form-label text-md-right">Numero Horas</label>
                              <div class="col-md-6">
                                  <input id="numero_horas" type="text" class="form-control @error('numero_horas') is-invalid @enderror" name="numero_horas" value="{{ old('numero_horas') }}" required autocomplete="numero_horas" autofocus>
                                  @error('numero_horas')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="alumno_id" class="col-md-4 col-form-label text-md-right">Alumno</label>
                              <div class="col-md-6">
                                  <select id="alumno_id" class="form-control" name="alumno_id" required>
                                      <option value="">Seleccione un alumno</option>
                                      @foreach($alumnos as $id => $nombre)
                                          <option value="{{ $id }}" @if($id=='$id') selected @endif>{{ $nombre }}</option>
                                      @endforeach
                                  </select>
                                  @error('alumno_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="asignatura_id" class="col-md-4 col-form-label text-md-right">Asignatura</label>
                              <div class="col-md-6">
                                  <select id="asignatura_id" class="form-control" name="asignatura_id" required>
                                       <option value="">Seleccione una asignatura</option>
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
                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-success">
                                      Añadir
                                  </button>
                                  <button type="submit" class="btn btn-primary">
                                      <a href="{{ url('asistencias') }}" class="enlaceback">Cancelar</a>
                                  </button>
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
@endsection
