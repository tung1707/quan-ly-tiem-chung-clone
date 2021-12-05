<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KehoachtiemSeeder extends Seeder
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
                'Ngay_Tiem' =>'2021-10-19',
                'gio_Tiem' =>'00:00:00',
                'iddonvitiem' =>1,
                'idnguoidan' =>1,
                'iddktiem'=>1
            ],
            [
                'Ngay_Tiem' =>'2021-10-19',
                'gio_Tiem' =>'00:00:00',
                'iddonvitiem' =>1,
                'idnguoidan' =>2,

                'iddktiem'=>2
            ],
            [
                'Ngay_Tiem' =>'2021-10-19',
                'gio_Tiem' =>'00:00:00',
                'iddonvitiem' =>1,
                'idnguoidan' =>3,
                'iddktiem'=>3
            ],
            [
                'Ngay_Tiem' =>'2021-10-19',
                'gio_Tiem' =>'08:00:00',
                'iddonvitiem' =>1,
                'idnguoidan' =>4,

                'iddktiem'=>4
            ],
            [
                'Ngay_Tiem' =>'2021-10-19',
                'gio_Tiem' =>'08:20:00',
                'iddonvitiem' =>1,
                'idnguoidan' =>5,
                'iddktiem'=>5
            ],
        ];
        DB::table('kehoachtiem')->insert($data);
     
    }
}
