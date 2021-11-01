<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class dktiem extends Model
{
    use HasFactory;
    protected $table = 'dktiem';
    protected $primaryKey = 'iddktiem';
    protected $guarded = [];
    public function SelectDkTiemAll()
    {
        $dktiemAll = DB::table('dktiem')
            ->join('nguoidan', 'nguoidan.idnguoidan', '=', 'dktiem.idnguoidan')
            ->join('donvitiemchung', 'donvitiemchung.iddonvitiem', '=', 'dktiem.iddonvitiem')
            ->join('vaccine', 'vaccine.idvaccine', '=', 'dktiem.idvaccine')

            ->get();
        return $dktiemAll;
    }
    public function SelectDkTiem($id)
    {
        $dktiem = DB::table('dktiem')
            ->join('nguoidan', 'nguoidan.idnguoidan', '=', 'dktiem.idnguoidan')
            ->join('donvitiemchung', 'donvitiemchung.iddonvitiem', '=', 'dktiem.iddonvitiem')
            ->join('vaccine', 'vaccine.idvaccine', '=', 'dktiem.idvaccine')
            ->where('iddktiem',$id)
            ->get();
            return $dktiem;
    }
    public function 
    InsertDktiem($Ngay_Tiem,$idnguoidan,$iddonvitiem,$idvaccine){
        $data=[
            'Ngay_Tiem'=>$Ngay_Tiem,
            'idnguoidan'=>$idnguoidan,
            'iddonvitiem'=>$iddonvitiem,
            'idvaccine'=>$idvaccine,               
        ];
        return dktiem::create($data);
    }
    public function Updatedktiem($id){
        return dktiem::where(['iddktiem' => $id])->find($id);
    }
    public function Destroydktiem($id){
        return dktiem::find($id);
    }
}
