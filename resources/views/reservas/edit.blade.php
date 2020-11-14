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
                <div class="card-header">Modificar Reserva</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ action('ReservaController@update', $id) }}">

                        {{csrf_field()}}
                        
                        <input type="hidden" name="_method" value="PATCH">

                         <div class="form-group row">
                            <label for="codigo" class="col-md-4 col-form-label text-md-right">Codigo</label>

                            <div class="col-md-6">
                                <input id="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ $reserva->codigo }}" required autocomplete="codigo" autofocus>

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
                                    @foreach($reservas as $reserva)
                                        <option value="{{ $reserva->nombre_profesor }}">{{ $reserva->nombre_ profesor}}</option>
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
                                    @foreach($reservas as $reserva)
                                        <option value="{{ $reserva->apellido1_profesor }}">{{ $reserva->apellido1_profesor }}</option>
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
                                    @foreach($reservas as $reserva)
                                        <option value="{{ $reserva->apellido2 }}">{{ $reserva->apellido2_profesor }}</option>
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
                            <label for="etiqueta_aula" class="col-md-4 col-form-label text-md-right">Etiqueta aula</label>

                            <div class="col-md-6">
                                <select id="etiqueta_aula" class="form-control" name="etiqueta_aula" required>
                                    @foreach($reservas as $reserva)
                                        <option value="{{ $reserva->etiqueta_aula }}">{{ $reserva->etiqueta_aula }}</option>
                                    @endforeach
                                </select>

                                @error('etiqueta_aula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">

                                <button type="submit" class="btn btn-success">
                                    Actualizar
                                </button>

                                <button type="submit" class="btn btn-primary">

                                    <a href="{{ url('reservas') }}" class="enlaceback">Cancelar</a>

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
