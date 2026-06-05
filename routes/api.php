<?php

use App\Http\Controllers\Api\Identity\RegisterUserController;
use App\Http\Controllers\Api\Identity\LoginController;
use App\Http\Controllers\Api\Identity\MeController;
use App\Http\Controllers\Api\Identity\TenantController;
use App\Http\Controllers\Api\Identity\ListUsersController;
use App\Http\Controllers\Api\Product\CreateProductController;
use App\Http\Controllers\Api\Product\ListProductsController;
use Illuminate\Support\Facades\Route;

Route::post('/register', RegisterUserController::class);

Route::post('/login', LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', MeController::class);
    Route::get('/tenant', TenantController::class);
    Route::get('/users', ListUsersController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/products', CreateProductController::class);
    Route::get('/products', ListProductsController::class);
});
