<?php

namespace pen\Exports;

use pen\Rol;
use Maatwebsite\Excel\Concerns\FromCollection;

class CsvExportRol implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rol::all();
    }
}
