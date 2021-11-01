<?php

namespace App\Http\Controllers;

use App\Http\Resources\VaccineResource;
use App\Models\vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    protected $vaccine;
    public function __construct(){
        $this->vaccine=new vaccine();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all=$this->vaccine->SelectVaccineAll();
        return VaccineResource::collection($all);
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
        $name_vaccine=$this->vaccine->name_vaccine=$request->name_vaccine;
        $country=$this->vaccine->country=$request->country;
        $company=$this->vaccine->company=$request->company;
        $object=$this->vaccine->object=$request->object;
        $somui=$this->vaccine->somui=$request->somui;
        $distance=$this->vaccine->distance=$request->distance;
        $insert=$this->vaccine-> 
        InsertVaccine($name_vaccine,$country,$company,$object,$somui,$distance);
        if($insert->save()){
            return new VaccineResource($insert);
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
        $get=$this->vaccine->SelectVaccine($id);
        return new VaccineResource($get);
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
        $update=$this->vaccine->SelectVaccine($id);
        $update->name_vaccine=$request->name_vaccine;
        $update->country=$request->country;
        $update->company=$request->company;
        $update->object=$request->object;
        $update->somui=$request->somui;
        $update->distance=$request->distance;
        if($update->save()){
            return new vaccineResource($update);
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
        $destroy=$this->vaccine->DestroyVaccine($id);
        if($destroy->delete()){
           
            return new vaccineResource($destroy);
        }
    }
}
