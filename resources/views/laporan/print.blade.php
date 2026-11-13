<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan Perpustakaan - MI Al Falahiyyah Rajeg</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            color: #111827;
            margin: 30px;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0 0 6px;
            font-size: 22px;
        }

        .header h2 {
            margin: 0 0 8px;
            font-size: 17px;
        }

        .header p {
            margin: 0;
            font-size: 13px;
        }

        .filter-info {
            margin-bottom: 15px;
            font-size: 12px;
            color: #374151;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #374151;
            padding: 8px;
            font-size: 11px;
            text-align: left;
        }

        th {
            background: #e5e7eb;
            text-align: center;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .footer {
            margin-top: 35px;
            text-align: right;
            font-size: 12px;
        }

        .summary {
            margin-top: 18px;
            font-size: 12px;
            line-height: 1.8;
        }

        .no-print {
            margin-bottom: 20px;
        }

        .no-print button {
            padding: 10px 18px;
            background: #047857;
            color: white;
            border: none;
            border-radius: 7px;
            cursor: pointer;
        }

        @media print {
            body {
                margin: 10mm;
            }

            .no-print {
                display: none;
            }

            tr {
                page-break-inside: avoid;
            }
        }

        @page {
            size: landscape;
            margin: 12mm;
        }
    </style>
</head>

<body>

    <div class="no-print">
        <button onclick="window.print()">Cetak / Simpan PDF</button>
    </div>

    <div class="header">
        <h1>PERPUSTAKAAN DIGITAL</h1>
        <h2>MI AL FALAHIYYAH RAJEG</h2>
        <p>Laporan Peminjaman dan Pengembalian Buku</p>
    </div>

    <div class="filter-info">
        <strong>Periode:</strong>
        {{ request('tanggal_mulai') ? \Carbon\Carbon::parse(request('tanggal_mulai'))->format('d-m-Y') : 'Semua tanggal' }}
        -
        {{ request('tanggal_akhir') ? \Carbon\Carbon::parse(request('tanggal_akhir'))->format('d-m-Y') : 'Semua tanggal' }}

        <br>

        <strong>Status:</strong>
        {{ request('status') ? ucfirst(str_replace('_', ' ', request('status'))) : 'Semua status' }}

        <br>

        <strong>Pencarian:</strong>
        {{ request('search') ?: 'Tidak ada' }}
    </div>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Peminjam</th>
                <th>Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Jatuh Tempo</th>
                <th>Tanggal Kembali</th>
                <th>Keterlambatan</th>
                <th>Denda</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($peminjaman as $data)
                <tr>
                    <td class="center">{{ $loop->iteration }}</td>

                    <td>
                        {{ $data->user->name ?? '-' }}
                        <br>
                        {{ $data->user->email ?? '-' }}
                    </td>

                    <td>
                        {{ $data->buku->judul_buku ?? '-' }}
                        <br>
                        Kode: {{ $data->buku->kode_buku ?? '-' }}
                    </td>

                    <td class="center">
                        {{ $data->tanggal_pinjam
                            ? \Carbon\Carbon::parse($data->tanggal_pinjam)->format('d-m-Y')
                            : '-' }}
                    </td>

                    <td class="center">
                        {{ $data->tanggal_jatuh_tempo
                            ? \Carbon\Carbon::parse($data->tanggal_jatuh_tempo)->format('d-m-Y')
                            : '-' }}
                    </td>

                    <td class="center">
                        {{ $data->pengembalian?->tanggal_kembali
                            ? \Carbon\Carbon::parse($data->pengembalian->tanggal_kembali)->format('d-m-Y')
                            : '-' }}
                    </td>

                    <td class="center">
                        {{ $data->pengembalian->keterlambatan ?? 0 }} hari
                    </td>

                    <td class="right">
                        Rp {{ number_format($data->pengembalian->denda ?? 0, 0, ',', '.') }}
                    </td>

                    <td class="center">
                        {{ ucfirst(str_replace('_', ' ', $data->status)) }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="center">
                        Tidak ada data laporan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="summary">
        <strong>Total Transaksi:</strong> {{ $peminjaman->count() }}<br>

        <strong>Total Denda:</strong>
        Rp {{ number_format($peminjaman->sum(fn ($item) => $item->pengembalian->denda ?? 0), 0, ',', '.') }}
    </div>

    <div class="footer">
        <p>Rajeg, {{ now()->translatedFormat('d F Y') }}</p>

        <br><br><br>

        <p><strong>Administrator Perpustakaan</strong></p>
    </div>

</body>
</html>