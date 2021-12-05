<?php

namespace App\Http\Controllers;

use App\Http\Resources\KeHoachTiemResource;
use App\Models\kehoachtiem;
use Illuminate\Http\Request;

class kehoachtiemController extends Controller
{
    protected $KehoachTiem;
    public function __construct(){
        $this->KehoachTiem = new kehoachtiem();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all=$this->KehoachTiem->SelectkehoachtiemAll();
        return new KeHoachTiemResource($all);
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
       return $this->KehoachTiem->InsertKehoachtiem($request->Ngay_Tiem);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $get = $this->KehoachTiem->Selectkehoachtiem($id);
        return new KeHoachTiemResource($get);
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
    public function XX(){
        return new KeHoachTiemResource ($this->KehoachTiem->InsertKehoachtiem());

    }
}
