<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Notifications\PeminjamanNotification;
use Illuminate\Support\Facades\DB;

class PengajuanPeminjamanController extends Controller
{
    /**
     * Menampilkan daftar pengajuan peminjaman
     */
    public function index()
    {
        $peminjamans = Peminjaman::with([
            'user',
            'buku',
            'pengembalian'
        ])
            ->where('status', 'menunggu')
            ->latest()
            ->paginate(10);

        return view(
            'pengajuan.index',
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

            // Kurangi stok buku
            $peminjaman->buku->decrement('stok');

            // Ubah status menjadi dipinjam
            $peminjaman->update([
                'status' => 'dipinjam',
            ]);
        });

        // Kirim notifikasi ke user
        $peminjaman->user->notify(
            new PeminjamanNotification(
                'Peminjaman Disetujui',
                'Pengajuan peminjaman buku "' .
                    $peminjaman->buku->judul_buku .
                    '" telah disetujui admin.',
                'success',
                route('user.peminjaman')
            )
        );

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

        // Ubah status menjadi ditolak
        $peminjaman->update([
            'status' => 'ditolak',
        ]);

        // Kirim notifikasi ke user
        $peminjaman->user->notify(
            new PeminjamanNotification(
                'Peminjaman Ditolak',
                'Pengajuan peminjaman buku "' .
                    $peminjaman->buku->judul_buku .
                    '" ditolak oleh admin.',
                'danger',
                route('user.peminjaman')
            )
        );

        return back()->with(
            'success',
            'Pengajuan peminjaman berhasil ditolak.'
        );
    }
}