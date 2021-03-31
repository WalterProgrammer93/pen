@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('tareas') }}">Tareas</a></li>
              <li class="breadcrumb-item active" aria-current="page">Crear</li>
            </ol>
          </nav>
          <div class="card">
              <div class="card-header">Crear Tarea</div>
                <div class="card-body">
                      @if (Session('status'))
                        <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
                      @if (Auth::check())
                        @if (!empty($tareas->id))
                          <form method="POST" action="{{ route('tareas/actualizar', $tareas->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label for="titulo" class="col-md-4 col-form-label text-md-right">Titulo</label>
                                <div class="col-md-6">
                                    <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ $tareas->titulo }}" required autocomplete="titulo">
                                    @error('titulo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>
                                <div class="col-md-6">
                                    <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ $tareas->descripcion }}" rows="4" cols="50" required autocomplete="descripcion"></textarea>
                                    @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="autor" class="col-md-4 col-form-label text-md-right">Autor</label>
                                <div class="col-md-6">
                                    <input id="autor" type="text" class="form-control" name="autor" value="{{ $tareas->autor }}" required autocomplete="autor">
                                    @error('autor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fecha_envio" class="col-md-4 col-form-label text-md-right">Fecha envio</label>
                                <div class="col-md-6">
                                    <input id="fecha_envio" type="text" class="form-control" name="fecha_envio" value="{{ $tareas->fecha_envio }}" required autocomplete="fecha_envio">
                                    @error('fecha_envio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fecha_entrega" class="col-md-4 col-form-label text-md-right">Fecha Entrega</label>
                                <div class="col-md-6">
                                    <input id="fecha_entrega" type="text" class="form-control" name="fecha_entrega" value="{{ $tareas->fecha_entrega }}" required autocomplete="fecha_entrega">
                                    @error('fecha_entrega')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hora_entrega" class="col-md-4 col-form-label text-md-right">Hora Entrega</label>
                                <div class="col-md-6">
                                    <input id="hora_entrega" type="text" class="form-control" name="hora_entrega" value="{{ $tareas->hora_entrega }}" required autocomplete="hora_entrega">
                                    @error('hora_entrega')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="archivo_tarea" class="col-md-4 col-form-label text-md-right">Selecciona un archivo:</label>
                                <div class="col-md-6">
                                    <input id="archivo_tarea" type="file" class="form-control btn-success" value="{{ $tareas->archivo_tarea }}" name="archivo_tarea" required>
                                    @if (!empty($tareas->archivo_tarea))
                                      <span>Archivo actual: </span>
                                      <img src="/fotos/{{ $tareas->archivo_tarea }}" width="200" class="img-fluid">
                                    @else
                                      Aún no se ha cargado el archivo
                                    @endif
                                    @error('archivo_tarea')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="calificacion" class="col-md-4 col-form-label text-md-right">Calificacion</label>
                                <div class="col-md-6">
                                    <input id="calificacion" type="text" class="form-control" name="calificacion" value="{{ $tareas->calificacion }}" required autocomplete="calificacion">
                                    @error('calificacion')
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
                            <div class="form-group row">
                                <label for="tema_id" class="col-md-4 col-form-label text-md-right">Tema</label>
                                <div class="col-md-6">
                                    <select id="tema_id" class="form-control" name="tema_id[]" required>
                                        <option value="" disabled>Seleccione un tema</option>
                                        @foreach($temas as $id => $nombre)
                                            <option value="{{ $id }}" {{ $id == $id ? 'selected' : '' }}>{{ $nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('tema_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                    <a href="{{ route('tareas') }}" class="btn btn-primary">Cancelar</a>
                                </div>
                            </div>
                          </form>
                        @else
                          <form method="POST" action="{{ route('tareas/guardar') }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label for="titulo" class="col-md-4 col-form-label text-md-right">Titulo</label>
                                <div class="col-md-6">
                                    <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo') }}" required autocomplete="titulo">
                                    @error('titulo')
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
                                <label for="autor" class="col-md-4 col-form-label text-md-right">Autor</label>
                                <div class="col-md-6">
                                    <input id="autor" type="text" class="form-control" name="autor" required autocomplete="autor">
                                    @error('autor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fecha_envio" class="col-md-4 col-form-label text-md-right">Fecha envio</label>
                                <div class="col-md-6">
                                    <input id="fecha_envio" type="text" class="form-control" name="fecha_envio" required autocomplete="fecha_envio">
                                    @error('fecha_envio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fecha_entrega" class="col-md-4 col-form-label text-md-right">Fecha Entrega</label>
                                <div class="col-md-6">
                                    <input id="fecha_entrega" type="text" class="form-control" name="fecha_entrega" required autocomplete="fecha_entrega">
                                    @error('fecha_entrega')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hora_entrega" class="col-md-4 col-form-label text-md-right">Hora Entrega</label>
                                <div class="col-md-6">
                                    <input id="hora_entrega" type="text" class="form-control" name="hora_entrega" required autocomplete="hora_entrega">
                                    @error('hora_entrega')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="archivo_tarea" class="col-md-4 col-form-label text-md-right">Archivo Tarea</label>
                                <div class="col-md-6">
                                    <input id="archivo_tarea" type="file" class="form-control" name="archivo_tarea" required>
                                    @error('archivo_tarea')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="calificacion" class="col-md-4 col-form-label text-md-right">Calificacion</label>
                                <div class="col-md-6">
                                    <input id="calificacion" type="text" class="form-control" name="calificacion" required autocomplete="calificacion">
                                    @error('calificacion')
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
                                        <option value="" disabled>Seleccione una asignatura</option>
                                        @foreach($asignaturas as $id => $nombre)
                                            <option value="{{ $id }} " @if($id=='$id') selected @endif>{{ $nombre }}</option>
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
                                <label for="tema_id" class="col-md-4 col-form-label text-md-right">Tema</label>
                                <div class="col-md-6">
                                    <select id="tema_id" class="form-control" name="tema_id" required>
                                        <option value="" disabled>Seleccione un tema</option>
                                        @foreach($temas as $id => $nombre)
                                            <option value="{{ $id }}" @if($id=='$id') selected @endif>{{ $nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('tema_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">Añadir</button>
                                    <a href="{{ route('tareas') }}" class="btn btn-primary">Cancelar</a>
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
