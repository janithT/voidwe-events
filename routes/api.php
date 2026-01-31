<?php

use App\Http\Controllers\Api\V1\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('throttle:60,1')->group(function () {
    
    // Health check endpoint
    Route::get('/up', function (Request $request) {
        return 'healthy';
    });

    // Routes for event ingestion
    Route::prefix('events')->middleware('api_key')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('events.index');
        Route::post('/', [EventController::class, 'store'])->name('events.store');
    });
});
