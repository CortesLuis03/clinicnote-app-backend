<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('clinic-histories')->group(function () {
    Route::get('/getInfo', [\App\Http\Controllers\ClinicHistoryController::class, 'index']);
    Route::get('/{id_patient}', [\App\Http\Controllers\ClinicHistoryController::class, 'show']);
    Route::post('/save', [\App\Http\Controllers\ClinicHistoryController::class, 'store']);
    Route::put('/{id_patient}', [\App\Http\Controllers\ClinicHistoryController::class, 'update']);
    Route::delete('/{id_patient}', [\App\Http\Controllers\ClinicHistoryController::class, 'destroy']);
    Route::prefix('/detail')->group(function () {
        Route::get('/getInfo/{id}', [\App\Http\Controllers\ClinicHistoryDetailController::class, 'index']);
        Route::get('/{id}', [\App\Http\Controllers\ClinicHistoryDetailController::class, 'show']);
        Route::post('save', [\App\Http\Controllers\ClinicHistoryDetailController::class, 'store']);
        Route::put('/{id}', [\App\Http\Controllers\ClinicHistoryDetailController::class, 'update']);
        Route::delete('/{id}', [\App\Http\Controllers\ClinicHistoryDetailController::class, 'destroy']);
    });
});

