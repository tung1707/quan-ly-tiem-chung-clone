<?php

namespace App\Http\Controllers;

use App\Http\Resources\HSTiemChungResource;
use App\Models\HSTiemchung;
use Illuminate\Http\Request;

class HSTiemChungController extends Controller
{
    protected $HSTiemChung;
    public function __construct(){
        $this->HSTiemChung=new HSTiemchung();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all=$this->HSTiemChung->SelectHSTiemChungAll();
        return new HSTiemChungResource($all);
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
        $idnguoidan=$this->HSTiemChung->idnguoidan=$request->idnguoidan;
        $insert=$this->HSTiemChung-> 
        InsertHSTiemChung($idnguoidan);
        if($insert->save()){
            return new HSTiemChungResource($insert);
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
        $get=$this->HSTiemChung->SelectHSTiemChung($id);
        return new HSTiemChungResource($get);
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
        $update=$this->HSTiemChung->UpdateHSTiemchung($id);
        $update->Tso_mui_tiem=$request->Tso_mui_tiem;
        if($update->save()){
            return new HSTiemChungResource($update);
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
        //
    }
}
