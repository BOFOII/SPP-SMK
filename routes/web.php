<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\View\HomeController;
use App\Http\Controllers\View\KelasController;
use App\Http\Controllers\View\LoginController;
use App\Http\Controllers\View\PembayaranController;
use App\Http\Controllers\View\PetugasController;
use App\Http\Controllers\View\SiswaController;
use App\Http\Controllers\View\SPPController;
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

Route::get('/login', LoginController::class)->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('post.login')->middleware('guest');

Route::middleware(['auth:spp'])->group(function () {

    // for view
    Route::get('/', HomeController::class)->name('home');
    Route::get('/siswa', SiswaController::class)->name('view.siswa');
    Route::get('/kelas', KelasController::class)->name('view.kelas');
    Route::get('/pembayaran', PembayaranController::class)->name('view.pembayaran');
    Route::get('/petugas', PetugasController::class)->name('view.petugas');
    Route::get('/spp', SPPController::class)->name('view.spp');

    // for add
    Route::post('/siswa', [SiswaController::class, 'store'])->name('store.siswa');
    Route::post('/kelas', [KelasController::class, 'store'])->name('store.kelas');
    Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('store.pembayaran');
    Route::post('/petugas', [PetugasController::class, 'store'])->name('store.petugas');
    Route::post('/spp', [SPPController::class, 'store'])->name('store.spp');

    // for update
    Route::patch('/siswa/{nisn}', [SiswaController::class, 'edit'])->name('edit.siswa');
    Route::patch('/kelas/{id_kelas}', [KelasController::class, 'edit'])->name('edit.kelas');
    Route::patch('/pembayaran/{id_pembayaran}', [PembayaranController::class, 'edit'])->name('edit.pembayaran');
    Route::patch('/petugas/{id_petugas}', [PetugasController::class, 'edit'])->name('edit.petugas');
    Route::patch('/spp/{id_spp}', [SPPController::class, 'edit'])->name('edit.spp');

    // for delete
    Route::delete('/siswa/{nisn}', [SiswaController::class, 'destroy'])->name('delete.siswa');
    Route::delete('/kelas/{id_kelas}', [KelasController::class, 'destroy'])->name('delete.kelas');
    Route::delete('/pembayaran/{id_pembayaran}', [PembayaranController::class, 'destory'])->name('delete.pembayaran');
    Route::delete('/petugas/{id_petugas}', [PetugasController::class, 'destroy'])->name('delete.petugas');
    Route::delete('/spp/{id_spp}', [SPPController::class, 'destroy'])->name('delete.spp');

    Route::post('/logout', [AuthController::class, 'logout'])->name('post.logout');
});

