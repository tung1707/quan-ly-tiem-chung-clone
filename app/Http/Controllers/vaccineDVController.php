<?php

namespace App\Http\Controllers;

use App\Http\Resources\VaccindeDVResource;
use App\Models\vaccineDV;
use Illuminate\Http\Request;

class vaccineDVController extends Controller
{
    protected $vaccineDV;
    public function __construct(){
        $this->vaccineDV=new vaccineDV();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all=$this->vaccineDV->SelectVaccineDVAll();
        return new VaccindeDVResource($all);
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
        $idvaccine=$this->vaccineDV->idvaccine=$request->idvaccine;
        $soluong=$this->vaccineDV->soluong=$request->soluong;
        $iddonvitiem=$this->vaccineDV->iddonvitiem=$request->iddonvitiem;
        $insert=$this->vaccineDV-> 
        InsertVaccineDV($idvaccine,$soluong,$iddonvitiem);
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
        $all=$this->vaccineDV->SelectVaccineDV($id);
        return new VaccindeDVResource($all);
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
        //
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
