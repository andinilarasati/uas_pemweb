<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

// bookings
Route::prefix('bookings')->middleware('apikey')->group(function () {
    Route::get('/', [BookingController::class, 'index']);     // GET /api/bookings
    Route::post('/decrypt', [BookingController::class, 'decryptResponse']);
    Route::get('{id}', [BookingController::class, 'show']);   // GET /api/bookings/{id}
    Route::post('/', [BookingController::class, 'store']);    // POST /api/bookings
    Route::put('{id}', [BookingController::class, 'update']); // PUT /api/bookings/{id}
    Route::delete('{id}', [BookingController::class, 'destroy']); // DELETE /api/bookings/{id}
});
