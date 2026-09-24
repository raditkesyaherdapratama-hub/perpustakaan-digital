@extends('layouts.app')

@section('content')

{{-- LOAD FONT INTER KHUSUS HALAMAN INI --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

{{-- CDN CHART.JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="min-h-screen bg-slate-50 px-4 py-6 font-['Inter',sans-serif] sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">

        {{-- ========================================================= --}}
        {{-- HERO --}}
        {{-- ========================================================= --}}
        <div class="relative mb-8 overflow-hidden rounded-3xl bg-gradient-to-br from-green-950 via-green-800 to-emerald-700 p-8 text-white shadow-xl">

            {{-- Background Decoration --}}
            <div class="absolute -right-20 -top-20 h-72 w-72 rounded-full bg-green-400/20 blur-3xl"></div>
            <div class="absolute -bottom-24 right-40 h-64 w-64 rounded-full bg-emerald-300/10 blur-3xl"></div>

            <div class="relative z-10 flex flex-col justify-between gap-8 md:flex-row md:items-center">

                {{-- Hero Text --}}
                <div>

                    <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-xs font-semibold tracking-wider text-green-100 backdrop-blur-sm">

                        <span class="relative flex h-2 w-2">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-400"></span>
                        </span>

                        ADMIN PANEL

                    </div>

                    <h1 class="text-3xl font-extrabold tracking-tight md:text-4xl">
                        Dashboard Perpustakaan
                    </h1>

                    <p class="mt-3 max-w-xl text-sm leading-6 text-green-100 md:text-base">
                        Selamat datang kembali,
                        <span class="font-bold text-white">
                            {{ auth()->user()->name ?? ($user->name ?? 'Admin') }}
                        </span>
                        👋
                    </p>

                    <p class="mt-2 max-w-2xl text-sm leading-6 text-green-200">
                        Pantau dan kelola seluruh aktivitas perpustakaan MI Al Falahiyyah Rajeg dengan mudah.
                    </p>

                </div>

                {{-- Hero Icon --}}
                <div class="hidden md:flex">

                    <div class="relative flex h-28 w-28 items-center justify-center rounded-3xl border border-white/20 bg-white/10 text-emerald-300 shadow-2xl backdrop-blur-md transition-transform duration-500 hover:rotate-6 hover:scale-105">

                        <svg
                            class="h-14 w-14 drop-shadow-lg"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                            ></path>

                        </svg>

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- STATISTIK CARDS --}}
        {{-- ========================================================= --}}
        <div class="mb-8 grid gap-5 sm:grid-cols-2 xl:grid-cols-4">

            {{-- TOTAL BUKU --}}
            <div class="group relative overflow-hidden rounded-3xl border border-slate-100 bg-gradient-to-br from-white via-slate-50/50 to-emerald-50/30 p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-xl hover:shadow-emerald-500/10">

                <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-emerald-400/10 blur-2xl transition-all duration-500 group-hover:scale-150 group-hover:bg-emerald-400/20"></div>

                <div class="relative z-10">

                    <div class="mb-6 flex items-center justify-between">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-tr from-emerald-600 to-teal-400 text-white shadow-lg shadow-emerald-500/30 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3">

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

                        <span class="rounded-full bg-emerald-50 px-3 py-1 text-[11px] font-bold tracking-wide text-emerald-700 ring-1 ring-inset ring-emerald-600/20">
                            KOLEKSI
                        </span>

                    </div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                        Total Buku
                    </p>

                    <h2 class="mt-1 text-4xl font-black tracking-tight text-slate-900">
                        {{ $totalBuku ?? 0 }}
                    </h2>

                    <div class="mt-4 flex items-center gap-2 text-xs font-medium text-emerald-700">

                        <span class="flex h-5 w-5 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                            ✓
                        </span>

                        Buku di perpustakaan

                    </div>

                </div>

            </div>


            {{-- TOTAL ANGGOTA --}}
            <div class="group relative overflow-hidden rounded-3xl border border-slate-100 bg-gradient-to-br from-white via-slate-50/50 to-blue-50/30 p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-xl hover:shadow-blue-500/10">

                <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-blue-400/10 blur-2xl transition-all duration-500 group-hover:scale-150 group-hover:bg-blue-400/20"></div>

                <div class="relative z-10">

                    <div class="mb-6 flex items-center justify-between">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-tr from-blue-600 to-indigo-400 text-white shadow-lg shadow-blue-500/30 transition-transform duration-300 group-hover:scale-110 group-hover:-rotate-3">

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
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                                ></path>

                            </svg>

                        </div>

                        <span class="rounded-full bg-blue-50 px-3 py-1 text-[11px] font-bold tracking-wide text-blue-700 ring-1 ring-inset ring-blue-600/20">
                            ANGGOTA
                        </span>

                    </div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                        Total Anggota
                    </p>

                    <h2 class="mt-1 text-4xl font-black tracking-tight text-slate-900">
                        {{ $totalAnggota ?? 0 }}
                    </h2>

                    <div class="mt-4 flex items-center gap-2 text-xs font-medium text-blue-700">

                        <span class="flex h-5 w-5 items-center justify-center rounded-full bg-blue-100 text-blue-600">
                            ✓
                        </span>

                        Anggota terdaftar

                    </div>

                </div>

            </div>


            {{-- BUKU DIPINJAM --}}
            <div class="group relative overflow-hidden rounded-3xl border border-slate-100 bg-gradient-to-br from-white via-slate-50/50 to-amber-50/30 p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-amber-200 hover:shadow-xl hover:shadow-amber-500/10">

                <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-amber-400/10 blur-2xl transition-all duration-500 group-hover:scale-150 group-hover:bg-amber-400/20"></div>

                <div class="relative z-10">

                    <div class="mb-6 flex items-center justify-between">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-tr from-amber-500 to-orange-400 text-white shadow-lg shadow-amber-500/30 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3">

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
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                ></path>

                            </svg>

                        </div>

                        <span class="rounded-full bg-amber-50 px-3 py-1 text-[11px] font-bold tracking-wide text-amber-700 ring-1 ring-inset ring-amber-600/20">
                            AKTIVITAS
                        </span>

                    </div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                        Buku Dipinjam
                    </p>

                    <h2 class="mt-1 text-4xl font-black tracking-tight text-slate-900">
                        {{ $bukuDipinjam ?? 0 }}
                    </h2>

                    <div class="mt-4 flex items-center gap-2 text-xs font-medium text-amber-700">

                        <span class="flex h-5 w-5 items-center justify-center rounded-full bg-amber-100 text-amber-600">
                            ↗
                        </span>

                        Sedang dipinjam

                    </div>

                </div>

            </div>


            {{-- PENGEMBALIAN --}}
            <div class="group relative overflow-hidden rounded-3xl border border-slate-100 bg-gradient-to-br from-white via-slate-50/50 to-purple-50/30 p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-purple-200 hover:shadow-xl hover:shadow-purple-500/10">

                <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-purple-400/10 blur-2xl transition-all duration-500 group-hover:scale-150 group-hover:bg-purple-400/20"></div>

                <div class="relative z-10">

                    <div class="mb-6 flex items-center justify-between">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-tr from-purple-600 to-violet-400 text-white shadow-lg shadow-purple-500/30 transition-transform duration-300 group-hover:scale-110 group-hover:-rotate-3">

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
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                ></path>

                            </svg>

                        </div>

                        <span class="rounded-full bg-purple-50 px-3 py-1 text-[11px] font-bold tracking-wide text-purple-700 ring-1 ring-inset ring-purple-600/20">
                            SELESAI
                        </span>

                    </div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                        Pengembalian
                    </p>

                    <h2 class="mt-1 text-4xl font-black tracking-tight text-slate-900">
                        {{ $totalPengembalian ?? 0 }}
                    </h2>

                    <div class="mt-4 flex items-center gap-2 text-xs font-medium text-purple-700">

                        <span class="flex h-5 w-5 items-center justify-center rounded-full bg-purple-100 text-purple-600">
                            ✓
                        </span>

                        Buku dikembalikan

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- GRAFIK KURVA TREN PEMINJAMAN --}}
        {{-- ========================================================= --}}
        <div class="mb-8 overflow-hidden rounded-3xl border border-slate-100 bg-white p-6 shadow-sm">

            <div class="mb-6 flex flex-col justify-between gap-3 sm:flex-row sm:items-center">

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
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"
                            ></path>

                        </svg>

                    </div>

                    <div>

                        <h2 class="text-lg font-extrabold text-slate-900">
                            Kurva Tren Peminjaman Buku
                        </h2>

                        <p class="text-xs text-slate-500">
                            Grafik statistik transaksi peminjaman buku tahun {{ date('Y') }}
                        </p>

                    </div>

                </div>

                <div class="flex items-center gap-2 self-start rounded-2xl bg-emerald-50 px-4 py-2 ring-1 ring-inset ring-emerald-600/20 sm:self-auto">

                    <span class="h-2 w-2 animate-pulse rounded-full bg-emerald-500"></span>

                    <span class="text-xs font-bold text-emerald-700">
                        Tahun {{ date('Y') }}
                    </span>

                </div>

            </div>


            {{-- CANVAS CHART --}}
            <div class="relative h-80 w-full">
                <canvas id="peminjamanChart"></canvas>
            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- PEMINJAMAN TERBARU --}}
        {{-- ========================================================= --}}
        <div class="mb-8 overflow-hidden rounded-3xl border border-slate-100 bg-white shadow-sm">

            {{-- Header --}}
            <div class="flex flex-col justify-between gap-3 border-b border-slate-100 p-6 sm:flex-row sm:items-center">

                <div>

                    <p class="text-xs font-bold uppercase tracking-widest text-emerald-600">
                        AKTIVITAS
                    </p>

                    <h2 class="mt-2 text-xl font-extrabold text-slate-900">
                        Peminjaman Terbaru 📋
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Aktivitas peminjaman terakhir
                    </p>

                </div>

                <div class="rounded-full bg-emerald-50 px-4 py-2 text-xs font-semibold text-emerald-700">
                    {{ ($peminjamanTerbaru ?? collect())->count() }} Aktivitas
                </div>

            </div>


            @if (($peminjamanTerbaru ?? collect())->count() > 0)

                {{-- Table --}}
                <div class="overflow-x-auto">

                    <table class="w-full text-left">

                        <thead class="bg-slate-50/80">

                            <tr>

                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Anggota
                                </th>

                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Buku
                                </th>

                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Tanggal
                                </th>

                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Status
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-slate-100 text-xs font-medium">

                            @foreach ($peminjamanTerbaru as $peminjaman)

                                <tr class="transition hover:bg-emerald-50/30">

                                    {{-- Anggota --}}
                                    <td class="px-6 py-4">

                                        <div class="flex items-center gap-3">

                                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-tr from-emerald-600 to-teal-400 font-bold text-white shadow-sm">
                                                {{ strtoupper(substr($peminjaman->user->name ?? 'U', 0, 1)) }}
                                            </div>

                                            <div>

                                                <p class="text-sm font-semibold text-slate-800">
                                                    {{ $peminjaman->user->name ?? '-' }}
                                                </p>

                                                <p class="text-[11px] text-slate-400">
                                                    Anggota
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- Buku --}}
                                    <td class="px-6 py-4">

                                        <p class="max-w-xs truncate text-sm font-semibold text-slate-800">
                                            {{ $peminjaman->buku->judul_buku ?? '-' }}
                                        </p>

                                    </td>


                                    {{-- Tanggal --}}
                                    <td class="px-6 py-4">

                                        <p class="text-sm text-slate-600">

                                            {{ $peminjaman->tanggal_pinjam
                                                ? \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y')
                                                : '-'
                                            }}

                                        </p>

                                    </td>


                                    {{-- Status --}}
                                    <td class="px-6 py-4">

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

                                        @elseif ($peminjaman->status === 'menunggu')

                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-3 py-1 text-xs font-bold text-amber-700 ring-1 ring-inset ring-amber-600/20">

                                                <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-amber-500"></span>

                                                Menunggu

                                            </span>

                                        @else

                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-600">

                                                {{ ucfirst($peminjaman->status ?? '-') }}

                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="flex min-h-48 items-center justify-center p-6 text-center">

                    <div>

                        <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-2xl">
                            📋
                        </div>

                        <p class="text-sm font-semibold text-slate-500">
                            Belum ada aktivitas peminjaman.
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            Data peminjaman akan muncul di sini.
                        </p>

                    </div>

                </div>

            @endif

        </div>


        {{-- ========================================================= --}}
        {{-- SYSTEM OVERVIEW --}}
        {{-- ========================================================= --}}
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-green-950 via-green-900 to-emerald-900 p-8 text-white shadow-xl">

            <div class="absolute -right-24 -top-24 h-80 w-80 rounded-full bg-green-400/10 blur-3xl"></div>

            <div class="relative z-10">

                <div class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

                    <div>

                        <p class="text-xs font-bold uppercase tracking-widest text-green-300">
                            SYSTEM OVERVIEW
                        </p>

                        <h2 class="mt-2 text-2xl font-extrabold">
                            Perpustakaan Digital
                        </h2>

                    </div>

                    <div class="inline-flex w-fit items-center gap-2 rounded-full border border-green-400/20 bg-green-400/10 px-4 py-2 text-xs font-semibold text-green-200">

                        <span class="h-2 w-2 rounded-full bg-green-400"></span>

                        Sistem Aktif

                    </div>

                </div>


                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

                    {{-- Institusi --}}
                    <div class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur-sm">

                        <p class="text-xs font-medium text-green-300">
                            Institusi
                        </p>

                        <p class="mt-2 text-sm font-bold">
                            MI Al Falahiyyah Rajeg
                        </p>

                    </div>


                    {{-- Role --}}
                    <div class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur-sm">

                        <p class="text-xs font-medium text-green-300">
                            Role Aktif
                        </p>

                        <p class="mt-2 text-sm font-bold capitalize">
                            {{ auth()->user()->role }}
                        </p>

                    </div>


                    {{-- Status --}}
                    <div class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur-sm">

                        <p class="text-xs font-medium text-green-300">
                            Status Sistem
                        </p>

                        <p class="mt-2 flex items-center gap-2 text-sm font-bold text-green-300">

                            <span class="h-2 w-2 rounded-full bg-green-400"></span>

                            Online

                        </p>

                    </div>


                    {{-- Tahun --}}
                    <div class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur-sm">

                        <p class="text-xs font-medium text-green-300">
                            Tahun Sistem
                        </p>

                        <p class="mt-2 text-sm font-bold">
                            {{ date('Y') }}
                        </p>

                    </div>

                </div>


                {{-- Tips --}}
                <div class="mt-6 rounded-2xl border border-green-400/20 bg-green-400/10 p-5">

                    <p class="text-sm leading-6 text-green-100">

                        💡
                        <span class="font-bold text-white">
                            Tips:
                        </span>

                        Pastikan setiap buku yang dipinjam dicatat dengan baik agar proses pengembalian dan perhitungan denda dapat berjalan secara akurat.

                    </p>

                </div>

            </div>

        </div>

    </div>
