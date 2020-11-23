@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::check())

                      @if(Auth::user()->hasRole('admin'))
                          <p><a href="{{ url('alumnos')}}" class="alumnos"><img src="https://img.icons8.com/material/30/000000/scroll.png" alt="alumnos">&nbsp; Alumnos</a></p>
                          <p><a href="{{ url('cursos') }}" class="cursos"><img src="https://img.icons8.com/ios-glyphs/30/000000/graduation-cap--v1.png" alt="cursos">&nbsp; Cursos</a></p>
                          <p><a href="{{ url('asignaturas') }}" class="asignaturas"><img src="https://img.icons8.com/ios-glyphs/30/000000/courses.png" alt="asignaturas">&nbsp; Asignaturas</a></p>
                          <p><a href="{{ url('profesores') }}" class="profesores"><img src="https://img.icons8.com/material-rounded/30/000000/teacher.png" alt="profesores">&nbsp; Profesores</a></p>
                          <p><a href="{{ url('notas') }}" class="notas"><img src="https://img.icons8.com/ios-filled/30/000000/report-card.png" alt="notas">&nbsp; Notas</a></p>
                          <p><a href="{{ url('departamentos') }}" class="departamentos"><img src="https://img.icons8.com/ios-filled/30/000000/university.png" alt="departamentos">&nbsp; Departamentos</a></p>
                          <p><a href="{{ url('aulas') }}" class="aulas"><img src="https://img.icons8.com/ios-filled/30/000000/classroom.png" alt="aulas">&nbsp; Aulas</a></p>
                          <p><a href="{{ url('convalidaciones') }}" class="convalidaciones"><img src="https://img.icons8.com/ios-glyphs/30/000000/exam.png" alt="convalidaciones">&nbsp; Convalidaciones</a></p>
                          <p><a href="{{ url('usuarios') }}" class="usuarios"><img src="https://img.icons8.com/material/30/000000/user-male-circle--v1.png"alt="usuarios">&nbsp; Usuarios</a></p>
                          <p><a href="{{ url('tareas') }}" class="tareas"><img src="https://img.icons8.com/ios-filled/30/000000/classroom.png" alt="tareas">&nbsp; Tareas</a></p>
                          <p><a href="{{ url('temas') }}" class="temas"><img src="https://img.icons8.com/ios-glyphs/30/000000/courses.png" alt="temas">&nbsp; Temas</a></p>
                          <p><a href="{{ url('eventos')}}" class="eventos"><img src="https://img.icons8.com/material/30/000000/scroll.png" alt="eventos">&nbsp; Eventos</a></p>
                          <p><a href="{{ url('asistencias')}}" class="asistencias"><img src="https://img.icons8.com/material/30/000000/scroll.png" alt="asistencias">&nbsp; Asistencias</a></p>
                          <p><a href="{{ url('perfiles')}}" class="eventos"><img src="https://img.icons8.com/material/30/000000/user-male-circle--v1.png"alt="usuario">&nbsp; Perfiles</a></p>
                      @elseif (Auth::user()->hasRole('student'))
                          <p><a href="{{ url('cursos') }}" class="cursos"><img src="https://img.icons8.com/ios-glyphs/30/000000/graduation-cap--v1.png" alt="cursos">&nbsp; Cursos</a></p>
                          <p><a href="{{ url('asignaturas') }}" class="asignaturas"><img src="https://img.icons8.com/ios-glyphs/30/000000/courses.png" alt="asignaturas">&nbsp; Asignaturas</a></p>
                          <p><a href="{{ url('notas') }}" class="notas"><img src="https://img.icons8.com/ios-filled/30/000000/report-card.png" alt="notas">&nbsp; Notas</a></p>
                          <p><a href="{{ url('tareas') }}" class="tareas"><img src="https://img.icons8.com/ios-filled/30/000000/classroom.png" alt="tareas">&nbsp; Tareas</a></p>
                          <p><a href="{{ url('temas') }}" class="temas"><img src="https://img.icons8.com/ios-glyphs/30/000000/courses.png" alt="temas">&nbsp; Temas</a></p>
                      @else
                          <script type="text/javascript" src="{{ asset('js/alerts.js') }}" defer></script>
                          <div id="noAutorizado"></div>
                    @else
                        <script type="text/javascript" src="{{ asset('jas/aler')}}" defer></script>
                        <div id="noLogin"></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
