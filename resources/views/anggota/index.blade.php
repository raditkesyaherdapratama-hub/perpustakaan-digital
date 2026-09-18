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
                        MANAJEMEN ADMIN
                    </div>

                    <h1 class="text-3xl font-extrabold tracking-tight md:text-4xl">
                        Kelola Anggota <span class="ml-1">👥</span>
                    </h1>

                    <p class="mt-2 max-w-2xl text-sm leading-6 text-green-100 md:text-base">
                        Kelola data anggota perpustakaan secara mudah, cepat, dan terorganisir.
                    </p>
                </div>

                {{-- BUTTON TAMBAH --}}
                <div class="shrink-0">
                    <a href="{{ route('anggota.create') }}" class="group inline-flex items-center gap-2 rounded-2xl border border-white/20 bg-white/10 px-5 py-3.5 text-xs font-bold text-white backdrop-blur-md transition hover:bg-white/20 hover:scale-105 shadow-inner">
                        <span class="text-base transition duration-300 group-hover:rotate-90">+</span>
                        Tambah Anggota
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

        @if (session('error'))
            <div class="mb-6 flex items-center gap-4 rounded-2xl border border-red-200 bg-red-50/80 px-5 py-4 shadow-sm backdrop-blur-md">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-red-500 text-white shadow-md shadow-red-500/20">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-red-900">Terjadi Kesalahan</p>
                    <p class="mt-0.5 text-xs font-medium text-red-700">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        {{-- ========================================================= --}}
        {{-- STATISTIC CARDS --}}
        {{-- ========================================================= --}}
        <div class="mb-8 grid gap-5 sm:grid-cols-3">

            {{-- CARD 1: DATA ANGGOTA --}}
            <div class="group relative overflow-hidden rounded-3xl border border-slate-100 bg-gradient-to-br from-white via-slate-50/50 to-emerald-50/30 p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-xl hover:shadow-emerald-500/10">
                <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-emerald-400/10 blur-2xl transition-all duration-500 group-hover:scale-150 group-hover:bg-emerald-400/20"></div>
                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold tracking-wide uppercase text-slate-400">Data Anggota</p>
                        <h2 class="mt-1 text-4xl font-black tracking-tight text-emerald-600">
                            {{ $anggotas->total() }}
                        </h2>
                        <p class="mt-2 text-xs text-slate-500">Total anggota terdaftar</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-tr from-emerald-600 to-teal-400 text-white shadow-lg shadow-emerald-500/30 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- CARD 2: STATUS SISTEM --}}
            <div class="group relative overflow-hidden rounded-3xl border border-slate-100 bg-gradient-to-br from-white via-slate-50/50 to-teal-50/30 p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-teal-200 hover:shadow-xl hover:shadow-teal-500/10">
                <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-teal-400/10 blur-2xl transition-all duration-500 group-hover:scale-150 group-hover:bg-teal-400/20"></div>
                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold tracking-wide uppercase text-slate-400">Status Sistem</p>
                        <h2 class="mt-1 text-2xl font-black tracking-tight text-emerald-600">AKTIF</h2>
                        <p class="mt-2 text-xs text-slate-500">Sistem anggota berjalan normal</p>
                    </div>
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-tr from-teal-500 to-emerald-400 text-white shadow-lg shadow-teal-500/30 transition-transform duration-300 group-hover:scale-110 group-hover:-rotate-3">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
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
                    <p class="mt-1 text-xs text-slate-400">Manajemen anggota digital</p>
                </div>
            </div>

        </div>

        {{-- ========================================================= --}}
        {{-- SEARCH BAR --}}
        {{-- ========================================================= --}}
        <div class="mb-6 rounded-3xl border border-slate-100 bg-white p-5 shadow-sm">
            <form action="{{ route('anggota.index') }}" method="GET" class="flex flex-col gap-3 md:flex-row">
                
                {{-- SEARCH INPUT --}}
                <div class="relative flex-1">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email anggota..." class="w-full rounded-2xl border border-slate-200 bg-slate-50/50 py-3.5 pl-11 pr-4 text-sm font-medium text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                </div>

                {{-- SEARCH BUTTON --}}
                <button type="submit" class="rounded-2xl bg-slate-900 px-7 py-3.5 text-xs font-bold text-white shadow-md shadow-slate-900/10 transition duration-300 hover:bg-emerald-700 hover:scale-105">
                    Cari Anggota
                </button>

                {{-- RESET BUTTON --}}
                @if(request('search'))
                    <a href="{{ route('anggota.index') }}" class="inline-flex items-center justify-center rounded-2xl border border-slate-200 bg-white px-6 py-3.5 text-xs font-bold text-slate-600 transition hover:border-red-200 hover:bg-red-50 hover:text-red-600">
                        Reset
                    </a>
                @endif

            </form>
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-extrabold text-slate-900">Daftar Anggota</h2>
                        <p class="mt-0.5 text-xs text-slate-500">Data anggota perpustakaan MI Al Falahiyyah</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 self-start rounded-2xl bg-slate-50 px-4 py-2 ring-1 ring-slate-200/60 md:self-auto">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">TOTAL</span>
                    <span class="font-extrabold text-emerald-700 text-sm">{{ $anggotas->total() }}</span>
                </div>
            </div>

            {{-- TABLE --}}
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50/80 text-xs font-bold uppercase tracking-wider text-slate-500">
                        <tr>
                            <th class="px-6 py-4">#</th>
                            <th class="px-6 py-4">Nama Anggota</th>
                            <th class="px-6 py-4">Email</th>
                            <th class="px-6 py-4">Bergabung</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs font-medium">
                        @forelse ($anggotas as $anggota)
                            <tr class="transition duration-150 hover:bg-emerald-50/30">

                                {{-- NOMOR --}}
                                <td class="px-6 py-4 font-semibold text-slate-400">
                                    {{ $anggotas->firstItem() + $loop->index }}
                                </td>

                                {{-- NAMA --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-tr from-emerald-600 to-teal-400 font-bold text-white shadow-sm">
                                            {{ strtoupper(substr($anggota->name, 0, 1)) }}
                                        </div>
                                        <div class="min-w-0">
                                            <p class="truncate font-bold text-slate-800 text-sm">{{ $anggota->name }}</p>
                                            <p class="text-[11px] text-slate-400">Anggota Perpustakaan</p>
                                        </div>
                                    </div>
                                </td>

                                {{-- EMAIL --}}
                                <td class="px-6 py-4">
                                    <span class="font-medium text-slate-600">{{ $anggota->email }}</span>
                                </td>

                                {{-- TANGGAL BERGABUNG --}}
                                <td class="px-6 py-4">
                                    <div class="inline-flex items-center gap-2 rounded-xl bg-slate-100 px-3 py-1.5 text-slate-600">
                                        <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span class="font-semibold">{{ $anggota->created_at->format('d M Y') }}</span>
                                    </div>
                                </td>

                                {{-- AKSI --}}
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        {{-- DETAIL --}}
                                        <a href="{{ route('anggota.show', $anggota) }}" class="rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-xs font-bold text-slate-600 shadow-sm transition duration-200 hover:border-emerald-200 hover:bg-emerald-50 hover:text-emerald-700">
                                            Detail
                                        </a>

                                        {{-- EDIT --}}
                                        <a href="{{ route('anggota.edit', $anggota) }}" class="rounded-xl border border-emerald-100 bg-emerald-50 px-3.5 py-2 text-xs font-bold text-emerald-700 transition duration-200 hover:bg-emerald-600 hover:text-white">
                                            Edit
                                        </a>

                                        {{-- DELETE --}}
                                        <form action="{{ route('anggota.destroy', $anggota) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
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
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-emerald-50 text-emerald-600 text-3xl">
                                        👥
                                    </div>
                                    <h3 class="mt-4 text-base font-bold text-slate-800">Belum Ada Anggota</h3>
                                    <p class="mt-1 text-xs text-slate-400">Belum terdapat data anggota di perpustakaan.</p>
                                    <a href="{{ route('anggota.create') }}" class="mt-4 inline-flex items-center gap-2 rounded-2xl bg-emerald-600 px-5 py-2.5 text-xs font-bold text-white shadow-md shadow-emerald-600/20 transition hover:bg-emerald-700">
                                        + Tambah Anggota
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            @if($anggotas->hasPages())
                <div class="border-t border-slate-100 bg-slate-50/50 px-6 py-4">
                    {{ $anggotas->links() }}
                </div>
            @endif
        </div>

        {{-- ========================================================= --}}
        {{-- FOOTER INFO --}}
        {{-- ========================================================= --}}
        <div class="mt-6 flex items-center gap-3 rounded-2xl border border-slate-100 bg-white p-4 shadow-sm">
            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 text-sm">
                💡
            </div>
            <p class="text-xs leading-5 text-slate-500">
                Data anggota digunakan untuk mengelola aktivitas perpustakaan. Pastikan informasi anggota selalu diperbarui agar <span class="font-bold text-emerald-700">sistem perpustakaan</span> tetap akurat.
            </p>
        </div>

    </div>
</div>

@endsection