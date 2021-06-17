<?php

namespace pen\Exports;

use pen\Aula;
use Maatwebsite\Excel\Concerns\FromCollection;

class CsvExportAula implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Aula::all();
    }
}
