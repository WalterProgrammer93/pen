@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Evento</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form method="POST" action="{{ url('altaEvento')}}" >
                        
                        @csrf

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
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre">

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
                            <label for="disponibilidad" class="col-md-4 col-form-label text-md-right">Disponibilidad</label>

                            <div class="col-md-6">
                                <select id="disponibilidad" class="form-control" name="disponibilidad" required>
                                    <option value="">Seleccione una disponibilidad</option>
                                    <option value="Disponible">Disponible</option>
                                    <option value="No Disponible">No Disponible</option>
                                </select>

                                @error('disponibilidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <form method="POST" action="{{ url('eventos') }}">
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">

                                    <button type="submit" class="btn btn-success">
                                        Añadir
                                    </button>

                                    <button type="submit" class="btn btn-primary">

                                        <a href="{{ url('eventos') }}" class="enlaceback">Cancelar</a>

                                    </button>
                          
                                </div>             
                            </div>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection