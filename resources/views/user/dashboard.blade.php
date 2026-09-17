@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 px-4 py-6 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">

        {{-- ========================================================= --}}
        {{-- HERO SECTION --}}
        {{-- ========================================================= --}}
        <div class="relative mb-8 overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-950 via-emerald-900 to-teal-800 p-8 text-white shadow-xl">
            {{-- Decorative Light Blurs --}}
            <div class="absolute -right-16 -top-16 h-72 w-72 rounded-full bg-emerald-400/20 blur-3xl"></div>
            <div class="absolute -bottom-20 right-32 h-72 w-72 rounded-full bg-teal-300/10 blur-3xl"></div>

            <div class="relative z-10 flex flex-col justify-between gap-8 md:flex-row md:items-center">
                <div>
                    <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-emerald-400/20 bg-white/10 px-4 py-1.5 backdrop-blur-sm">
                        <span class="h-2 w-2 rounded-full bg-emerald-300 animate-pulse"></span>
                        <span class="text-xs font-semibold tracking-wider text-emerald-100 uppercase">
                            Sistem Perpustakaan Digital
                        </span>
                    </div>

                    <h1 class="text-3xl font-extrabold tracking-tight md:text-4xl">
                        Selamat datang,
                        <span class="text-emerald-300">
                            {{ auth()->user()->name }} 👋
                        </span>
                    </h1>

                    <p class="mt-3 max-w-xl text-sm leading-6 text-emerald-100/90 md:text-base">
                        Temukan berbagai koleksi buku MI Al Falahiyyah Rajeg dan pantau aktivitas peminjamanmu secara mandiri dengan mudah.
                    </p>
                </div>

                {{-- Hero Floating Icon --}}
                <div class="hidden md:flex">
                    <div class="relative flex h-28 w-28 items-center justify-center rounded-3xl border border-white/20 bg-white/10 text-emerald-300 shadow-2xl backdrop-blur-md transition-transform duration-500 hover:rotate-6 hover:scale-105">
                        <svg class="h-14 w-14 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- ========================================================= --}}
        {{-- STATISTIK USER --}}
        {{-- ========================================================= --}}
        <div class="mb-8 grid gap-5 md:grid-cols-3">

            {{-- TOTAL BUKU --}}
            <div class="group relative overflow-hidden rounded-3xl border border-slate-100 bg-gradient-to-br from-white via-slate-50/50 to-teal-50/30 p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-teal-200 hover:shadow-xl hover:shadow-teal-500/10">
                <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-teal-400/10 blur-2xl transition-all duration-500 group-hover:scale-150 group-hover:bg-teal-400/20"></div>

                <div class="relative z-10">
                    <div class="mb-6 flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-teal-50 text-teal-600 shadow-inner transition-transform duration-300 group-hover:scale-110 group-hover:bg-teal-600 group-hover:text-white">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <span class="rounded-full bg-teal-100/80 px-3 py-1 text-xs font-bold tracking-wide text-teal-700">
                            KOLEKSI
                        </span>
                    </div>

                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Total Buku
                    </p>
                    <h2 class="mt-1 text-4xl font-extrabold tracking-tight text-slate-900 group-hover:text-teal-700 transition-colors">
                        {{ $totalBuku ?? 0 }}
                    </h2>
                    <p class="mt-3 text-xs font-medium text-slate-500">
                        Koleksi siap dipinjam
                    </p>
                </div>
            </div>

            {{-- SEDANG DIPINJAM --}}
            <div class="group relative overflow-hidden rounded-3xl border border-slate-100 bg-gradient-to-br from-white via-slate-50/50 to-amber-50/30 p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-amber-200 hover:shadow-xl hover:shadow-amber-500/10">
                <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-amber-400/10 blur-2xl transition-all duration-500 group-hover:scale-150 group-hover:bg-amber-400/20"></div>

                <div class="relative z-10">
                    <div class="mb-6 flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-50 text-amber-600 shadow-inner transition-transform duration-300 group-hover:scale-110 group-hover:bg-amber-500 group-hover:text-white">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="rounded-full bg-amber-100/80 px-3 py-1 text-xs font-bold tracking-wide text-amber-700">
                            AKTIF
                        </span>
                    </div>

                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Sedang Dipinjam
                    </p>
                    <h2 class="mt-1 text-4xl font-extrabold tracking-tight text-slate-900 group-hover:text-amber-600 transition-colors">
                        {{ $totalPeminjaman ?? 0 }}
                    </h2>
                    <p class="mt-3 text-xs font-medium text-slate-500">
                        Buku yang sedang kamu bawa
                    </p>
                </div>
            </div>

            {{-- SUDAH DIKEMBALIKAN --}}
            <div class="group relative overflow-hidden rounded-3xl border border-slate-100 bg-gradient-to-br from-white via-slate-50/50 to-emerald-50/30 p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-xl hover:shadow-emerald-500/10">
                <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-emerald-400/10 blur-2xl transition-all duration-500 group-hover:scale-150 group-hover:bg-emerald-400/20"></div>

                <div class="relative z-10">
                    <div class="mb-6 flex items-center justify-between">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 shadow-inner transition-transform duration-300 group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="rounded-full bg-emerald-100/80 px-3 py-1 text-xs font-bold tracking-wide text-emerald-700">
                            SELESAI
                        </span>
                    </div>

                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Dikembalikan
                    </p>
                    <h2 class="mt-1 text-4xl font-extrabold tracking-tight text-slate-900 group-hover:text-emerald-600 transition-colors">
                        {{ $totalPengembalian ?? 0 }}
                    </h2>
                    <p class="mt-3 text-xs font-medium text-slate-500">
                        Buku yang telah dikembalikan
                    </p>
                </div>
            </div>

        </div>

        {{-- ========================================================= --}}
        {{-- CONTENT GRID --}}
        {{-- ========================================================= --}}
        <div class="grid gap-8 lg:grid-cols-3">

            {{-- AKSI CEPAT --}}
            <div class="rounded-3xl border border-slate-100 bg-white p-6 shadow-sm lg:col-span-1">
                <div class="mb-6">
                    <p class="text-xs font-bold uppercase tracking-widest text-emerald-600">
                        QUICK ACTION
                    </p>
                    <h2 class="mt-1 text-xl font-extrabold text-slate-900">
                        Aksi Cepat
                    </h2>
                    <p class="mt-1 text-xs text-slate-500">
                        Akses pintas fitur utama perpustakaan
                    </p>
                </div>

                <div class="space-y-3.5">
                    {{-- CARI BUKU --}}
                    <a href="{{ route('buku.index') }}" class="group flex items-center gap-4 rounded-2xl border border-slate-100 bg-slate-50/50 p-4 transition-all duration-300 hover:border-emerald-200 hover:bg-emerald-50/60 hover:shadow-md">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white text-emerald-600 shadow-sm transition-colors group-hover:bg-emerald-600 group-hover:text-white">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-bold text-slate-900 group-hover:text-emerald-700 transition-colors">
                                Cari Buku
                            </p>
                            <p class="text-xs text-slate-500 truncate">
                                Jelajahi katalog buku
                            </p>
                        </div>
                        <span class="text-slate-400 transition-transform duration-300 group-hover:translate-x-1 group-hover:text-emerald-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </span>
                    </a>

                    {{-- RIWAYAT PEMINJAMAN --}}
                    <a href="{{ route('user.peminjaman') }}" class="group flex items-center gap-4 rounded-2xl border border-slate-100 bg-slate-50/50 p-4 transition-all duration-300 hover:border-amber-200 hover:bg-amber-50/60 hover:shadow-md">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white text-amber-600 shadow-sm transition-colors group-hover:bg-amber-500 group-hover:text-white">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-bold text-slate-900 group-hover:text-amber-700 transition-colors">
                                Riwayat Peminjaman
                            </p>
                            <p class="text-xs text-slate-500 truncate">
                                Cek status peminjaman
                            </p>
                        </div>
                        <span class="text-slate-400 transition-transform duration-300 group-hover:translate-x-1 group-hover:text-amber-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </span>
                    </a>

                    {{-- PROFIL --}}
                    <a href="{{ route('profile.index') }}" class="group flex items-center gap-4 rounded-2xl border border-slate-100 bg-slate-50/50 p-4 transition-all duration-300 hover:border-indigo-200 hover:bg-indigo-50/60 hover:shadow-md">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white text-indigo-600 shadow-sm transition-colors group-hover:bg-indigo-600 group-hover:text-white">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-bold text-slate-900 group-hover:text-indigo-700 transition-colors">
                                Profil Saya
                            </p>
                            <p class="text-xs text-slate-500 truncate">
                                Kelola informasi akun
                            </p>
                        </div>
                        <span class="text-slate-400 transition-transform duration-300 group-hover:translate-x-1 group-hover:text-indigo-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>

            {{-- INFO SISTEM --}}
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-950 via-emerald-900 to-green-800 p-8 text-white shadow-xl lg:col-span-2">
                <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-emerald-400/10 blur-2xl"></div>
                <div class="absolute -bottom-16 -left-10 h-40 w-40 rounded-full bg-green-300/10 blur-2xl"></div>

                <div class="relative z-10">
                    <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-widest text-emerald-300">
                                SYSTEM OVERVIEW
                            </p>
                            <h2 class="mt-1 text-2xl font-extrabold text-white">
                                Informasi Akun & Sistem
                            </h2>
                        </div>
                        <div class="inline-flex items-center gap-2 rounded-full border border-emerald-300/20 bg-emerald-400/10 px-4 py-1.5 text-xs font-semibold text-emerald-200 backdrop-blur-sm">
                            <span class="h-2 w-2 rounded-full bg-emerald-400 animate-ping"></span>
                            Sistem Aktif
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        {{-- INSTITUSI --}}
                        <div class="rounded-2xl border border-white/10 bg-white/10 p-5 backdrop-blur-sm">
                            <p class="text-xs font-medium text-emerald-200/80">
                                Institusi
                            </p>
                            <p class="mt-1 text-base font-extrabold text-white">
                                MI Al Falahiyyah Rajeg
                            </p>
                        </div>

                        {{-- ROLE --}}
                        <div class="rounded-2xl border border-white/10 bg-white/10 p-5 backdrop-blur-sm">
                            <p class="text-xs font-medium text-emerald-200/80">
                                Peran / Role
                            </p>
                            <p class="mt-1 text-base font-extrabold capitalize text-white">
                                {{ auth()->user()->role ?? 'Anggota' }}
                            </p>
                        </div>

                        {{-- STATUS AKUN --}}
                        <div class="rounded-2xl border border-white/10 bg-white/10 p-5 backdrop-blur-sm">
                            <p class="text-xs font-medium text-emerald-200/80">
                                Status Akun
                            </p>
                            <p class="mt-1 inline-flex items-center gap-2 text-base font-extrabold text-white">
                                <span class="h-2.5 w-2.5 rounded-full bg-emerald-400"></span>
                                Aktif
                            </p>
                        </div>

                        {{-- TAHUN --}}
                        <div class="rounded-2xl border border-white/10 bg-white/10 p-5 backdrop-blur-sm">
                            <p class="text-xs font-medium text-emerald-200/80">
                                Tahun Operasional
                            </p>
                            <p class="mt-1 text-base font-extrabold text-white">
                                {{ date('Y') }}
                            </p>
                        </div>
                    </div>

                    {{-- TIPS FOOTER --}}
                    <div class="mt-6 flex items-start gap-3 rounded-2xl border border-emerald-300/20 bg-emerald-400/10 p-4 backdrop-blur-sm">
                        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-emerald-400/20 text-emerald-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <p class="text-xs leading-relaxed text-emerald-100/90">
                            <span class="font-bold text-white">Tips Peminjaman:</span> Harap perhatikan tanggal jatuh tempo peminjaman buku kamu agar tidak dikenakan denda keterlambatan.
                        </p>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
@endsection