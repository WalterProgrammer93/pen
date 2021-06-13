<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Exports\CsvExport;
use pen\Imports\CsvImport;
use Excel;
use pen\User;

class CsvFile extends Controller
{
    public function index()
    {
        /*$data = User::latest()->paginate(5);
        return view('usuario.usuario', compact('data'))
          ->with('i', (request()->input('page', 1) - 1) * 5);*/
        return view('usuarios.importar');
    }

    public function Export()
    {
        return Excel::download(new CsvExport, 'usuario.csv');
    }

    public function Import()
    {
        Excel::import(new CsvImport, request()->file('file'));
        return back();
    }
}
