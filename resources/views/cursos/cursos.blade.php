@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-20">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                 <li class="breadcrumb-item active" aria-current="page">Cursos</li>
             </ol>
            </nav>
            <div class="card">
                <div class="card-header">Cursos</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('cursos/buscar') }}" method="POST" role="form">
                        @csrf
                        <div class="col-md-20 justify-content-center m-3">
                            <div class="row justify-content-center m-3">
                                <div class="col-md-4">
                                    <input id="buscar" type="text" class="form-control" name="buscar" autocomplete="buscar" placeholder="Buscar" autofocus>
                                </div>
                                <div class="col-md-4">
                                    <form action="{{ route('cursos/filtro') }}" method="POST" role="form">
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
                            <th>Descripcion</th>
                            <th colspan="2">Acción</th>
                        </tr>
                        @foreach($cursos as $curso)
                            <tr>
                                <td class="v-align-middle">{{ $curso->nombre }}</td>
                                <td class="v-align-middle">{{ $curso->descripcion }}</td>
                                <td class="v-align-middle">
                                    <form action="{{ route('cursos/eliminar', $curso->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                                          <input type="hidden" name="_method" value="PUT">
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          @if(Auth::check())
                                            @if(Auth::user()->hasRole('admin'))
                                              <a href="{{ route('cursos/editar', $curso->id) }}" class="btn btn-primary">Modificar</a>
                                              <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Eliminar</button>
                                              @include('alerts.dialogos')
                                            @else
                                              @if(Auth::user()->hasRole('student'))
                                                    <a href="{{ route('cursos/editar', $curso->id) }}" class="btn btn-primary" disabled>Modificar</a>
                                                    <button type="submit" class="btn btn-danger" disabled>Eliminar</button>
                                              @else
                                                  @if(Auth::user()->hasRole('teacher'))
                                                      <a href="{{ route('cursos/editar', $curso->id) }}" class="btn btn-primary" disabled>Modificar</a>
                                                      <button type="submit" class="btn btn-danger" disabled>Eliminar</button>
                                                  @else
                                                      @if(Auth::user()->hasRole('user'))
                                                        <a href="{{ route('cursos/editar', $curso->id) }}" class="btn btn-primary" disabled>Modificar</a>
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
                            {{ $cursos->appends(["cursos" => $cursos])->links() }}
                        </div>
                    </div>
                    <!--<p>{{ $cursos->links() }}</p>-->
                    <form  method="POST" action="{{ route('cursos/crear') }}">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-0">
                                @if (Auth::check())
                                  @if (Auth::user()->hasRole('admin'))
                                    <button type="submit" class="btn btn-success">
                                        Crear Curso
                                    </button>
                                  @else
                                    @if (Auth::user()->hasRole('student'))
                                      <button type="submit" class="btn btn-success" disabled>
                                          Crear Curso
                                      </button>
                                    @else
                                      @if (Auth::user()->hasRole('teacher'))
                                        <button type="submit" class="btn btn-success" disabled>
                                            Crear Curso
                                        </button>
                                      @else
                                        @if(Auth::user()->hasRole('user'))
                                          <button type="submit" class="btn btn-success" disabled>
                                              Crear Curso
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
