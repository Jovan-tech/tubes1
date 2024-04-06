<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\PengabdianController;
use App\Http\Controllers\PenelitianAController;
use App\Http\Controllers\PenelitianBController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PICController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\CoaController;

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
    // return view('welcome');
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// dashboardbootstrap
Route::get('/dashboardbootstrap', function () {
    return view('dashboardbootstrap');
})->middleware(['auth'])->name('dashboardbootstrap');

// route untuk validasi login
Route::post('/validasi_login', [App\Http\Controllers\LoginController::class, 'show']);

// route selamat
Route::get('/selamat', function () {
    return view('selamat',['nama'=>'Hendro Jokondo-kondo']);
});

// route contoh1
Route::get('contoh1', [App\Http\Controllers\Contoh1Controller::class, 'show']);
Route::get('contohdom', [App\Http\Controllers\Contoh1Controller::class,'contohdom']);
Route::get('contohajax', [App\Http\Controllers\Contoh1Controller::class,'contohajax']);
// route contoh2
Route::get('/contoh2', [App\Http\Controllers\Contoh2Controller::class, 'show']);
// route coa
// Route::get('/coa', [App\Http\Controllers\CoaController::class, 'index']);
// untuk master data coa
// jika ingin menambahkan routes baru selain default resource di tambah di awal
// sebelum route resource
Route::get('coa/tabel', [App\Http\Controllers\CoaController::class,'tabel'])->middleware(['auth']);
Route::get('coa/fetchcoa', [App\Http\Controllers\CoaController::class,'fetchcoa'])->middleware(['auth']);
Route::get('coa/fetchAll', [App\Http\Controllers\CoaController::class,'fetchAll'])->middleware(['auth']);
Route::get('coa/edit/{id}', [App\Http\Controllers\CoaController::class,'edit'])->middleware(['auth']);
Route::get('coa/destroy/{id}', [App\Http\Controllers\CoaController::class,'destroy'])->middleware(['auth']);
Route::resource('coa', CoaController::class)->middleware(['auth']);



// route ke master data perusahaan
Route::resource('/perusahaan', PerusahaanController::class)->middleware(['auth']);
Route::get('/perusahaan/destroy/{id}', [App\Http\Controllers\PerusahaanController::class,'destroy'])->middleware(['auth']);

// route ke master data penelitian
Route::resource('/penelitian', PenelitianController::class)->middleware(['auth']);
Route::get('/penelitian/destroy/{id}', [App\Http\Controllers\PenelitianController::class,'destroy'])->middleware(['auth']);

//route ke master data pengabdian
Route::resource('/pengabdian', PengabdianController::class)->middleware(['auth']);
Route::get('/pengabdian/destroy/{id}', [App\Http\Controllers\PengabdianController::class,'destroy'])->middleware(['auth']);

//route ke master data PIC
Route::resource('/pic', PICController::class)->middleware(['auth']);
Route::get('/pic/destroy/{id}', [App\Http\Controllers\PICController::class,'destroy'])->middleware(['auth']);

//route ke master data Pengeluaran
Route::resource('/pengeluaran', PengeluaranController::class)->middleware(['auth']);
Route::get('/pengeluaran/destroy/{id}', [App\Http\Controllers\PengeluaranController::class,'destroy'])->middleware(['auth']);

//route ke master data Penelitian A
Route::resource('/penelitiana', PenelitianAController::class)->middleware(['auth']);
Route::get('/penelitiana/destroy/{id}', [App\Http\Controllers\PenelitianAController::class,'destroy'])->middleware(['auth']);

// route ke master data jenis kegiatan
Route::resource('/kegiatan', KegiatanController::class)->middleware(['auth']);
Route::get('/kegiatan/destroy/{id}', [App\Http\Controllers\KegiatanController::class,'destroy'])->middleware(['auth']);

Route::resource('/mitra', MitraController::class)->middleware(['auth']);
Route::get('/mitra/destroy/{id}', [App\Http\Controllers\MitraController::class,'destroy'])->middleware(['auth']);

//route ke master data Penelitian B
Route::resource('/penelitianb', PenelitianBController::class)->middleware(['auth']);
Route::get('/penelitianb/destroy/{id}', [App\Http\Controllers\PenelitianBController::class,'destroy'])->middleware(['auth']);


// route ke master data perusahaan
Route::resource('/kas', KasController::class)->middleware(['auth']);
Route::get('/kas/destroy/{id}', [App\Http\Controllers\KasController::class,'destroy'])->middleware(['auth']);

Route::resource('/coa', KasController::class)->middleware(['auth']);
Route::get('/coa/destroy/{id}', [App\Http\Controllers\CoaController::class,'destroy'])->middleware(['auth']);


require __DIR__.'/auth.php';
