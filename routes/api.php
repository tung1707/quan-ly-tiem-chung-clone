<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\dktiemController;
use App\Http\Controllers\donvitiemchungController;
use App\Http\Controllers\HSTiemChungController;
use App\Http\Controllers\kehoachtiemController;
use App\Http\Controllers\nguoidanController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\vaccineDVController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//API login
Route::middleware('api')->group(function () {
    //Route::prefix('auth')->group(function () {
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::get('/user-profile', [AuthController::class, 'userProfile']); 
        Route::post('/change-pass', [AuthController::class, 'changePassWord']);
        
    //});
});

//User
Route::resource('users', UsersController::class);
//Vaccine
Route::resource('vaccine', VaccineController::class);
//Đơn vị tiêm chủng
Route::resource('dvtiemchung', donvitiemchungController::class);
//Vaccinde DV
Route::resource('vaccinedv', vaccineDVController::class);
//Kế hoạch tiêm 
Route::resource('kehoachtiem', kehoachtiemController::class);
//Người dân
Route::resource('nguoidan', nguoidanController::class);
//Đăng ký tiêm
Route::resource('dktiem', dktiemController::class);
//Hồ sơ tiêm chủng
Route::resource('hosotiemchung', HSTiemChungController::class);
//ke hoach tiem
Route::get('kehoachtiem/',[kehoachtiemController::class,'kehoachtiem']);