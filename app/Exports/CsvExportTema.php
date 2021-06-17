<?php

namespace pen\Exports;

use pen\Tema;
use Maatwebsite\Excel\Concerns\FromCollection;

class CsvExportTema implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tema::all();
    }
}
