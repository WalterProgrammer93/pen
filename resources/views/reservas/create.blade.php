@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Reserva</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('altaReserva')}}" >
                        
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
                            <label for="nombre_profesor" class="col-md-4 col-form-label text-md-right">Nombre Profesor</label>

                            <div class="col-md-6">
                                <select id="nombre_profesor" class="form-control" name="nombre_profesor" required>
                                    @foreach($profesores as $profesor)
                                        <option value="{{ $profesor->nombre }}">{{ $profesor->nombre }}</option>
                                    @endforeach
                                </select>

                                @error('nombre_profesor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido1_profesor" class="col-md-4 col-form-label text-md-right">Primer apellido Profesor</label>

                            <div class="col-md-6">
                                <select id="apellido1_profesor" class="form-control" name="apellido1_profesor" required>
                                    @foreach($profesores as $profesor)
                                        <option value="{{ $profesor->apellido1 }}">{{ $profesor->apellido1 }}</option>
                                    @endforeach
                                </select>

                                @error('apellido1_profesor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido2_profesor" class="col-md-4 col-form-label text-md-right">Segundo apellido Profesor</label>

                            <div class="col-md-6">
                                <select id="apellido2_profesor" class="form-control" name="apellido2_profesor" required>
                                    @foreach($profesores as $profesor)
                                        <option value="{{ $profesor->apellido2 }}">{{ $profesor->apellido2 }}</option>
                                    @endforeach
                                </select>

                                @error('apellido2_profesor')
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
                                    @foreach($aulas as $aula)
                                        <option value="{{ $aula->etiqueta }}">{{ $aula->etiqueta }}</option>
                                    @endforeach
                                </select>

                                @error('aula')
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
                                Si &nbsp;<input id="reservado" type="checkbox" name="reservado" value="Si" required>&nbsp; No &nbsp;<input id="reservado" type="checkbox" name="reservado" value="No" required>

                                @error('reservado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        
                        <form method="POST" action="{{ url('reservas') }}">
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">

                                    <button type="submit" class="btn btn-success">
                                        Añadir
                                    </button>

                                    <button type="submit" class="btn btn-primary">

                                        <a href="{{ url('reservas') }}" class="enlaceback">Cancelar</a>

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
