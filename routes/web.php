<?php

use App\Http\Controllers\InterfaceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/interface', [InterfaceController::class, 'index'])->name('interface.index');
Route::post('/interface/{interfaceId}/disable', [InterfaceController::class, 'disableInterface'])->name('interface.disable');
Route::post('/interface/{interfaceId}/enable', [InterfaceController::class, 'enableInterface'])->name('interface.enable');
Route::post('/interface/{interfaceId}/update', [InterfaceController::class, 'updateInterface'])->name('interface.update');

