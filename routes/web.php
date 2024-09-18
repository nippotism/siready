<?php

use App\Http\Controllers\IrsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\product;
use App\Http\Controllers\productController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\RegistFirst;
use Illuminate\Support\Facades\Route;
use Monolog\Registry;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});






Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);


Route::get('dashboard',function(){
    if(auth()->user()->role == 'Student'){
        return app('App\Http\Controllers\DashboardController')->index();
    }else{
        return view('paDashboard');
    }
})->name('dashboard')->middleware('auth');

Route::get('/logout',[LoginController::class,'logout']);



// Route::get('registration',[RegisterController::class,'index']);


Route::get('product/{product}/delete',[ProductsController::class,'destroy']);

// Route::post('/register',[RegisterController::class,'store']);




Route::resource('product', ProductsController::class);



Route::get('/p',function(){
    return view('desbor');
});

Route::get('/m',function(){
    return view('maintenance');
});


//IRS
Route::get('/irs',[IrsController::class,'all']);
Route::get('/irs/{id}',[IrsController::class,'index']);


//KHS
Route::get('m/khs', function () {
    return view('mhsKhs');
});

//Buat IRS
Route::get('m/buat-irs', function () {
    return view('mhsBuatIrs');
})->name('buatIrs')->middleware(RegistFirst::class);

//Registrasi
Route::get('m/registrasi', function () {
    return view('mhsRegistrasi');
})->name('registration');

Route::get('p/perwalian', function () {
    return view('paPerwalian');
});
Route::get('p/ajuan-irs', function () {
    return view('paAjuanIrs');
});
Route::get('k/dashboard', function () {
    return view('kpDashboard');
});
Route::get('k/buat-jadwal', function () {
    return view('kpBuatJadwal');
});
Route::get('k/rombel', function () {
    return view('kpRombel');
});


