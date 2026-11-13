<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Buku;
use App\Notifications\PeminjamanNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    /**
     * Menampilkan daftar peminjaman, pengambilan,
     * pengembalian, dan denda.
     */
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'status' => 'nullable|in:menunggu,menunggu_diambil,dipinjam,dikembalikan,kedaluwarsa',
            'tanggal_dari' => 'nullable|date',
            'tanggal_sampai' => 'nullable|date|after_or_equal:tanggal_dari',
        ]);

        $query = Peminjaman::with([
            'user',
            'buku',
            'pengembalian',
        ])->whereIn('status', [
            'menunggu',
            'menunggu_diambil',
            'dipinjam',
            'dikembalikan',
            'kedaluwarsa',
        ]);

        // FILTER PENCARIAN
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                })
                ->orWhereHas('buku', function ($bukuQuery) use ($search) {
                    $bukuQuery->where('judul_buku', 'like', "%{$search}%")
                        ->orWhere('kode_buku', 'like', "%{$search}%");
                });
            });
        }

        // FILTER STATUS
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // FILTER TANGGAL MULAI
        if ($request->filled('tanggal_dari')) {
            $query->whereDate('tanggal_pinjam', '>=', $request->tanggal_dari);
        }

        // FILTER TANGGAL SAMPAI
        if ($request->filled('tanggal_sampai')) {
            $query->whereDate('tanggal_pinjam', '<=', $request->tanggal_sampai);
        }

        $peminjamans = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pengembalian.index', compact('peminjamans'));
    }

    /**
     * Method lama dipertahankan agar route yang ada
     * tidak terganggu.
     */
    public function setujui(Peminjaman $peminjaman)
    {
        return back()->with(
            'error',
            'Gunakan menu Pengajuan Peminjaman untuk menyetujui pengajuan.'
        );
    }

    /**
     * Method lama dipertahankan agar route yang ada
     * tidak terganggu.
     */
    public function tolak(Peminjaman $peminjaman)
    {
        return back()->with(
            'error',
            'Gunakan menu Pengajuan Peminjaman untuk menolak pengajuan.'
        );
    }

    /**
     * Memproses pengembalian buku dan menghitung denda.
     */
    public function kembalikan(Peminjaman $peminjaman)
    {
        $hasil = DB::transaction(function () use ($peminjaman) {
            $data = Peminjaman::whereKey($peminjaman->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($data->status === 'dikembalikan') {
                return 'sudah_dikembalikan';
            }

            if ($data->status !== 'dipinjam') {
                return 'status_tidak_valid';
            }

            $tanggalKembali = now();

            $tanggalJatuhTempo = Carbon::parse(
                $data->tanggal_jatuh_tempo
            )->startOfDay();

            $tanggalKembaliHari = $tanggalKembali->copy()->startOfDay();

            $keterlambatan = 0;

            if ($tanggalKembaliHari->greaterThan($tanggalJatuhTempo)) {
                $keterlambatan = (int) $tanggalJatuhTempo
                    ->diffInDays($tanggalKembaliHari);
            }

            $denda = $keterlambatan * 1000;

            Pengembalian::create([
                'peminjaman_id' => $data->id,
                'tanggal_kembali' => $tanggalKembali->toDateString(),
                'keterlambatan' => $keterlambatan,
                'denda' => $denda,
            ]);

            $data->update([
                'status' => 'dikembalikan',
            ]);

            Buku::whereKey($data->buku_id)->increment('stok');

            return 'berhasil';
        });

        if ($hasil === 'sudah_dikembalikan') {
            return back()->with(
                'error',
                'Buku ini sudah dikembalikan.'
            );
        }

        if ($hasil === 'status_tidak_valid') {
            return back()->with(
                'error',
                'Buku belum diambil atau status peminjaman tidak valid.'
            );
        }

        $peminjamanTerbaru = Peminjaman::with([
            'user',
            'buku',
        ])->findOrFail($peminjaman->id);

        $peminjamanTerbaru->user->notify(
            new PeminjamanNotification(
                'Buku Dikembalikan',
                'Buku "' .
                    $peminjamanTerbaru->buku->judul_buku .
                    '" telah berhasil diproses sebagai pengembalian.',
                'success',
                route('user.peminjaman')
            )
        );

        return back()->with(
            'success',
            'Buku berhasil dikembalikan.'
        );
    }

    /**
     * Melunasi denda pengembalian.
     */
    public function lunasiDenda(Pengembalian $pengembalian)
    {
        $pengembalian->update([
            'denda' => 0,
        ]);

        return back()->with(
            'success',
            'Denda berhasil diselesaikan dan dilunasi.'
        );
    }
}
