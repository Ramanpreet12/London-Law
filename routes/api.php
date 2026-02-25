<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Protected
Route::middleware('auth:api')->group(function () {
Route::post('/logout', [AuthController::class, 'logout']);
    // Admin Routes
    Route::middleware('role:1')->prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return response()->json(['message' => 'Admin Dashboard Access']);
        });
    });

    // User Routes
    Route::middleware('role:0')->prefix('user')->group(function () {
        Route::get('/dashboard', function () {
            return response()->json(['message' => 'User Dashboard Access']);
        });
    });
});
