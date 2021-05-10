@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('reservas') }}">Reservas</a></li>
              <li class="breadcrumb-item active" aria-current="page">Crear</li>
            </ol>
          </nav>
          <div class="card">
              <div class="card-header">Crear Reserva</div>
                <div class="card-body">
                    @if (Session('status'))
                        <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
                      @if (Auth::check())
                        @if (!empty($reserva->id))
                          <form method="POST" action="{{ route('reservas/actualizar', $reservas->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label for="profesor_id" class="col-md-4 col-form-label text-md-right">Profesor</label>
                                <div class="col-md-6">
                                    <select id="profesor_id" class="form-control" name="profesor_id[]" required>
                                        <option value="" disabled>Seleccione un profesor</option>
                                        @foreach($profesores as $id => $nombre)
                                            <option value="{{ $id }}" {{ $id == $id ? 'selected' : '' }}>{{ $nombre }}</option>
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
                                    <select id="evento_id" class="form-control" name="evento_id[]" required>
                                        <option value="" disabled>Seleccione un evento</option>
                                        @foreach($eventos as $id => $nombre)
                                            <option value="{{ $id }}" {{ $id == $id ? 'selected' : '' }}>{{ $nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('evento_id')
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
                                        <option value="" disabled>Seleccione un aula</option>
                                        @foreach($aulas as $id => $nombre)
                                            <option value="{{ $id }}" {{ $id == $id ? 'selected' : '' }}>{{ $nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('aula_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>
                                <div class="col-md-6">
                                    <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ $reservas->descripcion }}" rows="4" cols="50" required autocomplete="descripcion"></textarea>
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
                                    Si &nbsp;<input id="reservado" type="radio" name="reservado" value="Si"  @if(@$reservas->reservado == "Si") checked @endif required>
                                    No &nbsp;<input id="reservado" type="radio" name="reservado" value="No"  @if(@$reservas->reservado == "No") checked @endif required>
                                    @error('reservado')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                    <a href="{{ route('reservas') }}" class="btn btn-primary">Cancelar</a>
                                </div>
                            </div>
                          </form>
                        @else
                          <form method="POST" action="{{ route('reservas/guardar') }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label for="profesor_id" class="col-md-4 col-form-label text-md-right">Profesor</label>
                                <div class="col-md-6">
                                    <select id="profesor_id" class="form-control" name="profesor_id" required>
                                        <option value="" disabled>Seleccione un profesor</option>
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
                                <label for="evento_id" class="col-md-4 col-form-label text-md-right">Evento</label>
                                <div class="col-md-6">
                                    <select id="evento_id" class="form-control" name="evento_id" required>
                                        <option value="" disabled>Seleccione un evento</option>
                                        @foreach($eventos as $id => $nombre)
                                            <option value="{{ $id }}" @if($id=='$id') selected @endif>{{ $nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('evento_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="evento_id" class="col-md-4 col-form-label text-md-right">Aula</label>
                                <div class="col-md-6">
                                    <select id="aula_id" class="form-control" name="aula_id" required>
                                        <option value="" disabled>Seleccione un aula</option>
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
                                    Si &nbsp;<input id="reservado" type="radio" class="form-control  @error('reservado') is-invalid @enderror" name="reservado" value="Si">
                                    No &nbsp;<input id="reservado" type="radio" class="form-control  @error('reservado') is-invalid @enderror" name="reservado" value="No">
                                    @error('reservado')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">Añadir</button>
                                    <a href="{{ route('reservas') }}" class="btn btn-primary">Cancelar</a>
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
