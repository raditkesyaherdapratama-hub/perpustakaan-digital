@extends('layouts.app')

@section('content')

{{-- LOAD FONT INTER --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<div class="min-h-screen bg-slate-50 px-4 py-6 font-['Inter',sans-serif] sm:px-6 lg:px-8">

    <div class="mx-auto max-w-7xl">

        {{-- ========================================================= --}}
        {{-- HERO / HEADER --}}
        {{-- ========================================================= --}}

        <div class="relative mb-8 overflow-hidden rounded-3xl bg-gradient-to-br from-green-950 via-green-800 to-emerald-700 p-8 text-white shadow-xl">

            <div class="absolute -right-20 -top-20 h-72 w-72 rounded-full bg-green-400/20 blur-3xl"></div>
            <div class="absolute -bottom-24 right-40 h-64 w-64 rounded-full bg-emerald-300/10 blur-3xl"></div>

            <div class="relative z-10 flex flex-col justify-between gap-6 md:flex-row md:items-center">

                <div>

                    <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-xs font-semibold tracking-wider text-green-100 backdrop-blur-md">

                        <span class="relative flex h-2 w-2">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-400"></span>
                        </span>

                        MANAJEMEN PENGEMBALIAN

                    </div>

                    <h1 class="text-3xl font-extrabold tracking-tight md:text-4xl">
                        Pengembalian Buku
                    </h1>

                    <p class="mt-2 max-w-2xl text-sm leading-6 text-green-100 md:text-base">
                        Kelola buku yang sedang dipinjam, proses pengembalian,
                        dan penyelesaian denda keterlambatan.
                    </p>

                </div>

                {{-- SYSTEM STATUS --}}

                <div class="shrink-0">

                    <div class="inline-flex items-center gap-3 rounded-2xl border border-white/20 bg-white/10 px-5 py-3.5 shadow-inner backdrop-blur-md">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/30 text-emerald-300">

                            <svg
                                class="h-5 w-5 animate-spin"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                ></path>
                            </svg>

                        </div>

                        <div>

                            <p class="text-[10px] font-bold uppercase tracking-widest text-green-200">
                                Status Sistem
                            </p>

                            <div class="mt-0.5 flex items-center gap-2">

                                <span class="h-2 w-2 rounded-full bg-emerald-400"></span>

                                <p class="text-xs font-extrabold text-white">
                                    Sistem Aktif
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- ALERT SUCCESS --}}
        {{-- ========================================================= --}}

        @if (session('success'))

            <div class="mb-6 flex items-center gap-4 rounded-2xl border border-emerald-200 bg-emerald-50/80 px-5 py-4 shadow-sm backdrop-blur-md">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-500 text-white shadow-md shadow-emerald-500/20">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2.5"
                            d="M5 13l4 4L19 7"
                        ></path>
                    </svg>

                </div>

                <div>

                    <p class="text-xs font-bold uppercase tracking-wider text-emerald-900">
                        Proses Berhasil
                    </p>

                    <p class="mt-0.5 text-xs font-medium text-emerald-700">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- ALERT ERROR --}}
        {{-- ========================================================= --}}

        @if (session('error'))

            <div class="mb-6 flex items-center gap-4 rounded-2xl border border-red-200 bg-red-50/80 px-5 py-4 shadow-sm backdrop-blur-md">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-red-500 text-white shadow-md shadow-red-500/20">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2.5"
                            d="M6 18L18 6M6 6l12 12"
                        ></path>
                    </svg>

                </div>

                <div>

                    <p class="text-xs font-bold uppercase tracking-wider text-red-900">
                        Terjadi Kesalahan
                    </p>

                    <p class="mt-0.5 text-xs font-medium text-red-700">
                        {{ session('error') }}
                    </p>

                </div>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- STATISTICS --}}
        {{-- ========================================================= --}}

        <div class="mb-8 grid gap-5 sm:grid-cols-3">

            {{-- AKTIF --}}

            <div class="group relative overflow-hidden rounded-3xl border border-slate-100 bg-gradient-to-br from-white via-slate-50/50 to-blue-50/30 p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-xl hover:shadow-blue-500/10">

                <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-blue-400/10 blur-2xl transition-all duration-500 group-hover:scale-150"></div>

                <div class="relative z-10">

                    <div class="mb-6 flex items-center justify-between">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-tr from-blue-600 to-indigo-400 text-white shadow-lg shadow-blue-500/30 transition-transform duration-300 group-hover:scale-110">

                            <svg
                                class="h-7 w-7"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                ></path>
                            </svg>

                        </div>

                        <span class="rounded-full bg-blue-50 px-3 py-1 text-[11px] font-bold tracking-wide text-blue-700 ring-1 ring-inset ring-blue-600/20">
                            AKTIF
                        </span>

                    </div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                        Buku Sedang Dipinjam
                    </p>

                    <h2 class="mt-1 text-4xl font-black tracking-tight text-blue-600">
                        {{ $peminjamans->where('status', 'dipinjam')->count() }}
                    </h2>

                    <p class="mt-3 text-xs text-slate-500">
                        Belum dikembalikan oleh user
                    </p>

                </div>

            </div>


            {{-- SELESAI --}}

            <div class="group relative overflow-hidden rounded-3xl border border-slate-100 bg-gradient-to-br from-white via-slate-50/50 to-emerald-50/30 p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-xl hover:shadow-emerald-500/10">

                <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-emerald-400/10 blur-2xl transition-all duration-500 group-hover:scale-150"></div>

                <div class="relative z-10">

                    <div class="mb-6 flex items-center justify-between">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-tr from-emerald-600 to-teal-400 text-white shadow-lg shadow-emerald-500/30 transition-transform duration-300 group-hover:scale-110">

                            <svg
                                class="h-7 w-7"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"
                                ></path>
                            </svg>

                        </div>

                        <span class="rounded-full bg-emerald-50 px-3 py-1 text-[11px] font-bold tracking-wide text-emerald-700 ring-1 ring-inset ring-emerald-600/20">
                            SELESAI
                        </span>

                    </div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                        Buku Dikembalikan
                    </p>

                    <h2 class="mt-1 text-4xl font-black tracking-tight text-emerald-600">
                        {{ $peminjamans->where('status', 'dikembalikan')->count() }}
                    </h2>

                    <p class="mt-3 text-xs text-slate-500">
                        Riwayat pengembalian buku
                    </p>

                </div>

            </div>


            {{-- SYSTEM --}}

            <div class="group relative overflow-hidden rounded-3xl bg-slate-900 p-6 text-white shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl">

                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-emerald-500/20 blur-2xl transition-all duration-500 group-hover:scale-150"></div>

                <div class="relative z-10">

                    <div class="mb-6 flex items-center justify-between">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/10 text-emerald-400 backdrop-blur-md ring-1 ring-white/10">

                            <svg
                                class="h-7 w-7"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"
                                ></path>
                            </svg>

                        </div>

                        <span class="rounded-full border border-emerald-400/30 bg-emerald-500/10 px-3 py-1 text-[11px] font-bold tracking-wide text-emerald-300">
                            ONLINE
                        </span>

                    </div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                        Sistem Perpustakaan
                    </p>

                    <h2 class="mt-1 text-2xl font-black tracking-tight text-white">
                        MI Al Falahiyyah
                    </h2>

                    <p class="mt-3 text-xs text-slate-400">
                        Pengelolaan pengembalian buku
                    </p>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- MAIN TABLE --}}
        {{-- ========================================================= --}}

        <div class="overflow-hidden rounded-3xl border border-slate-100 bg-white shadow-sm">

            {{-- TABLE HEADER --}}

            <div class="flex flex-col justify-between gap-4 border-b border-slate-100 p-6 md:flex-row md:items-center">

                <div class="flex items-center gap-3">

                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 ring-1 ring-inset ring-emerald-600/20">

                        <svg
                            class="h-6 w-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 005 0M9 5a3 3 0 012-2h2a3 3 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                            ></path>
                        </svg>

                    </div>

                    <div>

                        <h2 class="text-lg font-extrabold text-slate-900">
                            Daftar Pengembalian Buku
                        </h2>

                        <p class="mt-0.5 text-xs text-slate-500">
                            Kelola buku yang sedang dipinjam dan proses pengembaliannya
                        </p>

                    </div>

                </div>

                <div class="flex items-center gap-3 self-start rounded-2xl bg-slate-50 px-4 py-2 ring-1 ring-slate-200/60 md:self-auto">

                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                        TOTAL DATA
                    </span>

                    <span class="text-sm font-extrabold text-emerald-700">
                        {{ $peminjamans->total() }}
                    </span>

                </div>

            </div>


            {{-- TABLE --}}

            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead class="bg-slate-50/80 text-xs font-bold uppercase tracking-wider text-slate-500">

                        <tr>

                            <th class="px-6 py-4">
                                Peminjam
                            </th>

                            <th class="px-6 py-4">
                                Buku
                            </th>

                            <th class="px-6 py-4">
                                Tanggal Pinjam
                            </th>

                            <th class="px-6 py-4">
                                Jatuh Tempo
                            </th>

                            <th class="px-6 py-4 text-center">
                                Status
                            </th>

                            <th class="px-6 py-4 text-right">
                                Aksi & Denda
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100 text-xs font-medium">

                        @forelse ($peminjamans as $peminjaman)

                            <tr class="transition duration-150 hover:bg-emerald-50/30">


                                {{-- ================================================= --}}
                                {{-- PEMINJAM --}}
                                {{-- ================================================= --}}

                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-tr from-emerald-600 to-teal-400 font-bold text-white shadow-sm">

                                            {{ strtoupper(substr($peminjaman->user->name, 0, 1)) }}

                                        </div>

                                        <div class="min-w-0">

                                            <p class="truncate text-sm font-bold text-slate-800">
                                                {{ $peminjaman->user->name }}
                                            </p>

                                            <p class="truncate text-[11px] text-slate-400">
                                                {{ $peminjaman->user->email }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- ================================================= --}}
                                {{-- BUKU --}}
                                {{-- ================================================= --}}

                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="h-12 w-9 shrink-0 overflow-hidden rounded-xl border border-slate-200 bg-slate-100 shadow-sm">

                                            @if ($peminjaman->buku->sampul)

                                                <img
                                                    src="{{ asset('storage/' . $peminjaman->buku->sampul) }}"
                                                    class="h-full w-full object-cover"
                                                    alt="{{ $peminjaman->buku->judul_buku }}"
                                                >

                                            @else

                                                <div class="flex h-full w-full items-center justify-center bg-emerald-50 text-xs font-bold text-emerald-600">
                                                    📖
                                                </div>

                                            @endif

                                        </div>

                                        <div class="min-w-0">

                                            <p class="max-w-[200px] truncate text-sm font-bold text-slate-800">
                                                {{ $peminjaman->buku->judul_buku }}
                                            </p>

                                            <p class="text-[11px] text-slate-400">
                                                Kode:
                                                <span class="font-mono text-slate-600">
                                                    {{ $peminjaman->buku->kode_buku }}
                                                </span>
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- ================================================= --}}
                                {{-- TANGGAL PINJAM --}}
                                {{-- ================================================= --}}

                                <td class="px-6 py-4">

                                    <div class="inline-flex items-center gap-2 rounded-xl bg-slate-100 px-3 py-1.5 text-slate-600">

                                        <svg
                                            class="h-4 w-4 text-slate-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                            ></path>
                                        </svg>

                                        <span class="font-semibold">
                                            {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}
                                        </span>

                                    </div>

                                </td>


                                {{-- ================================================= --}}
                                {{-- JATUH TEMPO --}}
                                {{-- ================================================= --}}

                                <td class="px-6 py-4">

                                    <div class="inline-flex items-center gap-2 rounded-xl bg-amber-50 px-3 py-1.5 text-amber-700 ring-1 ring-inset ring-amber-600/20">

                                        <svg
                                            class="h-4 w-4 text-amber-500"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                            ></path>
                                        </svg>

                                        <span class="font-bold">
                                            {{ \Carbon\Carbon::parse($peminjaman->tanggal_jatuh_tempo)->format('d M Y') }}
                                        </span>

                                    </div>

                                </td>


                                {{-- ================================================= --}}
                                {{-- STATUS --}}
                                {{-- ================================================= --}}

                                <td class="px-6 py-4 text-center">

                                    @if ($peminjaman->status === 'dipinjam')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700 ring-1 ring-inset ring-blue-600/20">

                                            <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>

                                            Dipinjam

                                        </span>

                                    @elseif ($peminjaman->status === 'dikembalikan')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700 ring-1 ring-inset ring-emerald-600/20">

                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                            Dikembalikan

                                        </span>

                                    @elseif ($peminjaman->status === 'ditolak')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3 py-1 text-xs font-bold text-red-700 ring-1 ring-inset ring-red-600/20">

                                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>

                                            Ditolak

                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-600">

                                            {{ ucfirst($peminjaman->status) }}

                                        </span>

                                    @endif

                                </td>


                                {{-- ================================================= --}}
                                {{-- AKSI & DENDA --}}
                                {{-- ================================================= --}}

                                <td class="px-6 py-4 text-right">

                                    {{-- BUKU SEDANG DIPINJAM --}}

                                    @if ($peminjaman->status === 'dipinjam')

                                        <form
                                            action="{{ route('pengembalian.kembalikan', $peminjaman) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin buku ini sudah dikembalikan?')"
                                        >

                                            @csrf

                                            <button
                                                type="submit"
                                                class="inline-flex items-center gap-1.5 rounded-xl bg-emerald-600 px-4 py-2 text-xs font-bold text-white shadow-md shadow-emerald-600/20 transition hover:scale-105 hover:bg-emerald-700"
                                            >

                                                <svg
                                                    class="h-4 w-4"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                                    ></path>
                                                </svg>

                                                Kembalikan

                                            </button>

                                        </form>


                                    {{-- BUKU SUDAH DIKEMBALIKAN --}}

                                    @elseif ($peminjaman->status === 'dikembalikan')

                                        @if ($peminjaman->pengembalian && $peminjaman->pengembalian->denda > 0)

                                            <div class="flex flex-col items-end gap-1">

                                                <span class="text-xs font-bold text-red-600">

                                                    Denda:
                                                    Rp {{ number_format($peminjaman->pengembalian->denda, 0, ',', '.') }}

                                                </span>


                                                <form
                                                    action="{{ route('pengembalian.lunasi', $peminjaman->pengembalian->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah siswa sudah membayar denda ini?')"
                                                >

                                                    @csrf

                                                    @method('PATCH')

                                                    <button
                                                        type="submit"
                                                        class="inline-flex items-center gap-1 rounded-xl bg-amber-600 px-3 py-1.5 text-[11px] font-bold text-white shadow-md transition hover:bg-amber-700"
                                                    >
                                                        Selesaikan Denda
                                                    </button>

                                                </form>

                                            </div>

                                        @else

                                            <span class="text-xs font-bold text-emerald-600">
                                                Lunas / Selesai
                                            </span>

                                        @endif


                                    {{-- STATUS DITOLAK --}}

                                    @elseif ($peminjaman->status === 'ditolak')

                                        <span class="text-xs font-semibold text-slate-400">
                                            Tidak ada aksi
                                        </span>


                                    {{-- STATUS MENUNGGU --}}

                                    @elseif ($peminjaman->status === 'menunggu')

                                        <span class="text-xs font-semibold text-amber-500">
                                            Diproses di Pengajuan
                                        </span>

                                    @endif

                                </td>

                            </tr>


                        @empty

                            <tr>

                                <td colspan="6" class="px-6 py-16 text-center">

                                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-emerald-50 text-3xl text-emerald-600">
                                        🎉
                                    </div>

                                    <h3 class="mt-4 text-base font-bold text-slate-800">
                                        Tidak Ada Data Pengembalian
                                    </h3>

                                    <p class="mt-1 text-xs text-slate-400">
                                        Belum ada buku yang sedang dipinjam atau sudah dikembalikan.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- ========================================================= --}}
            {{-- PAGINATION --}}
            {{-- ========================================================= --}}

            <div class="border-t border-slate-100 bg-slate-50/50 px-6 py-4">

                {{ $peminjamans->links() }}

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- FOOTER INFO --}}
        {{-- ========================================================= --}}

        <div class="mt-6 flex items-center gap-3 rounded-2xl border border-slate-100 bg-white p-4 shadow-sm">

            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-amber-50 text-sm text-amber-600">
                💡
            </div>

            <p class="text-xs leading-5 text-slate-500">

                Buku dengan status
                <span class="font-bold text-blue-600">
                    Dipinjam
                </span>
                dapat diproses pengembaliannya di halaman ini.

                Jika terdapat keterlambatan, sistem akan menghitung
                <span class="font-bold text-red-600">
                    denda
                </span>
                secara otomatis.

                Setelah denda dibayar, admin dapat menekan tombol
                <span class="font-bold text-amber-600">
                    Selesaikan Denda
                </span>.

            </p>

        </div>

    </div>

</div>

@endsection