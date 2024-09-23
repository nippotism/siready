<?php

use Monolog\Registry;
use App\Http\Middleware\RegistFirst;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IrsController;
use App\Http\Controllers\KhsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\AjuanRuangController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MatakuliahController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);

Route::get('dashboard', function() {
    switch(auth()->user()->role) {
        case 'Mahasiswa':
            return app('App\Http\Controllers\DashboardController')->index();
            break;
        case 'Pembimbing Akademik':
            return view('paDashboard');
            break;
        case 'Kaprodi':
            return view('kpDashboard');
            break;
        case 'Dekan':
            return view('dkDashboard');
            break;
        case 'BA':
            return app('App\Http\Controllers\RuangController')->dashboard();
            break;
    }
})->name('dashboard')->middleware('auth');


Route::get('/logout',[LoginController::class,'logout']);

// Route::get('product/{product}/delete',[ProductsController::class,'destroy']);

Route::get('/m',function(){
    return view('maintenance');
});

//IRS
Route::get('/irs',[IrsController::class,'all']) -> name('irs');
Route::get('/irs/{id}',[IrsController::class,'index']);


//KHS
Route::get('/khs',[KhsController::class,'all']) -> name('khs');
Route::get('/khs/{id}',[KhsController::class,'index']);


//Transkrip
Route::get('m/transkrip', function () {
    return view('mhsTranskrip');
})->name('transkrip');

//Buat IRS
Route::get('m/buat-irs', function () {
    return view('mhsBuatIrs');
})->name('buatIrs')->middleware(RegistFirst::class);

//Registrasi
Route::get('m/registrasi', function () {
    return view('mhsRegistrasi');
})->name('registration');


//Ruang
Route::resource('/ruang', RuangController::class);
Route::get('/plotruang',[RuangController::class,'index2'])->name('plotruang');
Route::post('/plotruang/{id}',[RuangController::class,'editProdi']);
Route::get('/prodi',[RuangController::class,'plotProdi']);

Route::get('/ajuanRuang', [RuangController::class, 'index3']);
Route::post('/ruang/{id}/update-status', [RuangController::class, 'updateStatus'])->name('ruang.updateStatus');

Route::get('p/perwalian', function () {
    return view('paPerwalian');
})->name('perwalian');

Route::get('p/ajuan-irs', function () {
    return view('paAjuanIrs');
})->name('ajuanIrs');

Route::get('k/buat-jadwal', function () {
    return view('kpBuatJadwal');
})->name('buatJadwal');

Route::resource('/matakuliah', MatakuliahController::class);

Route::get('k/rombel', function () {
    return view('kpRombel');
})->name('rombel');


