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
            <form action="{{ url('buscarClase') }}" method="POST">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-20">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                 <li class="breadcrumb-item active" aria-current="page">Clases</li>
             </ol>
            </nav>
            <div class="card">
                <div class="card-header">Clases</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <tr>
                            <th>Asignatura</th>
                            <th>Profesor</th>
                            <th>Horario</th>
                            <th colspan="2">Acción</th>
                        </tr>
                        @foreach($clases as $clase)
                            <tr>
                                <td>{{ $clase->codigo }}</td>
                                <td>{{ $clase->asignatura }}</td>
                                <td>{{ $clase->profesor }}</td>
                                <td>{{ $clase->horario }}</td>
                                <td><a href="{{ action('ClaseController@edit', $clase['id']) }}" class="btn btn-success">Modificar</a></td>
                                <td>
                                    <form  onsubmit="return confirm('Do you really want to delete?');" action="{{action('ClaseController@destroy', $clase->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Eliminar</button>
                                     </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <form action="{{ url('añadirClase') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-0">
                                <button type="submit" class="btn btn-success">
                                    Crear Clase
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
