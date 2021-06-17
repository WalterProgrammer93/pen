<?php

namespace pen\Exports;

use pen\Alumno;
use Maatwebsite\Excel\Concerns\FromCollection;

class CsvExportAlumno implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Alumno::all();
    }
}
