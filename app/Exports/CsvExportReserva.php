<?php

namespace pen\Exports;

use pen\Reserva;
use Maatwebsite\Excel\Concerns\FromCollection;

class CsvExportReserva implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Reserva::all();
    }
}
