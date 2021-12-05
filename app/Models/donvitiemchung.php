<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class donvitiemchung extends Model
{
    use HasFactory;
    protected $table='donvitiemchung';
    protected $primaryKey='iddonvitiem';
    protected $guarded=[];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'tendonvi',
        'city',
        'district',
        'wards',
        'address',
        'id_users',
    ];
    public function SelectDVTiemAll(){
        $donvitiemchungAll = DB::table('donvitiemchung')
        ->join('users', 'users.id_users', '=', 'donvitiemchung.id_users')
        ->get();
        return $donvitiemchungAll;
    }
    public function SelectDVTiem($id){
        $donvitiemchung= DB::table('donvitiemchung')
            ->join('users', 'users.id_users', '=', 'donvitiemchung.id_users')->
            where(['iddonvitiem'=>$id])->get();
        return $donvitiemchung;
    }
    public function InsertDVtiemchung($tendonvi,$city,$district,$wards,$address,$id_users){
        $data=[
            

                'tendonvi'=>$tendonvi,
                'city'=>$city,
                'district'=>$district,
                'wards'=>$wards,
                'address'=>$address,
                'id_users'=>$id_users,
            
           
        ];
        return donvitiemchung::create($data);
    }
    public function UpdateDVTiem($id){
        return donvitiemchung::where(['iddonvitiem' => $id])->find($id);
    }
    public function Destroydvtc($id){
        
        return donvitiemchung::find($id);
    }
    public function GetID($id){
        $id= donvitiemchung::where(['iddonvitiem' => $id])->get();
        return $id[0]->id_users;
    }
}
