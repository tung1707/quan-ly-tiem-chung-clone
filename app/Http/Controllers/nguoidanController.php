<?php

namespace App\Http\Controllers;

use App\Http\Resources\NguoidanResource;
use App\Models\nguoidan;
use App\Models\User;
use Illuminate\Http\Request;

class nguoidanController extends Controller
{
    protected $nguoidan;
    public function __construct(){
        $this->nguoidan = new nguoidan();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all=$this->nguoidan->SelectnguoidanAll();
        return new NguoidanResource($all);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chung_minh_ND=$this->nguoidan->chung_minh_ND=$request->chung_minh_ND;
       $fullname=$this->nguoidan->fullname=$request->fullname;
       $birthday=$this->nguoidan->birthday=$request->birthday;
       $gender=$this->nguoidan->gender=$request->gender;
       $city=$this->nguoidan->city=$request->city;
       $district=$this->nguoidan->district=$request->district;
       $wards=$this->nguoidan->wards=$request->wards;
       $address=$this->nguoidan->address=$request->address;
       $work=$this->nguoidan->work=$request->work;
       $Tien_su_benh_an=$this->nguoidan->Tien_su_benh_an=$request->Tien_su_benh_an;
       $id_users=$this->nguoidan->id_users=$request->id_users;

        $insert=$this->nguoidan-> 
        InsertNguoidan($chung_minh_ND,$fullname,$birthday,$gender,
    $city,$district,$wards,$address,$work,$Tien_su_benh_an,$id_users);
        if($insert->save()){
            return new NguoidanResource($insert);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $all=$this->nguoidan->Selectnguoidan($id);
        return new NguoidanResource($all);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = $this->nguoidan->UpdateNguoidan($id);
        $update->fullname = $request->fullname;
        $update->chung_minh_ND = $request->chung_minh_ND;
        $update->birthday = $request->birthday;
        $update->gender = $request->gender;
        $update->city = $request->city;
        $update->district = $request->district;
        $update->wards = $request->wards;
        $update->address = $request->address;
        // $update->work = $request->work;
        $update->Tien_su_benh_an = $request->Tien_su_benh_an;


        if ($update->save()) {
            return new NguoidanResource($update);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy=$this->nguoidan->DestroyNguoidan($id);
        
        $user=User::find($this->nguoidan->GetID($id));
        if($destroy->delete() && $user->delete()){
            return new NguoidanResource($destroy);
        }
    }
}
