@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-primary-50 px-6 py-8">

    <div class="mx-auto max-w-7xl">

        {{-- HERO --}}
        <div class="relative mb-8 overflow-hidden rounded-3xl bg-gradient-to-br from-primary-900 via-primary-800 to-primary-600 p-8 text-white shadow-2xl">

            {{-- DECORATION --}}
            <div class="absolute -right-16 -top-16 h-64 w-64 rounded-full bg-primary-400/20 blur-3xl"></div>

            <div class="absolute -bottom-20 right-32 h-64 w-64 rounded-full bg-emerald-400/20 blur-3xl"></div>

            <div class="relative z-10 flex flex-col justify-between gap-8 md:flex-row md:items-center">

                <div>

                    <p class="mb-3 text-sm font-medium text-primary-200">
                        SISTEM PERPUSTAKAAN DIGITAL
                    </p>

                    <h1 class="text-3xl font-bold tracking-tight md:text-4xl">
                        Selamat datang,
                        <span class="text-primary-300">
                            {{ auth()->user()->name }} 👋
                        </span>
                    </h1>

                    <p class="mt-4 max-w-xl text-sm leading-6 text-primary-100">
                        Temukan berbagai koleksi buku MI Al Falahiyyah Rajeg
                        dan pantau aktivitas peminjamanmu dengan mudah.
                    </p>

                </div>

                <div class="hidden md:block">

                    <div class="flex h-28 w-28 items-center justify-center rounded-3xl border border-white/20 bg-white/10 text-6xl shadow-xl backdrop-blur-sm">
                        📚
                    </div>

                </div>

            </div>

        </div>


        {{-- STATISTIK --}}
        <div class="mb-8 grid gap-5 md:grid-cols-3">

            {{-- TOTAL BUKU --}}
            <div class="group relative overflow-hidden rounded-2xl border border-primary-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-primary-50"></div>

                <div class="relative">

                    <div class="mb-6 flex items-center justify-between">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary-100 text-2xl transition group-hover:bg-primary-600">
                            📚
                        </div>

                        <span class="text-xs font-medium text-primary-600">
                            KOLEKSI
                        </span>

                    </div>

                    <p class="text-sm font-medium text-slate-500">
                        Total Buku
                    </p>

                    <h2 class="mt-2 text-4xl font-bold text-primary-700">
                        {{ $totalBuku ?? 0 }}
                    </h2>

                    <p class="mt-3 text-xs text-slate-400">
                        Koleksi buku perpustakaan
                    </p>

                </div>

            </div>


            {{-- SEDANG DIPINJAM --}}
            <div class="group relative overflow-hidden rounded-2xl border border-amber-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-amber-50"></div>

                <div class="relative">

                    <div class="mb-6 flex items-center justify-between">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-100 text-2xl transition group-hover:bg-amber-500">
                            📖
                        </div>

                        <span class="text-xs font-medium text-amber-600">
                            AKTIF
                        </span>

                    </div>

                    <p class="text-sm font-medium text-slate-500">
                        Sedang Dipinjam
                    </p>

                    <h2 class="mt-2 text-4xl font-bold text-amber-600">
                        {{ $totalPeminjaman ?? 0 }}
                    </h2>

                    <p class="mt-3 text-xs text-slate-400">
                        Buku yang sedang kamu pinjam
                    </p>

                </div>

            </div>


            {{-- SUDAH DIKEMBALIKAN --}}
            <div class="group relative overflow-hidden rounded-2xl border border-emerald-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-emerald-50"></div>

                <div class="relative">

                    <div class="mb-6 flex items-center justify-between">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 text-2xl transition group-hover:bg-emerald-500">
                            ✅
                        </div>

                        <span class="text-xs font-medium text-emerald-600">
                            SELESAI
                        </span>

                    </div>

                    <p class="text-sm font-medium text-slate-500">
                        Dikembalikan
                    </p>

                    <h2 class="mt-2 text-4xl font-bold text-emerald-600">
                        {{ $totalPengembalian ?? 0 }}
                    </h2>

                    <p class="mt-3 text-xs text-slate-400">
                        Buku yang telah dikembalikan
                    </p>

                </div>

            </div>

        </div>


        {{-- CONTENT GRID --}}
        <div class="grid gap-8 lg:grid-cols-3">


            {{-- AKSI CEPAT --}}
            <div class="rounded-3xl border border-slate-100 bg-white p-6 shadow-sm lg:col-span-1">

                <div class="mb-6">

                    <p class="text-xs font-semibold uppercase tracking-widest text-primary-600">
                        QUICK ACTION
                    </p>

                    <h2 class="mt-2 text-xl font-bold text-slate-800">
                        Aksi Cepat
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Akses fitur perpustakaan
                    </p>

                </div>


                <div class="space-y-3">


                    {{-- CARI BUKU --}}
                    <a
                        href="{{ route('buku.index') }}"
                        class="group flex items-center gap-4 rounded-2xl border border-slate-100 p-4 transition hover:border-primary-200 hover:bg-primary-50"
                    >

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-primary-100 text-2xl transition group-hover:bg-primary-600">
                            📚
                        </div>

                        <div class="flex-1">

                            <p class="font-semibold text-slate-800">
                                Cari Buku
                            </p>

                            <p class="text-xs text-slate-500">
                                Jelajahi koleksi buku
                            </p>

                        </div>

                        <span class="text-slate-400 transition group-hover:text-primary-600">
                            →
                        </span>

                    </a>


                    {{-- PEMINJAMAN --}}
                    <a
                        href="{{ route('user.peminjaman') }}"
                        class="group flex items-center gap-4 rounded-2xl border border-slate-100 p-4 transition hover:border-amber-200 hover:bg-amber-50"
                    >

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100 text-2xl transition group-hover:bg-amber-500">
                            📖
                        </div>

                        <div class="flex-1">

                            <p class="font-semibold text-slate-800">
                                Riwayat Peminjaman
                            </p>

                            <p class="text-xs text-slate-500">
                                Lihat aktivitas peminjaman
                            </p>

                        </div>

                        <span class="text-slate-400 transition group-hover:text-amber-600">
                            →
                        </span>

                    </a>


                    {{-- PROFILE --}}
                    <a
                        href="{{ route('profile.index') }}"
                        class="group flex items-center gap-4 rounded-2xl border border-slate-100 p-4 transition hover:border-emerald-200 hover:bg-emerald-50"
                    >

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 text-2xl transition group-hover:bg-emerald-500">
                            👤
                        </div>

                        <div class="flex-1">

                            <p class="font-semibold text-slate-800">
                                Profil Saya
                            </p>

                            <p class="text-xs text-slate-500">
                                Kelola informasi akun
                            </p>

                        </div>

                        <span class="text-slate-400 transition group-hover:text-emerald-600">
                            →
                        </span>

                    </a>

                </div>

            </div>


            {{-- INFO SISTEM --}}
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-950 via-emerald-900 to-emerald-700 p-8 text-white shadow-xl lg:col-span-2">

                {{-- DECORATION --}}
                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-emerald-400/20"></div>

                <div class="absolute -bottom-16 -left-10 h-32 w-32 rounded-full bg-emerald-300/10"></div>


                <div class="relative z-10">

                    <div class="mb-8 flex items-center justify-between">

                        <div>

                            <p class="text-xs font-bold uppercase tracking-widest text-emerald-300">
                                SYSTEM OVERVIEW
                            </p>

                            <h2 class="mt-2 text-2xl font-extrabold text-white">
                                Perpustakaan Digital
                            </h2>

                        </div>

                        <div class="rounded-full border border-emerald-300/30 bg-emerald-400/20 px-4 py-2 text-xs font-bold text-emerald-100">
                            ● Sistem Aktif
                        </div>

                    </div>


                    <div class="grid gap-6 md:grid-cols-2">


                        {{-- INSTITUSI --}}
                        <div class="rounded-2xl border border-white/15 bg-white/10 p-5">

                            <p class="text-sm font-medium text-emerald-200">
                                Institusi
                            </p>

                            <p class="mt-2 text-lg font-extrabold text-white">
                                MI Al Falahiyyah Rajeg
                            </p>

                        </div>


                        {{-- ROLE --}}
                        <div class="rounded-2xl border border-white/15 bg-white/10 p-5">

                            <p class="text-sm font-medium text-emerald-200">
                                Role Aktif
                            </p>

                            <p class="mt-2 text-lg font-extrabold capitalize text-white">
                                {{ auth()->user()->role }}
                            </p>

                        </div>


                        {{-- STATUS --}}
                        <div class="rounded-2xl border border-white/15 bg-white/10 p-5">

                            <p class="text-sm font-medium text-emerald-200">
                                Status Akun
                            </p>

                            <p class="mt-2 flex items-center gap-2 text-lg font-extrabold text-white">

                                <span class="h-2.5 w-2.5 rounded-full bg-emerald-300"></span>

                                Aktif

                            </p>

                        </div>


                        {{-- TAHUN --}}
                        <div class="rounded-2xl border border-white/15 bg-white/10 p-5">

                            <p class="text-sm font-medium text-emerald-200">
                                Tahun Sistem
                            </p>

                            <p class="mt-2 text-lg font-extrabold text-white">
                                {{ date('Y') }}
                            </p>

                        </div>

                    </div>


                    {{-- TIPS --}}
                    <div class="mt-8 rounded-2xl border border-emerald-300/20 bg-emerald-400/10 p-5">

                        <p class="text-sm font-medium leading-6 text-emerald-50">

                            💡

                            <span class="font-bold">
                                Tips:
                            </span>

                            Jangan lupa mengembalikan buku sesuai dengan
                            tanggal jatuh tempo agar tidak terkena denda.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection