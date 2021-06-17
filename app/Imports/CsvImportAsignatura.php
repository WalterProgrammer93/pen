<?php

namespace pen\Imports;

use pen\Asignatura;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvImportAsignatura implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Asignatura([
            //
        ]);
    }
}
