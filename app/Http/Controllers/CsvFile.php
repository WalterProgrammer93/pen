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
}
