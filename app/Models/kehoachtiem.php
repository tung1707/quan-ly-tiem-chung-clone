<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class kehoachtiem extends Model
{
    use HasFactory;
    protected $table = 'kehoachtiem';
    protected $primaryKey = 'idkehoachtiem';
    protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    // protected $fillable = [
    //     'ngay_gio',
    //     'iddonvitiem',
    // ];
    public function SelectkehoachtiemAll()
    {
        $kehoachtiemAll = DB::table('kehoachtiem')
            ->join('dktiem', 'kehoachtiem.iddktiem', '=', 'dktiem.iddktiem')
            ->join('donvitiemchung', 'donvitiemchung.iddonvitiem', '=', 'kehoachtiem.iddonvitiem')
            ->get();
        return $kehoachtiemAll;
    }
    public function Selectkehoachtiem($id)
    {
        $kehoachtiem = DB::table('kehoachtiem')
            ->join('dktiem', 'kehoachtiem.iddktiem', '=', 'dktiem.iddktiem')
            ->join('donvitiemchung', 'donvitiemchung.iddonvitiem', '=', 'kehoachtiem.iddonvitiem')

            ->where(['kehoachtiem.idnguoidan' => $id])->get();
        return $kehoachtiem;
    }


    public function InsertKehoachtiem()
    {

        $Ngay_Tiem = DB::table('kehoachtiem')->where('gio_Tiem', "00:00:00")->distinct()->select('Ngay_Tiem')->get();
        $count = count($Ngay_Tiem);
        

        if ($count > 0) {
            for ($a = 0; $a < $count; $a++) {
                $GetDay = $Ngay_Tiem[$a]->Ngay_Tiem;
                $a1 = Str::limit($GetDay, 7, '');
                $a2 = Str::limit($GetDay, 5, '');
                $a3 = Str::after($GetDay, $a1, '');
                $a4 = Str::limit($GetDay, 8, '');
                $year = Str::limit($GetDay, 4, '');
                $month = Str::between($GetDay, $a2, $a3);
                $day = Str::after($GetDay, $a4, '');
                $tz = 'Asia/Ho_Chi_Minh';
                $date = $year . "-" . $month . "-" . $day;

                if ($date == $GetDay) {
                    //Đếm ngày
                    // $GetNgay_Tiem = DB::table('dktiem')->where('Ngay_Tiem',$GetDay)->count();
                    //Đếm giờ
                    $GetHours = DB::table('kehoachtiem')->where('gio_Tiem', "00:00:00")->where('Ngay_Tiem', $GetDay)->count();
                    $counts = 0;
                    $add = 0;
                    for ($i = 7; $i < 24; $i++) {
                        for ($j = 0; $j < 60; $j += 20) {
                            if ($i == 12) {
                                continue;
                            }
                            $counts++;
                            if ($counts <= $GetHours) {

                                if ($i < 18) {
                                    if ($i < 10) {
                                        if ($j < 10) {
                                            $time = "0" . $i . ":" . "0" . $j . ":" . "00";
                                        } else {
                                            $time = "0" . $i . ":" . $j . ":" . "00";
                                        }
                                    } else {
                                        if ($j < 10) {
                                            $time = $i . ":" . "0" . $j . ":" . "00";
                                        } else {
                                            $time = $i . ":" . $j . ":" . "00";
                                        }
                                    }

                                   
                                    if ($add > 0) {
                                        echo Carbon::create($year, $month, $day + $add, $i, $j, $tz), "\n";
                                        $data=[
                                            'gio_Tiem'=>$i.':'.$j,
                                        ];
                                        DB::table('kehoachtiem')->where('gio_Tiem','00:00:00')->update($data);
                                    } else {
                                        echo Carbon::create($year, $month, $day, $i, $j, $tz), "\n";
                                        $data=[
                                            'gio_Tiem'=>$i.':'.$j,
                                        ];
                                        DB::table('kehoachtiem')->where('gio_Tiem','00:00:00')->update($data);

                                    }
                                }
                                else {
                                    $add++;
                                    $i = 7;
                                    echo Carbon::create($year, $month, $day + $add, $i, $j, $tz), "\n";
                                }
                            }
                        }
                    }
                }

                // echo $year." ".$month." ".$day,"\n";
            }
        } else {
            return false;
        }
    }
}
