@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-20">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                 <li class="breadcrumb-item active" aria-current="page">Reservas</li>
             </ol>
            </nav>
            <div class="card">
                <div class="card-header">Reservas</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('reservas/buscar') }}" method="POST" role="form">
                        @csrf
                        <div class="col-md-20 justify-content-center m-3">
                            <div class="row justify-content-center m-3">
                                <div class="col-md-4">
                                    <input id="buscar" type="text" class="form-control" name="buscar" autocomplete="buscar" placeholder="Buscar" autofocus>
                                </div>
                                <div class="col-md-4">
                                    <form action="{{ route('reservas/filtro') }}" method="POST" role="form">
                                        <select id="filtro" class="form-control" name="filtro">
                                            <option value="" disabled>Seleccione filtro</option>
                                            <option value="todos">Todos</option>
                                            <option value="ascendente">Ascendente</option>
                                            <option value="descendente">Descendente</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>Profesor</th>
                            <th>Evento</th>
                            <th>Aula</th>
                            <th>Descripcion</th>
                            <th>Reservado</th>
                            <th colspan="2">Acción</th>
                        </tr>
                        @foreach($reservas as $reserva)
                            <tr>
                                <td class="v-align-middle">{{ $reserva->profesor->nombre }}</td>
                                <td class="v-align-middle">{{ $reserva->evento->nombre }}</td>
                                <td class="v-align-middle">{{ $reserva->aula->etiqueta }}</td>
                                <td class="v-align-middle">{{ $reserva->descripcion }}</td>
                                <td class="v-align-middle">{{ $reserva->reservado }}</td>
                                <td class="v-align-middle">
                                  <form action="{{ route('reservas/eliminar', $reserva->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                                      <input type="hidden" name="_method" value="PUT">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      @if(Auth::check())
                                        @if(Auth::user()->hasRole('admin'))
                                          <a href="{{ route('reservas/editar', $reserva->id) }}" class="btn btn-primary">Modificar</a>
                                          <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Eliminar</button>
                                          @include('alerts.dialogos')
                                        @else
                                          @if(Auth::user()->hasRole('student'))
                                            <a href="{{ route('reservas/editar', $reserva->id) }}" class="btn btn-primary" disabled>Modificar</a>
                                            <button type="submit" class="btn btn-danger" disabled>Eliminar</button>
                                          @else
                                            @if(Auth::user()->hasRole('teacher'))
                                              <a href="{{ route('reservas/editar', $reserva->id) }}" class="btn btn-primary">Modificar</a>
                                              <button type="submit" class="btn btn-danger">Eliminar</button>
                                            @else
                                              @if(Auth::user()->hasRole('user'))
                                                <a href="{{ route('reservas/editar', $reserva->id) }}" class="btn btn-primary" disabled>Modificar</a>
                                                <button type="submit" class="btn btn-danger" disabled>Eliminar</button>
                                              @endif
                                            @endif
                                          @endif
                                        @endif
                                      @endif
                                  </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center pt-2">
                            {{ $reservas->appends(["reservas" => $reservas])->links() }}
                        </div>
                    </div>
                    <form action="{{ route('reservas/crear') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-0">
                                @if (Auth::check())
                                  @if (Auth::user()->hasRole('admin'))
                                    <button type="submit" class="btn btn-success">
                                        Crear Reservas
                                    </button>
                                  @else
                                    @if (Auth::user()->hasRole('student'))
                                      <button type="submit" class="btn btn-success" disabled>
                                          Crear Reservas
                                      </button>
                                    @else
                                      @if (Auth::user()->hasRole('teacher'))
                                        <button type="submit" class="btn btn-success">
                                            Crear Reservas
                                        </button>
                                      @else
                                        @if(Auth::user()->hasRole('user'))
                                          <button type="submit" class="btn btn-success" disabled>
                                              Crear Reservas
                                          </button>
                                        @endif
                                      @endif
                                    @endif
                                  @endif
                                  <a href="{{ url('home') }}" class="btn btn-primary">Volver a menu</a>
                                  <a href="{{ route('reservas/exportar') }}" class="btn btn-danger">Exportar CSV</a>
                                  @if (Auth::user()->hasRole('admin'))
                                    <a href="{{ route('reservas/importacion') }}" class="btn btn-warning">Importar CSV</a>
                                  @else
                                    @if (Auth::user()->hasRole('student'))
                                      <a href="{{ route('reservas/importacion') }}" class="btn btn-warning">Importar CSV</a>
                                    @else
                                      @if (Auth::user()->hasRole('teacher'))
                                        <a href="{{ route('reservas/importacion') }}" class="btn btn-warning">Importar CSV</a>
                                      @else
                                        @if (Auth::user()->hasRole('user'))
                                          <a href="{{ route('reservas/importacion') }}" class="btn btn-warning">Importar CSV</a>
                                        @endif
                                      @endif
                                    @endif
                                  @endif
                              @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
