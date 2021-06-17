<?php

namespace pen\Imports;

use pen\Evento;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvImportEvento implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Evento([
            //
        ]);
    }
}
