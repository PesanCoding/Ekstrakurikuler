<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\ekskulSiswaController;
use App\Http\Controllers\Jadwalcontroller;
use App\Http\Controllers\PerndaftranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileSiswaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['role:admin|siswa|pembina'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('jadwal', Jadwalcontroller::class);
});
Route::middleware(['role:admin'])->group(function () {
    Route::resource('ekskul', EkskulController::class);
    Route::resource('user', UserController::class);
    Route::resource('siswa', SiswaController::class);
});
Route::middleware(['role:pembina'])->group(function () {
    Route::get('siswapendaftaran', [PerndaftranController::class, 'pendaftaran'])->name('pendaftaran.siswa');
});
Route::middleware(['role:siswa'])->group(function () {
    Route::resource('profil', ProfileSiswaController::class);
    Route::resource('siswaekskul', ekskulSiswaController::class);
    Route::resource('absensi', AbsensiController::class);
    Route::get('pendaftaran', [PerndaftranController::class, 'index'])->name('pendaftran.index');
    Route::get('pendaftaran/{id}', [PerndaftranController::class, 'show'])->name('pendaftran.show');
    Route::post('pendaftaran', [PerndaftranController::class, 'store'])->name('pendaftran.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
