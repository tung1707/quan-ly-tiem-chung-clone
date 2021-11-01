<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HSTiemchung extends Model
{
    use HasFactory;
    protected $table='hosotiemchung';
    protected $primaryKey='idhosoBN';
    protected $guarded=[];
    public function SelectHSTiemChungAll(){
        $HSTiemChungAll = DB::table('hosotiemchung')
        ->join('nguoidan', 'nguoidan.idnguoidan', '=', 'hosotiemchung.idnguoidan')
        ->get();
        return $HSTiemChungAll;
    }
    public function SelectHSTiemChung($id){
        $HSTiemChungAll = DB::table('hosotiemchung')
        ->join('nguoidan', 'nguoidan.idnguoidan', '=', 'hosotiemchung.idnguoidan')
        ->where(['idhosoBN'=>$id])
        ->get();
        return $HSTiemChungAll;
    }
    public function InsertHSTiemChung($idnguoidan){
        $data=[
            'Tso_mui_tiem'=>0,
            'idnguoidan'=>$idnguoidan,
       
        ];
        return HSTiemchung::create($data);
    }
    public function UpdateHSTiemchung($id){
        return HSTiemchung::where(['idhosoBN' => $id])->find($id);
    }
}
