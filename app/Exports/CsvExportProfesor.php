<?php

namespace pen\Exports;

use pen\Profesor;
use Maatwebsite\Excel\Concerns\FromCollection;

class CsvExportProfesor implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Profesor::all();
    }
}
