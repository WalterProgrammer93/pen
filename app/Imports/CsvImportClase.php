<?php

namespace pen\Imports;

use pen\Clase;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvImportClase implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Clase([
            //
        ]);
    }
}
