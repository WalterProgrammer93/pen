<?php

namespace pen\Exports;

use pen\Asignatura;
use Maatwebsite\Excel\Concerns\FromCollection;

class CsvExportAsignatura implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Asignatura::all();
    }
}
