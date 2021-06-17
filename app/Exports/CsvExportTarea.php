<?php

namespace pen\Exports;

use pen\Tarea;
use Maatwebsite\Excel\Concerns\FromCollection;

class CsvExportTarea implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tarea::all();
    }
}
