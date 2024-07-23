<?php

use App\Http\Controllers\Api\RouterosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/test-api', [RouterosController::class, 'test_api']);
    Route::post('/routeros-connect', [RouterosController::class, 'routeros_connection']);
});
