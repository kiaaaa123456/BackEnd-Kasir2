<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:admin'])->group(function () {
    Route::apiResource('/category2', CategoryController::class);
});
Route::apiResource('/user', UserController::class);
Route::post('/login', [AdminAuthController::class, 'login']);
Route::apiResource('/pelanggan', PelangganController::class);
// Route::apiResource('/category2', CategoryController::class);
