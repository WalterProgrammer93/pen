@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header">Crear Asignatura</div>

                <div class="card-body">
                    @if (Session('status'))
                        <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif

                      @if ( !empty ($asignatura->id) )

                        <div class="form-group row">
                            <label for="codigo" class="col-md-4 col-form-label text-md-right">Codigo</label>

                            <div class="col-md-6">
                                <input id="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ $asignatura->codigo }}" required autocomplete="codigo" autofocus>

                                @error('codigo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $asignatura->nombre }}" required autocomplete="nombre" autofocus>

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
                                <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ $asignatura->descripcion }}" rows="4" cols="50" required autocomplete="descripcion"/>

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="curso" class="col-md-4 col-form-label text-md-right">Curso</label>

                            <div class="col-md-6">
                                <select id="curso" class="form-control" name="curso" required>
                                    @foreach($asignaturas as $asignatura)
                                        <option value="{{ $asignatura->curso }}">{{ $asignatura->curso }}</option>
                                    @endforeach
                                </select>

                                @error('curso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="aula" class="col-md-4 col-form-label text-md-right">Aula</label>

                            <div class="col-md-6">
                                <select id="aula" class="form-control" name="aula" required>
                                    <option value="">Seleccione una aula</option>
                                    @foreach($asignaturas as $asignatura)
                                        <option value="{{ $asignatura->aula }}">{{ $asignatura->aula }}</option>
                                    @endforeach
                                </select>

                                @error('curso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                      @else

                          <div class="form-group row">
                              <label for="codigo" class="col-md-4 col-form-label text-md-right">Codigo</label>

                              <div class="col-md-6">
                                  <input id="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ old('codigo') }}" required autocomplete="codigo" autofocus>

                                  @error('codigo')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror

                              </div>
                          </div>

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
                              <label for="curso" class="col-md-4 col-form-label text-md-right">Curso</label>

                              <div class="col-md-6">
                                  <select id="curso" class="form-control" name="curso" required>
                                      <option value="">Seleccione un curso</option>
                                      @foreach($cursos as $nombre => $id)
                                          <option value="{{ $nombre }}">{{ $id }}</option>
                                      @endforeach
                                  </select>

                                  @error('curso')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="aula" class="col-md-4 col-form-label text-md-right">Aula</label>

                              <div class="col-md-6">
                                  <select id="aula" class="form-control" name="aula" required>
                                      <option value="">Seleccione una aula</option>
                                      @foreach($aulas as $etiqueta => $id)
                                          <option value="{{ $etiqueta }}">{{ $id }}</option>
                                      @endforeach
                                  </select>

                                  @error('curso')
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
                              <a href="{{ route('asignaturas') }}" class="btn btn-primary">Cancelar</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection
