<?php

namespace App\Imports;

use App\Models\vaccineDV;
use Maatwebsite\Excel\Concerns\ToModel;

class vaccineDVImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new vaccineDV([
            'idvaccine'=>$row[0],
            'soluong'=>$row[1],
            'iddonvitiem'=>$row[2],
        ]);
    }
}
