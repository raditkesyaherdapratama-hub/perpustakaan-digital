
@extends('layouts.app')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="min-h-screen bg-slate-50 px-4 py-6 font-['Inter',sans-serif] sm:px-6 lg:px-8">
    <div class="mx-auto w-full max-w-7xl">

        {{-- HEADER --}}
        <div class="mb-7 overflow-hidden rounded-2xl bg-gradient-to-r from-emerald-900 via-emerald-800 to-emerald-700 shadow-lg">
            <div class="flex flex-col gap-6 px-6 py-7 sm:px-8 md:flex-row md:items-center md:justify-between">
                <div>
                    <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3 py-1.5 text-[10px] font-semibold uppercase tracking-wider text-emerald-100">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-300"></span>
                        Aktivitas Perpustakaan
                    </div>

                    <h1 class="text-2xl font-extrabold tracking-tight text-white sm:text-3xl">
                        Data Peminjaman Buku
                    </h1>

                    <p class="mt-2 max-w-xl text-sm leading-6 text-emerald-100">
                        Kelola pengambilan buku dan pantau peminjaman aktif anggota.
                    </p>
                </div>

                <div class="flex w-fit items-center gap-3 rounded-xl border border-white/15 bg-white/10 px-4 py-3 backdrop-blur-md">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-white/10 text-emerald-200">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-medium uppercase tracking-wider text-emerald-200">
                            Total Ditampilkan
                        </p>
                        <p class="mt-0.5 text-lg font-extrabold text-white">
                            {{ $peminjamans->total() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- NOTIFIKASI BERHASIL --}}
        @if(session('success'))
            <div class="mb-5 flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3.5">
                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-emerald-500 text-sm font-bold text-white">✓</div>
                <div>
                    <p class="text-xs font-bold text-emerald-900">Berhasil</p>
                    <p class="mt-0.5 text-xs text-emerald-700">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        {{-- NOTIFIKASI ERROR --}}
        @if(session('error'))
            <div class="mb-5 flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-3.5">
                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-red-500 text-sm font-bold text-white">✕</div>
                <div>
                    <p class="text-xs font-bold text-red-900">Terjadi Kesalahan</p>
                    <p class="mt-0.5 text-xs text-red-700">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        {{-- NOTIFIKASI VALIDASI --}}
        @if($errors->any())
            <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3.5">
                <p class="text-xs font-bold text-red-900">Periksa kembali filter tanggal.</p>
                @foreach($errors->all() as $error)
                    <p class="mt-1 text-xs text-red-700">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        {{-- FILTER PEMINJAMAN --}}
        <div class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- HEADER FILTER --}}
            <div class="flex items-center gap-3 border-b border-slate-100 px-5 py-4 sm:px-6">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2l-7 8v5l-4 2v-7L3 6V4z"/>
                    </svg>
                </div>

                <div>
                    <h2 class="text-sm font-bold text-slate-800">Filter Peminjaman</h2>
                    <p class="mt-1 text-xs text-slate-500">
                        Temukan data berdasarkan kata kunci, status, dan tanggal.
                    </p>
                </div>
            </div>

            {{-- FORM FILTER --}}
            <form action="{{ url()->current() }}" method="GET" class="p-5 sm:p-6">

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-12">

                    {{-- PENCARIAN --}}
                    <div class="sm:col-span-2 xl:col-span-5">
                        <label for="search" class="mb-2 block text-xs font-semibold text-slate-600">
                            Cari Peminjam atau Buku
                        </label>

                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <circle cx="11" cy="11" r="7" stroke-width="2"/>
                                    <path stroke-linecap="round" stroke-width="2" d="m16 16 4 4"/>
                                </svg>
                            </div>

                            <input
                                type="text"
                                id="search"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Nama, email, judul, atau kode buku..."
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3 pl-10 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-100"
                            >
                        </div>
                    </div>

                    {{-- STATUS --}}
                    <div class="xl:col-span-3">
                        <label for="status" class="mb-2 block text-xs font-semibold text-slate-600">
                            Status Peminjaman
                        </label>

                        <select
                            id="status"
                            name="status"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-100"
                        >
                            <option value="">Semua Status</option>
                            <option value="menunggu_diambil" @selected(request('status') === 'menunggu_diambil')>
                                Menunggu Diambil
                            </option>
                            <option value="dipinjam" @selected(request('status') === 'dipinjam')>
                                Dipinjam
                            </option>
                        </select>
                    </div>

                    {{-- TANGGAL MULAI --}}
                    <div class="xl:col-span-2">
                        <label for="tanggal_dari" class="mb-2 block text-xs font-semibold text-slate-600">
                            Tanggal Mulai
                        </label>

                        <input
                            type="date"
                            id="tanggal_dari"
                            name="tanggal_dari"
                            value="{{ request('tanggal_dari') }}"
                            class="w-full min-w-0 rounded-xl border border-slate-200 bg-slate-50 px-3 py-3 text-sm text-slate-700 outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-100"
                        >
                    </div>

                    {{-- TANGGAL AKHIR --}}
                    <div class="xl:col-span-2">
                        <label for="tanggal_sampai" class="mb-2 block text-xs font-semibold text-slate-600">
                            Sampai Tanggal
                        </label>

                        <input
                            type="date"
                            id="tanggal_sampai"
                            name="tanggal_sampai"
                            value="{{ request('tanggal_sampai') }}"
                            min="{{ request('tanggal_dari') }}"
                            class="w-full min-w-0 rounded-xl border border-slate-200 bg-slate-50 px-3 py-3 text-sm text-slate-700 outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-100"
                        >
                    </div>

                </div>

                {{-- FOOTER FILTER --}}
                <div class="mt-5 flex items-center justify-end gap-2 border-t border-slate-100 pt-5">

                    <a
                        href="{{ url()->current() }}"
                        class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-xs font-semibold text-slate-600 transition hover:border-slate-300 hover:bg-slate-50"
                    >
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h5M5 9a8 8 0 101.5-4.5L4 9"/>
                        </svg>
                        Reset
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-700 px-5 py-2.5 text-xs font-bold text-white shadow-sm transition hover:bg-emerald-800 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2"
                    >
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2l-7 8v5l-4 2v-7L3 6V4z"/>
                        </svg>
                        Terapkan Filter
                    </button>

                </div>
            </form>
        </div>

        {{-- TABEL PEMINJAMAN --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="flex flex-col gap-3 border-b border-slate-200 px-5 py-5 sm:px-6 md:flex-row md:items-center md:justify-between">
                <div>
                    <h2 class="text-base font-bold text-slate-900">Daftar Peminjaman</h2>
                    <p class="mt-1 text-xs text-slate-500">
                        Konfirmasi setelah buku benar-benar diserahkan kepada anggota.
                    </p>
                </div>

                <div class="inline-flex w-fit items-center rounded-lg bg-emerald-50 px-3 py-2 text-[10px] font-bold uppercase tracking-wider text-emerald-700">
                    <span class="mr-2 h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                    Peminjaman Aktif
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[1100px] text-left">
                    <thead class="border-b border-slate-200 bg-slate-50">
                        <tr>
                            <th class="w-16 px-5 py-3.5 text-[10px] font-bold uppercase tracking-wider text-slate-500 sm:px-6">No</th>
                            <th class="px-5 py-3.5 text-[10px] font-bold uppercase tracking-wider text-slate-500">Peminjam</th>
                            <th class="px-5 py-3.5 text-[10px] font-bold uppercase tracking-wider text-slate-500">Buku</th>
                            <th class="px-5 py-3.5 text-[10px] font-bold uppercase tracking-wider text-slate-500">Tanggal Pinjam</th>
                            <th class="px-5 py-3.5 text-[10px] font-bold uppercase tracking-wider text-slate-500">Jatuh Tempo / Batas Pengambilan</th>
                            <th class="px-5 py-3.5 text-center text-[10px] font-bold uppercase tracking-wider text-slate-500">Status</th>
                            <th class="px-5 py-3.5 text-center text-[10px] font-bold uppercase tracking-wider text-slate-500">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">
                        @forelse($peminjamans as $index => $peminjaman)

                            @php
                                $batasPengambilan = $peminjaman->batas_pengambilan
                                    ? \Carbon\Carbon::parse($peminjaman->batas_pengambilan)
                                    : null;

                                $jatuhTempo = $peminjaman->tanggal_jatuh_tempo
                                    ? \Carbon\Carbon::parse($peminjaman->tanggal_jatuh_tempo)
                                    : null;

                                $batasLewat = $peminjaman->status === 'menunggu_diambil'
                                    && $batasPengambilan
                                    && $batasPengambilan->lte(now());

                                $terlambat = $peminjaman->status === 'dipinjam'
                                    && $jatuhTempo
                                    && $jatuhTempo->lt(now()->startOfDay());
                            @endphp

                            <tr class="transition duration-150 hover:bg-emerald-50/30">

                                {{-- NOMOR --}}
                                <td class="px-5 py-4 text-xs font-semibold text-slate-400 sm:px-6">
                                    {{ $peminjamans->firstItem() + $index }}
                                </td>

                                {{-- PEMINJAM --}}
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-600 text-xs font-bold text-white">
                                            {{ strtoupper(substr($peminjaman->user->name ?? 'U', 0, 1)) }}
                                        </div>

                                        <div class="min-w-0">
                                            <p class="truncate text-sm font-semibold text-slate-800">
                                                {{ $peminjaman->user->name ?? '-' }}
                                            </p>
                                            <p class="mt-0.5 truncate text-[11px] text-slate-400">
                                                {{ $peminjaman->user->email ?? '-' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                {{-- BUKU --}}
                                <td class="px-5 py-4">
                                    <p class="max-w-xs truncate text-sm font-semibold text-slate-800">
                                        {{ $peminjaman->buku->judul_buku ?? '-' }}
                                    </p>
                                    <p class="mt-0.5 text-[11px] text-slate-400">
                                        Kode:
                                        <span class="font-mono font-medium text-slate-600">
                                            {{ $peminjaman->buku->kode_buku ?? '-' }}
                                        </span>
                                    </p>
                                </td>

                                {{-- TANGGAL PINJAM --}}
                                <td class="px-5 py-4">
                                    <p class="text-xs font-medium text-slate-600">
                                        {{ $peminjaman->tanggal_pinjam
                                            ? \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->translatedFormat('d M Y')
                                            : '-'
                                        }}
                                    </p>
                                </td>

                                {{-- TANGGAL / BATAS --}}
                                <td class="px-5 py-4">
                                    @if($peminjaman->status === 'menunggu_diambil')
                                        <p class="text-xs font-semibold {{ $batasLewat ? 'text-red-600' : 'text-amber-700' }}">
                                            {{ $batasPengambilan
                                                ? $batasPengambilan->translatedFormat('d M Y H:i')
                                                : 'Belum ditentukan'
                                            }}
                                        </p>
                                        <p class="mt-1 text-[10px] text-slate-400">Batas pengambilan</p>

                                        @if($batasLewat)
                                            <span class="mt-1 inline-flex rounded-full bg-red-50 px-2 py-1 text-[10px] font-bold text-red-600">
                                                Batas terlewati
                                            </span>
                                        @endif
                                    @else
                                        <p class="text-xs font-medium {{ $terlambat ? 'font-bold text-red-600' : 'text-slate-600' }}">
                                            {{ $jatuhTempo
                                                ? $jatuhTempo->translatedFormat('d M Y')
                                                : '-'
                                            }}
                                        </p>

                                        @if($terlambat)
                                            <span class="mt-1 inline-flex items-center gap-1.5 text-[10px] font-bold text-red-500">
                                                <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                                Terlambat
                                            </span>
                                        @endif
                                    @endif
                                </td>

                                {{-- STATUS --}}
                                <td class="px-5 py-4 text-center">
                                    @if($peminjaman->status === 'menunggu_diambil')
                                        <span class="inline-flex items-center gap-1.5 whitespace-nowrap rounded-full bg-amber-50 px-3 py-1.5 text-[10px] font-bold text-amber-700 ring-1 ring-inset ring-amber-600/20">
                                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                            Menunggu Diambil
                                        </span>
                                    @elseif($peminjaman->status === 'dipinjam')
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1.5 text-[10px] font-bold text-blue-700 ring-1 ring-inset ring-blue-600/20">
                                            <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                                            Dipinjam
                                        </span>
                                    @endif
                                </td>

                                {{-- AKSI --}}
                                <td class="px-5 py-4 text-center">
                                    @if($peminjaman->status === 'menunggu_diambil')

                                        @if($batasPengambilan && $batasPengambilan->gt(now()))
                                            <form
                                                action="{{ route('pengajuan.konfirmasiPengambilan', $peminjaman) }}"
                                                method="POST"
                                                onsubmit="return confirm('Pastikan buku sudah benar-benar diserahkan kepada anggota. Lanjutkan konfirmasi?')"
                                            >
                                                @csrf

                                                <button
                                                    type="submit"
                                                    class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-lg bg-emerald-600 px-3 py-2 text-xs font-bold text-white transition hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2"
                                                >
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    Konfirmasi Pengambilan
                                                </button>
                                            </form>
                                        @elseif($batasLewat)
                                            <span class="inline-flex rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600">
                                                Kedaluwarsa
                                            </span>
                                        @else
                                            <span class="text-xs text-slate-400">Batas belum tersedia</span>
                                        @endif

                                    @elseif($peminjaman->status === 'dipinjam')
                                        <span class="text-xs font-medium text-slate-400">
                                            Sedang dipinjam
                                        </span>
                                    @endif
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-16 text-center">
                                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-2xl">
                                        📚
                                    </div>
                                    <h3 class="mt-4 text-sm font-bold text-slate-700">
                                        Data Tidak Ditemukan
                                    </h3>
                                    <p class="mt-1 text-xs text-slate-400">
                                        Tidak ada peminjaman yang sesuai dengan filter yang dipilih.
                                    </p>

                                    @if(request()->hasAny(['search', 'status', 'tanggal_dari', 'tanggal_sampai']))
                                        <a href="{{ url()->current() }}"
                                           class="mt-4 inline-flex rounded-lg bg-emerald-700 px-4 py-2 text-xs font-bold text-white hover:bg-emerald-800">
                                            Reset Filter
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            @if($peminjamans->hasPages())
                <div class="border-t border-slate-200 bg-slate-50 px-5 py-4 sm:px-6">
                    {{ $peminjamans->links() }}
                </div>
            @endif

        </div>
    </div>
</div>

@endsection
