<?php

namespace pen\Exports;

use pen\Clase;
use Maatwebsite\Excel\Concerns\FromCollection;

class CsvExportClase implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Clase::all();
    }
}
