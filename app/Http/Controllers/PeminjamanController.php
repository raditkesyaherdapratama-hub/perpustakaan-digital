<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use App\Notifications\PeminjamanNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /**
     * Mengajukan peminjaman buku.
     */
    public function pinjam(Request $request, Buku $buku)
    {
        $user = auth()->user();

        $request->validate([
            'lama_pinjam' => 'required|integer|min:1|max:30',
        ], [
            'lama_pinjam.required' => 'Silakan masukkan lama peminjaman.',
            'lama_pinjam.integer' => 'Lama peminjaman harus berupa angka.',
            'lama_pinjam.min' => 'Minimal peminjaman adalah 1 hari.',
            'lama_pinjam.max' => 'Maksimal peminjaman adalah 30 hari.',
        ]);

        $lamaPinjam = (int) $request->lama_pinjam;

        $hasil = DB::transaction(function () use ($buku, $user, $lamaPinjam) {
            $bukuTerkunci = Buku::whereKey($buku->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($bukuTerkunci->stok <= 0) {
                return [
                    'success' => false,
                    'message' => 'Maaf, stok buku sedang habis.',
                ];
            }

            $sudahMeminjam = Peminjaman::where('user_id', $user->id)
                ->where('buku_id', $bukuTerkunci->id)
                ->whereIn('status', [
                    'menunggu',
                    'menunggu_diambil',
                    'dipinjam',
                ])
                ->exists();

            if ($sudahMeminjam) {
                return [
                    'success' => false,
                    'message' => 'Kamu sudah mengajukan atau sedang meminjam buku ini.',
                ];
            }

            $jumlahDipinjam = Peminjaman::where('user_id', $user->id)
                ->where('status', 'dipinjam')
                ->count();

            if ($jumlahDipinjam >= 3) {
                return [
                    'success' => false,
                    'message' => 'Maksimal hanya boleh meminjam 3 buku.',
                ];
            }

            $terlambat = Peminjaman::where('user_id', $user->id)
                ->where('status', 'dipinjam')
                ->whereDate('tanggal_jatuh_tempo', '<', now()->toDateString())
                ->exists();

            if ($terlambat) {
                return [
                    'success' => false,
                    'message' => 'Masih ada buku yang terlambat dikembalikan. Silakan kembalikan terlebih dahulu.',
                ];
            }

            $tanggalPinjam = now();

            Peminjaman::create([
                'user_id' => $user->id,
                'buku_id' => $bukuTerkunci->id,
                'tanggal_pinjam' => $tanggalPinjam->toDateString(),
                'tanggal_jatuh_tempo' => $tanggalPinjam
                    ->copy()
                    ->addDays($lamaPinjam)
                    ->toDateString(),
                'status' => 'menunggu',
            ]);

            return [
                'success' => true,
                'judul_buku' => $bukuTerkunci->judul_buku,
            ];
        });

        if (! $hasil['success']) {
            return back()->with('error', $hasil['message']);
        }

        $user->notify(new PeminjamanNotification(
            'Pengajuan Peminjaman Dikirim',
            'Pengajuan peminjaman buku "' . $hasil['judul_buku'] . '" sedang menunggu persetujuan admin.',
            'info',
            route('user.peminjaman')
        ));

        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            $admin->notify(new PeminjamanNotification(
                'Pengajuan Peminjaman Baru',
                $user->name . ' mengajukan peminjaman buku "' . $hasil['judul_buku'] . '". Silakan periksa pengajuan tersebut.',
                'warning',
                route('pengajuan.index')
            ));
        }

        return back()->with(
            'success',
            'Pengajuan peminjaman berhasil dikirim. Silakan tunggu persetujuan admin.'
        );
    }

    /**
     * Daftar peminjaman aktif dan buku yang menunggu diambil.
     * Halaman ini digunakan oleh admin.
     */
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:100',
            'status' => 'nullable|in:menunggu_diambil,dipinjam',
            'tanggal_dari' => 'nullable|date',
            'tanggal_sampai' => 'nullable|date|after_or_equal:tanggal_dari',
        ]);

        $query = Peminjaman::with([
            'user',
            'buku',
            'pengembalian',
        ])->whereIn('status', [
            'menunggu_diambil',
            'dipinjam',
        ]);

        // Filter pencarian peminjam dan buku.
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                })->orWhereHas('buku', function ($bukuQuery) use ($search) {
                    $bukuQuery->where('judul_buku', 'like', "%{$search}%")
                        ->orWhere('kode_buku', 'like', "%{$search}%");
                });
            });
        }

        // Filter berdasarkan status.
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter tanggal mulai.
        if ($request->filled('tanggal_dari')) {
            $query->whereDate('tanggal_pinjam', '>=', $request->tanggal_dari);
        }

        // Filter tanggal akhir.
        if ($request->filled('tanggal_sampai')) {
            $query->whereDate('tanggal_pinjam', '<=', $request->tanggal_sampai);
        }

        $peminjamans = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('peminjaman.index', compact('peminjamans'));
    }

    /**
     * Riwayat peminjaman user.
     */
    public function riwayat()
    {
        $peminjamans = Peminjaman::with([
            'buku.kategori',
            'pengembalian',
        ])
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(8)
            ->withQueryString();

        return view('user.peminjaman', compact('peminjamans'));
    }

    /**
     * Membatalkan pengajuan oleh user.
     * Hanya bisa dilakukan selama status masih menunggu.
     */
    public function batalkan(Peminjaman $peminjaman)
    {
        if ((int) $peminjaman->user_id !== (int) auth()->id()) {
            abort(403, 'Kamu tidak memiliki akses untuk membatalkan pengajuan ini.');
        }

        $berhasil = DB::transaction(function () use ($peminjaman) {
            $data = Peminjaman::whereKey($peminjaman->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($data->status !== 'menunggu') {
                return false;
            }

            $data->update([
                'status' => 'dibatalkan',
            ]);

            return true;
        });

        if (! $berhasil) {
            return back()->with(
                'error',
                'Pengajuan hanya bisa dibatalkan selama masih menunggu persetujuan admin.'
            );
        }

        return back()->with(
            'success',
            'Pengajuan peminjaman berhasil dibatalkan.'
        );
    }
}
