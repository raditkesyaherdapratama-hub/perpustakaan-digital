@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100 px-6 py-8">

    <div class="mx-auto max-w-6xl">

        {{-- HEADER --}}
        <div class="mb-8">

            <a
                href="{{ route('buku.index') }}"
                class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-blue-600"
            >
                ← Kembali ke Koleksi Buku
            </a>

        </div>


        {{-- ALERT SUCCESS --}}
        @if (session('success'))

            <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700">

                ✅ {{ session('success') }}

            </div>

        @endif


        {{-- ALERT ERROR --}}
        @if (session('error'))

            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-semibold text-red-700">

                ❌ {{ session('error') }}

            </div>

        @endif


        {{-- DETAIL BUKU --}}
        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

            <div class="grid lg:grid-cols-5">


                {{-- SAMPUL --}}
                <div class="relative min-h-[500px] bg-slate-900 lg:col-span-2">

                    @if ($buku->sampul)

                        <img
                            src="{{ asset('storage/' . $buku->sampul) }}"
                            alt="{{ $buku->judul_buku }}"
                            class="absolute inset-0 h-full w-full object-cover"
                        >

                        <div class="absolute inset-0 bg-slate-900/30"></div>

                    @else

                        <div class="flex h-full min-h-[500px] items-center justify-center text-8xl">

                            📚

                        </div>

                    @endif

                </div>


                {{-- INFORMASI BUKU --}}
                <div class="p-8 lg:col-span-3 lg:p-12">


                    {{-- KATEGORI --}}
                    <div class="mb-5">

                        <span class="rounded-full bg-blue-100 px-4 py-2 text-xs font-bold uppercase tracking-wider text-blue-700">

                            {{ $buku->kategori->nama_kategori }}

                        </span>

                    </div>


                    {{-- JUDUL --}}
                    <h1 class="text-3xl font-bold leading-tight text-slate-800 md:text-4xl">

                        {{ $buku->judul_buku }}

                    </h1>


                    {{-- PENGARANG --}}
                    <p class="mt-4 text-lg text-slate-500">

                        ✍️ {{ $buku->pengarang }}

                    </p>


                    {{-- INFORMASI --}}
                    <div class="mt-8 grid gap-4 sm:grid-cols-2">


                        <div class="rounded-2xl bg-slate-50 p-5">

                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Kode Buku
                            </p>

                            <p class="mt-2 font-bold text-slate-800">
                                {{ $buku->kode_buku }}
                            </p>

                        </div>


                        <div class="rounded-2xl bg-slate-50 p-5">

                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Penerbit
                            </p>

                            <p class="mt-2 font-bold text-slate-800">
                                {{ $buku->penerbit }}
                            </p>

                        </div>


                        <div class="rounded-2xl bg-slate-50 p-5">

                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Tahun Terbit
                            </p>

                            <p class="mt-2 font-bold text-slate-800">
                                {{ $buku->tahun_terbit }}
                            </p>

                        </div>


                        <div class="rounded-2xl bg-slate-50 p-5">

                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Ketersediaan
                            </p>

                            <p class="mt-2 font-bold {{ $buku->stok > 0 ? 'text-green-600' : 'text-red-600' }}">

                                {{ $buku->stok }} Buku

                            </p>

                        </div>

                    </div>


                    {{-- DESKRIPSI --}}
                    <div class="mt-8">

                        <h2 class="text-lg font-bold text-slate-800">
                            Tentang Buku
                        </h2>

                        <p class="mt-3 leading-relaxed text-slate-500">

                            {{ $buku->deskripsi ?: 'Belum ada deskripsi untuk buku ini.' }}

                        </p>

                    </div>


                   @extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100 px-6 py-8">

    <div class="mx-auto max-w-6xl">

        {{-- HEADER --}}
        <div class="mb-8">

            <a
                href="{{ route('buku.index') }}"
                class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-blue-600"
            >
                ← Kembali ke Koleksi Buku
            </a>

        </div>


        {{-- ALERT SUCCESS --}}
        @if (session('success'))

            <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700">

                ✅ {{ session('success') }}

            </div>

        @endif


        {{-- ALERT ERROR --}}
        @if (session('error'))

            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-semibold text-red-700">

                ❌ {{ session('error') }}

            </div>

        @endif


        {{-- DETAIL BUKU --}}
        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

            <div class="grid lg:grid-cols-5">


                {{-- SAMPUL --}}
                <div class="relative min-h-[500px] bg-slate-900 lg:col-span-2">

                    @if ($buku->sampul)

                        <img
                            src="{{ asset('storage/' . $buku->sampul) }}"
                            alt="{{ $buku->judul_buku }}"
                            class="absolute inset-0 h-full w-full object-cover"
                        >

                        <div class="absolute inset-0 bg-slate-900/30"></div>

                    @else

                        <div class="flex h-full min-h-[500px] items-center justify-center text-8xl">

                            📚

                        </div>

                    @endif

                </div>


                {{-- INFORMASI BUKU --}}
                <div class="p-8 lg:col-span-3 lg:p-12">


                    {{-- KATEGORI --}}
                    <div class="mb-5">

                        <span class="rounded-full bg-blue-100 px-4 py-2 text-xs font-bold uppercase tracking-wider text-blue-700">

                            {{ $buku->kategori->nama_kategori }}

                        </span>

                    </div>


                    {{-- JUDUL --}}
                    <h1 class="text-3xl font-bold leading-tight text-slate-800 md:text-4xl">

                        {{ $buku->judul_buku }}

                    </h1>


                    {{-- PENGARANG --}}
                    <p class="mt-4 text-lg text-slate-500">

                        ✍️ {{ $buku->pengarang }}

                    </p>


                    {{-- INFORMASI --}}
                    <div class="mt-8 grid gap-4 sm:grid-cols-2">


                        <div class="rounded-2xl bg-slate-50 p-5">

                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Kode Buku
                            </p>

                            <p class="mt-2 font-bold text-slate-800">
                                {{ $buku->kode_buku }}
                            </p>

                        </div>


                        <div class="rounded-2xl bg-slate-50 p-5">

                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Penerbit
                            </p>

                            <p class="mt-2 font-bold text-slate-800">
                                {{ $buku->penerbit }}
                            </p>

                        </div>


                        <div class="rounded-2xl bg-slate-50 p-5">

                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Tahun Terbit
                            </p>

                            <p class="mt-2 font-bold text-slate-800">
                                {{ $buku->tahun_terbit }}
                            </p>

                        </div>


                        <div class="rounded-2xl bg-slate-50 p-5">

                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Ketersediaan
                            </p>

                            <p class="mt-2 font-bold {{ $buku->stok > 0 ? 'text-green-600' : 'text-red-600' }}">

                                {{ $buku->stok }} Buku

                            </p>

                        </div>

                    </div>


                    {{-- DESKRIPSI --}}
                    <div class="mt-8">

                        <h2 class="text-lg font-bold text-slate-800">
                            Tentang Buku
                        </h2>

                        <p class="mt-3 leading-relaxed text-slate-500">

                            {{ $buku->deskripsi ?: 'Belum ada deskripsi untuk buku ini.' }}

                        </p>

                    </div>


                    {{-- ACTION --}}
                    <div class="mt-10 flex flex-col gap-3 sm:flex-row">


                        {{-- USER PINJAM --}}
