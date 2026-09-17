<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\User;
use App\Notifications\PeminjamanNotification;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    /**
     * Menampilkan daftar peminjaman aktif dan pengajuan
     */
    public function index()
    {
        $peminjamans = Peminjaman::with([
            'user',
            'buku'
        ])
            ->whereIn('status', ['menunggu', 'dipinjam'])
            ->latest()
            ->paginate(10);

        return view(
            'pengembalian.index',
            compact('peminjamans')
        );
    }


    /**
     * Menyetujui pengajuan peminjaman
     */
    public function setujui(Peminjaman $peminjaman)
    {
        if ($peminjaman->status !== 'menunggu') {
            return back()->with(
                'error',
                'Pengajuan ini sudah diproses sebelumnya.'
            );
        }

        if ($peminjaman->buku->stok <= 0) {
            return back()->with(
                'error',
                'Stok buku sudah habis. Pengajuan belum dapat disetujui.'
            );
        }

        DB::transaction(function () use ($peminjaman) {

            $peminjaman->buku->decrement('stok');

            $peminjaman->update([
                'status' => 'dipinjam',
            ]);

        });


        /*
        |--------------------------------------------------------------------------
        | NOTIFIKASI KE USER
        |--------------------------------------------------------------------------
        */

        $peminjaman->user->notify(new PeminjamanNotification(
            'Peminjaman Disetujui',
            'Pengajuan peminjaman buku "' . $peminjaman->buku->judul_buku . '" telah disetujui admin.',
            'success',
            route('user.peminjaman')
        ));


        return back()->with(
            'success',
            'Pengajuan peminjaman berhasil disetujui.'
        );
    }


    /**
     * Menolak pengajuan peminjaman
     */
    public function tolak(Peminjaman $peminjaman)
    {
        if ($peminjaman->status !== 'menunggu') {
            return back()->with(
                'error',
                'Pengajuan ini sudah diproses sebelumnya.'
            );
        }

        $peminjaman->update([
            'status' => 'ditolak',
        ]);


        /*
        |--------------------------------------------------------------------------
        | NOTIFIKASI KE USER
        |--------------------------------------------------------------------------
        */

        $peminjaman->user->notify(new PeminjamanNotification(
            'Peminjaman Ditolak',
            'Pengajuan peminjaman buku "' . $peminjaman->buku->judul_buku . '" ditolak oleh admin.',
            'danger',
            route('user.peminjaman')
        ));


        return back()->with(
            'success',
            'Pengajuan peminjaman berhasil ditolak.'
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

        if ($peminjaman->status !== 'dipinjam') {
            return back()->with(
                'error',
                'Buku ini belum disetujui atau belum berstatus dipinjam.'
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


        /*
        |--------------------------------------------------------------------------
        | NOTIFIKASI KE USER
        |--------------------------------------------------------------------------
        */

        $peminjaman->user->notify(new PeminjamanNotification(
            'Buku Dikembalikan',
            'Buku "' . $peminjaman->buku->judul_buku . '" telah berhasil diproses sebagai pengembalian.',
            'success',
            route('user.peminjaman')
        ));


        return back()->with(
            'success',
            'Buku berhasil dikembalikan.'
        );
    }
}