<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use App\Notifications\PeminjamanNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengajuanPeminjamanController extends Controller
{
    /**
     * Menampilkan daftar pengajuan peminjaman.
     * Dilengkapi pencarian dan filter tanggal.
     */
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:100',
            'tanggal_dari' => 'nullable|date',
            'tanggal_sampai' => 'nullable|date|after_or_equal:tanggal_dari',
        ], [
            'search.max' => 'Kata pencarian maksimal 100 karakter.',
            'tanggal_dari.date' => 'Tanggal awal tidak valid.',
            'tanggal_sampai.date' => 'Tanggal akhir tidak valid.',
            'tanggal_sampai.after_or_equal' => 'Tanggal akhir tidak boleh sebelum tanggal awal.',
        ]);

        $query = Peminjaman::with([
            'user',
            'buku',
            'pengembalian',
        ])->where('status', 'menunggu');

        // Pencarian nama pengguna, judul buku, atau kode buku.
        if ($request->filled('search')) {
            $keyword = $request->search;

            $query->where(function ($q) use ($keyword) {
                $q->whereHas('user', function ($userQuery) use ($keyword) {
                    $userQuery->where('name', 'like', "%{$keyword}%");
                })
                ->orWhereHas('buku', function ($bukuQuery) use ($keyword) {
                    $bukuQuery->where('judul_buku', 'like', "%{$keyword}%")
                        ->orWhere('kode_buku', 'like', "%{$keyword}%");
                });
            });
        }

        // Filter tanggal awal.
        if ($request->filled('tanggal_dari')) {
            $query->whereDate(
                'tanggal_pinjam',
                '>=',
                $request->tanggal_dari
            );
        }

        // Filter tanggal akhir.
        if ($request->filled('tanggal_sampai')) {
            $query->whereDate(
                'tanggal_pinjam',
                '<=',
                $request->tanggal_sampai
            );
        }

        $peminjamans = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pengajuan.index', compact('peminjamans'));
    }

    /**
     * Menyetujui pengajuan peminjaman.
     */
    public function setujui(Peminjaman $peminjaman)
    {
        $hasil = DB::transaction(function () use ($peminjaman) {
            $data = Peminjaman::whereKey($peminjaman->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($data->status !== 'menunggu') {
                return 'sudah_diproses';
            }

            $buku = Buku::whereKey($data->buku_id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($buku->stok <= 0) {
                return 'stok_habis';
            }

            $waktuPersetujuan = now();

            // Batas pengambilan 2 hari kalender.
            $batasPengambilan = $waktuPersetujuan
                ->copy()
                ->addDays(2);

            // Stok berkurang satu kali saat disetujui.
            $buku->decrement('stok');

            // Buku belum dianggap diambil sampai dikonfirmasi admin.
            $data->update([
                'status' => 'menunggu_diambil',
                'batas_pengambilan' => $batasPengambilan,
            ]);

            return 'berhasil';
        });

        if ($hasil === 'sudah_diproses') {
            return back()->with(
                'error',
                'Pengajuan ini sudah diproses sebelumnya.'
            );
        }

        if ($hasil === 'stok_habis') {
            return back()->with(
                'error',
                'Stok buku sudah habis. Pengajuan belum dapat disetujui.'
            );
        }

        $dataTerbaru = Peminjaman::with([
            'user',
            'buku'
        ])->findOrFail($peminjaman->id);

        $dataTerbaru->user->notify(
            new PeminjamanNotification(
                'Peminjaman Disetujui',
                'Pengajuan buku "' .
                    $dataTerbaru->buku->judul_buku .
                    '" disetujui. Silakan ambil buku maksimal 2 hari kalender sejak persetujuan.',
                'success',
                route('user.peminjaman')
            )
        );

        return back()->with(
            'success',
            'Pengajuan disetujui. Batas pengambilan buku adalah 2 hari kalender.'
        );
    }

    /**
     * Menolak pengajuan peminjaman.
     */
    public function tolak(Peminjaman $peminjaman)
    {
        $berhasil = DB::transaction(function () use ($peminjaman) {
            $data = Peminjaman::whereKey($peminjaman->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($data->status !== 'menunggu') {
                return false;
            }

            $data->update([
                'status' => 'ditolak',
            ]);

            return true;
        });

        if (! $berhasil) {
            return back()->with(
                'error',
                'Pengajuan ini sudah diproses sebelumnya.'
            );
        }

        $dataTerbaru = Peminjaman::with([
            'user',
            'buku'
        ])->findOrFail($peminjaman->id);

        $dataTerbaru->user->notify(
            new PeminjamanNotification(
                'Peminjaman Ditolak',
                'Pengajuan peminjaman buku "' .
                    $dataTerbaru->buku->judul_buku .
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

    /**
     * Mengonfirmasi bahwa buku sudah diambil oleh pengguna.
     */
    public function konfirmasiPengambilan(Peminjaman $peminjaman)
    {
        $hasil = DB::transaction(function () use ($peminjaman) {
            $data = Peminjaman::whereKey($peminjaman->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($data->status !== 'menunggu_diambil') {
                return 'status_tidak_valid';
            }

            if (
                $data->batas_pengambilan &&
                now()->greaterThanOrEqualTo($data->batas_pengambilan)
            ) {
                return 'batas_lewat';
            }

            $data->update([
                'status' => 'dipinjam',
            ]);

            return 'berhasil';
        });

        if ($hasil === 'status_tidak_valid') {
            return back()->with(
                'error',
                'Pengajuan ini tidak sedang menunggu pengambilan.'
            );
        }

        if ($hasil === 'batas_lewat') {
            return back()->with(
                'error',
                'Batas pengambilan sudah lewat. Proses kedaluwarsa perlu dijalankan.'
            );
        }

        $dataTerbaru = Peminjaman::with([
            'user',
            'buku'
        ])->findOrFail($peminjaman->id);

        $dataTerbaru->user->notify(
            new PeminjamanNotification(
                'Buku Siap Dipinjam',
                'Pengambilan buku "' .
                    $dataTerbaru->buku->judul_buku .
                    '" telah dikonfirmasi admin.',
                'success',
                route('user.peminjaman')
            )
        );

        return back()->with(
            'success',
            'Pengambilan buku berhasil dikonfirmasi.'
        );
    }
}
