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
            <form action="{{ url('buscarDepartamento') }}" method="POST">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modificar Departamento</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form method="POST" action="{{ action('DepartamentoController@update', $departamento->id) }}">

                        {{csrf_field()}}
                        
                        <input type="hidden" name="_method" value="PATCH">

                        <div class="form-group row">
                            <label for="codigo" class="col-md-4 col-form-label text-md-right">Codigo</label>

                            <div class="col-md-6">
                                <input id="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ $departamento->codigo }}" required autocomplete="codigo" autofocus>

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
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $departamento->nombre }}" required autocomplete="nombre" autofocus>

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
                                <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ $departamento->descripcion }}" rows="4" cols="50" required autocomplete="descripcion"></textarea>

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">Estado</label>

                            <div class="col-md-6">
                                <select id="estado" class="form-control" name="estado" required>
                                    <option value="{{ $departamento->estado }}">{{ $departamento->estado }}</option>
                                    <option value="Cerrado">Cerrado</option>
                                </select>

                                @error('estado')
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

                                    <a href="{{ url('departamentos') }}" class="enlaceback">Cancelar</a>

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
