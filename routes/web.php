<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PracownikController;
use App\Http\Controllers\KlientController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController; // Dodano kontroler
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Zaktualizowano trasę dashboardu, aby wykorzystać DashboardController
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        // Dodaj tu kolejne trasy dla admina zgodnie z wymaganiami
    });

    Route::group(['prefix' => 'worker', 'middleware' => ['role:worker']], function () {
        Route::get('/dashboard', [WorkerController::class, 'index'])->name('worker.dashboard');
        // Dodaj tu kolejne trasy dla pracownika
    });

    Route::group(['prefix' => 'user', 'middleware' => ['role:user']], function () {
        Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
        // Dodaj tu kolejne trasy dla użytkownika (klienta)
    });

    // Trasy dla PracownikController
    Route::get('/pracownicy', [PracownikController::class, 'index'])->name('pracownicy.index');
    Route::get('/pracownicy/create', [PracownikController::class, 'create'])->name('pracownicy.create');
    Route::post('/pracownicy', [PracownikController::class, 'store'])->name('pracownicy.store');
    Route::get('/pracownicy/{pracownik}', [PracownikController::class, 'show'])->name('pracownicy.show');
    Route::get('/pracownicy/{pracownik}/edit', [PracownikController::class, 'edit'])->name('pracownicy.edit');
    Route::put('/pracownicy/{pracownik}', [PracownikController::class, 'update'])->name('pracownicy.update');
    Route::delete('/pracownicy/{pracownik}', [PracownikController::class, 'destroy'])->name('pracownicy.destroy');

    // Trasy dla KlientController
    Route::get('/klienci', [KlientController::class, 'index'])->name('klienci.index');
    Route::get('/klienci/create', [KlientController::class, 'create'])->name('klienci.create');
    Route::post('/klienci', [KlientController::class, 'store'])->name('klienci.store');
    Route::get('/klienci/{klient}', [KlientController::class, 'show'])->name('klienci.show');
    Route::get('/klienci/{klient}/edit', [KlientController::class, 'edit'])->name('klienci.edit');
    Route::put('/klienci/{klient}', [KlientController::class, 'update'])->name('klienci.update');
    Route::delete('/klienci/{klient}', [KlientController::class, 'destroy'])->name('klienci.destroy');
});

require __DIR__.'/auth.php';
