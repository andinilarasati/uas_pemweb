<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemesan',
        'jumlah',
        'total_harga',
        'status',
        'tiket_id',
    ];

    public function tiket()
    {
        return $this->belongsTo(Tiket::class);
    }
}
