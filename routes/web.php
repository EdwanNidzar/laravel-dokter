<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('role:dokter')->group(function () {
    Route::get('/dokter', [App\Http\Controllers\DokterController::class, 'index'])->name('dokter.index');
    Route::get('/dokter/create' , [App\Http\Controllers\DokterController::class, 'create'])->name('dokter.create');
    Route::get('/dokter/dashboard', [App\Http\Controllers\DokterController::class, 'dashboard'])->name('dokter.dashboard');
    Route::get('/dokter/memeriksa', [App\Http\Controllers\DokterController::class, 'memeriksa'])->name('dokter.memeriksa');
    Route::get('/dokter/periksa/{id}', [App\Http\Controllers\DokterController::class, 'dokterPeriksa'])->name('dokter.periksa');
    Route::put('/periksa/{id}', [App\Http\Controllers\DokterController::class, 'update'])->name('periksa.update');

    Route::resource('obat', App\Http\Controllers\ObatController::class);
});

Route::middleware('role:pasien')->group(function () {
    Route::get('/pasien/dashboard', [App\Http\Controllers\PasienController::class, 'dashboard'])->name('pasien.dashboard');
    Route::resource('pasien', App\Http\Controllers\PasienController::class);
});