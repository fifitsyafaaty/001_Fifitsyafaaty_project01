<?php

use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
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

Route::get('/', [SesiController::class, 'login']);

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SesiController::class, 'login'])->name('login');
    Route::post('/login-proses', [SesiController::class, 'login_proses'])->name('login-proses')->middleware('throttle:login'); //
    // Route::get('/daftar', [SesiController::class, 'daftar'])->name('daftar');
    // Route::post('/daftar-proses', [SesiController::class, 'daftar_proses'])->name('daftar-proses');

});

Route::get('/home', function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {  
    /// admin ///
    Route::get('/admin', [AdminController::class, 'index'])->name('index')->middleware('userAkses:admin');
    /// end admin ////

    ///dosen
    Route::get('/dosen', [DosenController::class, 'index'])->name('index')->middleware('userAkses:dosen');
    ///enddosen///

    /// mahasiswa ///
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('index')->middleware('userAkses:murid');
    /// end mahasiswa ////

    Route::get('/logout', [SesiController::class, 'logout'])->name('logout');
});

