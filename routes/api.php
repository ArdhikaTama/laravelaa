<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

// User (Sanctum)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ===============================
// API MAHASISWA
// ===============================

// GET: Mengambil seluruh data mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'apiIndex'])
    ->name('api.mahasiswa.index');

// POST: Menambahkan mahasiswa baru
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])
    ->name('api.mahasiswa.store');

// PUT: Mengubah data mahasiswa berdasarkan NIM
Route::put('/mahasiswa/{nim}', [MahasiswaController::class, 'apiUpdate'])
    ->name('api.mahasiswa.update');

// DELETE: Menghapus mahasiswa berdasarkan NIM
Route::delete('/mahasiswa/{nim}', [MahasiswaController::class, 'apiDestroy'])
    ->name('api.mahasiswa.destroy');

