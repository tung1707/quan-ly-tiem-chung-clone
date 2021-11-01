<?php

namespace App\Imports;

use App\Models\donvitiemchung;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;

class donvitiemchungImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new donvitiemchung([
            'tendonvi' => $row[0],
            'city' => $row[1],
            'district' => $row[2],
            'wards' => $row[3],
            'address' => $row[4],
            'id_users' => $row[5],
        ]);
    }
}
