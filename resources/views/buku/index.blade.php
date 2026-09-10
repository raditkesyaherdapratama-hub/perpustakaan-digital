@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-primary-50 px-6 py-8">

    <div class="mx-auto max-w-7xl">

        {{-- =========================================================
            HEADER
        ========================================================== --}}
        <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-center">

            <div>

                <p class="mb-2 text-sm font-medium text-primary-600">
                    Perpustakaan Digital
                </p>

                <h1 class="text-3xl font-bold tracking-tight text-primary-900 md:text-4xl">
                    Koleksi Buku 📚
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Jelajahi dan temukan berbagai koleksi buku
                    MI Al Falahiyyah Rajeg.
                </p>

            </div>


            {{-- TOMBOL TAMBAH BUKU ADMIN --}}
            @if (auth()->user()->role === 'admin')

                <a
                    href="{{ route('buku.create') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-2xl
                           bg-primary-600 px-6 py-3.5 text-sm font-semibold text-white
                           shadow-lg shadow-primary-600/20
                           transition duration-300
                           hover:-translate-y-0.5 hover:bg-primary-700 hover:shadow-xl"
                >
                    <span class="text-lg">+</span>
                    Tambah Buku
                </a>

            @endif

        </div>


        {{-- =========================================================
            STATISTIK BUKU
        ========================================================== --}}
        <div class="mb-8 grid gap-5 md:grid-cols-3">


            {{-- TOTAL KOLEKSI --}}
            <div
                class="group relative overflow-hidden rounded-3xl
                       border border-slate-100 bg-white p-6
                       shadow-sm transition duration-300
                       hover:-translate-y-1 hover:shadow-xl"
            >

                <div
                    class="absolute -right-10 -top-10 h-32 w-32
                           rounded-full bg-primary-100/70
                           transition duration-300
                           group-hover:scale-125"
                ></div>

                <div class="relative">

                    <div class="mb-5 flex items-center justify-between">

                        <div
                            class="flex h-12 w-12 items-center justify-center
                                   rounded-2xl bg-primary-100 text-2xl"
                        >
                            📚
                        </div>

                        <span
                            class="rounded-full bg-primary-50 px-3 py-1
                                   text-xs font-semibold text-primary-700"
                        >
                            KOLEKSI
                        </span>

                    </div>

                    <p class="text-sm font-medium text-slate-500">
                        Total Koleksi
                    </p>

                    <h2 class="mt-2 text-4xl font-bold text-primary-700">
                        {{ $totalBuku }}
                    </h2>

                    <p class="mt-3 text-xs text-slate-400">
                        Seluruh buku di perpustakaan
                    </p>

                </div>

            </div>


            {{-- BUKU TERSEDIA --}}
            <div
                class="group relative overflow-hidden rounded-3xl
                       border border-slate-100 bg-white p-6
                       shadow-sm transition duration-300
                       hover:-translate-y-1 hover:shadow-xl"
            >

                <div
                    class="absolute -right-10 -top-10 h-32 w-32
                           rounded-full bg-emerald-100/70
                           transition duration-300
                           group-hover:scale-125"
                ></div>

                <div class="relative">

                    <div class="mb-5 flex items-center justify-between">

                        <div
                            class="flex h-12 w-12 items-center justify-center
                                   rounded-2xl bg-emerald-100 text-2xl"
                        >
                            ✅
                        </div>

                        <span
                            class="rounded-full bg-emerald-50 px-3 py-1
                                   text-xs font-semibold text-emerald-700"
                        >
                            TERSEDIA
                        </span>

                    </div>

                    <p class="text-sm font-medium text-slate-500">
                        Buku Tersedia
                    </p>

                    <h2 class="mt-2 text-4xl font-bold text-emerald-600">
                        {{ $totalBukuTersedia }}
                    </h2>

                    <p class="mt-3 text-xs text-slate-400">
                        Total stok buku tersedia
                    </p>

                </div>

            </div>


            {{-- BUKU HABIS --}}
            <div
                class="group relative overflow-hidden rounded-3xl
                       border border-slate-100 bg-white p-6
                       shadow-sm transition duration-300
                       hover:-translate-y-1 hover:shadow-xl"
            >

                <div
                    class="absolute -right-10 -top-10 h-32 w-32
                           rounded-full bg-red-100/70
                           transition duration-300
                           group-hover:scale-125"
                ></div>

                <div class="relative">

                    <div class="mb-5 flex items-center justify-between">

                        <div
                            class="flex h-12 w-12 items-center justify-center
                                   rounded-2xl bg-red-100 text-2xl"
                        >
                            ⚠️
                        </div>

                        <span
                            class="rounded-full bg-red-50 px-3 py-1
                                   text-xs font-semibold text-red-600"
                        >
                            PERHATIAN
                        </span>

                    </div>

                    <p class="text-sm font-medium text-slate-500">
                        Buku Habis
                    </p>

                    <h2 class="mt-2 text-4xl font-bold text-red-600">
                        {{ $totalBukuHabis }}
                    </h2>

                    <p class="mt-3 text-xs text-slate-400">
                        Buku dengan stok kosong
                    </p>

                </div>

            </div>

        </div>


        {{-- =========================================================
            SEARCH & FILTER
        ========================================================== --}}
        <div
            class="mb-8 rounded-3xl border border-slate-100
                   bg-white p-5 shadow-sm"
        >

            <form
                action="{{ route('buku.index') }}"
                method="GET"
                class="grid gap-3 md:grid-cols-12"
            >

                {{-- SEARCH --}}
                <div class="relative md:col-span-6">

                    <span
                        class="pointer-events-none absolute left-4 top-1/2
                               -translate-y-1/2 text-lg text-slate-400"
                    >
                        🔍
                    </span>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari judul, kode, atau pengarang..."
                        class="w-full rounded-2xl border border-slate-200
                               bg-slate-50 py-3.5 pl-12 pr-4 text-sm
                               text-slate-700 outline-none
                               transition
                               placeholder:text-slate-400
                               focus:border-primary-500
                               focus:bg-white
                               focus:ring-4 focus:ring-primary-100"
                    >

                </div>


                {{-- KATEGORI --}}
                <div class="md:col-span-3">

                    <select
                        name="kategori_id"
                        class="w-full rounded-2xl border border-slate-200
                               bg-slate-50 px-4 py-3.5 text-sm
                               text-slate-700 outline-none
                               transition
                               focus:border-primary-500
                               focus:bg-white
                               focus:ring-4 focus:ring-primary-100"
                    >

                        <option value="">
                            Semua Kategori
                        </option>

                        @foreach ($kategoris as $item)

                            <option
                                value="{{ $item->id }}"
                                {{ request('kategori_id') == $item->id ? 'selected' : '' }}
                            >
                                {{ $item->nama_kategori }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- BUTTON --}}
                <div class="md:col-span-3">

                    <button
                        type="submit"
                        class="w-full rounded-2xl bg-primary-600
                               px-5 py-3.5 text-sm font-semibold text-white
                               shadow-md shadow-primary-600/20
                               transition duration-300
                               hover:bg-primary-700 hover:shadow-lg"
                    >
                        Cari Buku
                    </button>

                </div>

            </form>

        </div>


        {{-- =========================================================
            HEADER DAFTAR BUKU
        ========================================================== --}}
        <div class="mb-5 flex items-center justify-between">

            <div>

                <h2 class="text-xl font-bold text-primary-900">
                    Daftar Buku
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Koleksi buku perpustakaan MI Al Falahiyyah Rajeg
                </p>

            </div>

            <div
                class="rounded-full bg-white px-4 py-2
                       text-xs font-semibold text-primary-700 shadow-sm"
            >
                {{ $bukus->total() }} Buku
            </div>

        </div>


        {{-- =========================================================
            DAFTAR BUKU
        ========================================================== --}}
        @if ($bukus->count() > 0)

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                @foreach ($bukus as $item)

                    <div
                        class="group overflow-hidden rounded-3xl
                               border border-slate-100 bg-white
                               shadow-sm transition duration-300
                               hover:-translate-y-1 hover:shadow-xl"
                    >

                        {{-- SAMPUL --}}
                        <div class="relative h-64 overflow-hidden bg-slate-100">

                            @if ($item->sampul)

                                <img
                                    src="{{ asset('storage/' . $item->sampul) }}"
                                    alt="{{ $item->judul_buku }}"
                                    class="h-full w-full object-cover
                                           transition duration-500
                                           group-hover:scale-105"
                                >

                            @else

                                <div
                                    class="flex h-full items-center justify-center
                                           bg-gradient-to-br from-primary-50
                                           to-primary-100"
                                >

                                    <div class="text-center">

                                        <div class="text-6xl">
                                            📚
                                        </div>

                                        <p class="mt-3 text-sm font-medium text-primary-700">
                                            Tidak ada sampul
                                        </p>

                                    </div>

                                </div>

                            @endif


                            {{-- BADGE STOK --}}
                            <div class="absolute right-3 top-3">

                                @if ($item->stok > 0)

                                    <span
                                        class="rounded-full bg-emerald-500
                                               px-3 py-1.5 text-xs font-semibold
                                               text-white shadow-lg"
                                    >
                                        Tersedia
                                    </span>

                                @else

                                    <span
                                        class="rounded-full bg-red-500
                                               px-3 py-1.5 text-xs font-semibold
                                               text-white shadow-lg"
                                    >
                                        Habis
                                    </span>

                                @endif

                            </div>

                        </div>


                        {{-- DETAIL --}}
                        <div class="p-5">

                            {{-- KATEGORI --}}
                            @if ($item->kategori)

                                <span
                                    class="inline-flex rounded-full
                                           bg-primary-50 px-3 py-1
                                           text-xs font-semibold
                                           text-primary-700"
                                >
                                    {{ $item->kategori->nama_kategori }}
                                </span>

                            @endif


                            {{-- JUDUL --}}
                            <h3
                                class="mt-3 line-clamp-2 text-lg font-bold
                                       leading-6 text-slate-800"
                            >
                                {{ $item->judul_buku }}
                            </h3>


                            {{-- PENGARANG --}}
                            <p class="mt-2 text-sm text-slate-500">
                                {{ $item->pengarang }}
                            </p>


                            {{-- INFO --}}
                            <div
                                class="mt-4 grid grid-cols-2 gap-2
                                       border-t border-slate-100 pt-4"
                            >

                                <div>

                                    <p class="text-xs text-slate-400">
                                        Kode Buku
                                    </p>

                                    <p class="mt-1 text-sm font-semibold text-slate-700">
                                        {{ $item->kode_buku }}
                                    </p>

                                </div>


                                <div>

                                    <p class="text-xs text-slate-400">
                                        Stok
                                    </p>

                                    <p
                                        class="mt-1 text-sm font-bold
                                               {{ $item->stok > 0
                                                    ? 'text-emerald-600'
                                                    : 'text-red-600' }}"
                                    >
                                        {{ $item->stok }}
                                    </p>

                                </div>

                            </div>


                            {{-- BUTTON --}}
                            <div class="mt-5 flex gap-2">

                                <a
                                    href="{{ route('buku.show', $item->id) }}"
                                    class="flex-1 rounded-xl bg-primary-50
                                           px-4 py-2.5 text-center
                                           text-sm font-semibold text-primary-700
                                           transition hover:bg-primary-100"
                                >
                                    Detail
                                </a>


                                @if (auth()->user()->role === 'admin')

                                    <a
                                        href="{{ route('buku.edit', $item->id) }}"
                                        class="rounded-xl bg-slate-100 px-4 py-2.5
                                               text-sm font-semibold text-slate-700
                                               transition hover:bg-slate-200"
                                    >
                                        Edit
                                    </a>

                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- PAGINATION --}}
            <div class="mt-8">
                {{ $bukus->links() }}
            </div>

        @else

            {{-- =====================================================
                EMPTY STATE
            ====================================================== --}}
            <div
                class="rounded-3xl border border-slate-100
                       bg-white px-6 py-20 text-center shadow-sm"
            >

                <div
                    class="mx-auto flex h-24 w-24 items-center justify-center
                           rounded-3xl bg-primary-50 text-5xl"
                >
                    📚
                </div>

                <h3 class="mt-6 text-xl font-bold text-primary-900">
                    Buku belum tersedia
                </h3>

                <p class="mx-auto mt-2 max-w-md text-sm text-slate-500">
                    Belum ada koleksi buku yang sesuai dengan pencarian
                    atau filter yang dipilih.
                </p>


                @if (auth()->user()->role === 'admin')

                    <a
                        href="{{ route('buku.create') }}"
                        class="mt-6 inline-flex items-center gap-2
                               rounded-2xl bg-primary-600
                               px-6 py-3 text-sm font-semibold text-white
                               shadow-lg shadow-primary-600/20
                               transition hover:bg-primary-700"
                    >
                        <span>+</span>
                        Tambah Buku
                    </a>

                @endif

            </div>

        @endif

    </div>

</div>

@endsection