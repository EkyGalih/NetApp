<?php

use App\Http\Controllers\Auth\LoginRouterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Firewall\FirewallController;
use App\Http\Controllers\InterfaceController;
use App\Http\Controllers\IpAddressController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginRouterController::class, 'index']);
Route::post('/login-router', [LoginRouterController::class, 'login_router'])->name('login-router');

Route::get('/dashbaord', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/cpu', [DashboardController::class, 'cpu'])->name('dashboard.cpu');
Route::get('/dashboard/uptime', [DashboardController::class, 'uptime'])->name('dashboard.uptime');
Route::get('/dashboard/trafic/up/{interface}', [DashboardController::class, 'traficUp'])->name('dashboard.trafic-up');
Route::get('/dashboard/trafic/down/{interface}', [DashboardController::class, 'traficDown'])->name('dashboard.trafic-down');
Route::prefix('interface')->group(function () {
    Route::get('/', [InterfaceController::class, 'index'])->name('interface');
    Route::post('/int-status/{id}', [InterfaceController::class, 'status'])->name('interface.status');
    Route::put('/int-update/{id}', [InterfaceController::class, 'update'])->name('interface.update');
});

Route::prefix('ip')->group(function () {
    Route::prefix('address')->group(function () {
        Route::get('/', [IpAddressController::class, 'index'])->name('address');
        Route::post('/address/store/', [IpAddressController::class, 'store'])->name('address.store');
        Route::put('/address/update/{id}', [IpAddressController::class, 'update'])->name('address.update');
        Route::post('/address/status/{id}', [IpAddressController::class, 'status'])->name('address.status');
        Route::delete('/address/destroy/{id}', [IpAddressController::class, 'destroy'])->name('address.destroy');
    });

    Route::prefix('firewall')->group(function() {
        Route::get('/', [FirewallController::class, 'index'])->name('firewall');
    });
});
