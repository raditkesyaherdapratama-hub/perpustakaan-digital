@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 px-6 py-8">
    <div class="mx-auto max-w-7xl">

        {{-- ========================================================= --}}
        {{-- HERO USER --}}
        {{-- ========================================================= --}}
        <div class="relative mb-8 overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-950 via-emerald-900 to-green-700 p-8 text-white shadow-xl">
            <div class="absolute -right-20 -top-20 h-72 w-72 rounded-full bg-emerald-400/20 blur-3xl"></div>
            <div class="absolute -bottom-24 right-40 h-72 w-72 rounded-full bg-green-300/10 blur-3xl"></div>

            <div class="relative z-10 flex flex-col justify-between gap-8 md:flex-row md:items-center">
                <div>
                    <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-emerald-400/20 bg-white/10 px-4 py-2 backdrop-blur-sm">
                        <span class="h-2 w-2 rounded-full bg-emerald-300"></span>
                        <span class="text-xs font-semibold tracking-wide text-emerald-100">
                            PORTAL ANGGOTA PERPUSTAKAAN
                        </span>
                    </div>

                    <h1 class="text-3xl font-bold tracking-tight md:text-4xl">
                        Halo, 
                        <span class="text-emerald-300">
                            {{ auth()->user()->name }} 👋
                        </span>
                    </h1>

                    <p class="mt-4 max-w-xl text-sm leading-6 text-emerald-100/80">
                        Selamat datang di Perpustakaan Digital MI Al Falahiyyah Rajeg. Cari buku favoritmu dan ajukan peminjaman secara mandiri dengan cepat.
                    </p>
                </div>

                {{-- ICON --}}
                <div class="hidden md:block">
                    <div class="flex h-28 w-28 items-center justify-center rounded-3xl border border-white/10 bg-white/10 text-6xl shadow-xl backdrop-blur-md">
                        📖
                    </div>
                </div>
            </div>
        </div>

        {{-- ========================================================= --}}
        {{-- MENU UTAMA USER --}}
        {{-- ========================================================= --}}
        <div class="mb-8 grid gap-6 md:grid-cols-2">

            {{-- KOLEKSI BUKU --}}
            <a href="{{ route('buku.index') }}" class="group relative overflow-hidden rounded-3xl border border-emerald-100 bg-white p-7 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-emerald-300 hover:shadow-xl">
                <div class="absolute -right-10 -top-10 h-36 w-36 rounded-full bg-emerald-50 transition-transform duration-500 group-hover:scale-125"></div>

                <div class="relative z-10">
                    <div class="flex items-center justify-between">
                        <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-100 text-3xl text-emerald-700 shadow-sm transition group-hover:bg-emerald-600 group-hover:text-white">
                            📚
                        </div>
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-100 text-slate-400 transition group-hover:bg-emerald-600 group-hover:text-white group-hover:translate-x-1">
                            →
                        </span>
                    </div>

                    <h3 class="mt-6 text-xl font-bold text-slate-900 group-hover:text-emerald-700">
                        Koleksi & Cari Buku
                    </h3>

                    <p class="mt-2 text-sm leading-relaxed text-slate-500">
                        Jelajahi seluruh katalog buku yang tersedia di perpustakaan, cek ketersediaan stok, dan lakukan peminjaman buku secara digital.
                    </p>

                    <div class="mt-6 flex items-center gap-2 text-xs font-semibold text-emerald-600">
                        <span>Lihat Katalog Buku</span>
                        <span>•</span>
                        <span class="underline">Jelajahi Sekarang</span>
                    </div>
                </div>
            </a>

            {{-- RIWAYAT PEMINJAMAN --}}
            <a href="{{ route('user.peminjaman') }}" class="group relative overflow-hidden rounded-3xl border border-green-100 bg-white p-7 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-green-300 hover:shadow-xl">
                <div class="absolute -right-10 -top-10 h-36 w-36 rounded-full bg-green-50 transition-transform duration-500 group-hover:scale-125"></div>

                <div class="relative z-10">
                    <div class="flex items-center justify-between">
                        <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-green-100 text-3xl text-green-700 shadow-sm transition group-hover:bg-green-600 group-hover:text-white">
                            🔖
                        </div>
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-100 text-slate-400 transition group-hover:bg-green-600 group-hover:text-white group-hover:translate-x-1">
                            →
                        </span>
                    </div>

                    <h3 class="mt-6 text-xl font-bold text-slate-900 group-hover:text-green-700">
                        Riwayat Peminjaman Saya
                    </h3>

                    <p class="mt-2 text-sm leading-relaxed text-slate-500">
                        Pantau status peminjaman buku kamu yang sedang aktif, tanggal jatuh tempo pengembalian, serta riwayat pinjaman sebelumnya.
                    </p>

                    <div class="mt-6 flex items-center gap-2 text-xs font-semibold text-green-600">
                        <span>Cek Status & Jatuh Tempo</span>
                        <span>•</span>
                        <span class="underline">Buka Riwayat</span>
                    </div>
                </div>
            </a>

        </div>

        {{-- ========================================================= --}}
        {{-- INFORMASI & TATA TERTIB --}}
        {{-- ========================================================= --}}
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-950 via-emerald-900 to-green-800 p-8 text-white shadow-xl">
            <div class="absolute -right-20 -top-20 h-72 w-72 rounded-full bg-emerald-300/10 blur-3xl"></div>

            <div class="relative z-10 flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                <div class="flex gap-5">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-emerald-400/20 text-2xl backdrop-blur-sm">
                        💡
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">
                            Pengingat Masa Peminjaman
                        </h3>
                        <p class="mt-1 text-sm leading-relaxed text-emerald-100/80">
                            Pastikan kamu mengembalikan buku yang dipinjam tepat waktu sebelum tanggal jatuh tempo untuk menghindari denda keterlambatan dan menjaga kelancaran sirkulasi buku.
                        </p>
                    </div>
                </div>

                <div class="shrink-0">
                    <a href="{{ route('user.peminjaman') }}" class="inline-flex items-center gap-2 rounded-2xl bg-emerald-500 px-5 py-3 text-xs font-bold text-slate-950 shadow-md transition hover:bg-emerald-400">
                        <span>Cek Pinjaman Aktif</span>
                        <span>→</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection