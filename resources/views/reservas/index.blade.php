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
                    @if (Session('status'))
                        <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
                      @if (!empty($reserva->id))
                          <div class="form-group row">
                              <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>
                              <div class="col-md-6">
                                  <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ $reserva->descripcion }}" rows="4" cols="50" required autocomplete="descripcion"></textarea>
                                  @error('descripcion')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="reservado" class="col-md-4 col-form-label text-md-right">Reservado</label>
                              <div class="col-md-6">
                                  Si &nbsp;<input id="reservado" type="checkbox" name="reservado" value="{{ $reserva->reservado }}" required>&nbsp; No &nbsp;<input id="reservado" type="checkbox" name="reservado" value="{{ $reserva->reservado }}" required>
                                  @error('reservado')
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
                                      @foreach($profesores as $profesor->id)
                                          <option value="{{ $profesor->id }}">{{ $profesor->nombre }}</option>
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
                              <label for="evento_id" class="col-md-4 col-form-label text-md-right">Evento</label>
                              <div class="col-md-6">
                                  <select id="evento_id" class="form-control" name="evento_id" required>
                                      @foreach($eventos as $evento->id)
                                          <option value="{{ $evento->id }}">{{ $evento->nombre }}</option>
                                      @endforeach
                                  </select>
                                  @error('evento_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                      @else
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
                              <label for="reservado" class="col-md-4 col-form-label text-md-right">Reservado</label>
                              <div class="col-md-6">
                                  Si &nbsp;<input id="reservado" type="checkbox" name="reservado" value="Si" required>&nbsp; No &nbsp;<input id="reservado" type="checkbox" name="reservado" value="No" required>
                                  @error('reservado')
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
                                      @foreach($profesores as $profesor)
                                          <option value="{{ $profesor->id }}">{{ $profesor->nombre }}</option>
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
                              <label for="evento_id" class="col-md-4 col-form-label text-md-right">Evento</label>
                              <div class="col-md-6">
                                  <select id="evento_id" class="form-control" name="evento_id" required>
                                      @foreach($eventos as $evento)
                                          <option value="{{ $evento->id }}">{{ $evento->nombre }}</option>
                                      @endforeach
                                  </select>
                                  @error('evento_id')
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
                              <a href="{{ route('reservas') }}" class="btn btn-primary">Cancelar</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection
