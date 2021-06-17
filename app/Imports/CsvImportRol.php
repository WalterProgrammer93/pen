<?php

namespace pen\Imports;

use pen\Rol;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvImportRol implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Rol([
            //
        ]);
    }
}
