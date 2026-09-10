<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;

class Pengembalian extends Model
{
    protected $table = 'pengembalian';

    protected $fillable = [
        'peminjaman_id',
        'tanggal_kembali',
        'keterlambatan',
        'denda',
    ];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }
}