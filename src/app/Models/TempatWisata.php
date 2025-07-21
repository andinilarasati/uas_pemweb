<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatWisata extends Model
{
    use HasFactory;

    protected $table = 'tempat_wisata'; // nama tabel di database

    protected $fillable = [
        'nama',
        'lokasi',
        'deskripsi',
        'harga_tiket',
    ];

    // Jika kamu ingin relasi ke model Tiket:
    public function tiket()
    {
        return $this->hasMany(Tiket::class, 'tempat_wisata_id');
    }
}
