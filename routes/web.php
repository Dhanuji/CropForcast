<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CropController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [CropController::class, 'index'])->name('dashboard');
    Route::post('/crops', [CropController::class, 'store'])->name('crop.store');
    Route::get('/crop/{id}/edit', 'App\Http\Controllers\CropController@edit')->name('crop.edit');
    Route::delete('/crop/{id}', 'App\Http\Controllers\CropController@destroy')->name('crop.destroy');
    Route::resource('crop', CropController::class); // Assuming you're using resourceful routing

// Define custom update route
    Route::put('crop/{crop}', [CropController::class, 'update'])->name('crop.update');
});
