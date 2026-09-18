@extends('layouts.app')

@section('content')

{{-- LOAD FONT INTER KHUSUS HALAMAN INI --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<div class="min-h-screen bg-slate-50 px-4 py-6 font-['Inter',sans-serif] sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">

        {{-- ========================================================= --}}
        {{-- HERO / HEADER FUTURISTIK --}}
        {{-- ========================================================= --}}
        <div class="relative mb-8 overflow-hidden rounded-3xl bg-gradient-to-br from-green-950 via-green-800 to-emerald-700 p-8 text-white shadow-xl">
            {{-- Background Glowing Orbs --}}
            <div class="absolute -right-20 -top-20 h-72 w-72 rounded-full bg-green-400/20 blur-3xl"></div>
            <div class="absolute -bottom-24 right-40 h-64 w-64 rounded-full bg-emerald-300/10 blur-3xl"></div>

            <div class="relative z-10 flex flex-col justify-between gap-6 md:flex-row md:items-center">
                <div>
                    <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-xs font-semibold tracking-wider text-green-100 backdrop-blur-md">
                        <span class="relative flex h-2 w-2">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-400"></span>
                        </span>
                        MANAJEMEN PERPUSTAKAAN
                    </div>

                    <h1 class="text-3xl font-extrabold tracking-tight md:text-4xl">
                        Kelola Kategori <span class="ml-1">🏷️</span>
                    </h1>

                    <p class="mt-2 max-w-2xl text-sm leading-6 text-green-100 md:text-base">
                        Kelola kategori buku agar koleksi perpustakaan lebih terorganisir dan mudah ditemukan.
                    </p>
                </div>

                {{-- BUTTON TAMBAH KATEGORI --}}
                <div class="shrink-0">
                    <a href="{{ route('kategori.create') }}" class="group inline-flex items-center gap-2 rounded-2xl border border-white/20 bg-white/10 px-5 py-3.5 text-xs font-bold text-white backdrop-blur-md transition hover:bg-white/20 hover:scale-105 shadow-inner">
                        <span class="text-base transition duration-300 group-hover:rotate-90">+</span>
                        Tambah Kategori
                    </a>
                </div>
            </div>
        </div>

        {{-- ========================================================= --}}
        {{-- ALERTS --}}
        {{-- ========================================================= --}}
        @if (session('success'))
            <div class="mb-6 flex items-center gap-4 rounded-2xl border border-emerald-200 bg-emerald-50/80 px-5 py-4 shadow-sm backdrop-blur-md">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-500 text-white shadow-md shadow-emerald-500/20">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-emerald-900">Berhasil</p>
                    <p class="mt-0.5 text-xs font-medium text-emerald-700">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        {{-- ========================================================= --}}
        {{-- STATISTIC CARDS --}}
        {{-- ========================================================= --}}
        <div class="mb-8 grid gap-5 sm:grid-cols-3">

            {{-- CARD 1: TOTAL KATEGORI --}}
            <div class="group relative overflow-hidden rounded-3xl border border-slate-100 bg-gradient-to-br from-white via-slate-50/50 to-emerald-50/30 p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-xl hover:shadow-emerald-500/10">
                <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-emerald-400/10 blur-2xl transition-all duration-500 group-hover:scale-150 group-hover:bg-emerald-400/20"></div>
                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold tracking-wide uppercase text-slate-400">Total Kategori</p>
                        <h2 class="mt-1 text-4xl font-black tracking-tight text-emerald-600">
                            {{ $kategoris->count() }}
                        </h2>
                        <p class="mt-2 text-xs text-slate-500">Kategori buku tersedia</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-tr from-emerald-600 to-teal-400 text-white shadow-lg shadow-emerald-500/30 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- CARD 2: STATUS KATEGORI --}}
            <div class="group relative overflow-hidden rounded-3xl border border-slate-100 bg-gradient-to-br from-white via-slate-50/50 to-teal-50/30 p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-teal-200 hover:shadow-xl hover:shadow-teal-500/10">
                <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-teal-400/10 blur-2xl transition-all duration-500 group-hover:scale-150 group-hover:bg-teal-400/20"></div>
                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold tracking-wide uppercase text-slate-400">Status Kategori</p>
                        <h2 class="mt-1 text-2xl font-black tracking-tight text-emerald-600">AKTIF</h2>
                        <p class="mt-2 text-xs text-slate-500">Sistem kategori berjalan</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-tr from-teal-500 to-emerald-400 text-white shadow-lg shadow-teal-500/30 transition-transform duration-300 group-hover:scale-110 group-hover:-rotate-3">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- CARD 3: SYSTEM PERPUS --}}
            <div class="group relative overflow-hidden rounded-3xl bg-slate-900 p-6 text-white shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl">
                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-emerald-500/20 blur-2xl transition-all duration-500 group-hover:scale-150"></div>
                <div class="relative z-10">
                    <div class="mb-4 flex items-center justify-between">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/10 text-emerald-400 backdrop-blur-md ring-1 ring-white/10">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <span class="rounded-full border border-emerald-400/30 bg-emerald-500/10 px-3 py-1 text-[10px] font-bold tracking-wide text-emerald-300">ONLINE</span>
                    </div>
                    <p class="text-xs font-semibold tracking-wide uppercase text-slate-400">Sistem Perpustakaan</p>
                    <h2 class="mt-1 text-xl font-black tracking-tight text-white">MI Al Falahiyyah</h2>
                    <p class="mt-1 text-xs text-slate-400">Sistem perpustakaan digital</p>
                </div>
            </div>

        </div>

        {{-- ========================================================= --}}
        {{-- TABLE CARD --}}
        {{-- ========================================================= --}}
        <div class="overflow-hidden rounded-3xl border border-slate-100 bg-white shadow-sm">

            {{-- TABLE HEADER --}}
            <div class="flex flex-col justify-between gap-4 border-b border-slate-100 p-6 md:flex-row md:items-center">
                <div class="flex items-center gap-3">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 ring-1 ring-inset ring-emerald-600/20">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-extrabold text-slate-900">Daftar Kategori Buku</h2>
                        <p class="mt-0.5 text-xs text-slate-500">Kelola kategori yang digunakan dalam koleksi buku</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 self-start rounded-2xl bg-slate-50 px-4 py-2 ring-1 ring-slate-200/60 md:self-auto">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">TOTAL</span>
                    <span class="font-extrabold text-emerald-700 text-sm">{{ $kategoris->count() }} Kategori</span>
                </div>
            </div>

            {{-- TABLE --}}
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50/80 text-xs font-bold uppercase tracking-wider text-slate-500">
                        <tr>
                            <th class="px-6 py-4">#</th>
                            <th class="px-6 py-4">Nama Kategori</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs font-medium">
                        @forelse($kategoris as $kategori)
                            <tr class="transition duration-150 hover:bg-emerald-50/30">

                                {{-- NOMOR --}}
                                <td class="px-6 py-4 font-semibold text-slate-400">
                                    {{ $loop->iteration }}
                                </td>

                                {{-- NAMA KATEGORI --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-tr from-emerald-600 to-teal-400 font-bold text-white shadow-sm">
                                            🏷️
                                        </div>
                                        <div class="min-w-0">
                                            <p class="truncate font-bold text-slate-800 text-sm">{{ $kategori->nama_kategori }}</p>
                                            <p class="text-[11px] text-slate-400">Kategori koleksi buku</p>
                                        </div>
                                    </div>
                                </td>

                                {{-- STATUS --}}
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700 ring-1 ring-inset ring-emerald-600/20">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Aktif
                                    </span>
                                </td>

                                {{-- AKSI --}}
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        {{-- EDIT --}}
                                        <a href="{{ route('kategori.edit', $kategori) }}" class="rounded-xl border border-emerald-100 bg-emerald-50 px-3.5 py-2 text-xs font-bold text-emerald-700 transition duration-200 hover:bg-emerald-600 hover:text-white">
                                            Edit
                                        </a>

                                        {{-- HAPUS --}}
                                        <form action="{{ route('kategori.destroy', $kategori) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-xl border border-red-100 bg-red-50 px-3.5 py-2 text-xs font-bold text-red-600 transition duration-200 hover:bg-red-600 hover:text-white">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-16 text-center">
                                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-emerald-50 text-emerald-600 text-3xl">
                                        🏷️
                                    </div>
                                    <h3 class="mt-4 text-base font-bold text-slate-800">Belum Ada Kategori</h3>
                                    <p class="mt-1 text-xs text-slate-400">Belum ada kategori buku yang ditambahkan. Tambahkan kategori untuk mengelompokkan koleksi buku.</p>
                                    <a href="{{ route('kategori.create') }}" class="mt-4 inline-flex items-center gap-2 rounded-2xl bg-emerald-600 px-5 py-2.5 text-xs font-bold text-white shadow-md shadow-emerald-600/20 transition hover:bg-emerald-700">
                                        + Tambah Kategori
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection