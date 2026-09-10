<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Menampilkan laporan perpustakaan
     */
    public function index(Request $request)
    {
        $query = Peminjaman::with([
            'user',
            'buku',
            'pengembalian'
        ]);

        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL MULAI
        |--------------------------------------------------------------------------
        */

        if ($request->filled('tanggal_mulai')) {

            $query->whereDate(
                'tanggal_pinjam',
                '>=',
                $request->tanggal_mulai
            );

        }


        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL AKHIR
        |--------------------------------------------------------------------------
        */

        if ($request->filled('tanggal_akhir')) {

            $query->whereDate(
                'tanggal_pinjam',
                '<=',
                $request->tanggal_akhir
            );

        }


        /*
        |--------------------------------------------------------------------------
        | FILTER STATUS
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            $query->where(
                'status',
                $request->status
            );

        }


        $peminjaman = $query
            ->latest('tanggal_pinjam')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | STATISTIK LAPORAN
        |--------------------------------------------------------------------------
        */

        $totalPeminjaman = $peminjaman->count();

        $totalPengembalian = $peminjaman
            ->where('status', 'dikembalikan')
            ->count();

        $totalDipinjam = $peminjaman
            ->where('status', 'dipinjam')
            ->count();

        $totalDenda = $peminjaman
            ->sum(function ($data) {

                return $data->pengembalian->denda ?? 0;

            });


        return view(
            'laporan.index',
            compact(
                'peminjaman',
                'totalPeminjaman',
                'totalPengembalian',
                'totalDipinjam',
                'totalDenda'
            )
        );
    }


    /**
     * Cetak laporan
     */
    public function print(Request $request)
    {
        $query = Peminjaman::with([
            'user',
            'buku',
            'pengembalian'
        ]);


        if ($request->filled('tanggal_mulai')) {

            $query->whereDate(
                'tanggal_pinjam',
                '>=',
                $request->tanggal_mulai
            );

        }


        if ($request->filled('tanggal_akhir')) {

            $query->whereDate(
                'tanggal_pinjam',
                '<=',
                $request->tanggal_akhir
            );

        }


        if ($request->filled('status')) {

            $query->where(
                'status',
                $request->status
            );

        }


        $peminjaman = $query
            ->latest('tanggal_pinjam')
            ->get();


        return view(
            'laporan.print',
            compact('peminjaman')
        );
    }
}