<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vaccine extends Model
{
    use HasFactory;
    protected $table='vaccine';
    protected $primaryKey='idvaccine';
    protected $guarded=[];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name_vaccine',
        'country',
        'company',
        'object',
        'somui',
        'distance',
    ];
    public function SelectVaccineAll(){
        return vaccine::all();
    }
    public function SelectVaccine($id){
        return vaccine::where(['idvaccine' => $id])->find($id);
    }
    public function InsertVaccine($name_vaccine,$country,$company,$object,$somui,$distance){
        $data=[
            'name_vaccine'=>$name_vaccine,
            'country'=>$country,
            'company'=>$company,
            'object'=>$object,
            'somui'=>$somui,
            'distance'=>$distance 
        ];
        return vaccine::create($data);
    }
    public function DestroyVaccine($id){
        return vaccine::find($id);
    }
}
