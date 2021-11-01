<?php

namespace App\Http\Controllers;

use App\Http\Resources\DVTiemChungResource;
use App\Models\donvitiemchung;
use App\Models\User;
use Illuminate\Http\Request;


class donvitiemchungController extends Controller
{
    protected $DVtiemChung;
    public function __construct(){
        $this->DVtiemChung = new donvitiemchung();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all=$this->DVtiemChung->SelectDVTiemAll();
        return new DVTiemChungResource($all);
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
        $tendonvi=$this->DVtiemChung->tendonvi=$request->tendonvi;
        $city=$this->DVtiemChung->city=$request->city;
        $district=$this->DVtiemChung->district=$request->district;
        $wards=$this->DVtiemChung->wards=$request->wards;
        $address=$this->DVtiemChung->address=$request->address;
        $id_users=$this->DVtiemChung->id_users=$request->id_users;

        $insert=$this->DVtiemChung-> 
        InsertDVtiemchung($tendonvi,$city,$district,$wards,$address,$id_users);
        if($insert->save()){
            return new DVTiemChungResource($insert);
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
        $get = $this->DVtiemChung->SelectDVTiem($id);
        return new DVTiemChungResource($get);
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
        $update=$this->DVtiemChung->UpdateDVTiem($id);
        $update->tendonvi=$request->tendonvi;
        $update->city=$request->city;
        $update->district=$request->district;
        $update->wards=$request->wards;
        $update->address=$request->address;
        if($update->save()){
            return new DVTiemChungResource($update);
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
       $user = User::find($this->DVtiemChung->getId($id));
        $destroy=$this->DVtiemChung->Destroydvtc($id);
        if($destroy->delete() &&  $user->delete()){
           
            return new DVTiemChungResource($destroy);
        }
    }
}
