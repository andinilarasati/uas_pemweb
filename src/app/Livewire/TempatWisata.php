<?php

namespace App\Livewire;

use Livewire\Component;

class TempatWisata extends Component
{
    public $wisata = [
        [
            'nama' => 'Pantai Kuta',
            'lokasi' => 'Bali',
            'gambar' => 'kuta.jpg'
        ],
        [
            'nama' => 'Candi Borobudur',
            'lokasi' => 'Magelang',
            'gambar' => 'borobudur.jpg'
        ]
    ];

    public function render()
    {
        return view('livewire.tempat-wisata')
    ->layout('layouts.main');

    }
}
