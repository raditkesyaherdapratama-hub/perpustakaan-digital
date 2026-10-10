@extends('layouts.app')

@section('content')

{{-- LOAD FONT INTER KHUSUS HALAMAN INI --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<div class="min-h-screen bg-slate-50 px-4 py-6 font-['Inter',sans-serif] sm:px-6 lg:px-8">

    <div class="mx-auto max-w-7xl">

        {{-- ========================================================= --}}
        {{-- HERO / HEADER --}}
        {{-- ========================================================= --}}
        <div class="relative mb-7 overflow-hidden rounded-3xl bg-gradient-to-br from-green-950 via-green-900 to-emerald-700 p-6 text-white shadow-[0_15px_40px_rgba(6,78,59,0.16)] sm:p-7">

            {{-- FUTURISTIC BACKGROUND --}}
            <div class="absolute -right-20 -top-24 h-72 w-72 rounded-full bg-emerald-400/20 blur-3xl"></div>
            <div class="absolute -bottom-28 right-1/3 h-64 w-64 rounded-full bg-green-300/10 blur-3xl"></div>
            <div class="absolute right-10 top-10 h-24 w-24 rounded-full border border-white/5"></div>
            <div class="absolute right-20 top-20 h-12 w-12 rounded-full border border-white/5"></div>

            <div class="relative z-10 flex flex-col justify-between gap-5 md:flex-row md:items-center">

                <div>
                    <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3.5 py-1.5 text-[10px] font-bold tracking-[0.16em] text-emerald-100 backdrop-blur-md">
                        <span class="relative flex h-2 w-2">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-70"></span>
                            <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.8)]"></span>
                        </span>
                        MANAJEMEN ADMIN
                    </div>

                    <h1 class="text-2xl font-extrabold tracking-tight sm:text-3xl">
                        Laporan Perpustakaan
                    </h1>

                    <p class="mt-2 max-w-2xl text-xs leading-5 text-emerald-100/80 sm:text-sm">
                        Pantau dan analisis seluruh aktivitas peminjaman serta pengembalian buku secara terorganisir.
                    </p>
                </div>

                {{-- SYSTEM STATUS --}}
                <div class="shrink-0">

                    <div class="inline-flex items-center gap-3 rounded-2xl border border-white/10 bg-white/10 px-4 py-3 backdrop-blur-xl shadow-inner">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-400/15 text-emerald-300 ring-1 ring-inset ring-emerald-300/10">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                        </div>

                        <div>
                            <p class="text-[9px] font-bold uppercase tracking-[0.16em] text-emerald-200/70">
                                Status Sistem
                            </p>

                            <div class="mt-1 flex items-center gap-2">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-400 shadow-[0_0_7px_rgba(52,211,153,0.9)]"></span>
                                <p class="text-xs font-bold text-white">
                                    Sistem Aktif
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>


        {{-- ========================================================= --}}
        {{-- ALERTS --}}
        {{-- ========================================================= --}}
        @if (session('success'))

            <div class="mb-6 flex items-center gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3.5 shadow-sm">

                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-500 text-white shadow-sm shadow-emerald-500/20">
                    <svg class="h-4.5 w-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>

                <div>
                    <p class="text-[10px] font-bold uppercase tracking-wider text-emerald-900">
                        Berhasil
                    </p>

                    <p class="mt-0.5 text-xs font-medium text-emerald-700">
                        {{ session('success') }}
                    </p>
                </div>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- STATISTIC CARDS --}}
        {{-- ========================================================= --}}
        <div class="mb-7 grid gap-4 sm:grid-cols-3">

            {{-- TOTAL PEMINJAMAN --}}
            <div class="group relative overflow-hidden rounded-2xl border border-slate-200/80 bg-white p-5 shadow-[0_5px_20px_rgba(15,23,42,0.04)] transition duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-[0_15px_35px_rgba(16,185,129,0.10)]">

                <div class="absolute -right-10 -top-10 h-28 w-28 rounded-full bg-emerald-400/10 blur-2xl transition duration-500 group-hover:scale-125"></div>

                <div class="relative z-10">

                    <div class="mb-5 flex items-center justify-between">

                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-600 to-teal-400 text-white shadow-md shadow-emerald-500/20 transition duration-300 group-hover:scale-105">
                            <svg class="h-5.5 w-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>

                        <span class="rounded-full bg-emerald-50 px-2.5 py-1 text-[9px] font-bold tracking-wider text-emerald-700 ring-1 ring-inset ring-emerald-600/15">
                            PEMINJAMAN
                        </span>

                    </div>

                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                        Total Peminjaman
                    </p>

                    <h2 class="mt-1 text-3xl font-extrabold tracking-tight text-emerald-600">
                        {{ $totalPeminjaman ?? 0 }}
                    </h2>

                    <div class="mt-3 flex items-center gap-2">
                        <span class="h-1 w-5 rounded-full bg-emerald-500"></span>
                        <p class="text-[11px] text-slate-400">
                            Seluruh transaksi peminjaman
                        </p>
                    </div>

                </div>
            </div>


            {{-- PEMINJAMAN AKTIF --}}
            <div class="group relative overflow-hidden rounded-2xl border border-slate-200/80 bg-white p-5 shadow-[0_5px_20px_rgba(15,23,42,0.04)] transition duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-[0_15px_35px_rgba(59,130,246,0.10)]">

                <div class="absolute -right-10 -top-10 h-28 w-28 rounded-full bg-blue-400/10 blur-2xl transition duration-500 group-hover:scale-125"></div>

                <div class="relative z-10">

                    <div class="mb-5 flex items-center justify-between">

                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-blue-600 to-indigo-400 text-white shadow-md shadow-blue-500/20 transition duration-300 group-hover:scale-105">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>

                        <span class="rounded-full bg-blue-50 px-2.5 py-1 text-[9px] font-bold tracking-wider text-blue-700 ring-1 ring-inset ring-blue-600/15">
                            AKTIF
                        </span>

                    </div>

                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                        Peminjaman Aktif
                    </p>

                    <h2 class="mt-1 text-3xl font-extrabold tracking-tight text-blue-600">
                        {{ $totalDipinjam ?? 0 }}
                    </h2>

                    <div class="mt-3 flex items-center gap-2">
                        <span class="h-1 w-5 rounded-full bg-blue-500"></span>
                        <p class="text-[11px] text-slate-400">
                            Buku masih berada pada anggota
                        </p>
                    </div>

                </div>
            </div>


            {{-- BUKU DIKEMBALIKAN --}}
            <div class="group relative overflow-hidden rounded-2xl bg-slate-900 p-5 text-white shadow-[0_8px_25px_rgba(15,23,42,0.12)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_18px_40px_rgba(15,23,42,0.18)]">

                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-emerald-500/15 blur-2xl transition duration-500 group-hover:scale-125"></div>
                <div class="absolute -bottom-12 -left-8 h-24 w-24 rounded-full bg-teal-500/10 blur-2xl"></div>

                <div class="relative z-10">

                    <div class="mb-5 flex items-center justify-between">

                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/10 text-emerald-400 ring-1 ring-inset ring-white/10 backdrop-blur-md transition duration-300 group-hover:scale-105">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>
                            </svg>
                        </div>

                        <span class="rounded-full border border-emerald-400/20 bg-emerald-500/10 px-2.5 py-1 text-[9px] font-bold tracking-wider text-emerald-300">
                            SELESAI
                        </span>

                    </div>

                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                        Buku Dikembalikan
                    </p>

                    <h2 class="mt-1 text-3xl font-extrabold tracking-tight text-white">
                        {{ $totalPengembalian ?? 0 }}
                    </h2>

                    <div class="mt-3 flex items-center gap-2">
                        <span class="h-1 w-5 rounded-full bg-emerald-400"></span>
                        <p class="text-[11px] text-slate-400">
                            Transaksi telah selesai
                        </p>
                    </div>

                </div>
            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- REPORT TABLE CARD --}}
        {{-- ========================================================= --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-[0_5px_25px_rgba(15,23,42,0.05)]">

            {{-- PANEL HEADER --}}
            <div class="flex flex-col justify-between gap-4 border-b border-slate-100 p-5 sm:p-6 md:flex-row md:items-center">

                <div class="flex items-center gap-3">

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 ring-1 ring-inset ring-emerald-600/15">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-base font-extrabold text-slate-900 sm:text-lg">
                            Data Laporan
                        </h2>

                        <p class="mt-0.5 text-[11px] text-slate-500 sm:text-xs">
                            Rekap aktivitas peminjaman dan pengembalian buku
                        </p>
                    </div>

                </div>


                <div class="flex flex-wrap items-center gap-2.5">

                    {{-- TOTAL DATA --}}
                    <div class="flex items-center gap-2 rounded-xl bg-slate-50 px-3.5 py-2.5 ring-1 ring-slate-200/70">

                        <span class="text-[9px] font-bold uppercase tracking-wider text-slate-400">
                            TOTAL DATA
                        </span>

                        <span class="text-sm font-extrabold text-emerald-700">
                            @if(isset($peminjaman) && method_exists($peminjaman, 'total'))
                                {{ $peminjaman->total() }}
                            @else
                                {{ count($peminjaman ?? []) }}
                            @endif
                        </span>

                    </div>


                    {{-- CETAK --}}
                    <a
                        href="{{ route('laporan.print', request()->query()) }}"
                        target="_blank"
                        class="inline-flex items-center gap-2 rounded-xl bg-emerald-600 px-4 py-2.5 text-xs font-bold text-white shadow-md shadow-emerald-600/20 transition duration-200 hover:-translate-y-0.5 hover:bg-emerald-700 hover:shadow-lg hover:shadow-emerald-600/20"
                    >

                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                            </path>
                        </svg>

                        Cetak Laporan

                    </a>

                </div>

            </div>


            {{-- TABLE --}}
            <div class="overflow-x-auto">

                <table class="w-full min-w-[950px] text-left">

                    <thead class="border-b border-slate-100 bg-slate-50/80 text-[10px] font-bold uppercase tracking-[0.12em] text-slate-500">

                        <tr>

                            <th class="px-6 py-3.5">
                                #
                            </th>

                            <th class="px-6 py-3.5">
                                Peminjam
                            </th>

                            <th class="px-6 py-3.5">
                                Buku
                            </th>

                            <th class="px-6 py-3.5">
                                Tanggal Pinjam
                            </th>

                            <th class="px-6 py-3.5">
                                Jatuh Tempo
                            </th>

                            <th class="px-6 py-3.5 text-center">
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100 text-xs font-medium">

                        @forelse ($peminjaman ?? [] as $laporan)

                            <tr class="group transition duration-150 hover:bg-emerald-50/30">

                                {{-- NOMOR --}}
                                <td class="px-6 py-4 font-semibold text-slate-400">

                                    @if(isset($peminjaman) && method_exists($peminjaman, 'firstItem'))
                                        {{ $peminjaman->firstItem() + $loop->index }}
                                    @else
                                        {{ $loop->iteration }}
                                    @endif

                                </td>


                                {{-- PEMINJAM --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-600 to-teal-400 text-xs font-bold text-white shadow-sm">
                                            {{ strtoupper(substr($laporan->user->name ?? 'U', 0, 1)) }}
                                        </div>

                                        <div class="min-w-0">

                                            <p class="max-w-[150px] truncate text-sm font-bold text-slate-800">
                                                {{ $laporan->user->name ?? '-' }}
                                            </p>

                                            <p class="max-w-[150px] truncate text-[10px] text-slate-400">
                                                {{ $laporan->user->email ?? '-' }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- BUKU --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="h-11 w-8 shrink-0 overflow-hidden rounded-lg border border-slate-200 bg-slate-100 shadow-sm">

                                            @if (!empty($laporan->buku?->sampul))

                                                <img
                                                    src="{{ asset('storage/' . $laporan->buku->sampul) }}"
                                                    class="h-full w-full object-cover"
                                                    alt="{{ $laporan->buku->judul_buku }}"
                                                >

                                            @else

                                                <div class="flex h-full w-full items-center justify-center bg-emerald-50 text-xs font-bold text-emerald-600">
                                                    📖
                                                </div>

                                            @endif

                                        </div>

                                        <div class="min-w-0">

                                            <p class="max-w-[200px] truncate text-sm font-bold text-slate-800">
                                                {{ $laporan->buku->judul_buku ?? '-' }}
                                            </p>

                                            <p class="text-[10px] text-slate-400">
                                                Kode:
                                                <span class="font-mono text-slate-600">
                                                    {{ $laporan->buku->kode_buku ?? '-' }}
                                                </span>
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- TANGGAL PINJAM --}}
                                <td class="px-6 py-4">

                                    <div class="inline-flex items-center gap-2 rounded-lg bg-slate-100 px-3 py-1.5 text-slate-600">

                                        <svg class="h-3.5 w-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>

                                        <span class="whitespace-nowrap font-semibold">
                                            {{ ($laporan->tanggal_pinjam ?? false) ? \Carbon\Carbon::parse($laporan->tanggal_pinjam)->format('d M Y') : '-' }}
                                        </span>

                                    </div>

                                </td>


                                {{-- JATUH TEMPO --}}
                                <td class="px-6 py-4">

                                    @if ($laporan->tanggal_jatuh_tempo ?? false)

                                        <div class="inline-flex items-center gap-2 rounded-lg bg-amber-50 px-3 py-1.5 text-amber-700 ring-1 ring-inset ring-amber-600/15">

                                            <svg class="h-3.5 w-3.5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg>

                                            <span class="whitespace-nowrap font-bold">
                                                {{ \Carbon\Carbon::parse($laporan->tanggal_jatuh_tempo)->format('d M Y') }}
                                            </span>

                                        </div>

                                    @else

                                        <span class="text-slate-400">
                                            -
                                        </span>

                                    @endif

                                </td>


                                {{-- STATUS --}}
                                <td class="px-6 py-4 text-center">

                                    @if (($laporan->status ?? '') === 'dipinjam')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1 text-[10px] font-bold text-blue-700 ring-1 ring-inset ring-blue-600/15">
                                            <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                                            Dipinjam
                                        </span>

                                    @elseif (($laporan->status ?? '') === 'dikembalikan')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-[10px] font-bold text-emerald-700 ring-1 ring-inset ring-emerald-600/15">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                            Dikembalikan
                                        </span>

                                    @elseif (($laporan->status ?? '') === 'menunggu')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-3 py-1 text-[10px] font-bold text-amber-700 ring-1 ring-inset ring-amber-600/15">
                                            <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-amber-500"></span>
                                            Menunggu
                                        </span>

                                    @elseif (($laporan->status ?? '') === 'ditolak')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3 py-1 text-[10px] font-bold text-red-700 ring-1 ring-inset ring-red-600/15">
                                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                            Ditolak
                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1 text-[10px] font-bold text-slate-600">
                                            {{ ucfirst($laporan->status ?? '-') }}
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="px-6 py-16 text-center">

                                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-2xl text-emerald-600 ring-1 ring-inset ring-emerald-600/10">
                                        📊
                                    </div>

                                    <h3 class="mt-4 text-sm font-bold text-slate-800">
                                        Belum Ada Data Laporan
                                    </h3>

                                    <p class="mt-1 text-[11px] text-slate-400">
                                        Data aktivitas perpustakaan akan muncul di sini.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- PAGINATION --}}
            @if (isset($peminjaman) && method_exists($peminjaman, 'links'))

                <div class="border-t border-slate-100 bg-slate-50/50 px-6 py-4">
                    {{ $peminjaman->links() }}
                </div>

            @elseif (isset($laporans) && method_exists($laporans, 'links'))

                <div class="border-t border-slate-100 bg-slate-50/50 px-6 py-4">
                    {{ $laporans->links() }}
                </div>

            @endif

        </div>


        {{-- ========================================================= --}}
        {{-- FOOTER INFO --}}
        {{-- ========================================================= --}}
        <div class="mt-5 flex items-center gap-3 rounded-2xl border border-slate-200/80 bg-white p-4 shadow-sm">

            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-sm text-emerald-600 ring-1 ring-inset ring-emerald-600/10">
                💡
            </div>

            <p class="text-[11px] leading-5 text-slate-500">

                Gunakan data laporan sebagai bahan pemantauan aktivitas peminjaman dan pengembalian buku di perpustakaan

                <span class="font-bold text-emerald-700">
                    MI Al Falahiyyah Rajeg.
                </span>

            </p>

        </div>

    </div>

</div>

@endsection