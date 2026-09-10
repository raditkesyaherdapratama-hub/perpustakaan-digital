@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 px-6 py-8">

    <div class="mx-auto max-w-7xl">

        {{-- ========================================================= --}}
        {{-- HERO --}}
        {{-- ========================================================= --}}
        <div class="relative mb-8 overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-950 via-emerald-900 to-green-700 p-8 text-white shadow-xl">

            {{-- DECORATION --}}
            <div class="absolute -right-20 -top-20 h-72 w-72 rounded-full bg-emerald-400/20 blur-3xl"></div>

            <div class="absolute -bottom-24 right-40 h-72 w-72 rounded-full bg-green-300/10 blur-3xl"></div>

            <div class="relative z-10 flex flex-col justify-between gap-8 md:flex-row md:items-center">

                <div>

                    <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-emerald-400/20 bg-white/10 px-4 py-2 backdrop-blur-sm">

                        <span class="h-2 w-2 rounded-full bg-emerald-300"></span>

                        <span class="text-xs font-semibold tracking-wide text-emerald-100">
                            SISTEM PERPUSTAKAAN DIGITAL
                        </span>

                    </div>

                    <h1 class="text-3xl font-bold tracking-tight md:text-4xl">

                        Selamat datang kembali,

                        <span class="text-emerald-300">
                            {{ auth()->user()->name }} 👋
                        </span>

                    </h1>

                    <p class="mt-4 max-w-xl text-sm leading-6 text-emerald-100/80">

                        Kelola seluruh aktivitas perpustakaan
                        MI Al Falahiyyah Rajeg dengan lebih cepat,
                        mudah, dan terorganisir.

                    </p>

                </div>


                {{-- ICON --}}
                <div class="hidden md:block">

                    <div class="flex h-28 w-28 items-center justify-center rounded-3xl border border-white/10 bg-white/10 text-6xl shadow-xl backdrop-blur-md">

                        📚

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- STATISTIK --}}
        {{-- ========================================================= --}}
        {{-- STATISTIK --}}
<div class="mb-8 grid gap-5 md:grid-cols-3">

    {{-- TOTAL BUKU --}}
    <div class="group relative overflow-hidden rounded-3xl border border-green-100 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-green-200 hover:shadow-xl">

        <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-green-50 transition-transform duration-500 group-hover:scale-125"></div>

        <div class="relative">

            <div class="mb-6 flex items-center justify-between">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-green-100 text-2xl shadow-sm">
                    📚
                </div>

                <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700">
                    KOLEKSI
                </span>

            </div>

            <p class="text-sm font-medium text-slate-500">
                Total Buku
            </p>

            <h2 class="mt-2 text-4xl font-extrabold tracking-tight text-slate-900">
                {{ $totalBuku ?? 0 }}
            </h2>

            <div class="mt-4 flex items-center gap-2 text-xs font-medium text-green-600">
                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-green-100">
                    ✓
                </span>
                Buku tersedia di perpustakaan
            </div>

        </div>

    </div>


    {{-- TOTAL ANGGOTA --}}
    <div class="group relative overflow-hidden rounded-3xl border border-emerald-100 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-xl">

        <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-emerald-50 transition-transform duration-500 group-hover:scale-125"></div>

        <div class="relative">

            <div class="mb-6 flex items-center justify-between">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-2xl shadow-sm">
                    👥
                </div>

                <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                    ANGGOTA
                </span>

            </div>

            <p class="text-sm font-medium text-slate-500">
                Total Anggota
            </p>

            <h2 class="mt-2 text-4xl font-extrabold tracking-tight text-slate-900">
                {{ $totalAnggota ?? 0 }}
            </h2>

            <div class="mt-4 flex items-center gap-2 text-xs font-medium text-emerald-600">
                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-emerald-100">
                    ✓
                </span>
                Anggota terdaftar
            </div>

        </div>

    </div>


    {{-- BUKU DIPINJAM --}}
    <div class="group relative overflow-hidden rounded-3xl border border-teal-100 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-teal-200 hover:shadow-xl">

        <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-teal-50 transition-transform duration-500 group-hover:scale-125"></div>

        <div class="relative">

            <div class="mb-6 flex items-center justify-between">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-teal-100 text-2xl shadow-sm">
                    📖
                </div>

                <span class="rounded-full bg-teal-50 px-3 py-1 text-xs font-semibold text-teal-700">
                    AKTIVITAS
                </span>

            </div>

            <p class="text-sm font-medium text-slate-500">
                Buku Dipinjam
            </p>

            <h2 class="mt-2 text-4xl font-extrabold tracking-tight text-slate-900">
                {{ $totalPeminjaman ?? 0 }}
            </h2>

            <div class="mt-4 flex items-center gap-2 text-xs font-medium text-teal-600">
                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-teal-100">
                    ↗
                </span>
                Sedang dalam proses peminjaman
            </div>

        </div>

    </div>


    {{-- PENGEMBALIAN --}}
    <div class="group relative overflow-hidden rounded-3xl border border-lime-100 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-lime-200 hover:shadow-xl">

        <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-lime-50 transition-transform duration-500 group-hover:scale-125"></div>

        <div class="relative">

            <div class="mb-6 flex items-center justify-between">

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-lime-100 text-2xl shadow-sm">
                    🔄
                </div>

                <span class="rounded-full bg-lime-50 px-3 py-1 text-xs font-semibold text-lime-700">
                    SELESAI
                </span>

            </div>

            <p class="text-sm font-medium text-slate-500">
                Pengembalian
            </p>

            <h2 class="mt-2 text-4xl font-extrabold tracking-tight text-slate-900">
                {{ $totalPengembalian ?? 0 }}
            </h2>

            <div class="mt-4 flex items-center gap-2 text-xs font-medium text-lime-600">
                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-lime-100">
                    ✓
                </span>
                Buku yang telah dikembalikan
            </div>

        </div>

    </div>

