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
     * Proses Pengajuan Peminjaman Buku
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
        | CEK SUDAH MENGAJUKAN / MEMINJAM BUKU INI
        |--------------------------------------------------------------------------
        */

        $sudahMeminjam = Peminjaman::where('user_id', $user->id)
            ->where('buku_id', $buku->id)
            ->whereIn('status', ['menunggu', 'dipinjam'])
            ->exists();

        if ($sudahMeminjam) {

            return back()->with(
                'error',
                'Kamu sudah mengajukan atau sedang meminjam buku ini.'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | MAKSIMAL 3 BUKU YANG SEDANG DIPINJAM
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
        | SIMPAN PENGAJUAN PEMINJAMAN
        |--------------------------------------------------------------------------
        */

        $peminjaman = DB::transaction(function () use (
            $buku,
            $user,
            $tanggalPinjam,
            $tanggalJatuhTempo
        ) {

            return Peminjaman::create([

                'user_id' => $user->id,

                'buku_id' => $buku->id,

                'tanggal_pinjam' => $tanggalPinjam->toDateString(),

                'tanggal_jatuh_tempo' => $tanggalJatuhTempo->toDateString(),

                'status' => 'menunggu',

            ]);

        });


        /*
        |--------------------------------------------------------------------------
        | NOTIFIKASI UNTUK USER
        |--------------------------------------------------------------------------
        */

        $user->notify(new PeminjamanNotification(
            'Pengajuan Peminjaman Dikirim',
            'Pengajuan peminjaman buku "' . $buku->judul_buku . '" sedang menunggu persetujuan admin.',
            'info',
            route('user.peminjaman')
        ));


        /*
        |--------------------------------------------------------------------------
        | NOTIFIKASI UNTUK ADMIN
        |--------------------------------------------------------------------------
        */

        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {

            $admin->notify(new PeminjamanNotification(
                'Pengajuan Peminjaman Baru',
                $user->name . ' mengajukan peminjaman buku "' . $buku->judul_buku . '". Silakan periksa pengajuan tersebut.',
                'warning',
                route('pengajuan.index')
            ));

        }


        /*
        |--------------------------------------------------------------------------
        | PESAN BERHASIL
        |--------------------------------------------------------------------------
        */

        return back()->with(
            'success',
            'Pengajuan peminjaman berhasil dikirim. Silakan tunggu persetujuan admin.'
        );
    }


    /**
     * Daftar Peminjaman Aktif Untuk Admin
     */
    public function index()
    {
        $peminjamans = Peminjaman::with([
            'user',
            'buku',
            'pengembalian'
        ])
            ->where('status', 'dipinjam')
            ->latest()
            ->paginate(10);

        return view(
            'peminjaman.index',
            compact('peminjamans')
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