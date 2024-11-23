<?php

use App\Http\Controllers\Api\ReimbursementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('auth:sanctum');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth:sanctum');

Route::prefix('/')->middleware('auth:sanctum')->group(function() {
    Route::prefix('/reimbursement')->name('reimbursement.')->group(function() {
        Route::get('/', [ReimbursementController::class, 'index']);
        Route::post('/', [ReimbursementController::class, 'store']);
        Route::put('/{reimbursement}', [ReimbursementController::class, 'update']);
        Route::delete('/{reimbursement}', [ReimbursementController::class, 'destroy']);
        Route::get('/{reimbursement}', [ReimbursementController::class, 'show']);
    });
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
