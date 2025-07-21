<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BookingExport;

class ExportController extends Controller
{
    public function exportPdf()
    {
        $bookings = Booking::with('tiket.tempatWisata')->get();
        $pdf = Pdf::loadView('export.bookings', compact('bookings'));
        return $pdf->download('data-booking.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new BookingExport, 'data-booking.xlsx');
    }
}
