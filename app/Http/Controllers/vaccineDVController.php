<?php

namespace App\Http\Controllers;

use App\Http\Resources\VaccindeDVResource;
use App\Models\vaccineDV;
use Illuminate\Http\Request;

class vaccineDVController extends Controller
{
    protected $vaccinedv;
    public function __construct(){
        $this->vaccinedv = new vaccineDV();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all=$this->vaccinedv->SelectVaccineDVAll();
        return new VaccindeDVResource($all);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=[
            $this->vaccinedv->idvaccine=$request->idvaccine,
            $this->vaccinedv->soluong=$request->soluong,
            $this->vaccinedv->iddonvitiem=$request->iddonvitiem,
            $this->vaccinedv->Ngay_Nhan=$request->Ngay_Nhan,
        ];
      
        $insert=$this->vaccinedv->InsertVaccineDV($data[0],$data[1],$data[2],$data[3]);
        if($insert->save()){
            return new VaccindeDVResource($insert);
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
        $all=$this->vaccinedv->SelectVaccineDV($id);
        return new VaccindeDVResource($all);
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
        $update=$this->vaccinedv->UpdateVaccineDV($id);
        $update->idvaccine=$request->idvaccine;
        $update->soluong=$request->soluong;
        $update->iddonvitiem=$request->iddonvitiem;
        $update->Ngay_Nhan=$request->Ngay_Nhan;
        if($update->save()){
            return new VaccindeDVResource($update);
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
   
        $destroy=$this->vaccinedv->DestroyvaccineDV($id);
        if($destroy->delete()){
            return new VaccindeDVResource($destroy);
        }
    }
}
