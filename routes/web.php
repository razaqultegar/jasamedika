<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('akun-saya', [AccountController::class, 'index'])->name('account.index');

Route::middleware('guest')->group(function () {
    Route::get('masuk', [AuthenticatedSessionController::class, 'create'])->name('signin');
    Route::post('masuk', [AuthenticatedSessionController::class, 'store']);
    Route::get('daftar', [RegisteredUserController::class, 'create'])->name('signup');
    Route::post('daftar', [RegisteredUserController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('pesan', [HomeController::class, 'checkout'])->name('checkout');
    Route::post('pesan', [HomeController::class, 'checkout_process']);

    Route::prefix('mobil')->name('cars.')->group(function () {
        Route::get('/', [CarController::class, 'index'])->name('index');
        Route::get('baru', [CarController::class, 'create'])->name('create');
        Route::post('baru', [CarController::class, 'store']);
        Route::get('{id}/sunting', [CarController::class, 'edit'])->name('edit');
        Route::put('{id}/sunting', [CarController::class, 'update']);
        Route::get('{id}/hapus', [CarController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('riwayat')->name('history.')->group(function () {
        Route::get('/', [HomeController::class, 'history'])->name('index');
        Route::get('{id}', [HomeController::class, 'showHistory'])->name('show');
        Route::put('{id}', [HomeController::class, 'updateHistory'])->name('update');
    });

    Route::prefix('akun-saya')->name('account.')->group(function () {
        Route::get('sunting', [AccountController::class, 'edit'])->name('edit');
        Route::post('sunting', [AccountController::class, 'update']);
    });

    Route::get('keluar', [AuthenticatedSessionController::class, 'destroy'])->name('signout');
});
