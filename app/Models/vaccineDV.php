<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class vaccineDV extends Model
{
    use HasFactory;
    protected $table='vaccine_donvitiemchung';
    protected $primaryKey='idvaccine_donvitiemchung';
    protected $guarded=[];
    protected $fillable = [
        // 'name',
        'idvaccine',
        'soluong',
        'iddonvitiem',
    ];
    public function SelectVaccineDVAll(){
        $kehoachtiemAll = DB::table('vaccine_donvitiemchung')
        ->join('donvitiemchung', 'donvitiemchung.iddonvitiem', '=', 'vaccine_donvitiemchung.iddonvitiem')
        ->join('vaccine', 'vaccine.idvaccine', '=', 'vaccine_donvitiemchung.idvaccine')
        ->get();
    return $kehoachtiemAll;
    }
    public function SelectVaccineDV($id){
        $kehoachtiemAll = DB::table('vaccine_donvitiemchung')
        ->join('donvitiemchung', 'donvitiemchung.iddonvitiem', '=', 'vaccine_donvitiemchung.iddonvitiem')
        ->join('vaccine', 'vaccine.idvaccine', '=', 'vaccine_donvitiemchung.idvaccine')
        ->where(['idvaccine_donvitiemchung'=>$id])->get();
    return $kehoachtiemAll;
    }
    public function InsertVaccineDV($idvaccine,$soluong,$iddonvitiem){
        $data=[
            'idvaccine'=>$idvaccine,
            'soluong'=>$soluong,
            'iddonvitiem'=>$iddonvitiem,
            
        ];
        return vaccine::create($data);
    }
}
