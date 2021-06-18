@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-20">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
               </ol>
              </nav>
            <div class="card">
                <div class="card-header">Usuarios</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('usuarios/buscar') }}" method="POST" role="form">
                        @csrf
                        <div class="col-md-20 justify-content-center m-3">
                            <div class="row justify-content-center m-3">
                                <div class="col-md-4">
                                    <input id="buscar" type="text" class="form-control" name="buscar" autocomplete="buscar" placeholder="Buscar" autofocus>
                                </div>
                                <div class="col-md-4">
                                    <form action="{{ route('usuarios/filtro') }}" method="POST" role="form">
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
                            <th>Nombre</th>
                            <th>Email</th>
                            <th colspan="2">Acción</th>
                        </tr>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td class="v-align-middle">{{ $usuario->nombre }}</td>
                                <td class="v-align-middle">{{ $usuario->email }}</td>
                                <td class="v-align-middle">
                                  <form action="{{ route('usuarios/eliminar', $usuario->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                                      <input type="hidden" name="_method" value="PUT">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      @if(Auth::check())
                                        @if(Auth::user()->hasRole('admin'))
                                          <a href="{{ route('usuarios/editar', $usuario->id) }}" class="btn btn-primary">Modificar</a>
                                          <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Eliminar</button>
                                          @include('alerts.dialogos')
                                        @else
                                          @if(Auth::user()->hasRole('student'))
                                            <a href="{{ route('usuarios/editar', $usuario->id) }}" class="btn btn-primary" disabled>Modificar</a>
                                            <button type="submit" class="btn btn-danger" disabled>Eliminar</button>
                                          @else
                                            @if(Auth::user()->hasRole('teacher'))
                                              <a href="{{ route('usuarios/editar', $usuario->id) }}" class="btn btn-primary" disabled>Modificar</a>
                                              <button type="submit" class="btn btn-danger" disabled>Eliminar</button>
                                            @else
                                              @if(Auth::user()->hasRole('user'))
                                                <a href="{{ route('usuarios/editar', $tema->id) }}" class="btn btn-primary" disabled>Modificar</a>
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
                    {{ $usuarios->links() }}
                    <form  method="POST" action="{{ route('usuarios/crear') }}">
                        {{csrf_field()}}
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-0">
                                @if (Auth::check())
                                  @if (Auth::user()->hasRole('admin'))
                                    <button type="submit" class="btn btn-success">
                                        Crear Usuario
                                    </button>
                                  @else
                                    @if (Auth::user()->hasRole('student'))
                                      <button type="submit" class="btn btn-success" disabled>
                                          Crear Usuario
                                      </button>
                                    @else
                                      @if (Auth::user()->hasRole('teacher'))
                                        <button type="submit" class="btn btn-success" disabled>
                                            Crear Usuario
                                        </button>
                                      @else
                                        @if(Auth::user()->hasRole('user'))
                                          <button type="submit" class="btn btn-success" disabled>
                                              Crear Usuario
                                          </button>
                                        @endif
                                      @endif
                                    @endif
                                  @endif
                                  <a href="{{ url('home') }}" class="btn btn-primary">Volver a menu</a>
                                  <a href="{{ route('usuarios/exportar') }}" class="btn btn-danger">Exportar CSV</a>
                                  @if (Auth::user()->hasRole('admin'))
                                    <a href="{{ route('usuarios/importacion') }}" class="btn btn-warning">Importar CSV</a>
                                  @else
                                    @if (Auth::user()->hasRole('student'))
                                      <a href="{{ route('usuarios/importacion') }}" class="btn btn-warning">Importar CSV</a>
                                    @else
                                      @if (Auth::user()->hasRole('teacher'))
                                        <a href="{{ route('usuarios/importacion') }}" class="btn btn-warning">Importar CSV</a>
                                      @else
                                        @if (Auth::user()->hasRole('user'))
                                          <a href="{{ route('usuarios/importacion') }}" class="btn btn-warning">Importar CSV</a>
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
