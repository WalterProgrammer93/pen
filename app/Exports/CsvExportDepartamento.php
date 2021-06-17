<?php

namespace pen\Exports;

use pen\Departamento;
use Maatwebsite\Excel\Concerns\FromCollection;

class CsvExportDepartamento implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Departamento::all();
    }
}
