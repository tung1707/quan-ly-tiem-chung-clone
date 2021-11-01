<?php

use App\Http\Controllers\indexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Import
Route::prefix('import')->group(function () {
//     //Users
    Route::get('users', [indexController::class, 'SetFormUser']);
    Route::post('users', [indexController::class, 'GetFormUser'])->name('import.users');
//     //Vaccine
    Route::get('vaccine', [indexController::class, 'SetFormVaccine']);
    Route::post('vaccines', [indexController::class, 'GetFormVaccine'])->name('import.vaccines');
//     //Đơn vị tiêm chủng
    Route::get('dvtiemchung', [indexController::class, 'SetFormdvTiemChung']);
    Route::post('dvtiemchung', [indexController::class, 'GetFormdvTiemChung'])->name('import.dvtiemchung');
//     //Vaccine & Đơn vị tiêm chủng
    Route::get('vacdvtiemchung', [indexController::class, 'SetFormVACdvTiemChung']);
    Route::post('vacdvtiemchung', [indexController::class, 'GetFormVACdvTiemChung'])->name('import.VACdvtiemchung');

});
Route::fallback(function(){
    return 'Errors 404';
});