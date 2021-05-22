@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-20">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                 <li class="breadcrumb-item active" aria-current="page">Alumnos</li>
             </ol>
            </nav>
            <div class="card">
                <div class="card-header">Alumnos</div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="col-md-20 justify-content-center m-3">
                        <div class="row justify-content-center m-3">
                            <div class="col-md-4">
                                <input id="buscar" type="text" class="form-control" name="buscar" autocomplete="buscar" placeholder="buscar" autofocus>
                            </div>
                            <div class="col-md-4">
                                <select id="ordenar" class="form-control" name="ordenar" required>
                                    <option value="Ascendente">Ascendente</option>
                                    <option value="Descendente">Descendente</option>
                                </select>
                            </div>
                            <form action="{{ route('alumnos/buscar') }}" method="POST" role="form">
                                @csrf
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido1</th>
                            <th>Apellido2</th>
                            <th>Repite</th>
                            <th>Foto</th>
                            <th>Curso</th>
                            <th colspan="2">Acción</th>
                        </tr>
                        @foreach($alumnos as $alumno)
                            <tr>
                                <td class="v-align-middle">{{ $alumno->nombre }}</td>
                                <td class="v-align-middle">{{ $alumno->apellido1 }}</td>
                                <td class="v-align-middle">{{ $alumno->apellido2 }}</td>
                                <td class="v-align-middle">{{ $alumno->repite }}</td>
                                <td class="v-align-middle"><img src="fotos/{{ $alumno->foto }}"  class="img-responsive"/></td>
                                <td class="v-align-middle">{{ $alumno->curso->nombre }}</td>
                                <td class="v-align-middle">
                                  <form action="{{ route('alumnos/eliminar', $alumno->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                                      <input type="hidden" name="_method" value="PUT">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      @if(Auth::check())
                                          @if(Auth::user()->hasRole('admin'))
                                            <a href="{{ route('alumnos/editar', $alumno->id) }}" class="btn btn-primary">Modificar</a>
                                            <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Eliminar</button>
                                            @include('alerts.dialogos')
                                          @else
                                            @if(Auth::user()->hasRole('student'))
                                              <a href="{{ route('alumnos/editar', $alumno->id) }}" class="btn btn-primary" disabled>Modificar</a>
                                              <button type="submit" class="btn btn-danger" disabled>Eliminar</button>
                                            @else
                                              @if(Auth::user()->hasRole('teacher'))
                                                <a href="{{ route('alumnos/editar', $alumno->id) }}" class="btn btn-primary" disabled>Modificar</a>
                                                <button type="submit" class="btn btn-danger" disabled>Eliminar</button>
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
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center pt-2">
                            {{ $alumnos->appends(['alumnos' => $alumnos])->links() }}
                        </div>
                    </div>
                    <form action="{{ route('alumnos/crear') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-0">
                                <button type="submit" class="btn btn-success">
                                    Crear Alumno
                                </button>
                                <a href="{{ url('home') }}" class="btn btn-primary">Volver a menu</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Bootstrap JS -->
        <!--<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
        <script type="text/javascript">
             function confirmarEliminar()
             {
             var x = confirm("Estas seguro de Eliminar?");
             if (x)
               return true;
             else
               return false;
             }
        </script>-->
    </div>
</div>
@endsection
