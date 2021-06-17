<?php

namespace pen\Exports;

use pen\Perfil;
use Maatwebsite\Excel\Concerns\FromCollection;

class CsvExportPerfil implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Perfil::all();
    }
}
