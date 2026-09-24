@extends('layouts.app')

@section('content')

{{-- LOAD FONT INTER KHUSUS HALAMAN INI --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<div class="min-h-screen bg-slate-50 px-4 py-6 font-['Inter',sans-serif] sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">

        {{-- ========================================================= --}}
        {{-- HEADER --}}
        {{-- ========================================================= --}}
        <div class="relative mb-8 overflow-hidden rounded-3xl bg-gradient-to-br from-green-950 via-green-800 to-emerald-700 p-8 text-white shadow-xl">
            {{-- Background Decoration --}}
            <div class="absolute -right-20 -top-20 h-72 w-72 rounded-full bg-green-400/20 blur-3xl"></div>
            <div class="absolute -bottom-24 right-40 h-64 w-64 rounded-full bg-emerald-300/10 blur-3xl"></div>

            <div class="relative z-10 flex flex-col justify-between gap-6 md:flex-row md:items-center">
                <div>
                    <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-xs font-semibold tracking-wider text-green-100 backdrop-blur-sm">
                        <span class="relative flex h-2 w-2">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-400"></span>
                        </span>
                        AKTIVITAS PERPUSTAKAAN
                    </div>

                    <h1 class="text-3xl font-extrabold tracking-tight md:text-4xl">
                        Data Peminjaman Buku
                    </h1>

                    <p class="mt-2 max-w-xl text-sm leading-6 text-green-100 md:text-base">
                        Kelola dan pantau daftar buku yang sedang dipinjam oleh para anggota dengan mudah dan akurat.
                    </p>
                </div>

                {{-- Quick Stats Badge --}}
                <div class="flex items-center gap-3 rounded-2xl border border-white/20 bg-white/10 p-4 backdrop-blur-md">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/10 text-emerald-300">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-green-200">Total Ditampilkan</p>
                        <p class="text-xl font-black text-white">{{ $peminjamans->total() ?? ($peminjamans->count() ?? 0) }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ========================================================= --}}
        {{-- ALERT NOTIFICATION --}}
        {{-- ========================================================= --}}
        @if(session('success'))
            <div class="mb-6 flex items-center gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-emerald-800 shadow-sm">
                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600 font-bold">✓</span>
                <p class="text-sm font-semibold">{{ session('success') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 flex items-center gap-3 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-red-800 shadow-sm">
                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-600 font-bold">✕</span>
                <p class="text-sm font-semibold">{{ session('error') }}</p>
            </div>
        @endif

        {{-- ========================================================= --}}
        {{-- TABLE SECTION --}}
        {{-- ========================================================= --}}
        <div class="overflow-hidden rounded-3xl border border-slate-100 bg-white shadow-sm">
            
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50/80 border-b border-slate-100">
                        <tr>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">No</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">Peminjam</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">Buku</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">Tanggal Pinjam</th>
                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">Jatuh Tempo</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-500">Status</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100 text-xs font-medium">
                        @forelse($peminjamans as $index => $peminjaman)
                            <tr class="transition hover:bg-emerald-50/30">
                                {{-- NO --}}
                                <td class="px-6 py-4 text-slate-500 font-bold">
                                    {{ method_exists($peminjamans, 'firstItem') ? $peminjamans->firstItem() + $index : $index + 1 }}
                                </td>

                                {{-- PEMINJAM --}}
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
                                                {{ $peminjaman->user->email ?? '-' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                {{-- BUKU --}}
                                <td class="px-6 py-4">
                                    <p class="max-w-xs truncate text-sm font-semibold text-slate-800">
                                        {{ $peminjaman->buku->judul_buku ?? '-' }}
                                    </p>
                                    <p class="text-[11px] text-slate-400">
                                        Kode: <span class="font-mono text-slate-600">{{ $peminjaman->buku->kode_buku ?? '-' }}</span>
                                    </p>
                                </td>

                                {{-- TANGGAL PINJAM --}}
                                <td class="px-6 py-4">
                                    <p class="text-sm text-slate-600">
                                        {{ $peminjaman->tanggal_pinjam ? \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->translatedFormat('d M Y') : '-' }}
                                    </p>
                                </td>

                                {{-- JATUH TEMPO --}}
                                <td class="px-6 py-4">
                                    @php
                                        $jatuhTempo = $peminjaman->tanggal_jatuh_tempo ? \Carbon\Carbon::parse($peminjaman->tanggal_jatuh_tempo) : null;
                                        $terlambat = $jatuhTempo && $jatuhTempo->isPast();
                                    @endphp

                                    <p class="text-sm {{ $terlambat ? 'text-red-600 font-bold' : 'text-slate-600' }}">
                                        {{ $jatuhTempo ? $jatuhTempo->translatedFormat('d M Y') : '-' }}
                                    </p>

                                    @if($terlambat)
                                        <span class="mt-1 inline-flex items-center gap-1 text-[11px] font-bold text-red-500">
                                            <span class="h-1.5 w-1.5 rounded-full bg-red-500 animate-ping"></span> Terlambat
                                        </span>
                                    @endif
                                </td>

                                {{-- STATUS --}}
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700 ring-1 ring-inset ring-blue-600/20">
                                        <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span> Dipinjam
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center">
                                    <div class="mx-auto mb-3 flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-3xl shadow-inner">
                                        📚
                                    </div>
                                    <h3 class="text-base font-bold text-slate-700">Belum ada peminjaman</h3>
                                    <p class="mt-1 text-xs text-slate-400">Saat ini belum ada buku yang sedang dipinjam oleh pengguna.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- ========================================================= --}}
            {{-- PAGINATION SECTION --}}
            {{-- ========================================================= --}}
            @if(method_exists($peminjamans, 'hasPages') && $peminjamans->hasPages())
                <div class="border-t border-slate-100 bg-slate-50/50 px-6 py-4">
                    {{ $peminjamans->links() }}
                </div>
            @endif

        </div>

    </div>
</div>

@endsection