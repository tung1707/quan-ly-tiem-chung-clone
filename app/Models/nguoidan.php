<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class nguoidan extends Model
{
    use HasFactory;
    protected $table='nguoidan';
    protected $primaryKey='idnguoidan';
    protected $guarded=[];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'chung_minh_ND',
        'fullname',
        'birthday',
        'gender',
        'city',
        'district',
        'wards',
        'address',
        'work',
        'Tien_su_benh_an',
        'id_users',
    ];
    public function SelectnguoidanAll(){
        $nguoidanAll = DB::table('nguoidan')
        ->join('users', 'users.id_users', '=', 'nguoidan.id_users')
        ->get();
        return $nguoidanAll;
    }
    public function Selectnguoidan($id)
    {
        $nguoidan = DB::table('nguoidan')
        ->join('users', 'users.id_users', '=', 'nguoidan.id_users')
        ->where(['idnguoidan' => $id])->get();
        return $nguoidan;
    }
    public function 
    InsertNguoidan($chung_minh_ND,$fullname,$birthday,$gender,
    $city,$district,$wards,$address,$work,$Tien_su_benh_an,$id_users){
        $data=[
            'chung_minh_ND'=>$chung_minh_ND,
    
            'fullname'=>$fullname,
            'birthday'=>$birthday,
            
            'gender'=>$gender,
            'city'=>$city,
            
            'district'=>$district,
            'wards'=>$wards,
            
            'address'=>$address,
            'work'=>$work,

            'Tien_su_benh_an'=>$Tien_su_benh_an,
            'id_users'=>$id_users
        ];
        return nguoidan::create($data);
    }
    public function UpdateNguoidan($id){
        return nguoidan::where(['idnguoidan' => $id])->find($id);
    }
    public function DestroyNguoidan($id){
        return nguoidan::find($id);
    }
    public function GetID($id){
        $id= nguoidan::where(['idnguoidan' => $id])->get();
        return $id[0]->id_users;
    }
}
