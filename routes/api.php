<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ViewIrs;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Register;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\JadwalController;
use App\Http\Controllers\Api\BuatIrsController;
use App\Http\Controllers\Api\DashboardController;


Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user());
});

Route::middleware('auth:sanctum')->group(function () {

    //Auth
    Route::post('/logout', [AuthController::class, 'logout']);

    //Irs Page
    Route::get('/irs', [ViewIrs::class, 'dataIrs']);

    //Buat Irs Page
    Route::get('/buat-irs', [BuatIrsController::class, 'index']);
    Route::post('/buat-irs', [BuatIrsController::class, 'createIrs']);
    Route::get('/view-irs', [BuatIrsController::class, 'viewIrs']);
    Route::post('/delete-irs', [BuatIrsController::class, 'deleteIrs']);


    //Register Page
    Route::post('/register', [Register::class, 'registerStatus']);

    //Dashboard Page
    Route::get('/dashboard', [DashboardController::class, 'index']);

    //Jadwal Page
    Route::get('/jadwal', [JadwalController::class, 'getJadwalForMonth']);
});


Route::get('/register', [Register::class, 'statusMahasiswa']);

