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
        $dktiem =  DB::table('dktiem')->distinct()->select('ngay_Tiem')->get();
        //Get khác loại
        // echo count($dktiem);
        // for ($i = 0; $)
        for ($i = 0; $i <count($dktiem); $i++) {

            $x = $dktiem[$i]->ngay_Tiem;

            $a1 = Str::limit($x, 7, '');
            $a2 = Str::limit($x, 5, '');
            $a3 = Str::after($x, $a1, '');
            $a4 = Str::limit($x, 8, '');
            $year = Str::limit($x, 4, '');
            $month = Str::between($x, $a2, $a3);
            $day = Str::after($x, $a4, '');
            //Xử lý lấy ngày tháng năm

            // $year = Str::of($x)->limit(7+strlen($x)+3,'');
            // echo $year;
            // echo $month;
            // echo $day;
            $date=$year.'-'.$month.'-'.$day;

            // echo $date,"\n";
            $year = $year;
            $month = $month;
            $day = $day;

            $tz = 'Asia/Ho_Chi_Minh';
            // $count = DB::table('dktiem')->count();
            $aa = 0;
            $xx = 0;

                $ngay_Tiem = DB::table('dktiem')->where('ngay_Tiem', $x)->count();
                $count = DB::table('dktiem')->count();
                if($xx<=$ngay_Tiem){
                    for ($i = 7; $i <= 24; $i++) {
                        for ($j = 0; $j < 60; $j += 20) {
                            // if ($i < 18) {
                            if ($i == 12) {
                                continue;
                            }
                            $xx++;
                            if ($xx <= $ngay_Tiem) {
                                if($date==$x){
                                    if ($i < 18) {
                                        $hour = $i;
                                        $minute = 0 + $j;
                                        if ($i < 18) {
    
                                            if ($aa > 0) {
                                                echo Carbon::create($year, $month, $day + $aa, $hour, $minute, 00, $tz), "\n";
    
                                            } else {
    
                                                echo Carbon::create($year, $month, $day, $hour, $minute, 00, $tz), "\n";
                                            }
                                        }
                                    } else {
                                        $aa++;
                                        $hour = $i = 7;
                                        $minute = 0 + $j;
                                        echo Carbon::create($year, $month, $day + $aa, $hour, $minute, 00, $tz), "\n";
                                    }
                                }
                              
                            }
                        }
                    }
                }


            else{
                return ;
            }
        }

    }

    public function scheduled($year, $month, $day)
    {
        $year = $year;
        $month = $month;
        $day = $day;
        $tz = 'Asia/Ho_Chi_Minh';
        $count = DB::table('dktiem')->count();
        $aa = 0;
        $xx = 0;
        for ($i = 7; $i <= 24; $i++) {
            for ($j = 0; $j < 60; $j += 20) {
                // if ($i < 18) {
                if ($i == 12) {
                    continue;
                }
                $xx++;
                if ($xx <= $count) {
                    if ($i < 18) {
                        $hour = $i;
                        $minute = 0 + $j;
                        if ($i < 18) {

                            if ($aa > 0) {
                                echo Carbon::create($year, $month, $day + $aa, $hour, $minute, 00, $tz);
                            } else {

                                echo Carbon::create($year, $month, $day, $hour, $minute, 00, $tz);
                            }
                        }
                    } else {
                        $aa++;
                        $hour = $i = 7;
                        $minute = 0 + $j;
                        echo Carbon::create($year, $month, $day + $aa, $hour, $minute, 00, $tz);
                    }
                }
            }
        }
    }
}
