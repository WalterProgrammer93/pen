<?php

namespace pen\Exports;

use pen\Asistencia;
use Maatwebsite\Excel\Concerns\FromCollection;

class CsvExportAsistencia implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Asistencia::all();
    }
}
