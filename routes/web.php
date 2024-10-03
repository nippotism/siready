<?php

use Monolog\Registry;
use App\Http\Middleware\RegistFirst;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IrsController;
use App\Http\Controllers\KhsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AjuanRuangController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\BuatIrsController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);

Route::get('dashboard', function() {
    if (auth()->user()->mhs == 1) {
        return app('App\Http\Controllers\DashboardController')->index();
    } else if (auth()->user()->ba == 1) {
        return app('App\Http\Controllers\RuangController')->dashboard();
    } else if (auth()->user()->dk == 1) {
        return view('dkDashboard');
    } else if (auth()->user()->kp == 1) {
        return view('kpDashboard');
    } else if (auth()->user()->pa == 1) {
        return view('paDashboard');
    }
    
})->name('dashboard')->middleware('auth');


Route::get('/logout',[LoginController::class,'logout']);

// Route::get('product/{product}/delete',[ProductsController::class,'destroy']);

Route::get('/maintenance',function(){
    return view('maintenance');
});
Route::get('/tes',function(){
    return view('tes');
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
Route::get('m/make-irs', function () {
    return view('mhsBuatIrs');
})->name('transkrip');

//Buat IRS
Route::get('/buat-irs',[BuatIrsController::class,'index']) -> name('buat-irs')->middleware([RegistFirst::class]);
Route::post('/buat-irstest',[BuatIrsController::class,'createIrs']) -> name('buat-irstest');
Route::post('/viewirs',[BuatIrsController::class,'viewIrs']) -> name('viewirs');
Route::post('/deleteirs',[BuatIrsController::class,'deleteIrs']) -> name('deleteirs');

Route::get('/ajuanIrs', [BuatIrsController::class, 'index2'])->name('ajuanIrs');
Route::post('/irs/approve', [BuatIrsController::class, 'approve'])->name('irs.approve');
Route::post('/irs/reject', [BuatIrsController::class, 'reject'])->name('irs.reject');

//Registrasi
Route::get('m/registrasi', function () {
    return view('mhsRegistrasi');
})->name('registration');


//Ruang
Route::resource('/ruang', RuangController::class)->names([
    'index' => 'ruang',
]);
Route::get('/plotruang',[RuangController::class,'index2'])->name('plotruang');
Route::post('/plotruang/{id}',[RuangController::class,'editProdi']);
Route::get('/prodi',[RuangController::class,'plotProdi']);

Route::get('/ajuanRuang', [RuangController::class, 'index3'])->name('ajuanruang');
Route::post('/ruang/{id}/update-status', [RuangController::class, 'updateStatus'])->name('ruang.updateStatus');



//Jadwal
Route::get('/buatjadwal',[JadwalController::class,'index'])->name('buatjadwal');
Route::post('/buatjadwal/{id}',[JadwalController::class,'update']);
Route::post('/checkjadwal',[JadwalController::class,'isJadwalExist']);


Route::get('/ajuanJadwal', [JadwalController::class, 'index3'])->name('ajuanjadwal');
Route::post('/jadwal/approve', [JadwalController::class, 'approve'])->name('jadwal.approve');
Route::post('/jadwal/reject', [JadwalController::class, 'reject'])->name('jadwal.reject');

Route::get('p/perwalian', function () {
    return view('paPerwalian');
})->name('perwalian');



Route::resource('/matakuliah', MatakuliahController::class)->names([
    'index' => 'matakuliah',
]);


Route::get('k/rombel', function () {
    return view('kpRombel');
})->name('rombel');


Route::get('/reviewjadwal',[JadwalController::class,'index2']);
Route::get('/reviewjadwal/{prodi}',[JadwalController::class,'reviewJadwalProdi']);

