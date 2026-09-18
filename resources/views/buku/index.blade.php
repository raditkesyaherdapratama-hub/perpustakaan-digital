@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 px-4 py-6 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">

        {{-- ========================================================= --}}
        {{-- HERO / HEADER --}}
        {{-- ========================================================= --}}
        <div class="relative mb-8 overflow-hidden rounded-3xl bg-gradient-to-br from-green-950 via-green-800 to-emerald-700 p-8 text-white shadow-xl">
            {{-- Background Decoration --}}
            <div class="absolute -right-20 -top-20 h-72 w-72 rounded-full bg-green-400/20 blur-3xl"></div>
            <div class="absolute -bottom-24 right-40 h-64 w-64 rounded-full bg-emerald-300/10 blur-3xl"></div>

            <div class="relative z-10 flex flex-col justify-between gap-6 md:flex-row md:items-center">
                <div>
                    <div class="mb-3 inline-flex items-center rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-xs font-semibold tracking-wider text-green-100 backdrop-blur-sm">
                        PERPUSTAKAAN DIGITAL
                    </div>

                    <h1 class="text-3xl font-extrabold tracking-tight md:text-4xl">
                        Koleksi Buku 📚
                    </h1>

                    <p class="mt-2 max-w-2xl text-sm leading-6 text-green-100 md:text-base">
                        Jelajahi dan temukan seluruh koleksi buku perpustakaan MI Al Falahiyyah Rajeg.
                    </p>
                </div>

                @if (auth()->user()->role === 'admin')
                    <div class="shrink-0">
                        <a href="{{ route('buku.create') }}" class="inline-flex items-center gap-2 rounded-2xl bg-emerald-500 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-emerald-900/40 transition duration-300 hover:scale-105 hover:bg-emerald-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Tambah Buku Baru
                        </a>
                    </div>
                @endif
            </div>
        </div>

        {{-- ========================================================= --}}
        {{-- STATISTIK BUKU --}}
        {{-- ========================================================= --}}
        <div class="mb-8 grid gap-5 sm:grid-cols-3">
            {{-- TOTAL KOLEKSI --}}
            <div class="group relative overflow-hidden rounded-3xl border border-slate-100 bg-gradient-to-br from-white via-slate-50/50 to-emerald-50/30 p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-xl hover:shadow-emerald-500/10">
                <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-emerald-400/10 blur-2xl transition-all duration-500 group-hover:scale-150 group-hover:bg-emerald-400/20"></div>
                <div class="relative z-10">
                    <div class="mb-6 flex items-center justify-between">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-tr from-emerald-600 to-teal-400 text-white shadow-lg shadow-emerald-500/30 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <span class="rounded-full bg-emerald-50 px-3 py-1 text-[11px] font-bold tracking-wide text-emerald-700 ring-1 ring-inset ring-emerald-600/20">KOLEKSI</span>
                    </div>
                    <p class="text-xs font-semibold tracking-wide uppercase text-slate-400">Total Koleksi</p>
                    <h2 class="mt-1 text-4xl font-black tracking-tight text-slate-900">{{ $totalBuku }}</h2>
                    <p class="mt-3 text-xs text-slate-500">Seluruh buku di perpustakaan</p>
                </div>
            </div>

            {{-- BUKU TERSEDIA --}}
            <div class="group relative overflow-hidden rounded-3xl border border-slate-100 bg-gradient-to-br from-white via-slate-50/50 to-blue-50/30 p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-xl hover:shadow-blue-500/10">
                <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-blue-400/10 blur-2xl transition-all duration-500 group-hover:scale-150 group-hover:bg-blue-400/20"></div>
                <div class="relative z-10">
                    <div class="mb-6 flex items-center justify-between">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-tr from-blue-600 to-indigo-400 text-white shadow-lg shadow-blue-500/30 transition-transform duration-300 group-hover:scale-110 group-hover:-rotate-3">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="rounded-full bg-blue-50 px-3 py-1 text-[11px] font-bold tracking-wide text-blue-700 ring-1 ring-inset ring-blue-600/20">TERSEDIA</span>
                    </div>
                    <p class="text-xs font-semibold tracking-wide uppercase text-slate-400">Buku Tersedia</p>
                    <h2 class="mt-1 text-4xl font-black tracking-tight text-slate-900">{{ $totalBukuTersedia }}</h2>
                    <p class="mt-3 text-xs text-slate-500">Stok dapat dipinjam</p>
                </div>
            </div>

            {{-- BUKU HABIS --}}
            <div class="group relative overflow-hidden rounded-3xl border border-slate-100 bg-gradient-to-br from-white via-slate-50/50 to-red-50/30 p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-red-200 hover:shadow-xl hover:shadow-red-500/10">
                <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-red-400/10 blur-2xl transition-all duration-500 group-hover:scale-150 group-hover:bg-red-400/20"></div>
                <div class="relative z-10">
                    <div class="mb-6 flex items-center justify-between">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-tr from-red-500 to-rose-400 text-white shadow-lg shadow-red-500/30 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        <span class="rounded-full bg-red-50 px-3 py-1 text-[11px] font-bold tracking-wide text-red-700 ring-1 ring-inset ring-red-600/20">STOK HABIS</span>
                    </div>
                    <p class="text-xs font-semibold tracking-wide uppercase text-slate-400">Buku Habis</p>
                    <h2 class="mt-1 text-4xl font-black tracking-tight text-slate-900">{{ $totalBukuHabis }}</h2>
                    <p class="mt-3 text-xs text-slate-500">Stok dalam perbaikan/kosong</p>
                </div>
            </div>
        </div>

        {{-- ========================================================= --}}
        {{-- SEARCH & FILTER --}}
        {{-- ========================================================= --}}
        <div class="mb-8 rounded-3xl border border-slate-100 bg-white p-5 shadow-sm">
            <form action="{{ route('buku.index') }}" method="GET" class="grid gap-3 md:grid-cols-12">
                <div class="relative md:col-span-5">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul, kode, atau pengarang..." class="w-full rounded-2xl border border-slate-200 bg-slate-50 py-3.5 pl-11 pr-4 text-sm font-medium text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                </div>

                <div class="md:col-span-4">
                    <select name="kategori_id" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm font-medium text-slate-700 outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                        <option value="">Semua Kategori</option>
                        @foreach ($kategoris as $item)
                            <option value="{{ $item->id }}" {{ request('kategori_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex gap-2 md:col-span-3">
                    <button type="submit" class="flex-1 rounded-2xl bg-emerald-600 px-5 py-3.5 text-sm font-bold text-white shadow-md shadow-emerald-600/20 transition hover:bg-emerald-700 hover:shadow-lg">
                        Cari Buku
                    </button>
                    @if(request('search') || request('kategori_id'))
                        <a href="{{ route('buku.index') }}" class="flex items-center justify-center rounded-2xl border border-slate-200 bg-slate-100 px-4 py-3.5 text-xs font-bold text-slate-600 transition hover:bg-slate-200" title="Reset Filter">
                            🔄
                        </a>
                    @endif
                </div>
            </form>
        </div>

        {{-- ========================================================= --}}
        {{-- DAFTAR BUKU --}}
        {{-- ========================================================= --}}
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-xl font-extrabold text-slate-900">Daftar Koleksi Buku</h2>
                <p class="mt-0.5 text-xs text-slate-500">Menampilkan katalog buku perpustakaan</p>
            </div>
            <span class="rounded-full bg-emerald-100/60 px-4 py-1.5 text-xs font-bold text-emerald-800">
                {{ $bukus->total() }} Buku Ditemukan
            </span>
        </div>

        @if ($bukus->count() > 0)
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($bukus as $item)
                    <div class="group flex flex-col justify-between overflow-hidden rounded-3xl border border-slate-100 bg-white shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-emerald-200 hover:shadow-2xl hover:shadow-emerald-500/10">
                        <div>
                            {{-- COVER DENGAN BADGE FLOATING --}}
                            <div class="relative h-64 w-full overflow-hidden bg-slate-100">
                                @if ($item->sampul)
                                    <img src="{{ asset('storage/' . $item->sampul) }}" alt="{{ $item->judul_buku }}" class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                                @else
                                    <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-emerald-50 to-teal-100 text-slate-400">
                                        <div class="text-center">
                                            <svg class="mx-auto h-16 w-16 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                            </svg>
                                            <span class="mt-2 block text-xs font-semibold text-emerald-700">Tanpa Cover</span>
                                        </div>
                                    </div>
                                @endif

                                {{-- OVERLAY GRADIENT SAAT HOVER --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>

                                {{-- FLOATING KATEGORI BADGE (KIRI ATAS) --}}
                                @if ($item->kategori)
                                    <div class="absolute left-3 top-3">
                                        <span class="rounded-full bg-white/90 px-3 py-1 text-[11px] font-extrabold text-emerald-800 shadow-sm backdrop-blur-md">
                                            {{ $item->kategori->nama_kategori }}
                                        </span>
                                    </div>
                                @endif

                                {{-- FLOATING STOK BADGE (KANAN ATAS) --}}
                                <div class="absolute right-3 top-3">
                                    @if ($item->stok > 0)
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-500/90 px-3 py-1 text-xs font-bold text-white shadow-md backdrop-blur-md">
                                            <span class="h-1.5 w-1.5 rounded-full bg-white animate-pulse"></span> Tersedia
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-red-500/90 px-3 py-1 text-xs font-bold text-white shadow-md backdrop-blur-md">
                                            <span class="h-1.5 w-1.5 rounded-full bg-white"></span> Habis
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- KONTEN DESKRIPSI CARD --}}
                            <div class="p-5">
                                <h3 class="line-clamp-2 text-base font-extrabold leading-snug text-slate-800 transition group-hover:text-emerald-700">
                                    {{ $item->judul_buku }}
                                </h3>

                                <div class="mt-2 flex items-center gap-2 text-xs text-slate-400">
                                    <span class="font-medium text-slate-500">✍️ {{ $item->pengarang }}</span>
                                    @if($item->tahun_terbit)
                                        <span>•</span>
                                        <span>🗓️ {{ $item->tahun_terbit }}</span>
                                    @endif
                                </div>

                                <div class="mt-4 flex items-center justify-between rounded-2xl bg-slate-50 p-3 text-xs">
                                    <div>
                                        <span class="block text-[10px] font-bold uppercase tracking-wider text-slate-400">KODE BUKU</span>
                                        <span class="font-mono font-extrabold text-slate-700">{{ $item->kode_buku }}</span>
                                    </div>
                                    <div class="text-right">
                                        <span class="block text-[10px] font-bold uppercase tracking-wider text-slate-400">STOK</span>
                                        <span class="font-black text-sm {{ $item->stok > 0 ? 'text-emerald-600' : 'text-red-500' }}">
                                            {{ $item->stok }} <span class="text-[10px] font-normal text-slate-400">Pcs</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- TOMBOL AKSI --}}
                        <div class="flex gap-2 p-5 pt-0">
                            <a href="{{ route('buku.show', $item->id) }}" class="flex-1 rounded-2xl bg-slate-100 py-3 text-center text-xs font-bold text-slate-700 transition duration-200 hover:bg-emerald-100 hover:text-emerald-800">
                                Lihat Detail
                            </a>
                            @if (auth()->user()->role === 'admin')
                                <a href="{{ route('buku.edit', $item->id) }}" class="rounded-2xl bg-emerald-50 px-4 py-3 text-center text-xs font-bold text-emerald-700 transition duration-200 hover:bg-emerald-600 hover:text-white">
                                    Edit
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- PAGINATION --}}
            <div class="mt-8">
                {{ $bukus->links() }}
            </div>
        @else
            {{-- EMPTY STATE --}}
            <div class="rounded-3xl border border-slate-100 bg-white p-12 text-center shadow-sm">
                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-emerald-50 text-emerald-600">
                    <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="mt-4 text-lg font-bold text-slate-900">Buku Tidak Ditemukan</h3>
                <p class="mt-1 text-xs text-slate-500">Coba ubah kata kunci pencarian atau filter kategori Anda.</p>
            </div>
        @endif

    </div>
</div>

@endsection