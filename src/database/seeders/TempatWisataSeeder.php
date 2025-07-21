<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TempatWisata;

class TempatWisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TempatWisata::insert([
            [
                'nama' => 'Pantai Kuta',
                'lokasi' => 'Bali',
                'deskripsi' => 'Pantai terkenal di Bali dengan pasir putih.',
                'harga_tiket' => 25000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Candi Borobudur',
                'lokasi' => 'Magelang',
                'deskripsi' => 'Candi Budha terbesar di dunia.',
                'harga_tiket' => 30000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
