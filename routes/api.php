<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FormationController;
use App\Http\Controllers\Api\LookupsController;
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
    // Route::middleware('role:0')->prefix('user')->group(function () {
    //     Route::get('/dashboard', function () {
    //         return response()->json(['message' => 'User Dashboard Access']);
    //     });

    // });

    Route::middleware('role:0')->prefix('user')->group(function () {
        // Route::get('/dashboard', [FormationController::class, 'dashboardList']);
        Route::post('/formation/step-1', [FormationController::class, 'storeStep1']);
        // Route::post('/formation/step-2', [FormationController::class, 'storeStep2']);

        // Lookup APIs for Frontend Dropdowns
        Route::get('/articles', [LookupsController::class, 'getArticles']);
        Route::get('/styles', [LookupsController::class, 'getStyles']);
        Route::get('/locations', [LookupsController::class, 'getLocations']);
        Route::get('/objects', [LookupsController::class, 'getObjects']);
        Route::get('/sic-codes', [LookupsController::class, 'getSicCodes']);
        Route::get('/currency', [LookupsController::class, 'getCurrency']);
        // Route::get('/lookups', function () {
        //     return response()->json([
        //         'articles' => \App\Models\Article::all(),
        //         'styles' => \App\Models\CompanyStyle::all(),
        //         'locations' => \App\Models\RegistrationLocation::all(),
        //         'objects' => \App\Models\CompanyObject::all(),
        //         'sic_codes' => \App\Models\SicCode::all(),
        //     ]);
        // });
    });
});
