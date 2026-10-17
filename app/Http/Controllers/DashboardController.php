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
    
    public function admin()
    {

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



        $totalDenda = Pengembalian::where('denda', '>', 0)->sum('denda');



        $peminjamanTerbaru = Peminjaman::with([
            'user',
            'buku',
        ])
            ->latest()
            ->take(5)
            ->get();



        $bukuPopuler = Buku::withCount('peminjaman')
            ->orderByDesc('peminjaman_count')
            ->take(5)
            ->get();



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


    public function user()
    {
        return view('user.dashboard');
    }
}