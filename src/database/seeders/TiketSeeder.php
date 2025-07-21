<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tiket;

class TiketSeeder extends Seeder
{
    public function run(): void
    {
        Tiket::insert([
            [
                'tempat_wisata_id' => 1,
                'kode_tiket' => 'KT001',
                'tanggal' => now(),
                'stok' => 100,
                'harga' => 25000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tempat_wisata_id' => 2,
                'kode_tiket' => 'CB001',
                'tanggal' => now(),
                'stok' => 150,
                'harga' => 30000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
