<?php

use App\Http\Controllers\CropController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CropApiController;


// Define routes in api.php without the web middleware
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // Define API routes here
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // Define API routes here
    
    // Endpoint to fetch dashboard data
    Route::get('/dashboard', [CropApiController::class, 'dashboardData'])->name('dashboard.api');
});
// Fetch all crops
Route::get('/crops', [CropApiController::class, 'index']);

// Store a new crop
Route::post('/crops', [CropApiController::class, 'store']);

// Edit a specific crop
Route::get('/crop/{id}/edit', [CropApiController::class, 'edit']);

// Update a specific crop
Route::put('/crop/{crop}', [CropApiController::class, 'update']);

// Delete a specific crop
Route::delete('/crop/{id}', [CropApiController::class, 'destroy']);


// Edit a specific crop
Route::get('/test', function(){
    return "Hello";
});
