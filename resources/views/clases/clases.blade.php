@extends('layouts.app')

@section('content')
<div class="container">
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
                    <div class="col-md-20 justify-content-center m-3">
                        <div class="row justify-content-center m-3">
                            <div class="col-md-4">
                                <input id="buscar" type="text" class="form-control" name="buscar" autocomplete="buscar" placeholder="Buscar" autofocus>
                            </div>
                            <div class="col-md-4">
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
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>Asignatura</th>
                            <th>Profesor</th>
                            <th>Horario</th>
                            <th colspan="2">Acción</th>
                        </tr>
                        @foreach($clases as $clase)
                            <tr>
                                <td class="v-align-middle">{{ $clase->asignatura }}</td>
                                <td class="v-align-middle">{{ $clase->profesor }}</td>
                                <td class="v-align-middle">{{ $clase->horario }}</td>
                                <td class="v-align-middle">
                                  <form action="{{ route('clases/eliminar', $clase->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                                      <input type="hidden" name="_method" value="PUT">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <a href="{{ route('clases/actualizar', $clase->id) }}" class="btn btn-primary">Modificar</a>
                                      <button type="submit" class="btn btn-danger">Eliminar</button>
                                  </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center pt-2">
                            {{ $clases->appends(["clases" => $clases])->links() }}
                        </div>
                    </div>
                    <form action="{{ route('clases/crear') }}" method="POST">
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
