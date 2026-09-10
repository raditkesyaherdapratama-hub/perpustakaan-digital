<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /**
     * Proses Peminjaman Buku
     */
    public function pinjam(Request $request, Buku $buku)
    {
        $user = auth()->user();

        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'lama_pinjam' => 'required|integer|min:1|max:30',
        ], [
            'lama_pinjam.required' => 'Silakan masukkan lama peminjaman.',
            'lama_pinjam.min' => 'Minimal peminjaman adalah 1 hari.',
            'lama_pinjam.max' => 'Maksimal peminjaman adalah 30 hari.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | CEK STOK
        |--------------------------------------------------------------------------
        */

        if ($buku->stok <= 0) {

            return back()->with(
                'error',
                'Maaf, stok buku sedang habis.'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | CEK SUDAH MEMINJAM BUKU INI
        |--------------------------------------------------------------------------
        */

        $sudahMeminjam = Peminjaman::where('user_id', $user->id)
            ->where('buku_id', $buku->id)
            ->where('status', 'dipinjam')
            ->exists();

        if ($sudahMeminjam) {

            return back()->with(
                'error',
                'Kamu masih meminjam buku ini.'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | MAKSIMAL 3 BUKU
        |--------------------------------------------------------------------------
        */

        $jumlahDipinjam = Peminjaman::where('user_id', $user->id)
            ->where('status', 'dipinjam')
            ->count();

        if ($jumlahDipinjam >= 3) {

            return back()->with(
                'error',
                'Maksimal hanya boleh meminjam 3 buku.'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | CEK MASIH ADA BUKU TERLAMBAT
        |--------------------------------------------------------------------------
        */

        $terlambat = Peminjaman::where('user_id', $user->id)
            ->where('status', 'dipinjam')
            ->whereDate('tanggal_jatuh_tempo', '<', now())
            ->exists();

        if ($terlambat) {

            return back()->with(
                'error',
                'Masih ada buku yang terlambat dikembalikan. Silakan kembalikan terlebih dahulu.'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | HITUNG TANGGAL
        |--------------------------------------------------------------------------
        */

        $lamaPinjam = (int) $request->lama_pinjam;

        $tanggalPinjam = now();

        $tanggalJatuhTempo = $tanggalPinjam
            ->copy()
            ->addDays($lamaPinjam);


        /*
        |--------------------------------------------------------------------------
        | SIMPAN PEMINJAMAN
        |--------------------------------------------------------------------------
        */

        DB::transaction(function () use (
            $buku,
            $user,
            $tanggalPinjam,
            $tanggalJatuhTempo
        ) {

            $buku->decrement('stok');

            Peminjaman::create([

                'user_id' => $user->id,

                'buku_id' => $buku->id,

                'tanggal_pinjam' => $tanggalPinjam->toDateString(),

                'tanggal_jatuh_tempo' => $tanggalJatuhTempo->toDateString(),

                'status' => 'dipinjam',

            ]);

        });


        return back()->with(
            'success',
            'Buku berhasil dipinjam selama '
            . $lamaPinjam .
            ' hari. Batas pengembalian: '
            . $tanggalJatuhTempo->format('d M Y')
        );
    }


    /**
     * Riwayat Peminjaman User
     */
        public function riwayat()
    {
        $peminjamans = Peminjaman::with([
            'buku.kategori',
            'pengembalian'
        ])
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(8)
            ->withQueryString();

        return view(
            'user.peminjaman',
            compact('peminjamans')
        );
    }
}