<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Laporan Perpustakaan</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            color: #111;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            margin-bottom: 5px;
        }

        .header p {
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 8px;
            font-size: 12px;
        }

        th {
            background: #eee;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
        }

        @media print {

            .no-print {
                display: none;
            }

        }

    </style>

</head>

<body>

    <div class="no-print" style="margin-bottom: 20px;">

        <button onclick="window.print()">
            🖨️ Cetak
        </button>

    </div>


    <div class="header">

        <h1>PERPUSTAKAAN DIGITAL</h1>

        <h2>MI AL FALAHIYYAH RAJEG</h2>

        <p>Laporan Peminjaman dan Pengembalian Buku</p>

    </div>


    <table>

        <thead>

            <tr>

                <th>No</th>

                <th>Anggota</th>

                <th>Buku</th>

                <th>Tanggal Pinjam</th>

                <th>Jatuh Tempo</th>

                <th>Status</th>

                <th>Denda</th>

            </tr>

        </thead>


        <tbody>

            @foreach ($peminjaman as $data)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $data->user->name }}
                    </td>

                    <td>
                        {{ $data->buku->judul_buku }}
                    </td>

                    <td>
                        {{ \Carbon\Carbon::parse($data->tanggal_pinjam)->format('d-m-Y') }}
                    </td>

                    <td>
                        {{ \Carbon\Carbon::parse($data->tanggal_jatuh_tempo)->format('d-m-Y') }}
                    </td>

                    <td>
                        {{ ucfirst($data->status) }}
                    </td>

                    <td>
                        Rp {{ number_format($data->pengembalian->denda ?? 0, 0, ',', '.') }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>


    <div class="footer">

        <p>
            Rajeg, {{ now()->format('d M Y') }}
        </p>

        <br><br><br>

        <p>
            <b>Administrator Perpustakaan</b>
        </p>

    </div>

</body>

</html>