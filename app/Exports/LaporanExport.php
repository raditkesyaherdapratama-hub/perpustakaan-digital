<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaporanExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    protected array $filters;

    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    public function query(): Builder
    {
        $query = Peminjaman::query()->with([
            'user',
            'buku',
            'pengembalian',
        ]);

        if (!empty($this->filters['tanggal_mulai'])) {
            $query->whereDate(
                'tanggal_pinjam',
                '>=',
                $this->filters['tanggal_mulai']
            );
        }

        if (!empty($this->filters['tanggal_akhir'])) {
            $query->whereDate(
                'tanggal_pinjam',
                '<=',
                $this->filters['tanggal_akhir']
            );
        }

        if (!empty($this->filters['status'])) {
            $query->where('status', $this->filters['status']);
        }

        if (!empty($this->filters['search'])) {
            $search = $this->filters['search'];

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

        return $query->latest('tanggal_pinjam');
    }

    public function headings(): array
    {
        return [
            'No. Peminjaman',
            'Nama Peminjam',
            'Email',
            'Kode Buku',
            'Judul Buku',
            'Tanggal Pinjam',
            'Tanggal Jatuh Tempo',
            'Tanggal Kembali',
            'Keterlambatan (Hari)',
            'Denda (Rp)',
            'Status',
        ];
    }

    public function map($peminjaman): array
    {
        return [
            $peminjaman->id,
            $peminjaman->user->name ?? '-',
            $peminjaman->user->email ?? '-',
            $peminjaman->buku->kode_buku ?? '-',
            $peminjaman->buku->judul_buku ?? '-',
            $peminjaman->tanggal_pinjam
                ? \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d-m-Y')
                : '-',
            $peminjaman->tanggal_jatuh_tempo
                ? \Carbon\Carbon::parse($peminjaman->tanggal_jatuh_tempo)->format('d-m-Y')
                : '-',
            $peminjaman->pengembalian?->tanggal_kembali
                ? \Carbon\Carbon::parse($peminjaman->pengembalian->tanggal_kembali)->format('d-m-Y')
                : '-',
            $peminjaman->pengembalian->keterlambatan ?? 0,
            $peminjaman->pengembalian->denda ?? 0,
            ucfirst(str_replace('_', ' ', $peminjaman->status)),
        ];
    }
}