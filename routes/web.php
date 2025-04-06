<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LetterDetailController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('layouts.starter');
// });

// mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswaList');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswaCreate');
Route::post('/mahasiswa/create', [MahasiswaController::class, 'store'])->name('mahasiswaStore');
Route::get('/mahasiswa/detail', [MahasiswaController::class, 'detail'])->name('mahasiswaDetail');


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

// admin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('adminList');
    Route::post('/admin/create', [AdminController::class, 'store'])->name('adminCreate');
    Route::get('/admin/create', [AdminController::class, 'index'])->name('adminStore');
    Route::post('/admin/', [AdminController::class, 'store'])->name('adminCtore');
});

//user
Route::middleware(['auth'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('userList');
    Route::get('/user/create', [UserController::class, 'create'])->name('userCreate');
    Route::post('/user/create', [UserController::class, 'store'])->name('userStore');
    Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('userEdit');
    Route::put('/user/edit/{user}', [UserController::class, 'update'])->name('userUpdate');
    Route::delete('/user/delete/{user}', [UserController::class, 'destroy'])->name('userDelete');
    Route::get('/user/detail/{id}', [UserController::class, 'show'])->name('userShow');
});



Route::get('/', function () {
    return view('layouts.starter');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
