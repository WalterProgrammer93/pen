@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-20">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Tareas</li>
               </ol>
              </nav>
            <div class="card">
                <div class="card-header">Tareas</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('tareas/buscar') }}" method="POST" role="form">
                        @csrf
                        <div class="col-md-20 justify-content-center m-3">
                            <div class="row justify-content-center m-3">
                                <div class="col-md-4">
                                    <input id="buscar" type="text" class="form-control" name="buscar" autocomplete="buscar" placeholder="Buscar" autofocus>
                                </div>
                                <div class="col-md-4">
                                    <form action="{{ route('tareas/filtro') }}" method="POST" role="form">
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
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Fecha entrega</th>
                            <th>Hora entrega</th>
                            <th>Documento Tarea</th>
                            <th>Subir Documento</th>
                            <th>Calificacion</th>
                            <th>Asignatura</th>
                            <th>Tema</th>
                            <th colspan="2">Acción</th>
                        </tr>
                        @foreach($tareas as $tarea)
                            <tr>
                                <td class="v-align-middle">{{ $tarea->titulo }}</td>
                                <td class="v-align-middle">{{ $tarea->autor }}</td>
                                <td class="v-align-middle">{{ $tarea->fecha_entrega }}</td>
                                <td class="v-align-middle">{{ $tarea->hora_entrega }}</td>
                                <td class="v-align-middle"><img src="documentos/{{ $tarea->documento_tarea }}"  class="img-responsive" width="50"/>{{ $tarea->documento_tarea }}</td>
                                <td class="v-align-middle"><img src="documentos/{{ $tarea->subir_documento }}" class="img-responsive" width="50"/>{{ $tarea->subir_documento }}</td>
                                <td class="v-align-middle">{{ $tarea->calificacion }}</td>
                                <td class="v-align-middle">{{ $tarea->asignatura->nombre }}</td>
                                <td class="v-align-middle">{{ $tarea->tema->nombre }}</td>
                                <td class="v-align-middle">
                                  <form action="{{ route('tareas/eliminar', $tarea->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                                      <input type="hidden" name="_method" value="PUT">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      @if(Auth::check())
                                        @if(Auth::user()->hasRole('admin'))
                                          <a href="{{ route('tareas/editar', $tarea->id) }}" class="btn btn-primary">Modificar</a>
                                          <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Eliminar</button>
                                          @include('alerts.dialogos')
                                        @else
                                          @if(Auth::user()->hasRole('student'))
                                            <a href="{{ route('tareas/editar', $alumno->id) }}" class="btn btn-primary">Modificar</a>
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                            @include('alerts.dialogos')
                                          @else
                                            @if(Auth::user()->hasRole('teacher'))
                                              <a href="{{ route('tareas/editar', $alumno->id) }}" class="btn btn-primary">Modificar</a>
                                              <button type="submit" class="btn btn-danger">Eliminar</button>
                                              @include('alerts.dialogos')
                                            @else
                                              @if(Auth::user()->hasRole('user'))
                                                <a href="{{ route('tareas/editar', $alumno->id) }}" class="btn btn-primary" disabled>Modificar</a>
                                                <button type="submit" class="btn btn-danger" disabled>Eliminar</button>
                                                @include('alerts.dialogos')
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
                            {{ $tareas->appends(["tareas" => $tareas])->links() }}
                        </div>
                    </div>
                    <form action="{{ route('tareas/crear') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-0">
                                @if (Auth::check())
                                  @if (Auth::user()->hasRole('admin'))
                                    <button type="submit" class="btn btn-success">
                                        Crear Tarea
                                    </button>
                                  @else
                                    @if (Auth::user()->hasRole('student'))
                                      <button type="submit" class="btn btn-success" disabled>
                                          Crear Tarea
                                      </button>
                                    @else
                                      @if (Auth::user()->hasRole('teacher'))
                                        <button type="submit" class="btn btn-success">
                                            Crear Tarea
                                        </button>
                                      @else
                                        @if(Auth::user()->hasRole('user'))
                                          <button type="submit" class="btn btn-success" disabled>
                                              Crear Tarea
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
