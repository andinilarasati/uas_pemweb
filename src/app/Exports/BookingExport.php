<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookingExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Booking::with('tiket.tempatWisata')->get()->map(function ($booking) {
            return [
                'ID' => $booking->id,
                'Nama Pemesan' => $booking->nama_pemesan,
                'Jumlah Tiket' => $booking->jumlah,
                'Total Harga' => $booking->total_harga,
                'Status' => $booking->status,
                'Nama Tempat Wisata' => $booking->tiket->tempatWisata->nama ?? '-',
                'Nama Tiket' => $booking->tiket->nama ?? '-',
                'Tanggal Pesan' => $booking->created_at,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Pemesan',
            'Jumlah Tiket',
            'Total Harga',
            'Status',
            'Nama Tempat Wisata',
            'Nama Tiket',
            'Tanggal Pesan',
        ];
    }
}
