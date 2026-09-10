@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 px-4 py-6 sm:px-6 lg:px-8">

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

                    <div class="mb-3 inline-flex items-center rounded-full border border-white/20 bg-white/10 px-4 py-2 text-xs font-semibold tracking-wider text-green-100 backdrop-blur-sm">
                        ADMIN PANEL
                    </div>

                    <h1 class="text-3xl font-extrabold tracking-tight md:text-4xl">
                        Dashboard Perpustakaan
                    </h1>

                    <p class="mt-3 max-w-xl text-sm leading-6 text-green-100 md:text-base">
                        Selamat datang kembali,
                        <span class="font-bold text-white">
                            {{ auth()->user()->name }}
                        </span>
                        👋
                    </p>

                    <p class="mt-2 max-w-2xl text-sm leading-6 text-green-200">
                        Pantau dan kelola seluruh aktivitas perpustakaan
                        MI Al Falahiyyah Rajeg dengan mudah.
                    </p>

                </div>


                {{-- Hero Icon --}}
                <div class="hidden md:flex">

                    <div class="flex h-28 w-28 items-center justify-center rounded-3xl border border-white/20 bg-white/10 text-6xl shadow-2xl backdrop-blur-md">
                        📚
                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- STATISTIK --}}
        {{-- ========================================================= --}}

        <div class="mb-8 grid gap-5 sm:grid-cols-2 xl:grid-cols-4">


            {{-- TOTAL BUKU --}}
            <div class="group relative overflow-hidden rounded-3xl border border-green-100 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-green-200 hover:shadow-xl">

                {{-- Decoration --}}
                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-green-50 transition-transform duration-500 group-hover:scale-125"></div>

                <div class="relative z-10">

                    <div class="mb-6 flex items-center justify-between">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-green-100 text-2xl shadow-sm">
                            📚
                        </div>

                        <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-bold text-green-700">
                            KOLEKSI
                        </span>

                    </div>

                    <p class="text-sm font-medium text-slate-500">
                        Total Buku
                    </p>

                    <h2 class="mt-2 text-4xl font-extrabold tracking-tight text-slate-900">
                        {{ $totalBuku ?? 0 }}
                    </h2>

                    <div class="mt-4 flex items-center gap-2 text-xs font-semibold text-green-600">

                        <span class="flex h-6 w-6 items-center justify-center rounded-full bg-green-100">
                            ✓
                        </span>

                        Buku di perpustakaan

                    </div>

                </div>

            </div>


            {{-- TOTAL ANGGOTA --}}
            <div class="group relative overflow-hidden rounded-3xl border border-emerald-100 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-xl">

                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-emerald-50 transition-transform duration-500 group-hover:scale-125"></div>

                <div class="relative z-10">

                    <div class="mb-6 flex items-center justify-between">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-2xl shadow-sm">
                            👥
                        </div>

                        <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700">
                            ANGGOTA
                        </span>

                    </div>

                    <p class="text-sm font-medium text-slate-500">
                        Total Anggota
                    </p>

                    <h2 class="mt-2 text-4xl font-extrabold tracking-tight text-slate-900">
                        {{ $totalAnggota ?? 0 }}
                    </h2>

                    <div class="mt-4 flex items-center gap-2 text-xs font-semibold text-emerald-600">

                        <span class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-100">
                            ✓
                        </span>

                        Anggota terdaftar

                    </div>

                </div>

            </div>


            {{-- BUKU DIPINJAM --}}
            <div class="group relative overflow-hidden rounded-3xl border border-teal-100 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-teal-200 hover:shadow-xl">

                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-teal-50 transition-transform duration-500 group-hover:scale-125"></div>

                <div class="relative z-10">

                    <div class="mb-6 flex items-center justify-between">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-teal-100 text-2xl shadow-sm">
                            📖
                        </div>

                        <span class="rounded-full bg-teal-50 px-3 py-1 text-xs font-bold text-teal-700">
                            AKTIVITAS
                        </span>

                    </div>

                    <p class="text-sm font-medium text-slate-500">
                        Buku Dipinjam
                    </p>

                    <h2 class="mt-2 text-4xl font-extrabold tracking-tight text-slate-900">
                        {{ $bukuDipinjam ?? 0 }}
                    </h2>

                    <div class="mt-4 flex items-center gap-2 text-xs font-semibold text-teal-600">

                        <span class="flex h-6 w-6 items-center justify-center rounded-full bg-teal-100">
                            ↗
                        </span>

                        Sedang dipinjam

                    </div>

                </div>

            </div>


            {{-- PENGEMBALIAN --}}
            <div class="group relative overflow-hidden rounded-3xl border border-lime-100 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-lime-200 hover:shadow-xl">

                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-lime-50 transition-transform duration-500 group-hover:scale-125"></div>

                <div class="relative z-10">

                    <div class="mb-6 flex items-center justify-between">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-lime-100 text-2xl shadow-sm">
                            🔄
                        </div>

                        <span class="rounded-full bg-lime-50 px-3 py-1 text-xs font-bold text-lime-700">
                            SELESAI
                        </span>

                    </div>

                    <p class="text-sm font-medium text-slate-500">
                        Pengembalian
                    </p>

                    <h2 class="mt-2 text-4xl font-extrabold tracking-tight text-slate-900">
                        {{ $totalPengembalian ?? 0 }}
                    </h2>

                    <div class="mt-4 flex items-center gap-2 text-xs font-semibold text-lime-600">

                        <span class="flex h-6 w-6 items-center justify-center rounded-full bg-lime-100">
                            ✓
                        </span>

                        Buku dikembalikan

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- CONTENT GRID --}}
        {{-- ========================================================= --}}

        <div class="grid gap-6 lg:grid-cols-3">


            {{-- ===================================================== --}}
            {{-- BUKU TERLAMBAT --}}
            {{-- ===================================================== --}}

            <div class="rounded-3xl border border-slate-100 bg-white p-6 shadow-sm">

                <div class="mb-6 flex items-start justify-between">

                    <div>

                        <p class="text-xs font-bold uppercase tracking-widest text-green-600">
                            PERHATIAN
                        </p>

                        <h2 class="mt-2 text-xl font-extrabold text-slate-900">
                            Buku Terlambat ⏰
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Peminjaman yang melewati batas waktu
                        </p>

                    </div>

                    <div class="flex h-10 min-w-10 items-center justify-center rounded-full bg-red-50 px-3 text-sm font-bold text-red-600">

                        {{ $bukuTerlambat ?? 0 }}

                    </div>

                </div>


                @if (($bukuTerlambat ?? 0) > 0)

                    <div class="rounded-2xl border border-red-100 bg-red-50 p-4">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-100 text-lg">
                                ⚠️
                            </div>

                            <div>

                                <p class="text-sm font-bold text-red-700">
                                    Ada buku terlambat
                                </p>

                                <p class="mt-1 text-xs text-red-600">
                                    Segera periksa menu pengembalian.
                                </p>

                            </div>

                        </div>

                    </div>

                @else

                    <div class="rounded-2xl border border-green-100 bg-green-50 p-4">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-green-100 text-lg">
                                ✓
                            </div>

                            <div>

                                <p class="text-sm font-bold text-green-700">
                                    Tidak ada buku terlambat
                                </p>

                                <p class="mt-1 text-xs text-green-600">
                                    Semua peminjaman berjalan dengan baik.
                                </p>

                            </div>

                        </div>

                    </div>

                @endif

            </div>


            {{-- ===================================================== --}}
            {{-- TOTAL DENDA --}}
            {{-- ===================================================== --}}

            <div class="rounded-3xl border border-slate-100 bg-white p-6 shadow-sm">

                <div class="mb-6">

                    <p class="text-xs font-bold uppercase tracking-widest text-green-600">
                        KEUANGAN
                    </p>

                    <h2 class="mt-2 text-xl font-extrabold text-slate-900">
                        Total Denda 💰
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Akumulasi denda keterlambatan
                    </p>

                </div>


                <div class="rounded-2xl bg-gradient-to-br from-red-50 to-orange-50 p-5">

                    <p class="text-xs font-semibold uppercase tracking-wider text-red-500">
                        Total Saat Ini
                    </p>

                    <p class="mt-2 text-3xl font-extrabold text-red-600">
                        Rp {{ number_format($totalDenda ?? 0, 0, ',', '.') }}
                    </p>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- BUKU POPULER --}}
            {{-- ========================================================= --}}

            <div class="rounded-3xl border border-slate-100 bg-white p-6 shadow-sm">

                <div class="mb-5">

                    <p class="text-xs font-bold uppercase tracking-widest text-green-600">
                        STATISTIK
                    </p>

                    <h2 class="mt-2 text-xl font-extrabold text-slate-900">
                        Buku Populer 🔥
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Buku yang paling sering dipinjam
                    </p>

                </div>


                @if (($bukuPopuler ?? collect())->count() > 0)

                    <div class="space-y-3">

                        @foreach ($bukuPopuler as $index => $buku)

                            <div class="flex items-center gap-3 rounded-2xl border border-slate-100 p-3">

                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-green-100 text-sm font-bold text-green-700">
                                    {{ $index + 1 }}
                                </div>

                                <div class="min-w-0 flex-1">

                                    <p class="truncate text-sm font-bold text-slate-800">
                                        {{ $buku->judul_buku }}
                                    </p>

                                    <p class="text-xs text-slate-400">
                                        {{ $buku->peminjaman_count }} kali dipinjam
                                    </p>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="flex min-h-28 items-center justify-center rounded-2xl bg-slate-50">

                        <p class="text-sm text-slate-400">
                            Belum ada data peminjaman.
                        </p>

                    </div>

                @endif

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- PEMINJAMAN TERBARU --}}
        {{-- ========================================================= --}}

        <div class="mt-6 overflow-hidden rounded-3xl border border-slate-100 bg-white shadow-sm">

            {{-- Header --}}
            <div class="flex flex-col justify-between gap-3 border-b border-slate-100 p-6 sm:flex-row sm:items-center">

                <div>

                    <p class="text-xs font-bold uppercase tracking-widest text-green-600">
                        AKTIVITAS
                    </p>

                    <h2 class="mt-2 text-xl font-extrabold text-slate-900">
                        Peminjaman Terbaru 📋
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Aktivitas peminjaman terakhir
                    </p>

                </div>

                <div class="rounded-full bg-green-50 px-4 py-2 text-xs font-semibold text-green-700">
                    {{ ($peminjamanTerbaru ?? collect())->count() }} Aktivitas
                </div>

            </div>


            @if (($peminjamanTerbaru ?? collect())->count() > 0)

                {{-- Table --}}
                <div class="overflow-x-auto">

                    <table class="w-full text-left">

                        <thead class="bg-slate-50">

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


                        <tbody class="divide-y divide-slate-100">

                            @foreach ($peminjamanTerbaru as $peminjaman)

                                <tr class="transition hover:bg-green-50/50">

                                    {{-- Anggota --}}
                                    <td class="px-6 py-4">

                                        <div class="flex items-center gap-3">

                                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-100 font-bold text-green-700">

                                                {{ strtoupper(substr($peminjaman->user->name ?? 'U', 0, 1)) }}

                                            </div>

                                            <div>

                                                <p class="text-sm font-semibold text-slate-800">
                                                    {{ $peminjaman->user->name ?? '-' }}
                                                </p>

                                                <p class="text-xs text-slate-400">
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

                                            <span class="inline-flex items-center rounded-full bg-yellow-50 px-3 py-1 text-xs font-bold text-yellow-700">

                                                <span class="mr-2 h-2 w-2 rounded-full bg-yellow-500"></span>

                                                Dipinjam

                                            </span>

                                        @else

                                            <span class="inline-flex items-center rounded-full bg-green-50 px-3 py-1 text-xs font-bold text-green-700">

                                                <span class="mr-2 h-2 w-2 rounded-full bg-green-500"></span>

                                                {{ ucfirst($peminjaman->status) }}

                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="flex min-h-48 items-center justify-center">

                    <div class="text-center">

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

        <div class="relative mt-6 overflow-hidden rounded-3xl bg-gradient-to-br from-green-950 via-green-900 to-emerald-900 p-8 text-white shadow-xl">

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

                        Pastikan setiap buku yang dipinjam dicatat dengan baik
                        agar proses pengembalian dan perhitungan denda dapat
                        berjalan secara akurat.

                    </p>

                </div>

            </div>

        </div>


    </div>

</div>

@endsection