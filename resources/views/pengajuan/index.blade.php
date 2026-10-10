@extends('layouts.app')

@section('title', 'Pengajuan Peminjaman')

@section('content')

{{-- FONT INTER --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="min-h-screen bg-slate-50 px-4 py-6 font-['Inter',sans-serif] sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">

        {{-- ===================================================== --}}
        {{-- HEADER --}}
        {{-- ===================================================== --}}
        <div class="relative mb-6 overflow-hidden rounded-2xl bg-gradient-to-r from-emerald-950 via-emerald-800 to-emerald-600 px-6 py-6 text-white shadow-lg">

            {{-- Decoration --}}
            <div class="absolute -right-16 -top-16 h-52 w-52 rounded-full bg-emerald-400/20 blur-3xl"></div>
            <div class="absolute -bottom-20 right-64 h-48 w-48 rounded-full bg-green-300/10 blur-3xl"></div>

            <div class="relative z-10 flex flex-col justify-between gap-5 md:flex-row md:items-center">

                {{-- Title --}}
                <div>
                    <div class="mb-2 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1.5 text-[10px] font-bold tracking-wider text-emerald-100 backdrop-blur-sm">
                        <span class="relative flex h-1.5 w-1.5">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-amber-400 opacity-75"></span>
                            <span class="relative inline-flex h-1.5 w-1.5 rounded-full bg-amber-400"></span>
                        </span>
                        PERSETUJUAN ADMIN
                    </div>

                    <h1 class="text-2xl font-extrabold tracking-tight sm:text-3xl">
                        Pengajuan Peminjaman Buku
                    </h1>

                    <p class="mt-1.5 max-w-2xl text-xs leading-5 text-emerald-100 sm:text-sm">
                        Kelola dan tinjau pengajuan peminjaman buku dari pengguna.
                    </p>
                </div>

                {{-- Total Pengajuan --}}
                <div class="flex shrink-0 items-center gap-3 rounded-xl border border-white/15 bg-white/10 px-4 py-3 backdrop-blur-md">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-400/20 text-amber-300">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>

                    <div>
                        <p class="text-[10px] font-medium uppercase tracking-wide text-emerald-200">
                            Menunggu Persetujuan
                        </p>

                        <p class="text-lg font-extrabold text-white">
                            {{ $peminjamans->total() ?? 0 }}
                            <span class="text-xs font-semibold text-emerald-100">Pengajuan</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>


        {{-- ===================================================== --}}
        {{-- ALERT SUCCESS --}}
        {{-- ===================================================== --}}
        @if(session('success'))
            <div class="mb-5 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800 shadow-sm">
                <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-sm font-bold text-emerald-600">
                    ✓
                </span>

                <p class="text-xs font-semibold sm:text-sm">
                    {{ session('success') }}
                </p>
            </div>
        @endif


        {{-- ===================================================== --}}
        {{-- ALERT ERROR --}}
        {{-- ===================================================== --}}
        @if(session('error'))
            <div class="mb-5 flex items-center gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-800 shadow-sm">
                <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-red-100 text-sm font-bold text-red-600">
                    ✕
                </span>

                <p class="text-xs font-semibold sm:text-sm">
                    {{ session('error') }}
                </p>
            </div>
        @endif


        {{-- ===================================================== --}}
        {{-- TABLE --}}
        {{-- ===================================================== --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            @if($peminjamans->count())

                {{-- Table Header --}}
                <div class="flex flex-col gap-1 border-b border-slate-100 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-sm font-bold text-slate-800">
                            Daftar Pengajuan
                        </h2>

                        <p class="text-[11px] text-slate-400">
                            Pengajuan yang membutuhkan tindakan admin
                        </p>
                    </div>

                    <div class="text-[11px] font-semibold text-slate-400">
                        Total: {{ $peminjamans->total() }}
                    </div>
                </div>


                {{-- Table --}}
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[1050px] text-left">

                        <thead class="border-b border-slate-100 bg-slate-50">
                            <tr>
                                <th class="px-5 py-3 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                    No
                                </th>

                                <th class="px-5 py-3 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                    Pengguna
                                </th>

                                <th class="px-5 py-3 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                    Buku
                                </th>

                                <th class="px-5 py-3 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                    Tanggal Pinjam
                                </th>

                                <th class="px-5 py-3 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                    Jatuh Tempo
                                </th>

                                <th class="px-5 py-3 text-center text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                    Status
                                </th>

                                <th class="px-5 py-3 text-center text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                    Aksi
                                </th>
                            </tr>
                        </thead>


                        <tbody class="divide-y divide-slate-100">

                            @foreach($peminjamans as $index => $peminjaman)

                                <tr class="transition-colors hover:bg-emerald-50/30">

                                    {{-- No --}}
                                    <td class="px-5 py-4 text-xs font-bold text-slate-400">
                                        {{ $peminjamans->firstItem() + $index }}
                                    </td>


                                    {{-- Pengguna --}}
                                    <td class="px-5 py-4">
                                        <div class="flex items-center gap-3">

                                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-gradient-to-tr from-emerald-600 to-teal-400 text-xs font-bold text-white shadow-sm">
                                                {{ strtoupper(substr($peminjaman->user->name ?? 'U', 0, 1)) }}
                                            </div>

                                            <div class="min-w-0">
                                                <p class="truncate text-xs font-bold text-slate-800">
                                                    {{ $peminjaman->user->name ?? '-' }}
                                                </p>

                                                <p class="truncate text-[10px] text-slate-400">
                                                    {{ $peminjaman->user->email ?? '-' }}
                                                </p>
                                            </div>

                                        </div>
                                    </td>


                                    {{-- Buku --}}
                                    <td class="px-5 py-4">
                                        <div class="max-w-xs">

                                            <p class="truncate text-xs font-bold text-slate-800">
                                                {{ $peminjaman->buku->judul_buku ?? '-' }}
                                            </p>

                                            <p class="mt-0.5 text-[10px] text-slate-400">
                                                Kode:
                                                <span class="font-mono font-semibold text-slate-600">
                                                    {{ $peminjaman->buku->kode_buku ?? '-' }}
                                                </span>
                                            </p>

                                        </div>
                                    </td>


                                    {{-- Tanggal Pinjam --}}
                                    <td class="px-5 py-4">
                                        <p class="text-xs font-medium text-slate-600">
                                            {{ $peminjaman->tanggal_pinjam
                                                ? \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->translatedFormat('d M Y')
                                                : '-'
                                            }}
                                        </p>
                                    </td>


                                    {{-- Jatuh Tempo --}}
                                    <td class="px-5 py-4">
                                        <p class="text-xs font-medium text-slate-600">
                                            {{ $peminjaman->tanggal_jatuh_tempo
                                                ? \Carbon\Carbon::parse($peminjaman->tanggal_jatuh_tempo)->translatedFormat('d M Y')
                                                : '-'
                                            }}
                                        </p>
                                    </td>


                                    {{-- Status --}}
                                    <td class="px-5 py-4 text-center">
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-2.5 py-1 text-[10px] font-bold text-amber-700 ring-1 ring-inset ring-amber-600/20">

                                            <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-amber-500"></span>

                                            Menunggu

                                        </span>
                                    </td>


                                    {{-- Aksi --}}
                                    <td class="px-5 py-4">
                                        <div class="flex items-center justify-center gap-2">

                                            {{-- Setujui --}}
                                            <form action="{{ route('pengajuan.setujui', $peminjaman) }}" method="POST">
                                                @csrf

                                                <button
                                                    type="submit"
                                                    onclick="return confirm('Setujui pengajuan peminjaman ini?')"
                                                    class="inline-flex items-center rounded-lg bg-emerald-600 px-3 py-1.5 text-[10px] font-bold text-white shadow-sm transition hover:bg-emerald-700"
                                                >
                                                    ✓ Setujui
                                                </button>
                                            </form>


                                            {{-- Tolak --}}
                                            <form action="{{ route('pengajuan.tolak', $peminjaman) }}" method="POST">
                                                @csrf

                                                <button
                                                    type="submit"
                                                    onclick="return confirm('Tolak pengajuan peminjaman ini?')"
                                                    class="inline-flex items-center rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-[10px] font-bold text-red-600 transition hover:bg-red-100"
                                                >
                                                    ✕ Tolak
                                                </button>
                                            </form>

                                        </div>
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>
                </div>


                {{-- Pagination --}}
                @if($peminjamans->hasPages())
                    <div class="border-t border-slate-100 bg-slate-50/50 px-5 py-4">
                        {{ $peminjamans->links() }}
                    </div>
                @endif


            @else

                {{-- ================================================= --}}
                {{-- EMPTY STATE --}}
                {{-- ================================================= --}}
                <div class="py-16 text-center">

                    <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-2xl shadow-inner">
                        📋
                    </div>

                    <h3 class="text-sm font-bold text-slate-700">
                        Belum ada pengajuan
                    </h3>

                    <p class="mt-1 text-[11px] text-slate-400">
                        Saat ini belum ada pengajuan peminjaman yang menunggu persetujuan.
                    </p>

                </div>

            @endif

        </div>


        {{-- ===================================================== --}}
        {{-- FOOTER INFO --}}
        {{-- ===================================================== --}}
        <div class="mt-4 flex items-center gap-2 text-[10px] text-slate-400">
            <svg class="h-4 w-4 shrink-0 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z">
                </path>
            </svg>

            <span>
                Setujui pengajuan untuk memproses peminjaman atau tolak jika pengajuan tidak dapat dipenuhi.
            </span>
        </div>

    </div>
</div>

@endsection