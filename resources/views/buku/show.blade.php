@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')

{{-- FONT INTER --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="min-h-screen bg-slate-50 px-4 py-6 font-['Inter',sans-serif] sm:px-6 lg:px-8">

    <div class="mx-auto max-w-7xl">

        {{-- ===================================================== --}}
        {{-- TOP NAVIGATION --}}
        {{-- ===================================================== --}}
        <div class="mb-5 flex items-center justify-between">

            <a
                href="{{ route('buku.index') }}"
                class="group inline-flex items-center gap-2 rounded-lg px-2 py-1.5 text-xs font-semibold text-slate-500 transition hover:bg-white hover:text-emerald-600"
            >
                <span class="text-base transition-transform duration-200 group-hover:-translate-x-1">
                    ←
                </span>

                Kembali ke Koleksi Buku
            </a>

            <span class="hidden text-[10px] font-semibold uppercase tracking-wider text-slate-400 sm:block">
                Detail Koleksi Buku
            </span>

        </div>


        {{-- ===================================================== --}}
        {{-- ALERT SUCCESS --}}
        {{-- ===================================================== --}}
        @if (session('success'))

            <div class="mb-5 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 shadow-sm">

                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2.5"
                            d="M5 13l4 4L19 7">
                        </path>
                    </svg>
                </div>

                <p class="text-xs font-semibold text-emerald-700 sm:text-sm">
                    {{ session('success') }}
                </p>

            </div>

        @endif


        {{-- ===================================================== --}}
        {{-- ALERT ERROR --}}
        {{-- ===================================================== --}}
        @if (session('error'))

            <div class="mb-5 flex items-center gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-3 shadow-sm">

                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-red-100 text-red-600">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2.5"
                            d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </div>

                <p class="text-xs font-semibold text-red-700 sm:text-sm">
                    {{ session('error') }}
                </p>

            </div>

        @endif


        {{-- ===================================================== --}}
        {{-- DETAIL BUKU --}}
        {{-- ===================================================== --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="grid lg:grid-cols-5">


                {{-- ================================================= --}}
                {{-- SAMPUL --}}
                {{-- ================================================= --}}
                <div class="relative min-h-[420px] overflow-hidden bg-slate-900 lg:col-span-2 lg:min-h-[620px]">

                    @if ($buku->sampul)

                        <img
                            src="{{ asset('storage/' . $buku->sampul) }}"
                            alt="{{ $buku->judul_buku }}"
                            class="absolute inset-0 h-full w-full object-cover"
                        >

                        {{-- Overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-900/10 to-transparent"></div>

                    @else

                        <div class="flex h-full min-h-[420px] items-center justify-center bg-gradient-to-br from-slate-800 to-slate-950 text-8xl lg:min-h-[620px]">
                            📚
                        </div>

                    @endif


                    {{-- Badge Sampul --}}
                    <div class="absolute left-5 top-5">

                        <span class="inline-flex items-center gap-1.5 rounded-full border border-white/20 bg-black/30 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-white backdrop-blur-md">

                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>

                            Koleksi Buku

                        </span>

                    </div>


                    {{-- Info bawah gambar --}}
                    <div class="absolute bottom-5 left-5 right-5">

                        <div class="rounded-xl border border-white/10 bg-black/25 px-4 py-3 backdrop-blur-md">

                            <p class="text-[9px] font-semibold uppercase tracking-wider text-slate-300">
                                Kode Buku
                            </p>

                            <p class="mt-1 font-mono text-sm font-bold text-white">
                                {{ $buku->kode_buku }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- INFORMASI BUKU --}}
                {{-- ================================================= --}}
                <div class="p-6 sm:p-8 lg:col-span-3 lg:p-10">


                    {{-- KATEGORI --}}
                    <div class="mb-4">

                        <span class="inline-flex items-center rounded-full bg-emerald-50 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider text-emerald-700 ring-1 ring-inset ring-emerald-600/20">

                            {{ $buku->kategori->nama_kategori }}

                        </span>

                    </div>


                    {{-- JUDUL --}}
                    <h1 class="max-w-3xl text-2xl font-extrabold leading-tight tracking-tight text-slate-900 sm:text-3xl lg:text-4xl">

                        {{ $buku->judul_buku }}

                    </h1>


                    {{-- PENGARANG --}}
                    <div class="mt-3 flex items-center gap-2 text-sm text-slate-500">

                        <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-slate-100">
                            ✍️
                        </span>

                        <span>
                            {{ $buku->pengarang }}
                        </span>

                    </div>


                    {{-- DIVIDER --}}
                    <div class="my-6 border-t border-slate-100"></div>


                    {{-- ================================================= --}}
                    {{-- INFORMASI BUKU --}}
                    {{-- ================================================= --}}
                    <div class="grid gap-3 sm:grid-cols-2">


                        {{-- KODE --}}
                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">

                            <p class="text-[9px] font-bold uppercase tracking-wider text-slate-400">
                                Kode Buku
                            </p>

                            <p class="mt-1.5 font-mono text-xs font-bold text-slate-800">
                                {{ $buku->kode_buku }}
                            </p>

                        </div>


                        {{-- PENERBIT --}}
                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">

                            <p class="text-[9px] font-bold uppercase tracking-wider text-slate-400">
                                Penerbit
                            </p>

                            <p class="mt-1.5 text-xs font-bold text-slate-800">
                                {{ $buku->penerbit }}
                            </p>

                        </div>


                        {{-- TAHUN --}}
                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">

                            <p class="text-[9px] font-bold uppercase tracking-wider text-slate-400">
                                Tahun Terbit
                            </p>

                            <p class="mt-1.5 text-xs font-bold text-slate-800">
                                {{ $buku->tahun_terbit }}
                            </p>

                        </div>


                        {{-- STOK --}}
                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">

                            <p class="text-[9px] font-bold uppercase tracking-wider text-slate-400">
                                Ketersediaan
                            </p>

                            <div class="mt-1.5 flex items-center gap-2">

                                <span class="h-2 w-2 rounded-full {{ $buku->stok > 0 ? 'bg-emerald-500' : 'bg-red-500' }}"></span>

                                <p class="text-xs font-bold {{ $buku->stok > 0 ? 'text-emerald-600' : 'text-red-600' }}">
                                    {{ $buku->stok }} Buku
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- DESKRIPSI --}}
                    {{-- ================================================= --}}
                    <div class="mt-7">

                        <div class="mb-2 flex items-center gap-2">

                            <div class="h-5 w-1 rounded-full bg-emerald-500"></div>

                            <h2 class="text-sm font-bold text-slate-800">
                                Tentang Buku
                            </h2>

                        </div>

                        <p class="text-xs leading-6 text-slate-500 sm:text-sm">
                            {{ $buku->deskripsi ?: 'Belum ada deskripsi untuk buku ini.' }}
                        </p>

                    </div>


                    {{-- ================================================= --}}
                    {{-- QR CODE --}}
                    {{-- ================================================= --}}
                    <div class="mt-7 overflow-hidden rounded-2xl border border-emerald-100 bg-gradient-to-br from-emerald-50 to-green-50">

                        <div class="flex flex-col items-center gap-5 p-5 sm:flex-row">


                            {{-- QR --}}
                            <div class="shrink-0 rounded-xl bg-white p-3 shadow-sm ring-1 ring-emerald-100">

                                {!! QrCode::size(140)->generate(route('buku.show', $buku)) !!}

                            </div>


                            {{-- INFO QR --}}
                            <div class="text-center sm:text-left">

                                <div class="mb-2 inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-2.5 py-1 text-[9px] font-bold uppercase tracking-wider text-emerald-700">

                                    <span>▣</span>

                                    QR Code Buku

                                </div>

                                <h2 class="text-base font-bold text-slate-800 sm:text-lg">
                                    Scan untuk melihat detail
                                </h2>

                                <p class="mt-1.5 max-w-md text-xs leading-5 text-slate-500">
                                    Gunakan kamera HP untuk memindai QR Code dan membuka halaman detail buku ini.
                                </p>

                                <p class="mt-2 font-mono text-[10px] font-bold uppercase tracking-wider text-emerald-600">
                                    {{ $buku->kode_buku }}
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- ACTION --}}
                    {{-- ================================================= --}}
                    <div class="mt-7">


                        {{-- ================================================= --}}
                        {{-- USER PINJAM --}}
                        {{-- ================================================= --}}
                        @if (auth()->user()->role === 'user')

                            @if ($buku->stok > 0)

                                <form
                                    action="{{ route('peminjaman.pinjam', $buku) }}"
                                    method="POST"
                                    class="space-y-4"
                                >

                                    @csrf


                                    {{-- Lama Peminjaman --}}
                                    <div>

                                        <label class="mb-2 block text-xs font-bold text-slate-700">
                                            Lama Peminjaman (Hari)
                                        </label>

                                        <input
                                            type="number"
                                            name="lama_pinjam"
                                            min="1"
                                            max="30"
                                            value="7"
                                            placeholder="Masukkan lama peminjaman"
                                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100"
                                            required
                                        >

                                        <p class="mt-1.5 text-[10px] text-slate-400">
                                            Minimal <b>1 hari</b> dan maksimal <b>30 hari</b>.
                                        </p>

                                    </div>


                                    {{-- Tombol Pinjam --}}
                                    <button
                                        type="submit"
                                        class="w-full rounded-xl bg-emerald-600 px-5 py-3.5 text-sm font-bold text-white shadow-sm shadow-emerald-600/20 transition hover:bg-emerald-700 hover:shadow-md"
                                    >

                                        📚 Pinjam Buku

                                    </button>

                                </form>

                            @else

                                <button
                                    disabled
                                    class="w-full cursor-not-allowed rounded-xl bg-slate-100 px-5 py-3.5 text-sm font-bold text-slate-400"
                                >

                                    ❌ Stok Buku Habis

                                </button>

                            @endif

                        @endif


                        {{-- ================================================= --}}
                        {{-- ADMIN --}}
                        {{-- ================================================= --}}
                        @if (auth()->user()->role === 'admin')

                            <div class="flex flex-col gap-3 sm:flex-row">


                                {{-- EDIT --}}
                                <a
                                    href="{{ route('buku.edit', $buku) }}"
                                    class="flex-1 rounded-xl bg-emerald-600 px-5 py-3.5 text-center text-sm font-bold text-white shadow-sm shadow-emerald-600/20 transition hover:bg-emerald-700 hover:shadow-md"
                                >

                                    ✏️ Edit Buku

                                </a>


                                {{-- HAPUS --}}
                                <form
                                    action="{{ route('buku.destroy', $buku) }}"
                                    method="POST"
                                    class="flex-1"
                                    onsubmit="return confirm('Yakin ingin menghapus buku ini?')"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="w-full rounded-xl border border-red-200 bg-red-50 px-5 py-3.5 text-sm font-bold text-red-600 transition hover:bg-red-600 hover:text-white"
                                    >

                                        🗑️ Hapus Buku

                                    </button>

                                </form>

                            </div>

                        @endif


                    </div>

                </div>

            </div>

        </div>


        {{-- FOOTER INFO --}}
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
                Informasi buku dan ketersediaan dapat dilihat pada halaman ini.
            </span>

        </div>

    </div>

</div>

@endsection