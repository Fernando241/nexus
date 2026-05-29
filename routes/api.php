<?php

use App\Http\Controllers\Api\Identity\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', RegisterUserController::class);
