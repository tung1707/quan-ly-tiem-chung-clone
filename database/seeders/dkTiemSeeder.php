<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class dkTiemSeeder extends Seeder
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
                'Ngay_Tiem'=>'2021-10-19',
                'idnguoidan'=>1,
                'iddonvitiem'=>1,
                // 'idkehoachtiem'=>1,
                'idvaccine'=>1
            ],
            [
                'Ngay_Tiem'=>'2021-10-19',
                'idnguoidan'=>2,
                'iddonvitiem'=>1,
                // 'idkehoachtiem'=>1,
                'idvaccine'=>1
            ],
            [
                'Ngay_Tiem'=>'2021-10-19',
                'idnguoidan'=>3,
                'iddonvitiem'=>1,
                // 'idkehoachtiem'=>1,
                'idvaccine'=>1
            ],
            [
                'Ngay_Tiem'=>'2021-10-19',
                'idnguoidan'=>4,
                'iddonvitiem'=>2,
                // 'idkehoachtiem'=>2,
                'idvaccine'=>2
            ],
            [
                'Ngay_Tiem'=>'2021-10-19',
                'idnguoidan'=>5,
                'iddonvitiem'=>6,
                // 'idkehoachtiem'=>6,
                'idvaccine'=>3
            ],
        ];
        DB::table('dktiem')->insert($data);
    }
}
