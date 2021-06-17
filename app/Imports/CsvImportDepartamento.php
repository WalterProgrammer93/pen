<?php

namespace pen\Imports;

use pen\Departamento;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvImportDepartamento implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Departamento([
            //
        ]);
    }
}
