<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LiburNasionalController;
use App\Http\Controllers\ShiftController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::controller(AuthController::class)->group(function(){
    Route::post('/register','register');
    Route::post('/login', 'login');
});

Route::middleware('api')->group(function () {
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::controller(ShiftController::class)->middleware('api')->group(function(){
    Route::get('/data-employee','showAllDataDiri');
    Route::post('/save-shift','createShift');
    Route::post('/delete-shift','deleteShift');
    Route::post('/cuti','cutiFiture');


    Route::post('/update-shift','updateShift');



});

Route::controller(AbsensiController::class)->middleware('api')->group(function(){
    Route::post('/absensi','absensi');
});

Route::controller(LiburNasionalController::class)->middleware('api')->group(function(){

});
