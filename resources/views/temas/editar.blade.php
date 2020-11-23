@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-20 justify-content-center m-3">
        <div class="row justify-content-center m-3">
            <div class="col-md-3">
                <input id="buscar" type="text" class="form-control" name="buscar" autocomplete="buscar" placeholder="Buscar" autofocus>
            </div>
            <div class="col-md-3">
                <select id="ordenar" class="form-control" name="ordenar" required>
                    <option value="Ascendente">Ascendente</option>
                    <option value="Descendente">Descendente</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modificar Tema</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form method="POST" action="{{ action('TemaController@update', $id) }}">

                        {{csrf_field()}}
                        
                        <input type="hidden" name="_method" value="PATCH">

                        <div class="form-group row">
                            <label for="codigo" class="col-md-4 col-form-label text-md-right">Codigo</label>

                            <div class="col-md-6">
                                <input id="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ $tema->codigo }}" required autocomplete="codigo" autofocus>

                                @error('codigo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contenido" class="col-md-4 col-form-label text-md-right">Contenido</label>

                            <div class="col-md-6">
                                <textarea id="contenido" class="form-control @error('contenido') is-invalid @enderror" name="contenido" value="{{ $tema->contenido }}" rows="4" cols="50" required autocomplete="contenido"></textarea> 
                                @error('contenido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="documento_tema" class="col-md-4 col-form-label text-md-right">Documento Tema</label>

                            <div class="col-md-6">
                                <input id="documento_tema" type="file" class="form-control @error('documento_tema') is-invalid @enderror btn-success" name="documento_tema" value="{{ $tema->documento_tema }}" required>
                                Subir Tema

                                <a href="/descargarTema/{{$file}}" id="descargar_tema" type="file" class="form-control btn-success" name="descargar_tema">
                                Descargar Tema</a>

                                @error('documento_tema')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="documento_tarea" class="col-md-4 col-form-label text-md-right">Documento Tarea</label>

                            <div class="col-md-6">
                                <input id="documento_tarea" type="file" class="form-control @error('documento_tarea') is-invalid @enderror btn-success" name="documento_tarea" value="{{ $tema->documento_tarea }}" required>
                                Subir Tarea

                                <a href="/descargarTarea/{{$file}}" id="descargar_tarea" type="file" class="form-control btn-success" name="descargar_tarea">
                                Descargar Tarea</a>

                                @error('documento_tarea')
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

                                <button type="submit" class="btn btn-primary">
                                    <a href="{{ url('temas') }}" class="enlaceback">Cancelar</a>
                                </button>
                            </div>             
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
