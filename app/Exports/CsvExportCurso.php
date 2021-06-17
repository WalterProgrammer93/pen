<?php

namespace pen\Exports;

use pen\Curso;
use Maatwebsite\Excel\Concerns\FromCollection;

class CsvExportCurso implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Curso::all();
    }
}
