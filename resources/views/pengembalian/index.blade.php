
@extends('layouts.app')

@section('content')

{{-- FONT INTER --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="min-h-screen bg-slate-50 px-4 py-6 font-['Inter',sans-serif] sm:px-6 lg:px-8">
    <div class="mx-auto w-full max-w-7xl">

        {{-- HEADER --}}
        <div class="mb-7 overflow-hidden rounded-2xl bg-gradient-to-r from-emerald-900 via-emerald-800 to-emerald-700 shadow-lg">
            <div class="flex flex-col gap-6 px-6 py-7 sm:px-8 md:flex-row md:items-center md:justify-between">
                <div>
                    <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3 py-1.5 text-[10px] font-semibold uppercase tracking-wider text-emerald-100">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-300"></span>
                        Manajemen Pengembalian
                    </div>

                    <h1 class="text-2xl font-extrabold tracking-tight text-white sm:text-3xl">
                        Pengembalian Buku
                    </h1>

                    <p class="mt-2 max-w-xl text-sm leading-6 text-emerald-100">
                        Kelola buku yang sedang dipinjam, proses pengembalian,
                        dan penyelesaian denda keterlambatan.
                    </p>
                </div>

                <div class="flex w-fit items-center gap-3 rounded-xl border border-white/15 bg-white/10 px-4 py-3 backdrop-blur-md">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-emerald-500/20 text-emerald-200">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>

                    <div>
                        <p class="text-[10px] font-medium uppercase tracking-wider text-emerald-200">
                            Status Sistem
                        </p>
                        <div class="mt-0.5 flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-300"></span>
                            <p class="text-xs font-bold text-white">Sistem Aktif</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ALERT SUCCESS --}}
        @if (session('success'))
            <div class="mb-5 flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3.5">
                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-emerald-500 text-sm font-bold text-white">
                    ✓
                </div>
                <div>
                    <p class="text-xs font-bold text-emerald-900">Proses Berhasil</p>
                    <p class="mt-0.5 text-xs text-emerald-700">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        {{-- ALERT ERROR --}}
        @if (session('error'))
            <div class="mb-5 flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-3.5">
                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-red-500 text-sm font-bold text-white">
                    ✕
                </div>
                <div>
                    <p class="text-xs font-bold text-red-900">Terjadi Kesalahan</p>
                    <p class="mt-0.5 text-xs text-red-700">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        {{-- FILTER --}}
        <form action="{{ url()->current() }}" method="GET"
            class="mb-6 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">

            <div class="mb-6 flex items-center gap-3">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4h18M6 8h12m-9 4h6m-4 4h2" />
                    </svg>
                </div>

                <div>
                    <h2 class="text-sm font-bold text-slate-900">Filter Data Pengembalian</h2>
                    <p class="mt-1 text-xs text-slate-500">
                        Cari dan saring data berdasarkan kebutuhan.
                    </p>
                </div>
            </div>

            {{-- FILTER INPUT: 2 KOLOM SEIMBANG --}}
            <div class="grid grid-cols-1 gap-x-5 gap-y-5 md:grid-cols-2">

                {{-- PENCARIAN --}}
                <div>
                    <label for="search" class="mb-2 block text-xs font-semibold text-slate-600">
                        Pencarian
                    </label>

                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m21 21-4.35-4.35M19 10.5a8.5 8.5 0 11-17 0 8.5 8.5 0 0117 0z" />
                        </svg>

                        <input
                            type="text"
                            id="search"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Nama peminjam, email, judul, atau kode buku..."
                            class="w-full rounded-xl border border-slate-200 py-3 pl-10 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100"
                        >
                    </div>
                </div>

                {{-- STATUS --}}
                <div>
                    <label for="status" class="mb-2 block text-xs font-semibold text-slate-600">
                        Status Peminjaman
                    </label>

                    <select
                        id="status"
                        name="status"
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100"
                    >
                        <option value="">Semua Status</option>
                        <option value="menunggu" {{ request('status') === 'menunggu' ? 'selected' : '' }}>
                            Menunggu
                        </option>
                        <option value="menunggu_diambil" {{ request('status') === 'menunggu_diambil' ? 'selected' : '' }}>
                            Menunggu Diambil
                        </option>
                        <option value="dipinjam" {{ request('status') === 'dipinjam' ? 'selected' : '' }}>
                            Dipinjam
                        </option>
                        <option value="dikembalikan" {{ request('status') === 'dikembalikan' ? 'selected' : '' }}>
                            Dikembalikan
                        </option>
                        <option value="kedaluwarsa" {{ request('status') === 'kedaluwarsa' ? 'selected' : '' }}>
                            Kedaluwarsa
                        </option>
                    </select>
                </div>

                {{-- TANGGAL DARI --}}
                <div>
                    <label for="tanggal_dari" class="mb-2 block text-xs font-semibold text-slate-600">
                        Tanggal Pinjam Dari
                    </label>

                    <input
                        type="date"
                        id="tanggal_dari"
                        name="tanggal_dari"
                        value="{{ request('tanggal_dari') }}"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100"
                    >
                </div>

                {{-- TANGGAL SAMPAI --}}
                <div>
                    <label for="tanggal_sampai" class="mb-2 block text-xs font-semibold text-slate-600">
                        Tanggal Pinjam Sampai
                    </label>

                    <input
                        type="date"
                        id="tanggal_sampai"
                        name="tanggal_sampai"
                        value="{{ request('tanggal_sampai') }}"
                        min="{{ request('tanggal_dari') }}"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100"
                    >
                </div>
            </div>

            {{-- FILTER BUTTON --}}
            <div class="mt-6 flex flex-col-reverse justify-end gap-3 border-t border-slate-100 pt-5 sm:flex-row">
                <a
                    href="{{ url()->current() }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 px-5 py-3 text-xs font-bold text-slate-600 transition hover:bg-slate-50"
                >
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9M4.582 9H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2M15 20h5" />
                    </svg>
                    Reset
                </a>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-6 py-3 text-xs font-bold text-white shadow-sm transition hover:bg-emerald-700"
                >
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m21 21-4.35-4.35M19 10.5a8.5 8.5 0 11-17 0 8.5 8.5 0 0117 0z" />
                    </svg>
                    Terapkan Filter
                </button>
            </div>
        </form>

        {{-- MAIN TABLE CARD --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- TABLE HEADER --}}
            <div class="flex flex-col gap-4 border-b border-slate-200 px-5 py-5 sm:px-6 md:flex-row md:items-center md:justify-between">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 005 0M9 5a3 3 0 012-2h2a3 3 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-base font-bold text-slate-900">Daftar Pengembalian</h2>
                        <p class="mt-1 text-xs text-slate-500">
                            Kelola buku yang sedang dipinjam dan proses pengembaliannya.
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-2 self-start rounded-lg bg-slate-50 px-3 py-2 md:self-auto">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                        Total
                    </span>
                    <span class="text-sm font-bold text-emerald-700">
                        {{ $peminjamans->total() }}
                    </span>
                </div>
            </div>

            {{-- TABLE --}}
            <div class="overflow-x-auto">
                <table class="w-full min-w-[1050px] text-left">
                    <thead class="border-b border-slate-200 bg-slate-50">
                        <tr>
                            <th class="px-5 py-3.5 text-[10px] font-bold uppercase tracking-wider text-slate-500 sm:px-6">
                                Peminjam
                            </th>
                            <th class="px-5 py-3.5 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                Buku
                            </th>
                            <th class="px-5 py-3.5 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                Tanggal Pinjam
                            </th>
                            <th class="px-5 py-3.5 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                Jatuh Tempo
                            </th>
                            <th class="px-5 py-3.5 text-center text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                Status
                            </th>
                            <th class="px-5 py-3.5 text-right text-[10px] font-bold uppercase tracking-wider text-slate-500 sm:px-6">
                                Aksi & Denda
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">
                        @forelse ($peminjamans as $peminjaman)
                            <tr class="transition duration-150 hover:bg-emerald-50/30">

                                {{-- PEMINJAM --}}
                                <td class="px-5 py-4 sm:px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-600 text-xs font-bold text-white">
                                            {{ strtoupper(substr($peminjaman->user->name, 0, 1)) }}
                                        </div>

                                        <div class="min-w-0">
                                            <p class="truncate text-sm font-semibold text-slate-800">
                                                {{ $peminjaman->user->name }}
                                            </p>
                                            <p class="mt-0.5 max-w-[180px] truncate text-[11px] text-slate-400">
                                                {{ $peminjaman->user->email }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                {{-- BUKU --}}
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="h-12 w-9 shrink-0 overflow-hidden rounded-lg border border-slate-200 bg-slate-100">
                                            @if ($peminjaman->buku && $peminjaman->buku->sampul)
                                                <img
                                                    src="{{ asset('storage/' . $peminjaman->buku->sampul) }}"
                                                    class="h-full w-full object-cover"
                                                    alt="{{ $peminjaman->buku->judul_buku }}"
                                                >
                                            @else
                                                <div class="flex h-full w-full items-center justify-center bg-emerald-50 text-xs text-emerald-600">
                                                    📖
                                                </div>
                                            @endif
                                        </div>

                                        <div class="min-w-0">
                                            <p class="max-w-[220px] truncate text-sm font-semibold text-slate-800">
                                                {{ $peminjaman->buku->judul_buku ?? 'Buku tidak tersedia' }}
                                            </p>
                                            <p class="mt-0.5 text-[11px] text-slate-400">
                                                Kode:
                                                <span class="font-mono font-medium text-slate-600">
                                                    {{ $peminjaman->buku->kode_buku ?? '-' }}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                {{-- TANGGAL PINJAM --}}
                                <td class="px-5 py-4">
                                    <div class="inline-flex items-center gap-2 text-xs font-medium text-slate-600">
                                        <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}
                                    </div>
                                </td>

                                {{-- JATUH TEMPO --}}
                                <td class="px-5 py-4">
                                    <div class="inline-flex items-center gap-2 text-xs font-medium text-slate-600">
                                        <svg class="h-4 w-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="font-semibold text-slate-700">
                                            {{ \Carbon\Carbon::parse($peminjaman->tanggal_jatuh_tempo)->format('d M Y') }}
                                        </span>
                                    </div>
                                </td>

                                {{-- STATUS --}}
                                <td class="px-5 py-4 text-center">
                                    @if ($peminjaman->status === 'dipinjam')
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1.5 text-[10px] font-bold text-blue-700 ring-1 ring-inset ring-blue-600/20">
                                            <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                                            Dipinjam
                                        </span>
                                    @elseif ($peminjaman->status === 'dikembalikan')
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1.5 text-[10px] font-bold text-emerald-700 ring-1 ring-inset ring-emerald-600/20">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                            Dikembalikan
                                        </span>
                                    @elseif ($peminjaman->status === 'ditolak')
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3 py-1.5 text-[10px] font-bold text-red-700 ring-1 ring-inset ring-red-600/20">
                                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                            Ditolak
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1.5 text-[10px] font-bold text-slate-600">
                                            {{ ucfirst(str_replace('_', ' ', $peminjaman->status)) }}
                                        </span>
                                    @endif
                                </td>

                                {{-- AKSI & DENDA --}}
                                <td class="px-5 py-4 text-right sm:px-6">
                                    @if ($peminjaman->status === 'dipinjam')
                                        <form
                                            action="{{ route('pengembalian.kembalikan', $peminjaman) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin buku ini sudah dikembalikan?')"
                                        >
                                            @csrf
                                            <button
                                                type="submit"
                                                class="inline-flex items-center gap-1.5 rounded-lg bg-emerald-600 px-3.5 py-2 text-[11px] font-bold text-white transition duration-200 hover:bg-emerald-700"
                                            >
                                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                </svg>
                                                Kembalikan
                                            </button>
                                        </form>

                                    @elseif ($peminjaman->status === 'dikembalikan')
                                        @if ($peminjaman->pengembalian && $peminjaman->pengembalian->denda > 0)
                                            <div class="flex flex-col items-end gap-2">
                                                <div class="text-right">
                                                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                                                        Denda
                                                    </p>
                                                    <p class="text-xs font-bold text-red-600">
                                                        Rp {{ number_format($peminjaman->pengembalian->denda, 0, ',', '.') }}
                                                    </p>
                                                </div>

                                                <form
                                                    action="{{ route('pengembalian.lunasi', $peminjaman->pengembalian->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah siswa sudah membayar denda ini?')"
                                                >
                                                    @csrf
                                                    @method('PATCH')
                                                    <button
                                                        type="submit"
                                                        class="rounded-lg bg-amber-600 px-3 py-1.5 text-[10px] font-bold text-white transition hover:bg-amber-700"
                                                    >
                                                        Selesaikan Denda
                                                    </button>
                                                </form>
                                            </div>
                                        @else
                                            <span class="text-xs font-semibold text-emerald-600">
                                                Lunas / Selesai
                                            </span>
                                        @endif

                                    @elseif ($peminjaman->status === 'ditolak')
                                        <span class="text-[11px] font-medium text-slate-400">
                                            Tidak ada aksi
                                        </span>

                                    @elseif ($peminjaman->status === 'menunggu')
                                        <span class="text-[11px] font-semibold text-amber-500">
                                            Diproses di Pengajuan
                                        </span>
                                    @endif
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center">
                                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-2xl">
                                        🎉
                                    </div>
                                    <h3 class="mt-4 text-sm font-bold text-slate-800">
                                        Tidak Ada Data Pengembalian
                                    </h3>
                                    <p class="mt-1 text-xs text-slate-400">
                                        Tidak ditemukan data yang sesuai dengan filter.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            @if ($peminjamans->hasPages())
                <div class="border-t border-slate-200 bg-slate-50 px-5 py-4 sm:px-6">
                    {{ $peminjamans->links() }}
                </div>
            @endif
        </div>

        {{-- FOOTER INFO --}}
        <div class="mt-5 flex items-start gap-3 rounded-xl border border-slate-200 bg-white px-4 py-3.5 shadow-sm">
            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-amber-50 text-sm">
                💡
            </div>

            <p class="text-xs leading-5 text-slate-500">
                Buku dengan status
                <span class="font-semibold text-blue-600">Dipinjam</span>
                dapat diproses pengembaliannya di halaman ini.
                Jika terdapat keterlambatan, sistem akan menghitung
                <span class="font-semibold text-red-600">denda</span>
                secara otomatis. Setelah denda dibayar, admin dapat menekan tombol
                <span class="font-semibold text-amber-600">Selesaikan Denda</span>.
            </p>
        </div>

    </div>
</div>

@endsection
