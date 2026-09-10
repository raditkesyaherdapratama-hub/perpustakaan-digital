<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    /**
     * Menampilkan daftar peminjaman aktif
     */
    public function index()
    {
        $peminjamans = Peminjaman::with([
            'user',
            'buku'
        ])
            ->where('status', 'dipinjam')
            ->latest()
            ->paginate(10);

        return view(
            'pengembalian.index',
            compact('peminjamans')
        );
    }


    /**
     * Proses pengembalian buku
     */
    public function kembalikan(Peminjaman $peminjaman)
    {
        if ($peminjaman->status === 'dikembalikan') {
            return back()->with(
                'error',
                'Buku ini sudah dikembalikan.'
            );
        }


        $tanggalKembali = now();

        $tanggalJatuhTempo =
            \Carbon\Carbon::parse(
                $peminjaman->tanggal_jatuh_tempo
            );


        $keterlambatan = 0;

        if ($tanggalKembali->greaterThan($tanggalJatuhTempo)) {

            $keterlambatan =
                $tanggalJatuhTempo
                    ->diffInDays($tanggalKembali);

        }


        /*
        |--------------------------------------------------------------------------
        | DENDA
        |--------------------------------------------------------------------------
        | Rp1.000 per hari keterlambatan
        |--------------------------------------------------------------------------
        */

        $denda = $keterlambatan * 1000;


        DB::transaction(function () use (
            $peminjaman,
            $tanggalKembali,
            $keterlambatan,
            $denda
        ) {

            Pengembalian::create([
                'peminjaman_id' => $peminjaman->id,
                'tanggal_kembali' => $tanggalKembali
                    ->toDateString(),
                'keterlambatan' => $keterlambatan,
                'denda' => $denda,
            ]);


            $peminjaman->update([
                'status' => 'dikembalikan',
            ]);


            $peminjaman->buku->increment('stok');

        });


        return back()->with(
            'success',
            'Buku berhasil dikembalikan.'
        );
    }
}