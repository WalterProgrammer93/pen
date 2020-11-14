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
                <div class="card-header">Tareas</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table-responsive">

                        <tr>
                            <th>Codigo</th>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Autor</th>
                            <th>Fecha envio</th>
                            <th>Fecha entrega</th>
                            <th>Hora entrega</th>
                            <th>Archivo Tarea</th>
                            <th>Calificacion</th>
                            <th>Asignatura</th>
                            <th>Tema</th>
                            <th colspan="2">Acción</th>
                        </tr>

                        @foreach($tareas as $tarea)

                            <tr>
                                <td>{{ $tarea->codigo }}</td>
                                <td>{{ $tarea->titulo }}</td>
                                <td>{{ $tarea->descripcion }}</td>
                                <td>{{ $tarea->autor }}</td>
                                <td>{{ $tarea->fecha_envio }}</td>
                                <td>{{ $tarea->fecha_entrega }}</td>
                                <td>{{ $tarea->hora_entrega }}</td>
                                <td>{{ $tarea->archivo_tarea }}</td>
                                <td>{{ $tarea->calificacion }}</td>
                                <td>{{ $tarea->asignatura }}</td>
                                <td>{{ $tarea->tema }}</td>
                                <td><a href="{{ action('TareaController@edit', $tarea['id']) }}" class="btn btn-success">Modificar</a></td>
                                <td>
                                    <form  onsubmit="return confirm('Do you really want to delete?');" action="{{action('TareaController@destroy', $tarea->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Eliminar</button>
                                     </form>
                                </td>

                            </tr>

                        @endforeach

                    </table>

                    <form action="{{ url('añadirTarea') }}" method="POST">

                        @csrf

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-0">
                                <button type="submit" class="btn btn-success">
                                    Crear Tarea
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
