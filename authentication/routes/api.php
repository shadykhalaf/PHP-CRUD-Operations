<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RolesController;
use Illuminate\Support\Facades\Route;

// Publicly accessible registration route
Route::post('/register', [AuthController::class, 'register']);

// Publicly accessible login route
Route::post('/login', [AuthController::class, 'login']);

// Group for authenticated routes
Route::middleware('admin')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/roles', [RolesController::class, 'store']); // Role creation route
});  ?>