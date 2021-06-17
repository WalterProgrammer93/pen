<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Exports\CsvExport;
use pen\Imports\CsvImport;
use Excel;
use pen\User;

class CsvFile extends Controller
{
    public function indexUser()
    {
        /*$data = User::latest()->paginate(5);
        return view('usuario.usuario', compact('data'))
          ->with('i', (request()->input('page', 1) - 1) * 5);*/
        return view('usuarios.importar');
    }

    public function ExportUser()
    {
        return Excel::download(new CsvExport, 'usuarios.csv');
    }

    public function ImportUser()
    {
        Excel::import(new CsvImport, request()->file('file'));
        return back();
    }

    public function indexAlumno()
    {
        return view('alumno.importar');
    }

    public function ExportAlumno()
    {
        return Excel::download(new CsvExport, 'alumnos.csv');
    }

    public function ImportAlumno()
    {
        Excel::import(new CsvImport, request()->file('file'));
        return back();
    }

    public function indexAsignatura()
    {
        return view('asignaturas.importar');
    }

    public function ExportAsignatura()
    {
        return Excel::download(new CsvExport, 'asignaturas.csv');
    }

    public function ImportAsignatura()
    {
        Excel::import(new CsvImport, request()->file('file'));
        return back();
    }

    public function indexAsistencia()
    {
        return view('asistencias.importar');
    }

    public function ExportAsistencia()
    {
        return Excel::download(new CsvExport, 'asistencias.csv');
    }

    public function ImportAsistencia()
    {
        Excel::import(new CsvImport, request()->file('file'));
        return back();
    }

    public function indexAula()
    {
        return view('aulas.importar');
    }

    public function ExportAula()
    {
        return Excel::download(new CsvExport, 'aulas.csv');
    }

    public function ImportAula()
    {
        Excel::import(new CsvImport, request()->file('file'));
        return back();
    }

    public function indexClase()
    {
        return view('clases.importar');
    }

    public function ExportClase()
    {
        return Excel::download(new CsvExport, 'clases.csv');
    }

    public function ImportClase()
    {
        Excel::import(new CsvImport, request()->file('file'));
        return back();
    }

    public function indexCurso()
    {
        return view('cursos.importar');
    }

    public function ExportCurso()
    {
        return Excel::download(new CsvExport, 'cursos.csv');
    }

    public function ImportCurso()
    {
        Excel::import(new CsvImport, request()->file('file'));
        return back();
    }

    public function indexDepartamento()
    {
        return view('departamentos.importar');
    }

    public function ExportDepartamento()
    {
        return Excel::download(new CsvExport, 'departamentos.csv');
    }

    public function ImportDepartamento()
    {
        Excel::import(new CsvImport, request()->file('file'));
        return back();
    }

    public function indexEvento()
    {
        return view('eventos.importar');
    }

    public function ExportEvento()
    {
        return Excel::download(new CsvExport, 'eventos.csv');
    }

    public function ImportEvento()
    {
        Excel::import(new CsvImport, request()->file('file'));
        return back();
    }

    public function indexNota()
    {
        return view('notas.importar');
    }

    public function ExportNota()
    {
        return Excel::download(new CsvExport, 'notas.csv');
    }

    public function ImportNota()
    {
        Excel::import(new CsvImport, request()->file('file'));
        return back();
    }

    public function indexPerfil()
    {
        return view('perfiles.importar');
    }

    public function ExportPerfil()
    {
        return Excel::download(new CsvExport, 'perfiles.csv');
    }

    public function ImportPerfil()
    {
        Excel::import(new CsvImport, request()->file('file'));
        return back();
    }

    public function indexProfesor()
    {
        return view('profesores.importar');
    }

    public function ExportProfesor()
    {
        return Excel::download(new CsvExport, 'profesores.csv');
    }

    public function ImportProfesor()
    {
        Excel::import(new CsvImport, request()->file('file'));
        return back();
    }

    public function indexReserva()
    {
        return view('reservas.importar');
    }

    public function ExportReserva()
    {
        return Excel::download(new CsvExport, 'reservas.csv');
    }

    public function ImportReserva()
    {
        Excel::import(new CsvImport, request()->file('file'));
        return back();
    }

    public function indexRol()
    {
        return view('roles.importar');
    }

    public function ExportRol()
    {
        return Excel::download(new CsvExport, 'roles.csv');
    }

    public function ImportRol()
    {
        Excel::import(new CsvImport, request()->file('file'));
        return back();
    }

    public function indexTarea()
    {
        return view('tareas.importar');
    }

    public function ExportTarea()
    {
        return Excel::download(new CsvExport, 'tareas.csv');
    }

    public function ImportTarea()
    {
        Excel::import(new CsvImport, request()->file('file'));
        return back();
    }

    public function indexTema()
    {
        return view('temas.importar');
    }

    public function ExportTema()
    {
        return Excel::download(new CsvExport, 'temas.csv');
    }

    public function ImportTema()
    {
        Excel::import(new CsvImport, request()->file('file'));
        return back();
    }
}
