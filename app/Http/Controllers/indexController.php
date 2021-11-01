<?php

namespace App\Http\Controllers;

use App\Imports\donvitiemchungImport;
use App\Imports\UserImport;
use App\Imports\vaccineDVImport;
use App\Imports\vaccineImport;
use App\Models\vaccineDV;
// use App\Models\vaccine_donvitiemchung;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class indexController extends Controller
{
    //Users
    public function SetFormUser(){
        return view('import.users');
    }
    public function GetFormUser(Request $request){
        if($request->has('fileUsers')){
            Excel::import(new UserImport,$request->fileUsers);
            return 'Records are imported';
        }else{
            return 'Errors';
        }
    }
    //Vaccine
    public function SetFormVaccine(){
        return view('import.vaccine');
    }
    public function GetFormVaccine(Request $request){
        if($request->has('fileVaccine')){
            Excel::import(new vaccineImport,$request->fileVaccine);
            return 'Records are imported';
        }else{
            return 'Errors';
        }
    }
    //Dơn vị tiêm chủng
    public function SetFormdvTiemChung(){
        return view('import.dvTiemChung');
    }
    public function GetFormdvTiemChung(Request $request){
        if($request->has('filedvTiemChung')){
            Excel::import(new donvitiemchungImport,$request->filedvTiemChung);
            return 'Records are imported';
        }else{
            return 'Errors';
        }
    }
     //Vaccine & Đơn vị tiêm
     public function SetFormVACdvTiemChung(){
        return view('import.VACdvTiemChung');
    }
    public function GetFormVACdvTiemChung(Request $request){
        if($request->has('fileVACdvTiemChung')){
            Excel::import(new vaccineDVImport,$request->fileVACdvTiemChung);
            return 'Records are imported';
        }else{
            return 'Errors';
        }
    }
  
   
}
