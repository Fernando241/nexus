<?php

use App\Http\Controllers\Api\Identity\RegisterUserController;
use App\Http\Controllers\Api\Identity\LoginController;
use Illuminate\Support\Facades\Route;

Route::post('/register', RegisterUserController::class);

Route::post('/login', LoginController::class);
