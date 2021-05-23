@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home</div>
                <div class="card-body">
                    @if (Session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::check())
                      @if(Auth::user()->hasRole('admin'))
                      <div class="row">
                          <div class="col-sm"><p><a href="{{ url('alumnos')}}" class="card-link"><img src="https://img.icons8.com/material/30/000000/scroll.png" alt="alumnos">&nbsp; Alumnos</a></p></div>
                          <div class="col-sm"><p><a href="{{ url('cursos') }}" class="card-link"><img src="https://img.icons8.com/ios-glyphs/30/000000/graduation-cap--v1.png" alt="cursos">&nbsp; Cursos</a></p></div>
                          <div class="col-sm"><p><a href="{{ url('asignaturas') }}" class="card-link"><img src="https://img.icons8.com/ios-glyphs/30/000000/courses.png" alt="asignaturas">&nbsp; Asignaturas</a></p></div>
                          <div class="col-sm"><p><a href="{{ url('profesores') }}" class="card-link"><img src="https://img.icons8.com/material-rounded/30/000000/teacher.png" alt="profesores">&nbsp; Profesores</a></p></div>
                          <div class="col-sm"><p><a href="{{ url('notas') }}" class="card-link"><img src="https://img.icons8.com/ios-filled/30/000000/report-card.png" alt="notas">&nbsp; Notas</a></p></div>
                          <div class="col-sm"><p><a href="{{ url('departamentos') }}" class="card-link"><img src="https://img.icons8.com/ios-filled/30/000000/university.png" alt="departamentos">&nbsp; Departamentos</a></p></div>
                          <div class="col-sm"><p><a href="{{ url('aulas') }}" class="card-link"><img src="https://img.icons8.com/ios-filled/30/000000/classroom.png" alt="aulas">&nbsp; Aulas</a></p></div>
                          <div class="col-sm"><p><a href="{{ url('reservas') }}" class="card-link"><img src="https://img.icons8.com/ios-glyphs/30/000000/exam.png" alt="reservas">&nbsp; Reservas</a></p></div>
                          <div class="col-sm"><p><a href="{{ url('usuarios') }}" class="card-link"><img src="https://img.icons8.com/material/30/000000/user-male-circle--v1.png"alt="usuarios">&nbsp; Usuarios</a></p></div>
                          <div class="col-sm"><p><a href="{{ url('tareas') }}" class="card-link"><img src="https://img.icons8.com/ios-filled/30/000000/classroom.png" alt="tareas">&nbsp; Tareas</a></p></div>
                          <div class="col-sm"><p><a href="{{ url('temas') }}" class="card-link"><img src="https://img.icons8.com/ios-glyphs/30/000000/courses.png" alt="temas">&nbsp; Temas</a></p></div>
                          <div class="col-sm"><p><a href="{{ url('eventos')}}" class="card-link"><img src="https://img.icons8.com/material/30/000000/scroll.png" alt="eventos">&nbsp; Eventos</a></p></div>
                          <div class="col-sm"><p><a href="{{ url('asistencias')}}" class="card-link"><img src="https://img.icons8.com/material/30/000000/scroll.png" alt="asistencias">&nbsp; Asistencias</a></p></div>
                          <div class="col-sm"><p><a href="{{ url('perfiles')}}" class="card-link"><img src="https://img.icons8.com/material/30/000000/user-male-circle--v1.png"alt="usuario">&nbsp; Perfiles</a></p></div>
                          <div class="col-sm"><p><a href="{{ url('roles')}}" class="card-link"><img src="https://img.icons8.com/material/30/000000/user-male-circle--v1.png"alt="usuario">&nbsp; Roles</a></p></div>
                        </div>
                      @else
                          @if (Auth::user()->hasRole('user'))
                              <div class="row">
                                  <div class="col-sm"><p><a href="{{ url('cursos') }}" class="card-link"><img src="https://img.icons8.com/ios-glyphs/30/000000/graduation-cap--v1.png" alt="cursos">&nbsp; Cursos</a></p></div>
                                  <div class="col-sm"><p><a href="{{ url('asignaturas') }}" class="card-link"><img src="https://img.icons8.com/ios-glyphs/30/000000/courses.png" alt="asignaturas">&nbsp; Asignaturas</a></p></div>
                              </div>
                          @else
                              @if (Auth::user()->hasRole('student'))
                                  <div class="row">
                                      <div class="col-sm"><p><a href="{{ url('notas') }}" class="card-link"><img src="https://img.icons8.com/ios-filled/30/000000/report-card.png" alt="notas">&nbsp; Notas</a></p></div>
                                      <div class="col-sm"><p><a href="{{ url('tareas') }}" class="card-link"><img src="https://img.icons8.com/ios-filled/30/000000/classroom.png" alt="tareas">&nbsp; Tareas</a></p></div>
                                      <div class="col-sm"><p><a href="{{ url('temas') }}" class="card-link"><img src="https://img.icons8.com/ios-glyphs/30/000000/courses.png" alt="temas">&nbsp; Temas</a></p></div>
                                  </div>
                              @else
                                  @if (Auth::user()->hasRole('teacher'))
                                      <div class="row">
                                          <div class="col-sm"><p><a href="{{ url('alumnos')}}" class="card-link"><img src="https://img.icons8.com/material/30/000000/scroll.png" alt="alumnos">&nbsp; Alumnos</a></p></div>
                                          <div class="col-sm"><p><a href="{{ url('cursos') }}" class="card-link"><img src="https://img.icons8.com/ios-glyphs/30/000000/graduation-cap--v1.png" alt="cursos">&nbsp; Cursos</a></p></div>
                                          <div class="col-sm"><p><a href="{{ url('asignaturas') }}" class="card-link"><img src="https://img.icons8.com/ios-glyphs/30/000000/courses.png" alt="asignaturas">&nbsp; Asignaturas</a></p></div>
                                          <div class="col-sm"><p><a href="{{ url('notas') }}" class="card-link"><img src="https://img.icons8.com/ios-filled/30/000000/report-card.png" alt="notas">&nbsp; Notas</a></p></div>
                                          <div class="col-sm"><p><a href="{{ url('tareas') }}" class="card-link"><img src="https://img.icons8.com/ios-filled/30/000000/classroom.png" alt="tareas">&nbsp; Tareas</a></p></div>
                                          <div class="col-sm"><p><a href="{{ url('temas') }}" class="card-link"><img src="https://img.icons8.com/ios-glyphs/30/000000/courses.png" alt="temas">&nbsp; Temas</a></p></div>
                                          <div class="col-sm"><p><a href="{{ url('asistencias')}}" class="card-link"><img src="https://img.icons8.com/material/30/000000/scroll.png" alt="asistencias">&nbsp; Asistencias</a></p></div>
                                      </div>
                                  @endif
                              @endif
                          @endif
                      @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
