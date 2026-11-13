
@extends('layouts.app')

@section('title', 'Pengajuan Peminjaman')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="min-h-screen bg-slate-50 px-4 py-7 font-['Inter',sans-serif] sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">

        {{-- HEADER --}}
        <div class="relative mb-7 overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-950 via-emerald-900 to-emerald-700 p-6 text-white shadow-xl shadow-emerald-900/10 sm:p-8">

            <div class="pointer-events-none absolute -right-12 -top-24 h-72 w-72 rounded-full bg-emerald-400/10 blur-3xl"></div>
            <div class="pointer-events-none absolute -bottom-32 right-1/3 h-64 w-64 rounded-full bg-teal-300/10 blur-3xl"></div>

            <div class="relative flex flex-col justify-between gap-7 md:flex-row md:items-center">

                <div>
                    <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3 py-1.5 text-[10px] font-bold tracking-[0.16em] text-emerald-100">
                        <span class="h-2 w-2 rounded-full bg-amber-400"></span>
                        ADMINISTRATION PANEL
                    </div>

                    <h1 class="text-2xl font-extrabold tracking-tight sm:text-3xl lg:text-4xl">
                        Pengajuan Peminjaman
                    </h1>

                    <p class="mt-2 max-w-xl text-xs leading-6 text-emerald-100/80 sm:text-sm">
                        Kelola permohonan peminjaman buku dan berikan persetujuan kepada pengguna dengan mudah.
                    </p>
                </div>

                <div class="flex items-center gap-4 rounded-2xl border border-white/15 bg-white/10 p-4 backdrop-blur-md md:min-w-[220px]">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-400/15 text-amber-300">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>

                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-wider text-emerald-100/70">
                            Menunggu Persetujuan
                        </p>
                        <p class="mt-1 text-2xl font-extrabold">
                            {{ $peminjamans->total() }}
                            <span class="text-xs font-semibold text-emerald-100/70">Pengajuan</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>

        {{-- ALERT SUCCESS --}}
        @if(session('success'))
            <div class="mb-5 flex items-start gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-800">
                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-emerald-100 font-bold">
                    ✓
                </div>
                <div>
                    <p class="text-sm font-bold">Berhasil</p>
                    <p class="mt-0.5 text-xs">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        {{-- ALERT ERROR --}}
        @if(session('error'))
            <div class="mb-5 flex items-start gap-3 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-800">
                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-red-100 font-bold">
                    !
                </div>
                <div>
                    <p class="text-sm font-bold">Terjadi Kesalahan</p>
                    <p class="mt-0.5 text-xs">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        {{-- VALIDATION ERROR --}}
        @if($errors->any())
            <div class="mb-5 rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                <p class="mb-2 font-bold">Periksa kembali filter tanggal:</p>
                <ul class="list-inside list-disc space-y-1 text-xs">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FILTER --}}
        <div class="mb-6 rounded-3xl border border-slate-200/80 bg-white p-5 shadow-sm sm:p-6">

            <div class="mb-5 flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M21 21l-4.3-4.3M19 10.5a8.5 8.5 0 11-17 0 8.5 8.5 0 0117 0z"/>
                    </svg>
                </div>

                <div>
                    <h2 class="text-sm font-bold text-slate-800">Pencarian & Filter Data</h2>
                    <p class="mt-0.5 text-[11px] text-slate-400">
                        Temukan pengajuan berdasarkan informasi pengguna dan tanggal.
                    </p>
                </div>
            </div>

            <form action="{{ route('pengajuan.index') }}" method="GET">
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-4">

                    {{-- SEARCH --}}
                    <div class="lg:col-span-2">
                        <label for="search" class="mb-2 block text-xs font-semibold text-slate-600">
                            Kata pencarian
                        </label>

                        <div class="relative">
                            <svg class="absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-4.3-4.3M19 10.5a8.5 8.5 0 11-17 0 8.5 8.5 0 0117 0z"/>
                            </svg>

                            <input
                                type="text"
                                id="search"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Nama pengguna, judul, kode buku..."
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3 pl-10 pr-4 text-xs text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10"
                            >
                        </div>
                    </div>

                    {{-- DATE FROM --}}
                    <div>
                        <label for="tanggal_dari" class="mb-2 block text-xs font-semibold text-slate-600">
                            Tanggal dari
                        </label>

                        <input
                            type="date"
                            id="tanggal_dari"
                            name="tanggal_dari"
                            value="{{ request('tanggal_dari') }}"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-3 text-xs text-slate-700 outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10"
                        >
                    </div>

                    {{-- DATE TO --}}
                    <div>
                        <label for="tanggal_sampai" class="mb-2 block text-xs font-semibold text-slate-600">
                            Tanggal sampai
                        </label>

                        <input
                            type="date"
                            id="tanggal_sampai"
                            name="tanggal_sampai"
                            value="{{ request('tanggal_sampai') }}"
                            min="{{ request('tanggal_dari') }}"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-3 text-xs text-slate-700 outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10"
                        >
                    </div>
                </div>

                <div class="mt-5 flex flex-wrap items-center gap-2 border-t border-slate-100 pt-5">

                    <button
                        type="submit"
                        class="inline-flex items-center gap-2 rounded-xl bg-emerald-700 px-5 py-3 text-xs font-bold text-white shadow-sm shadow-emerald-700/20 transition hover:bg-emerald-800"
                    >
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.3-4.3M19 10.5a8.5 8.5 0 11-17 0 8.5 8.5 0 0117 0z"/>
                        </svg>
                        Terapkan Filter
                    </button>

                    <a
                        href="{{ route('pengajuan.index') }}"
                        class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-xs font-bold text-slate-600 transition hover:bg-slate-50"
                    >
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h5M20 20v-5h-5M5.6 9A7 7 0 0118 6l2 3M4 15l2 3a7 7 0 0012.4-3"/>
                        </svg>
                        Reset
                    </a>

                    @if(request()->hasAny(['search', 'tanggal_dari', 'tanggal_sampai']))
                        <span class="ml-auto text-[10px] font-medium text-emerald-700">
                            Filter sedang diterapkan
                        </span>
                    @endif
                </div>
            </form>
        </div>

        {{-- TABLE CARD --}}
        <div class="overflow-hidden rounded-3xl border border-slate-200/80 bg-white shadow-sm">

            {{-- TABLE TITLE --}}
            <div class="flex flex-col gap-2 border-b border-slate-100 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                <div>
                    <h2 class="text-sm font-bold text-slate-800">Daftar Pengajuan Buku</h2>
                    <p class="mt-1 text-[11px] text-slate-400">
                        Daftar permohonan yang menunggu tindakan admin.
                    </p>
                </div>

                <div class="inline-flex w-fit items-center gap-2 rounded-full bg-emerald-50 px-3 py-2 text-[10px] font-bold text-emerald-700">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                    {{ $peminjamans->count() }} data ditampilkan
                </div>
            </div>

            @if($peminjamans->count())

                <div class="overflow-x-auto">
                    <table class="w-full min-w-[1000px] text-left">

                        <thead class="bg-slate-50/80">
                            <tr>
                                <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-wider text-slate-400">No</th>
                                <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-wider text-slate-400">Pengguna</th>
                                <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-wider text-slate-400">Informasi Buku</th>
                                <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-wider text-slate-400">Tanggal Pinjam</th>
                                <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-wider text-slate-400">Jatuh Tempo</th>
                                <th class="px-6 py-4 text-center text-[10px] font-bold uppercase tracking-wider text-slate-400">Status</th>
                                <th class="px-6 py-4 text-center text-[10px] font-bold uppercase tracking-wider text-slate-400">Tindakan</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">

                            @foreach($peminjamans as $index => $peminjaman)
                                <tr class="transition duration-150 hover:bg-emerald-50/30">

                                    {{-- NUMBER --}}
                                    <td class="px-6 py-5 text-xs font-semibold text-slate-400">
                                        {{ $peminjamans->firstItem() + $index }}
                                    </td>

                                    {{-- USER --}}
                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-3">
                                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-sm font-extrabold text-emerald-800">
                                                {{ strtoupper(substr($peminjaman->user->name ?? 'U', 0, 1)) }}
                                            </div>

                                            <div class="min-w-0">
                                                <p class="max-w-[180px] truncate text-xs font-bold text-slate-800">
                                                    {{ $peminjaman->user->name ?? '-' }}
                                                </p>
                                                <p class="mt-1 max-w-[180px] truncate text-[10px] text-slate-400">
                                                    {{ $peminjaman->user->email ?? '-' }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- BOOK --}}
                                    <td class="px-6 py-5">
                                        <div class="max-w-[220px]">
                                            <p class="truncate text-xs font-bold text-slate-800">
                                                {{ $peminjaman->buku->judul_buku ?? '-' }}
                                            </p>
                                            <p class="mt-1 text-[10px] text-slate-400">
                                                Kode Buku:
                                                <span class="font-semibold text-slate-600">
                                                    {{ $peminjaman->buku->kode_buku ?? '-' }}
                                                </span>
                                            </p>
                                        </div>
                                    </td>

                                    {{-- LOAN DATE --}}
                                    <td class="px-6 py-5 text-xs font-medium text-slate-600">
                                        {{ $peminjaman->tanggal_pinjam
                                            ? \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->translatedFormat('d M Y')
                                            : '-'
                                        }}
                                    </td>

                                    {{-- DUE DATE --}}
                                    <td class="px-6 py-5 text-xs font-medium text-slate-600">
                                        {{ $peminjaman->tanggal_jatuh_tempo
                                            ? \Carbon\Carbon::parse($peminjaman->tanggal_jatuh_tempo)->translatedFormat('d M Y')
                                            : '-'
                                        }}
                                    </td>

                                    {{-- STATUS --}}
                                    <td class="px-6 py-5 text-center">
                                        <span class="inline-flex items-center gap-1.5 rounded-full border border-amber-200 bg-amber-50 px-3 py-1.5 text-[10px] font-bold text-amber-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                            Menunggu
                                        </span>
                                    </td>

                                    {{-- ACTION --}}
                                    <td class="px-6 py-5">
                                        <div class="flex items-center justify-center gap-2">

                                            <form action="{{ route('pengajuan.setujui', $peminjaman) }}" method="POST">
                                                @csrf
                                                <button
                                                    type="submit"
                                                    onclick="return confirm('Setujui pengajuan peminjaman ini?')"
                                                    class="inline-flex items-center gap-1.5 rounded-lg bg-emerald-600 px-3 py-2 text-[10px] font-bold text-white transition hover:bg-emerald-700"
                                                >
                                                    ✓ Setujui
                                                </button>
                                            </form>

                                            <form action="{{ route('pengajuan.tolak', $peminjaman) }}" method="POST">
                                                @csrf
                                                <button
                                                    type="submit"
                                                    onclick="return confirm('Tolak pengajuan peminjaman ini?')"
                                                    class="inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-white px-3 py-2 text-[10px] font-bold text-red-600 transition hover:bg-red-50"
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

                {{-- PAGINATION --}}
                @if($peminjamans->hasPages())
                    <div class="flex flex-col gap-3 border-t border-slate-100 bg-slate-50/50 px-5 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                        <p class="text-[11px] text-slate-400">
                            Menampilkan
                            <span class="font-bold text-slate-700">{{ $peminjamans->firstItem() }}</span>
                            sampai
                            <span class="font-bold text-slate-700">{{ $peminjamans->lastItem() }}</span>
                            dari
                            <span class="font-bold text-slate-700">{{ $peminjamans->total() }}</span>
                            pengajuan
                        </p>

                        <div>
                            {{ $peminjamans->links() }}
                        </div>
                    </div>
                @endif

            @else

                {{-- EMPTY STATE --}}
                <div class="px-5 py-16 text-center">
                    <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-3xl">
                        📚
                    </div>

                    <h3 class="text-base font-bold text-slate-800">
                        @if(request()->hasAny(['search', 'tanggal_dari', 'tanggal_sampai']))
                            Data tidak ditemukan
                        @else
                            Belum ada pengajuan
                        @endif
                    </h3>

                    <p class="mx-auto mt-2 max-w-sm text-xs leading-6 text-slate-400">
                        @if(request()->hasAny(['search', 'tanggal_dari', 'tanggal_sampai']))
                            Tidak ada pengajuan yang cocok dengan pencarian atau rentang tanggal tersebut. Coba ubah filter.
                        @else
                            Saat ini belum ada permohonan peminjaman buku yang menunggu persetujuan admin.
                        @endif
                    </p>

                    @if(request()->hasAny(['search', 'tanggal_dari', 'tanggal_sampai']))
                        <a
                            href="{{ route('pengajuan.index') }}"
                            class="mt-5 inline-flex items-center rounded-xl bg-emerald-700 px-5 py-2.5 text-xs font-bold text-white transition hover:bg-emerald-800"
                        >
                            Reset Pencarian
                        </a>
                    @endif
                </div>

            @endif
        </div>

        {{-- FOOTER INFO --}}
        <div class="mt-5 flex items-start gap-2 px-1 text-[10px] leading-5 text-slate-400">
            <span class="mt-0.5 text-emerald-600">ⓘ</span>
            <p>
                Periksa data pengguna dan buku sebelum memberikan persetujuan. Stok buku akan berkurang setelah pengajuan disetujui.
            </p>
        </div>

    </div>
</div>

@endsection
