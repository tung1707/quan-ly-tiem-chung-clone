<?php

namespace App\Imports;

use App\Models\vaccine;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;


class vaccineImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new vaccine([
            'name_vaccine' => $row[0],
            'country' => $row[1],
            'company' => $row[2],
            'object' => $row[3],
            'somui' => $row[4],
            'distance' => $row[5]
        ]);
    }
}