@if (auth()->user()->role === 'user')

    @if ($buku->stok > 0)

        <form
            action="{{ route('peminjaman.pinjam', $buku) }}"
            method="POST"
            class="flex-1 space-y-5"
        >

            @csrf

            {{-- Lama Peminjaman --}}
            <div>

                <label class="mb-2 block font-semibold text-slate-700">
                    Lama Peminjaman (Hari)
                </label>

                <input
                    type="number"
                    name="lama_pinjam"
                    min="1"
                    max="30"
                    value="7"
                    placeholder="Masukkan lama peminjaman"
                    class="w-full rounded-2xl border border-slate-300 px-4 py-3 focus:border-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-200"
                    required
                >

                <p class="mt-2 text-sm text-slate-500">
                    Minimal <b>1 hari</b> dan maksimal <b>30 hari</b>.
                </p>

            </div>

            {{-- Tombol Pinjam --}}
            <button
                type="submit"
                class="w-full rounded-2xl bg-blue-600 px-6 py-4 font-bold text-white shadow-lg shadow-blue-200 transition hover:bg-blue-700"
            >
                📚 Pinjam Buku
            </button>

        </form>

    @else

        <button
            disabled
            class="flex-1 cursor-not-allowed rounded-2xl bg-slate-200 px-6 py-4 font-bold text-slate-400"
        >
            ❌ Stok Buku Habis
        </button>

    @endif

@endif
                        {{-- ADMIN --}}
                        @if (auth()->user()->role === 'admin')

                            <a
                                href="{{ route('buku.edit', $buku) }}"
                                class="flex-1 rounded-2xl bg-blue-600 px-6 py-4 text-center font-bold text-white transition hover:bg-blue-700"
                            >
                                ✏️ Edit Buku
                            </a>


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
                                    class="w-full rounded-2xl bg-red-50 px-6 py-4 font-bold text-red-600 transition hover:bg-red-600 hover:text-white"
                                >
                                    🗑️ Hapus Buku
                                </button>

                            </form>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
                        {{-- ADMIN --}}
                        @if (auth()->user()->role === 'admin')

                            <a
                                href="{{ route('buku.edit', $buku) }}"
                                class="flex-1 rounded-2xl bg-blue-600 px-6 py-4 text-center font-bold text-white transition hover:bg-blue-700"
                            >
                                ✏️ Edit Buku
                            </a>


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
                                    class="w-full rounded-2xl bg-red-50 px-6 py-4 font-bold text-red-600 transition hover:bg-red-600 hover:text-white"
                                >
                                    🗑️ Hapus Buku
                                </button>

                            </form>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection