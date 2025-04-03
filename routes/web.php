<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LetterDetailController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('layouts.starter');
// });

// mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswaList');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswaCreate');
Route::post('/mahasiswa/create', [MahasiswaController::class, 'store'])->name('mahasiswaStore');

// surat
Route::get('/surat/skma', [LetterDetailController::class, 'skma'])->name('suratSkma');
Route::get('/surat/lhs', [LetterDetailController::class, 'lhs'])->name('suratLhs');
Route::get('/surat/sptmk', [LetterDetailController::class, 'sptmk'])->name('suratSptmk');
Route::get('/surat/kl', [LetterDetailController::class, 'kl'])->name('suratKl');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('layouts.starter');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
