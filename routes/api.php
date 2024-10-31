<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Register;


Route::post('/register', [Register::class, 'registerStatus']);
Route::get('/register', [Register::class, 'statusMahasiswa']);