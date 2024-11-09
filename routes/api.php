<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ViewIrs;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Register;
use App\Http\Controllers\Api\AuthController;
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

    //Register Page
    Route::post('/register', [Register::class, 'registerStatus']);

    //Dashboard Page
    Route::get('/dashboard', [DashboardController::class, 'index']);
});


Route::get('/register', [Register::class, 'statusMahasiswa']);

