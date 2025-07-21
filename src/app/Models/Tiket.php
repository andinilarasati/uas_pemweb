<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $table = 'tiket';

    protected $fillable = [
        'tempat_wisata_id',
        'kode_tiket',
        'tanggal',
        'stok',
    ];

    public function tempatWisata()
    {
        return $this->belongsTo(TempatWisata::class, 'tempat_wisata_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'tiket_id');
    }
}