</div>

                        <span class="rounded-full bg-lime-50 px-3 py-1 text-[10px] font-bold tracking-wider text-lime-700">

                            SELESAI

                        </span>

                    </div>

                    <p class="text-sm font-medium text-slate-500">
                        Pengembalian
                    </p>

                    <h2 class="mt-2 text-4xl font-extrabold tracking-tight text-slate-900">
                        {{ $totalPengembalian ?? 0 }}
                    </h2>

                    <div class="mt-4 flex items-center gap-2 text-xs text-slate-400">

                        <span class="flex h-5 w-5 items-center justify-center rounded-full bg-lime-100 text-lime-600">
                            ✓
                        </span>

                        Buku telah dikembalikan

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- CONTENT GRID --}}
        {{-- ========================================================= --}}
        <div class="grid gap-8 lg:grid-cols-3">


            {{-- ===================================================== --}}
            {{-- AKSI CEPAT --}}
            {{-- ===================================================== --}}
            <div class="rounded-3xl border border-slate-100 bg-white p-6 shadow-sm lg:col-span-1">

                <div class="mb-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-xs font-bold uppercase tracking-widest text-emerald-600">
                                QUICK ACTION
                            </p>

                            <h2 class="mt-2 text-xl font-bold text-slate-900">
                                Aksi Cepat
                            </h2>

                        </div>

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-lg">
                            ⚡
                        </div>

                    </div>

                    <p class="mt-1 text-sm text-slate-500">
                        Kelola perpustakaan dengan cepat
                    </p>

                </div>


                <div class="space-y-3">


                    {{-- TAMBAH BUKU --}}
                    <a
                        href="{{ route('buku.create') }}"
                        class="group flex items-center gap-4 rounded-2xl border border-slate-100 p-4 transition duration-200 hover:border-emerald-200 hover:bg-emerald-50"
                    >

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 text-xl transition group-hover:bg-emerald-600 group-hover:text-white">

                            ➕

                        </div>

                        <div class="flex-1">

                            <p class="font-semibold text-slate-800">
                                Tambah Buku
                            </p>

                            <p class="text-xs text-slate-500">
                                Tambahkan koleksi baru
                            </p>

                        </div>

                        <span class="text-slate-400 transition group-hover:translate-x-1 group-hover:text-emerald-600">
                            →
                        </span>

                    </a>


                    {{-- KELOLA BUKU --}}
                    <a
                        href="{{ route('buku.index') }}"
                        class="group flex items-center gap-4 rounded-2xl border border-slate-100 p-4 transition duration-200 hover:border-green-200 hover:bg-green-50"
                    >

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-xl transition group-hover:bg-green-600 group-hover:text-white">

                            📚

                        </div>

                        <div class="flex-1">

                            <p class="font-semibold text-slate-800">
                                Kelola Buku
                            </p>

                            <p class="text-xs text-slate-500">
                                Lihat dan kelola koleksi
                            </p>

                        </div>

                        <span class="text-slate-400 transition group-hover:translate-x-1 group-hover:text-green-600">
                            →
                        </span>

                    </a>


                    {{-- PENGEMBALIAN --}}
                    <a
                        href="{{ route('pengembalian.index') }}"
                        class="group flex items-center gap-4 rounded-2xl border border-slate-100 p-4 transition duration-200 hover:border-lime-200 hover:bg-lime-50"
                    >

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-lime-100 text-xl transition group-hover:bg-lime-600 group-hover:text-white">

                            🔄

                        </div>

                        <div class="flex-1">

                            <p class="font-semibold text-slate-800">
                                Pengembalian
                            </p>

                            <p class="text-xs text-slate-500">
                                Kelola pengembalian buku
                            </p>

                        </div>

                        <span class="text-slate-400 transition group-hover:translate-x-1 group-hover:text-lime-600">
                            →
                        </span>

                    </a>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- INFO SISTEM --}}
            {{-- ===================================================== --}}
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-950 via-emerald-900 to-green-800 p-8 text-white shadow-xl lg:col-span-2">

                <div class="absolute -right-20 -top-20 h-72 w-72 rounded-full bg-emerald-300/10 blur-3xl"></div>

                <div class="relative z-10">

                    <div class="mb-8 flex items-center justify-between">

                        <div>

                            <p class="text-xs font-bold uppercase tracking-widest text-emerald-300">
                                SYSTEM OVERVIEW
                            </p>

                            <h2 class="mt-2 text-2xl font-bold">
                                Perpustakaan Digital
                            </h2>

                        </div>

                        <div class="flex items-center gap-2 rounded-full border border-emerald-400/20 bg-white/10 px-4 py-2 text-xs text-emerald-100 backdrop-blur-sm">

                            <span class="h-2 w-2 rounded-full bg-emerald-300"></span>

                            Sistem Aktif

                        </div>

                    </div>


                    <div class="grid gap-4 md:grid-cols-2">


                        {{-- INSTITUSI --}}
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur-sm transition hover:bg-white/10">

                            <p class="text-xs font-medium text-emerald-200/60">
                                INSTITUSI
                            </p>

                            <p class="mt-2 text-lg font-semibold">
                                MI Al Falahiyyah Rajeg
                            </p>

                        </div>


                        {{-- ROLE --}}
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur-sm transition hover:bg-white/10">

                            <p class="text-xs font-medium text-emerald-200/60">
                                ROLE AKTIF
                            </p>

                            <p class="mt-2 text-lg font-semibold capitalize">
                                {{ auth()->user()->role }}
                            </p>

                        </div>


                        {{-- STATUS --}}
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur-sm transition hover:bg-white/10">

                            <p class="text-xs font-medium text-emerald-200/60">
                                STATUS SISTEM
                            </p>

                            <p class="mt-2 flex items-center gap-2 text-lg font-semibold text-emerald-300">

                                <span class="h-2.5 w-2.5 rounded-full bg-emerald-300"></span>

                                Online

                            </p>

                        </div>


                        {{-- TAHUN --}}
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur-sm transition hover:bg-white/10">

                            <p class="text-xs font-medium text-emerald-200/60">
                                TAHUN SISTEM
                            </p>

                            <p class="mt-2 text-lg font-semibold">
                                {{ date('Y') }}
                            </p>

                        </div>

                    </div>


                    {{-- TIPS --}}
                    <div class="mt-6 flex gap-4 rounded-2xl border border-emerald-300/10 bg-emerald-400/10 p-5">

                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-300/10 text-lg">
                            💡
                        </div>

                        <p class="text-sm leading-6 text-emerald-50/80">

                            <span class="font-semibold text-white">
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

</div>

@endsection