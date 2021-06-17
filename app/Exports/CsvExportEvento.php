<?php

namespace pen\Exports;

use pen\Evento;
use Maatwebsite\Excel\Concerns\FromCollection;

class CsvExportEvento implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Evento::all();
    }
}
