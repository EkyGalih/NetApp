<?php

use App\Http\Controllers\Auth\LoginRouterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InterfaceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginRouterController::class, 'index']);
Route::post('/login-router', [LoginRouterController::class, 'login_router'])->name('login-router');

Route::get('/dashbaord', [DashboardController::class, 'index'])->name('dashboard');
Route::prefix('interface')->group(function () {
    Route::get('/', [InterfaceController::class, 'index'])->name('interface');
});

