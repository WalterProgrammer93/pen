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
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>Titulo</th>
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
                                <td class="v-align-middle">{{ $tarea->titulo }}</td>
                                <td class="v-align-middle">{{ $tarea->autor }}</td>
                                <td class="v-align-middle">{{ $tarea->fecha_envio }}</td>
                                <td class="v-align-middle">{{ $tarea->fecha_entrega }}</td>
                                <td class="v-align-middle">{{ $tarea->hora_entrega }}</td>
                                <td class="v-align-middle"><img src="{{!! asset('fotos/$tarea->archivo_tarea') !!}}"  class="img-responsive" width="50"/>{{ $tarea->archivo_tarea }}</td>
                                <td class="v-align-middle">{{ $tarea->calificacion }}</td>
                                <td class="v-align-middle">{{ $tarea->asignatura_id }}</td>
                                <td class="v-align-middle">{{ $tarea->tema_id }}</td>
                                <td class="v-align-middle">
                                  <form action="{{ route('tareas/eliminar', $tarea->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                                      <input type="hidden" name="_method" value="PUT">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      @if(Auth::check())
                                        @if(Auth::user()->hasRole('admin'))
                                          <a href="{{ route('tareas/actualizar', $tarea->id) }}" class="btn btn-primary">Modificar</a>
                                          <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Eliminar</button>
                                          @include('alerts.dialogos')
                                        @else
                                          @if(Auth::user()->hasRole('student'))
                                            <a href="{{ route('alumnos/editar', $alumno->id) }}" class="btn btn-primary">Modificar</a>
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                          @else
                                            @if(Auth::user()->hasRole('teacher'))
                                              <a href="{{ route('alumnos/editar', $alumno->id) }}" class="btn btn-primary">Modificar</a>
                                              <button type="submit" class="btn btn-danger">Eliminar</button>
                                            @else
                                              @if(Auth::user()->hasRole('user'))
                                                <a href="{{ route('alumnos/editar', $alumno->id) }}" class="btn btn-primary" disabled>Modificar</a>
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
                    <form action="{{ route('tareas/crear') }}" method="POST">
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
