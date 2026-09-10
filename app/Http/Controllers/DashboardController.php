<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Dashboard Admin
     */
    public function admin()
    {
        /*
        |--------------------------------------------------------------------------
        | STATISTIK UTAMA
        |--------------------------------------------------------------------------
        */

        $totalBuku = Buku::count();

        $totalAnggota = User::where(
            'role',
            'user'
        )->count();

        $bukuDipinjam = Peminjaman::where(
            'status',
            'dipinjam'
        )->count();

        $totalPengembalian = Pengembalian::count();


        /*
        |--------------------------------------------------------------------------
        | BUKU TERLAMBAT
        |--------------------------------------------------------------------------
        */

        $bukuTerlambat = Peminjaman::where(
            'status',
            'dipinjam'
        )
            ->whereDate(
                'tanggal_jatuh_tempo',
                '<',
                now()
            )
            ->count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL DENDA
        |--------------------------------------------------------------------------
        */

        $totalDenda = Pengembalian::sum('denda');


        /*
        |--------------------------------------------------------------------------
        | PEMINJAMAN TERBARU
        |--------------------------------------------------------------------------
        */

        $peminjamanTerbaru = Peminjaman::with([
            'user',
            'buku',
        ])
            ->latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | BUKU TERPOPULER
        |--------------------------------------------------------------------------
        */

        $bukuPopuler = Buku::withCount('peminjaman')
            ->orderByDesc('peminjaman_count')
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | GRAFIK PEMINJAMAN
        |--------------------------------------------------------------------------
        */

        $grafikPeminjaman = Peminjaman::select(
            DB::raw('MONTH(tanggal_pinjam) as bulan'),
            DB::raw('COUNT(*) as total')
        )
            ->whereYear(
                'tanggal_pinjam',
                now()->year
            )
            ->groupBy(
                DB::raw('MONTH(tanggal_pinjam)')
            )
            ->orderBy('bulan')
            ->get();


        $bulan = [];
        $jumlahPeminjaman = [];

        foreach ($grafikPeminjaman as $data) {

            $bulan[] = date(
                'F',
                mktime(
                    0,
                    0,
                    0,
                    $data->bulan,
                    1
                )
            );

            $jumlahPeminjaman[] = $data->total;
        }

        $user = Auth::user();


        return view(
            'dashboard.admin',
            compact(
                'totalBuku',
                'totalAnggota',
                'bukuDipinjam',
                'totalPengembalian',
                'bukuTerlambat',
                'totalDenda',
                'peminjamanTerbaru',
                'bukuPopuler',
                'bulan',
                'jumlahPeminjaman',
                'user'
            )
        );
    }


    /**
     * Dashboard User
     */
    public function user()
    {
        return view('user.dashboard');
    }
}