</div>


{{-- ========================================================= --}}
{{-- SCRIPT RENDERING CHART.JS --}}
{{-- ========================================================= --}}
<script>

    document.addEventListener("DOMContentLoaded", function () {

        const canvas = document.getElementById('peminjamanChart');

        if (!canvas) {
            return;
        }

        const ctx = canvas.getContext('2d');

        // Gradient Emerald untuk Kurva
        const gradient = ctx.createLinearGradient(0, 0, 0, 320);

        gradient.addColorStop(0, 'rgba(16, 185, 129, 0.45)');
        gradient.addColorStop(1, 'rgba(16, 185, 129, 0.0)');


        new Chart(ctx, {

            type: 'line',

            data: {

                labels: {!! json_encode($bulan ?? ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun']) !!},

                datasets: [{

                    label: 'Jumlah Peminjaman',

                    data: {!! json_encode($jumlahPeminjaman ?? [0, 0, 0, 0, 0, 0]) !!},

                    borderColor: '#10b981',

                    borderWidth: 3.5,

                    fill: true,

                    backgroundColor: gradient,

                    tension: 0.4,

                    pointBackgroundColor: '#047857',

                    pointBorderColor: '#ffffff',

                    pointBorderWidth: 2,

                    pointRadius: 6,

                    pointHoverRadius: 8

                }]

            },


            options: {

                responsive: true,

                maintainAspectRatio: false,

                plugins: {

                    legend: {
                        display: false
                    },

                    tooltip: {

                        backgroundColor: '#0f172a',

                        titleFont: {
                            family: 'Inter',
                            size: 13,
                            weight: 'bold'
                        },

                        bodyFont: {
                            family: 'Inter',
                            size: 12
                        },

                        padding: 12,

                        cornerRadius: 12,

                        displayColors: false

                    }

                },


                scales: {

                    x: {

                        grid: {
                            display: false
                        },

                        ticks: {

                            font: {
                                family: 'Inter',
                                size: 11,
                                weight: '600'
                            },

                            color: '#94a3b8'

                        }

                    },


                    y: {

                        grid: {
                            color: '#f1f5f9'
                        },

                        ticks: {

                            font: {
                                family: 'Inter',
                                size: 11,
                                weight: '600'
                            },

                            color: '#94a3b8',

                            precision: 0

                        },

                        beginAtZero: true

                    }

                }

            }

        });

    });

</script>

@endsection