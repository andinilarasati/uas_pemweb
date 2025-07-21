<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\TempatWisata;
use App\Livewire\Home;
use App\Livewire\About;
use App\Livewire\Gallery;
use App\Livewire\Contact;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ExportController;

// Routing ke halaman utama
Route::get('/', Home::class);

// Halaman lain
Route::get('/about', About::class);
Route::get('/gallery', Gallery::class);
Route::get('/contact', Contact::class);

// Komponen Livewire tempat wisata
Route::get('/tempat-wisata', TempatWisata::class);

// Proses booking
Route::post('/booking', [BookingController::class, 'storeBooking']);

// Export data
Route::get('/export/bookings/pdf', [ExportController::class, 'exportPdf'])->name('export.bookings.pdf');
Route::get('/export/bookings/excel', [ExportController::class, 'exportExcel'])->name('export.bookings.excel');
