<?php

use Illuminate\Support\Facades\Route;
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

Route::middleware('guest')->group(function () {
    Route::get('masuk', [AuthenticatedSessionController::class, 'create'])->name('signin');
    Route::post('masuk', [AuthenticatedSessionController::class, 'store']);
    Route::get('daftar', [RegisteredUserController::class, 'create'])->name('signup');
    Route::post('daftar', [RegisteredUserController::class, 'store']);
});
