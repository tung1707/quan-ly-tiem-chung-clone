<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id_users';
    protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        // 'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function SelectUserAll()
    {
        return User::all();
    }
    public function SelectUser($id)
    {
        $check=$user=User::where('id_users',$id)->get();
       if($check[0]->role=='donvitiemchung'){
           $donvitiemchung=DB::table('users')
           ->join('donvitiemchung','donvitiemchung.id_users','=','users.id_users')
           ->where(['users.id_users'=>$id])->get();
           return $donvitiemchung;
     
       }else{
        $nguoidan=DB::table('users')
        ->join('nguoidan','nguoidan.id_users','=','users.id_users')
        ->where(['users.id_users'=>$id])->get();
        return $nguoidan;

       }
    }
    public function DestroyUsers($id){
        return User::find($id);
    }
    public function countUsersdvtc(){
        
    }
}
