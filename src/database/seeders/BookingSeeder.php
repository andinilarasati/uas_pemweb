<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        Booking::insert([
            [
                'tiket_id' => 1,
                'nama_pemesan' => 'Andi Saputra',
                'jumlah' => 2,
                'total_harga' => 50000,
                'status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tiket_id' => 2,
                'nama_pemesan' => 'Siti Aminah',
                'jumlah' => 3,
                'total_harga' => 90000,
                'status' => 'Paid',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
