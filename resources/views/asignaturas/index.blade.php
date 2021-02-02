@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('asignaturas') }}">Asignturas</a></li>
              <li class="breadcrumb-item active" aria-current="page">Crear</li>
            </ol>
          </nav>
          <div class="card">
              <div class="card-header">Crear Asignatura</div>
                <div class="card-body">
                    @if (Session('status'))
                        <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
                      @if(Auth::check())
                        @if(!empty($asignaturas->id))
                          <form method="POST" action="{{ route('asignaturas/actualizar', $asignaturas->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $asignaturas->nombre }}" required autocomplete="nombre" autofocus>
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
                                    <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ $asignaturas->descripcion }}" rows="4" cols="50" required autocomplete="descripcion"/>
                                    @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="curso_id" class="col-md-4 col-form-label text-md-right">Curso</label>
                                <div class="col-md-6">
                                    <select id="curso_id" class="form-control" name="curso_id[]" required>
                                        <option value="" disabled>Seleccione un curso</option>
                                        @foreach($cursos as $id => $nombre)
                                            <option value="{{ $id }}" {{ $id == $cursos->curso_id ? 'selected' : '' }}>{{ $nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('curso_id')
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
                                            <option value="{{ $id }}" {{ $id == $aulas->aula_id ? 'selected' : '' }}>{{ $etiqueta }}</option>
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
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                    <a href="{{ route('asignaturas') }}" class="btn btn-primary">Cancelar</a>
                                </div>
                            </div>
                          </form>
                          @else
                            <form method="POST" action="{{ route('asignaturas/guardar') }}">
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
                                    <label for="curso_id" class="col-md-4 col-form-label text-md-right">Curso</label>
                                    <div class="col-md-6">
                                        <select id="curso_id" class="form-control" name="curso_id" required>
                                            <option value="" disabled>Seleccione un curso</option>
                                            @foreach($cursos as $id => $nombre)
                                                <option value="{{ $id }}">{{ $nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('curso_id')
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
                                        <a href="{{ route('asignaturas') }}" class="btn btn-primary">Cancelar</a>
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
