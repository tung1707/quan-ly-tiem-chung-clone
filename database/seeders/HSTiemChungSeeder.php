<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HSTiemChungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'Tso_mui_tiem'=>0,
                'idnguoidan'=>1,
            ],
            [
                'Tso_mui_tiem'=>0,
                'idnguoidan'=>2,
            ],
            [
                'Tso_mui_tiem'=>0,
                'idnguoidan'=>3,
            ],
            [
                'Tso_mui_tiem'=>0,
                'idnguoidan'=>4,
            ],
            [
                'Tso_mui_tiem'=>0,
                'idnguoidan'=>5,
            ],
        ];
        DB::table('hosotiemchung')->insert($data);

    }
}
