<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Exports\LaporanExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    /**
     * Membuat query laporan berdasarkan filter.
     */
    private function laporanQuery(Request $request)
    {
        $query = Peminjaman::with([
            'user',
            'buku',
            'pengembalian',
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
            $query->where('status', $request->status);
        }

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

        return $query;
    }

    public function index(Request $request)
    {
        $query = $this->laporanQuery($request);

        // Statistik mengikuti filter yang dipilih.
        $statistik = (clone $query)
            ->with('pengembalian')
            ->get(['id', 'status']);

        $totalPeminjaman = $statistik->count();

        $totalPengembalian = $statistik
            ->where('status', 'dikembalikan')
            ->count();

        $totalDipinjam = $statistik
            ->where('status', 'dipinjam')
            ->count();

        $totalDenda = $statistik->sum(function ($data) {
            return $data->pengembalian->denda ?? 0;
        });

        // Pagination 10 data per halaman.
        $peminjaman = $query
            ->latest('tanggal_pinjam')
            ->paginate(10)
            ->withQueryString();

        return view('laporan.index', compact(
            'peminjaman',
            'totalPeminjaman',
            'totalPengembalian',
            'totalDipinjam',
            'totalDenda'
        ));
    }

    public function print(Request $request)
    {
        $peminjaman = $this->laporanQuery($request)
            ->latest('tanggal_pinjam')
            ->get();

        return view('laporan.print', compact('peminjaman'));
    }

    public function export(Request $request)
    {
        $namaFile = 'laporan-perpustakaan-' . now()->format('Y-m-d-His') . '.xlsx';

        return Excel::download(
            new LaporanExport($request->only([
                'search',
                'status',
                'tanggal_mulai',
                'tanggal_akhir',
            ])),
            $namaFile
        );
    }
}