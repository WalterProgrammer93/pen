@extends('layouts.app')

@section('content')
@if(Auth::check())
  @if(!empty($notas->id))
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('notas') }}">Notas</a></li>
              <li class="breadcrumb-item active" aria-current="page">Modificar</li>
            </ol>
          </nav>
          <div class="card">
              <div class="card-header">Modificar Nota</div>
                <div class="card-body">
                      @if (Session('status'))
                        <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif

                          <form method="POST" action="{{ route('notas/actualizar', $notas->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label for="eva1" class="col-md-4 col-form-label text-md-right">EVA1</label>
                                <div class="col-md-6">
                                    <input id="eva1" type="text" class="form-control @error('eva1') is-invalid @enderror" name="eva1" value="{{ $notas->eva1 }}" required autocomplete="eva1">
                                    @error('eva1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="eva2" class="col-md-4 col-form-label text-md-right">EVA2</label>
                                <div class="col-md-6">
                                    <input id="eva2" type="text" class="form-control @error('eva2') is-invalid @enderror" name="eva2" value="{{ $notas->eva2 }}" required autocomplete="eva2">
                                    @error('eva2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="eva3" class="col-md-4 col-form-label text-md-right">EVA3</label>
                                <div class="col-md-6">
                                    <input id="eva3" type="text" class="form-control @error('eva3') is-invalid @enderror" name="eva3" value="{{ $notas->eva3 }}" required autocomplete="eva3">
                                    @error('eva3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="media" class="col-md-4 col-form-label text-md-right">Media</label>
                                <div class="col-md-6">
                                    <input id="media" type="text" class="form-control @error('media') is-invalid @enderror" name="media" value="{{ $notas->media }}" required autocomplete="media">
                                    @error('media')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alumno_id" class="col-md-4 col-form-label text-md-right">Alumno</label>
                                <div class="col-md-6">
                                    <select id="alumno_id" class="form-control @error('alumno_id') is-invalid @enderror" name="alumno_id[]" required>
                                        <option value="" disabled>Seleccione un alumno</option>
                                        @foreach($alumnos as $id => $nombre)
                                          <option value="{{ $id }}" {{ $id == $notas->alumno_id ? 'selected' : '' }}>{{ $nombre }}</option>
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
                                    <select id="asignatura_id" class="form-control @error('asignatura_id') is-invalid @enderror" name="asignatura_id[]" required>
                                        <option value="" disabled>Seleccione una asignatura</option>
                                        @foreach($asignaturas as $id => $nombre)
                                          <option value="{{ $id }}" {{ $id == $notas->asignatura_id ? 'selected' : '' }}>{{ $nombre }}</option>
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
                                        Actualizar
                                    </button>
                                    <a href="{{ url('notas') }}" class="btn btn-primary">Cancelar</a>
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
                  <li class="breadcrumb-item"><a href="{{ url('notas') }}">Notas</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Crear</li>
                </ol>
              </nav>
              <div class="card">
                  <div class="card-header">Crear Nota</div>
                    <div class="card-body">
                          @if (Session('status'))
                            <div class="alert alert-success" role="alert">
                                  {{ session('status') }}
                              </div>
                          @endif
                          <form  method="POST" action="{{ route('notas/guardar') }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                               <label for="eva1" class="col-md-4 col-form-label text-md-right">EVA1</label>
                               <div class="col-md-6">
                                   <input id="eva1" type="text" class="form-control @error('eva1') is-invalid @enderror" name="eva1" required autocomplete="eva1">
                                   @error('eva1')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
                           </div>
                           <div class="form-group row">
                               <label for="eva2" class="col-md-4 col-form-label text-md-right">EVA2</label>
                               <div class="col-md-6">
                                   <input id="eva2" type="text" class="form-control @error('eva2') is-invalid @enderror" name="eva2" required autocomplete="eva2">
                                   @error('eva2')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
                           </div>
                           <div class="form-group row">
                               <label for="eva3" class="col-md-4 col-form-label text-md-right">EVA3</label>
                               <div class="col-md-6">
                                   <input id="eva3" type="text" class="form-control @error('eva3') is-invalid @enderror" name="eva3" required autocomplete="eva3">
                                   @error('eva3')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
                           </div>
                           <div class="form-group row">
                               <label for="media" class="col-md-4 col-form-label text-md-right">Media</label>
                               <div class="col-md-6">
                                   <input id="media" type="text" class="form-control @error('media') is-invalid @enderror" name="media" required autocomplete="media">
                                   @error('media')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                               </div>
                           </div>
                           <div class="form-group row">
                               <label for="alumno_id" class="col-md-4 col-form-label text-md-right">Alumno</label>
                               <div class="col-md-6">
                                   <select id="alumno_id" class="form-control @error('alumno_id') is-invalid @enderror" name="alumno_id" required>
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
                                   <select id="asignatura_id" class="form-control @error('asignatura_id') is-invalid @enderror" name="asignatura_id" required>
                                       <option value="">Selecciona una asignatura</option>
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
                                   <button type="submit" class="btn btn-success">Añadir</button>
                                   <a href="{{ route('notas') }}" class="btn btn-primary">Cancelar</a>
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
