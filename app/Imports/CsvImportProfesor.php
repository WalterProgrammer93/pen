<?php

namespace pen\Imports;

use pen\Profesor;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvImportProfesor implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Profesor([
            //
        ]);
    }
}
