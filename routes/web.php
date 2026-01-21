<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GonderiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;

// Herkese açık sayfalar
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gonderi/{id}', [HomeController::class, 'show'])->name('front.show');

// Giriş yapmış kullanıcılar için Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profil işlemleri
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- ADMIN PANELİ ROTALARI ---
// Burada 'prefix' URL'i /admin yapar.
// 'name' ise rota isminin başına admin. koyar.
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    
    // Doğrusu bu: Direkt buraya yazıyoruz.
    // Oluşan Rota: admin.users.index
    // Oluşan URL: site.com/admin/users
    Route::resource('users', UserController::class);

    // Gönderiler de aynı şekilde
    Route::resource('gonderiler', GonderiController::class);
    
});

require __DIR__.'/auth.php';