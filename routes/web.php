<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LetterDetailController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\Kaprodi\LetterApprovalController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['auth','role:admin'])->group(function () {
        Route::prefix('adm')->group(function (){
            Route::get('/admin', [AdminController::class, 'index'])->name('adminList');
            Route::get('/admin/create', [AdminController::class, 'create'])->name('adminCreate');
            Route::post('/admin/create', [AdminController::class, 'store'])->name('adminStore');
            Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswaCreate');
            Route::post('/mahasiswa/create', [MahasiswaController::class, 'store'])->name('mahasiswaStore');
        });

        Route::prefix('user')->group(function (){
            Route::get('/user', [UserController::class, 'index'])->name('userList');
            Route::get('/user/create', [UserController::class, 'create'])->name('userCreate');
            Route::post('/user/create', [UserController::class, 'store'])->name('userStore');
            Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('userEdit');
            Route::put('/user/edit/{user}', [UserController::class, 'update'])->name('userUpdate');
            Route::get('/user/delete/{user}', [UserController::class, 'destroy'])->name('userDelete');
            Route::get('/user/detail/{id}', [UserController::class, 'show'])->name('userShow');

        });
    });
        
    Route::middleware(['auth','role:mahasiswa'])->group(function () {
        Route::prefix('mahasiswa')->group(function (){
            Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswaList');
            Route::get('/detail', [MahasiswaController::class, 'detail'])->name('mahasiswaDetail');
            Route::get('/surat/skma', [LetterDetailController::class, 'skma'])->name('suratSkma');
            Route::get('/surat/lhs', [LetterDetailController::class, 'lhs'])->name('suratLhs');
            Route::get('/surat/sptmk', [LetterDetailController::class, 'sptmk'])->name('suratSptmk');
            Route::get('/surat/kl', [LetterDetailController::class, 'kl'])->name('suratKl');

        });
        
    });
    

    // kaprodi 
    Route::get('/kaprodi', [KaprodiController::class, 'index'])->name('kaprodi');
    Route::prefix('kaprodi')->middleware('auth')->group(function () {
        Route::get('/surat', [KaprodiController::class, 'index'])->name('kaprodi.index');
        Route::get('/surat/{id}', [KaprodiController::class, 'show'])->name('kaprodi.show');
        Route::post('/surat/{id}/approve', [KaprodiController::class, 'approve'])->name('kaprodi.approve');
        Route::post('/surat/{id}/reject', [KaprodiController::class, 'reject'])->name('kaprodi.reject');
        Route::get('/kaprodi', [KaprodiController::class, 'index'])->name('kaprodi.index');
        Route::post('/kaprodi/approve/{id}', [KaprodiController::class, 'approve'])->name('kaprodi.approve');
        Route::post('/kaprodi/reject/{id}', [KaprodiController::class, 'reject'])->name('kaprodi.reject');
        Route::post('/kaprodi/letters/{id}/reject', [LetterApprovalController::class, 'reject'])->name('kaprodi.letters.reject');
        Route::middleware(['auth', 'role:kaprodi'])->group(function () {
        Route::get('/kaprodi/dashboard', [KaprodiController::class, 'index'])->name('kaprodi.dashboard');
        });
    });
    
    Route::middleware(['auth'])->group(function () {
        Route::get('/kaprodi/letters', [LetterApprovalController::class, 'index'])->name('kaprodi.letters.index');
        Route::post('/kaprodi/letters/{id}/approve', [LetterApprovalController::class, 'approve'])->name('kaprodi.letters.approve');
    });
});

Route::get('/', function () {
    if (!Auth::check()) {
        return redirect('/login');
    }
    $user = Auth::user();
    switch ($user->role->role_name) {
        case 'admin':
            return redirect()->route('adminList');
        case 'kaprodi':
            return redirect()->route('kaprodi.index');
        case 'mahasiswa':
            return redirect()->route('mahasiswaList');
        default:
            abort(403, 'Unauthorized');
    }
})->middleware(['auth', 'verified'])->name('dashboard');
    

require __DIR__.'/auth.php';
