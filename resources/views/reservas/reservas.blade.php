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
        <div class="col-md-20">
            <div class="card">
                <div class="card-header">Reservas</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">

                        <tr>
                            <th>Nombre Profesor</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>Etiqueta Aula</th>
                            <th>Descripcion</th>
                            <th>Reservado</th>
                            <th colspan="2">Acción</th>
                        </tr>

                        @foreach($reservas as $reserva)

                            <tr>

                                <td>{{ $reserva->nombre_profesor }}</td>
                                <td>{{ $reserva->apellido1_profesor }}</td>
                                <td>{{ $reserva->apellido2_profesor }}</td>
                                <td>{{ $reserva->etiqueta_aula }}</td>
                                <td>{{ $reserva->descripcion }}</td>
                                <td>{{ $reserva->reservado }}</td>
                                <td><a href="{{ action('ReservaController@edit', $reserva['id']) }}" class="btn btn-success">Modificar</a></td>
                                <td>
                                    <form  onsubmit="return confirm('Do you really want to delete?');" action="{{action('ReservaController@destroy', $reserva->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Eliminar</button>
                                     </form>
                                </td>

                            </tr>

                        @endforeach

                    </table>

                    <form action="{{ url('añadirReserva') }}" method="POST">

                        @csrf

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-0">
                                <button type="submit" class="btn btn-success">
                                    Crear Reserva
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <a href="{{ url('home') }}" class="enlaceback">Volver a menu</a>
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
