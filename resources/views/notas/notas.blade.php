@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-20">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                 <li class="breadcrumb-item active" aria-current="page">Notas</li>
             </ol>
            </nav>
            <div class="card">
                <div class="card-header">Notas</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('notas/buscar') }}" method="POST" role="form">
                        @csrf
                        <div class="col-md-20 justify-content-center m-3">
                            <div class="row justify-content-center m-3">
                                <div class="col-md-4">
                                    <input id="buscar" type="text" class="form-control" name="buscar" autocomplete="buscar" placeholder="Buscar" autofocus>
                                </div>
                                <div class="col-md-4">
                                    <form action="{{ route('notas/filtro') }}" method="POST" role="form">
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
                            <th>EVA1</th>
                            <th>EVA2</th>
                            <th>EVA3</th>
                            <th>Media</th>
                            <th>Alumno</th>
                            <th>Asignatura</th>
                            <th colspan="2">Acción</th>
                        </tr>
                        @foreach($notas as $nota)
                            <tr>
                                <td class="v-align-middle">{{ $nota->eva1 }}</td>
                                <td class="v-align-middle">{{ $nota->eva2 }}</td>
                                <td class="v-align-middle">{{ $nota->eva3 }}</td>
                                <td class="v-align-middle">{{ $nota->media }}</td>
                                <td class="v-align-middle">{{ $nota->alumno->nombre }}</td>
                                <td class="v-align-middle">{{ $nota->asignatura->nombre }}</td>
                                <td class="v-align-middle">
                                  <form action="{{ route('notas/eliminar', $nota->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                                      <input type="hidden" name="_method" value="PUT">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      @if(Auth::check())
                                        @if(Auth::user()->hasRole('admin'))
                                          <a href="{{ route('notas/editar', $nota->id) }}" class="btn btn-primary">Modificar</a>
                                          <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Eliminar</button>
                                          <a href="{{ route('notas/ver', $nota->id )}}" class="btn btn-warning">Ver</a>
                                          @include('alerts.dialogos')
                                        @else
                                          @if(Auth::user()->hasRole('student'))
                                            <a href="{{ route('notas/editar', $nota->id) }}" class="btn btn-primary" disabled>Modificar</a>
                                            <button type="submit" class="btn btn-danger" disabled>Eliminar</button>
                                            <a href="{{ route('notas/ver', $nota->id )}}" class="btn btn-warning">Ver</a>
                                          @else
                                            @if(Auth::user()->hasRole('teacher'))
                                              <a href="{{ route('notas/editar', $nota->id) }}" class="btn btn-primary">Modificar</a>
                                              <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Eliminar</button>
                                              <a href="{{ route('notas/ver', $nota->id )}}" class="btn btn-warning">Ver</a>
                                              @include('alerts.dialogos')
                                            @else
                                              @if(Auth::user()->hasRole('user'))
                                                <a href="{{ route('notas/editar', $nota->id) }}" class="btn btn-primary" disabled>Modificar</a>
                                                <button type="submit" class="btn btn-danger" disabled>Eliminar</button>
                                                <a href="{{ route('notas/ver', $nota->id )}}" class="btn btn-warning" disabled>Ver</a>
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
                            {{ $notas->appends(["notas" => $notas])->links() }}
                        </div>
                    </div>
                    <form action="{{ route('notas/crear') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-0">
                                @if (Auth::check())
                                  @if (Auth::user()->hasRole('admin'))
                                    <button type="submit" class="btn btn-success">
                                        Crear Nota
                                    </button>
                                  @else
                                    @if (Auth::user()->hasRole('student'))
                                      <button type="submit" class="btn btn-success" disabled>
                                          Crear Nota
                                      </button>
                                    @else
                                      @if (Auth::user()->hasRole('teacher'))
                                        <button type="submit" class="btn btn-success">
                                            Crear Nota
                                        </button>
                                      @else
                                        @if(Auth::user()->hasRole('user'))
                                          <button type="submit" class="btn btn-success" disabled>
                                              Crear Nota
                                          </button>
                                        @endif
                                      @endif
                                    @endif
                                  @endif
                                @endif
                                <a href="{{ url('home') }}" class="btn btn-primary">Volver a menu</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
