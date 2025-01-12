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
Route::get('mobil', [CarController::class, 'index'])->name('cars.index');
Route::get('akun-saya', [AccountController::class, 'index'])->name('account.index');

Route::middleware('guest')->group(function () {
    Route::get('masuk', [AuthenticatedSessionController::class, 'create'])->name('signin');
    Route::post('masuk', [AuthenticatedSessionController::class, 'store']);
    Route::get('daftar', [RegisteredUserController::class, 'create'])->name('signup');
    Route::post('daftar', [RegisteredUserController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('mobil/baru', [CarController::class, 'create'])->name('cars.create');
    Route::post('mobil/baru', [CarController::class, 'store']);

    Route::get('akun-saya/sunting', [AccountController::class, 'edit'])->name('account.edit');
    Route::post('akun-saya/sunting', [AccountController::class, 'update']);

    Route::get('keluar', [AuthenticatedSessionController::class, 'destroy'])->name('signout');
});
