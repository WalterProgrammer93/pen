<?php

namespace pen\Exports;

use pen\Nota;
use Maatwebsite\Excel\Concerns\FromCollection;

class CsvExportNota implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Nota::all();
    }
}
