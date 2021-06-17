<?php

namespace pen\Imports;

use pen\Nota;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvImportNota implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Nota([
            //
        ]);
    }
}
