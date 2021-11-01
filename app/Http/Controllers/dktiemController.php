<?php

namespace App\Http\Controllers;

use App\Http\Resources\dktiemResource;
use App\Models\dktiem;
use Illuminate\Http\Request;

class dktiemController extends Controller
{
    protected $dktiem;
    public function __construct(){
        $this->dktiem = new dktiem();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all=$this->dktiem->SelectDkTiemAll();
        return new dktiemResource($all);
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
        $Ngay_Tiem=$this->dktiem->Ngay_Tiem=$request->Ngay_Tiem;
        $idnguoidan=$this->dktiem->idnguoidan=$request->idnguoidan;
        $iddonvitiem=$this->dktiem->iddonvitiem=$request->iddonvitiem;
       
        $idvaccine=$this->dktiem->idvaccine=$request->idvaccine;
        $insert=$this->dktiem-> 
        InsertDktiem($Ngay_Tiem,$idnguoidan,$iddonvitiem,$idvaccine);
        if($insert->save()){
            return new dktiemResource($insert);
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
        $all=$this->dktiem->SelectDkTiem($id);
        return new dktiemResource($all);
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
        $update=$this->dktiem->Updatedktiem($id);
        $update->Ngay_Tiem=$request->Ngay_Tiem;
        $update->iddonvitiem=$request->iddonvitiem;
        $update->idvaccine=$request->idvaccine;
        if($update->save()){
            return new dktiemResource($update);
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
        $destroy=$this->dktiem->Destroydktiem($id);
        if($destroy->delete()){
            return new dktiemResource($destroy);
        }
    }
}
