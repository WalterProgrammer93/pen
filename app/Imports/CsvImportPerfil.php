<?php

namespace pen\Imports;

use pen\Perfil;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvImportPerfil implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Perfil([
            //
        ]);
    }
}
