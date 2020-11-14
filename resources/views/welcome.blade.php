@extends('layouts.welcome')

@section('contenedor-nav-top')
    <p><a href="{{ url('home')}}" class="enlace-nav-top">HOME</a>&nbsp; / &nbsp; <a href="" class="enlace-nav-top"></a></p> 
@endsection
@section('contenedor-nav-left')

    <p><a href="{{ url('matriculas')}}" class="matriculas"><img src="https://img.icons8.com/material/30/000000/scroll.png" alt="matricula">&nbsp; Matriculas</a></p>

    <p><a href="{{ url('cursos') }}" class="cursos"><img src="https://img.icons8.com/ios-glyphs/30/000000/graduation-cap--v1.png" alt="cursos">&nbsp; Cursos</a></p>

    <p><a href="{{ url('asignaturas') }}" class="asignaturas"><img src="https://img.icons8.com/ios-glyphs/30/000000/courses.png" alt="asignaturas">&nbsp; Asignaturas</a></p>

    <p><a href="{{ url('profesores') }}" class="profesores"><img src="https://img.icons8.com/material-rounded/30/000000/teacher.png" alt="profesores">&nbsp; Profesores</a></p>

    <p><a href="{{ url('notas') }}" class="notas"><img src="https://img.icons8.com/ios-filled/30/000000/report-card.png" alt="notas">&nbsp; Notas</a></p>

    <p><a href="{{ url('departamentos') }}" class="departamentos"><img src="https://img.icons8.com/ios-filled/30/000000/university.png" alt="departamentos">&nbsp; Departamentos</a></p>

    <p><a href="{{ url('aulas') }}" class="aulas"><img src="https://img.icons8.com/ios-filled/30/000000/classroom.png" alt="aulas">&nbsp; Aulas</a></p>

    <p><a href="{{ url('asistencias') }}" class="asistencias"><img src="https://img.icons8.com/ios-glyphs/30/000000/attendance-mark.png" alt="asistencias">&nbsp; Asistencias</a></p>

    <p><a href="{{ url('examenes') }}" class="examenes"><img src="https://img.icons8.com/ios-glyphs/30/000000/exam.png" alt="examenes">&nbsp; Examenes</a></p>

    <p><a href="{{ url('usuarios') }}" class="usuarios"><img src="https://img.icons8.com/material/30/000000/user-male-circle--v1.png"alt="usuarios">&nbsp; Usuarios</a></p>


@endsection

@section('contenedor-cursos-right')
    
@endsection

