<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nguoidanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'chung_minh_ND' => '152356465468',
                'fullname' => 'Hoàng Duy An ',
                'birthday' => '2000-05-03',
                'gender' => 'male',
                'city' => 'Hà Nội',
                'district' => 'Quận Ba Đình',
                'wards'=>'Phường Phúc Xá',
                'address' => '24 Nghĩa Dũng',
                'work' => 'Sinh viên',
                'Tien_su_benh_an' => 'Không có bệnh nền',
                'id_users' => 11,
                
            ],
            [
                'chung_minh_ND' => '152356465468',
                'fullname' => 'Tống Việt Anh',
                'birthday' => '2000-05-03',
                'gender' => 'male',
                'city' => 'Hà Nội',
                'district' => 'Quận Ba Đình',
                'wards'=>'Phường Phúc Xá',
                'address' => '15 Nghĩa Dũng',
                'work' => 'Sinh viên',
                'Tien_su_benh_an' => 'Không có bệnh nền',
                'id_users' => 12,
                
            ],
            [
                'chung_minh_ND' => '152356465468',
                'fullname' => 'Hoàng Anh Huy',
                'birthday' => '2000-05-03',
                'gender' => 'male',
                'city' => 'Hà Nội',
                'district' => 'Quận Ba Đình',
                'wards'=>'Phường Phúc Xá',
                'address' => '1 Nghĩa Dũng',
                'work' => 'Sinh viên',
                'Tien_su_benh_an' => 'Không có bệnh nền',
                'id_users' => 13,
                
            ],
            [
                'chung_minh_ND' => '152356465468',
                'fullname' => 'Lê Tuệ Lam',
                'birthday' => '2000-05-03',
                'gender' => 'female',
                'city' => 'Hà Nội',
                'district' => 'Quận Ba Đình',
                'wards'=>'Phường Phúc Xá',
                'address' => '52 Nghĩa Dũng',
                'work' => 'Sinh viên',
                'Tien_su_benh_an' => 'Không có bệnh nền',
                'id_users' => 14,
                
            ],
            [
                'chung_minh_ND' => '152356465468',
                'fullname' => 'Phạm Tố Uyên',
                'birthday' => '2000-05-03',
                'gender' => 'female',
                'city' => 'Hà Nội',
                'district' => 'Quận Ba Đình',
                'wards'=>'Phường Phúc Xá',
                'address' => '47 Nghĩa Dũng',
                'work' => 'Sinh viên',
                'Tien_su_benh_an' => 'Không có bệnh nền',
                'id_users' => 15,
              
            ],
           
        ];
        DB::table('nguoidan')->insert($data);
    }
}
