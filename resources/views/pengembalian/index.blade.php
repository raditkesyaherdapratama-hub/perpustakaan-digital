@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-primary-50 px-4 py-6 sm:px-6 lg:px-8">

    <div class="mx-auto max-w-7xl">

        {{-- ========================================================= --}}
        {{-- HEADER --}}
        {{-- ========================================================= --}}
        <div class="mb-8">

            <div class="flex flex-col justify-between gap-5 lg:flex-row lg:items-end">

                <div>

                    {{-- LABEL --}}
                    <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-primary-200 bg-primary-100 px-3 py-1.5">

                        <span class="relative flex h-2 w-2">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-primary-400 opacity-75"></span>
                            <span class="relative inline-flex h-2 w-2 rounded-full bg-primary-600"></span>
                        </span>

                        <span class="text-xs font-bold uppercase tracking-[0.18em] text-primary-700">
                            Manajemen Admin
                        </span>

                    </div>


                    {{-- TITLE --}}
                    <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 md:text-4xl">
                        Pengembalian Buku
                    </h1>

                    <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                        Kelola pengembalian buku dan pastikan seluruh data
                        perpustakaan tetap akurat.
                    </p>

                </div>


                {{-- SYSTEM STATUS --}}
                <div class="inline-flex w-fit items-center gap-3 rounded-2xl border border-primary-100 bg-white px-5 py-3 shadow-sm">

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-primary-100 text-xl">
                        🔄
                    </div>

                    <div>

                        <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
                            Status Sistem
                        </p>

                        <div class="mt-0.5 flex items-center gap-2">

                            <span class="h-2 w-2 rounded-full bg-emerald-500"></span>

                            <p class="text-sm font-bold text-primary-700">
                                Sistem Aktif
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- ALERT SUCCESS --}}
        {{-- ========================================================= --}}
        @if (session('success'))

            <div class="mb-6 flex items-center gap-4 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 shadow-sm">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-lg">
                    ✅
                </div>

                <div>

                    <p class="text-sm font-bold text-emerald-800">
                        Pengembalian Berhasil
                    </p>

                    <p class="mt-0.5 text-sm text-emerald-700">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- ALERT ERROR --}}
        {{-- ========================================================= --}}
        @if (session('error'))

            <div class="mb-6 flex items-center gap-4 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 shadow-sm">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-red-100 text-lg">
                    ❌
                </div>

                <div>

                    <p class="text-sm font-bold text-red-800">
                        Terjadi Kesalahan
                    </p>

                    <p class="mt-0.5 text-sm text-red-700">
                        {{ session('error') }}
                    </p>

                </div>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- STATISTIC CARDS --}}
        {{-- ========================================================= --}}
        <div class="mb-8 grid gap-5 md:grid-cols-3">


            {{-- CARD 1 --}}
            <div class="group relative overflow-hidden rounded-3xl border border-primary-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-primary-200 hover:shadow-lg">

                {{-- Decorative --}}
                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-primary-50 transition duration-500 group-hover:scale-125"></div>

                <div class="relative">

                    <div class="mb-6 flex items-center justify-between">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary-100 text-2xl ring-4 ring-primary-50">
                            📚
                        </div>

                        <span class="rounded-full border border-primary-200 bg-primary-50 px-3 py-1 text-[11px] font-bold tracking-wider text-primary-700">
                            AKTIF
                        </span>

                    </div>

                    <p class="text-sm font-medium text-slate-500">
                        Peminjaman Aktif
                    </p>

                    <h2 class="mt-2 text-3xl font-extrabold text-primary-800">
                        {{ $peminjamans->total() }}
                    </h2>

                    <p class="mt-2 text-xs text-slate-400">
                        Buku yang belum dikembalikan
                    </p>

                </div>

            </div>


            {{-- CARD 2 --}}
            <div class="group relative overflow-hidden rounded-3xl border border-emerald-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-lg">

                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-emerald-50 transition duration-500 group-hover:scale-125"></div>

                <div class="relative">

                    <div class="mb-6 flex items-center justify-between">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 text-2xl ring-4 ring-emerald-50">
                            🔄
                        </div>

                        <span class="rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-[11px] font-bold tracking-wider text-emerald-700">
                            RETURN
                        </span>

                    </div>

                    <p class="text-sm font-medium text-slate-500">
                        Status Pengembalian
                    </p>

                    <h2 class="mt-2 text-3xl font-extrabold text-emerald-700">
                        READY
                    </h2>

                    <p class="mt-2 text-xs text-slate-400">
                        Siap memproses pengembalian
                    </p>

                </div>

            </div>


            {{-- CARD 3 --}}
            <div class="group relative overflow-hidden rounded-3xl bg-primary-800 p-6 text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:bg-primary-900 hover:shadow-xl">

                {{-- Glow --}}
                <div class="absolute -right-12 -top-12 h-36 w-36 rounded-full bg-primary-500/20 blur-2xl"></div>

                <div class="relative">

                    <div class="mb-6 flex items-center justify-between">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10 text-2xl ring-1 ring-white/10">
                            ⚡
                        </div>

                        <span class="rounded-full border border-white/20 bg-white/10 px-3 py-1 text-[11px] font-bold tracking-wider text-primary-100">
                            ONLINE
                        </span>

                    </div>

                    <p class="text-sm text-primary-100">
                        Sistem Perpustakaan
                    </p>

                    <h2 class="mt-2 text-2xl font-extrabold">
                        MI Al Falahiyyah
                    </h2>

                    <p class="mt-2 text-xs text-primary-100">
                        Pengelolaan perpustakaan digital
                    </p>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- MAIN TABLE CARD --}}
        {{-- ========================================================= --}}
        <div class="overflow-hidden rounded-3xl border border-primary-100 bg-white shadow-sm">


            {{-- TABLE HEADER --}}
            <div class="border-b border-primary-100 bg-white px-6 py-5">

                <div class="flex flex-col justify-between gap-4 md:flex-row md:items-center">

                    <div class="flex items-center gap-3">

                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-primary-100 text-lg ring-4 ring-primary-50">
                            📋
                        </div>

                        <div>

                            <h2 class="text-lg font-extrabold text-slate-900">
                                Daftar Peminjaman Aktif
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Proses pengembalian buku yang sedang dipinjam
                            </p>

                        </div>

                    </div>


                    {{-- TOTAL --}}
                    <div class="flex items-center gap-3 rounded-xl border border-primary-100 bg-primary-50 px-4 py-2.5">

                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">
                            Total
                        </span>

                        <span class="flex h-7 min-w-7 items-center justify-center rounded-lg bg-white px-2 text-sm font-extrabold text-primary-700 shadow-sm">
                            {{ $peminjamans->total() }}
                        </span>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- TABLE --}}
            {{-- ===================================================== --}}
            <div class="overflow-x-auto">

                <table class="w-full min-w-[900px] text-left">

                    {{-- TABLE HEAD --}}
                    <thead class="border-b border-slate-200 bg-slate-50">

                        <tr>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                Peminjam
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                Buku
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                Tanggal Pinjam
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                Jatuh Tempo
                            </th>

                            <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    {{-- TABLE BODY --}}
                    <tbody class="divide-y divide-slate-100">

                        @forelse ($peminjamans as $peminjaman)

                            <tr class="group transition duration-200 hover:bg-primary-50/40">


                                {{-- PEMINJAM --}}
                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-3">

                                        {{-- Avatar --}}
                                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-primary-100 font-extrabold text-primary-700 ring-4 ring-primary-50">

                                            {{ strtoupper(substr($peminjaman->user->name, 0, 1)) }}

                                        </div>


                                        <div class="min-w-0">

                                            <p class="truncate font-bold text-slate-800">
                                                {{ $peminjaman->user->name }}
                                            </p>

                                            <p class="mt-1 truncate text-xs text-slate-400">
                                                {{ $peminjaman->user->email }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- BUKU --}}
                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-3">

                                        <div class="flex h-11 w-11 shrink-0 items-center justify-center overflow-hidden rounded-xl bg-primary-50 ring-1 ring-primary-100">

                                            @if ($peminjaman->buku->sampul)

                                                <img
                                                    src="{{ asset('storage/' . $peminjaman->buku->sampul) }}"
                                                    class="h-full w-full object-cover"
                                                    alt="{{ $peminjaman->buku->judul_buku }}"
                                                >

                                            @else

                                                <span class="text-xl">
                                                    📚
                                                </span>

                                            @endif

                                        </div>


                                        <div class="min-w-0">

                                            <p class="max-w-[230px] truncate font-bold text-slate-800">
                                                {{ $peminjaman->buku->judul_buku }}
                                            </p>

                                            <p class="mt-1 text-xs font-medium text-slate-400">
                                                Kode: {{ $peminjaman->buku->kode_buku }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- TANGGAL PINJAM --}}
                                <td class="px-6 py-5">

                                    <div class="inline-flex items-center gap-2">

                                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 text-sm">
                                            📅
                                        </div>

                                        <span class="text-sm font-semibold text-slate-600">

                                            {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}

                                        </span>

                                    </div>

                                </td>


                                {{-- JATUH TEMPO --}}
                                <td class="px-6 py-5">

                                    <span class="inline-flex items-center gap-2 rounded-full border border-orange-200 bg-orange-50 px-3 py-1.5 text-xs font-bold text-orange-700">

                                        ⏰

                                        {{ \Carbon\Carbon::parse($peminjaman->tanggal_jatuh_tempo)->format('d M Y') }}

                                    </span>

                                </td>


                                {{-- AKSI --}}
                                <td class="px-6 py-5 text-right">

                                    <form
                                        action="{{ route('pengembalian.kembalikan', $peminjaman) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin buku ini dikembalikan?')"
                                    >

                                        @csrf

                                        <button
                                            type="submit"
                                            class="inline-flex items-center gap-2 rounded-xl bg-primary-600 px-4 py-2.5 text-sm font-bold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-primary-700 hover:shadow-lg active:translate-y-0"
                                        >

                                            <span class="text-base">
                                                🔄
                                            </span>

                                            Kembalikan

                                        </button>

                                    </form>

                                </td>

                            </tr>


                        @empty

                            {{-- EMPTY STATE --}}
                            <tr>

                                <td
                                    colspan="5"
                                    class="px-6 py-20 text-center"
                                >

                                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-primary-50 text-5xl ring-8 ring-primary-50/50">
                                        🎉
                                    </div>

                                    <h2 class="mt-6 text-xl font-extrabold text-slate-900">
                                        Tidak ada peminjaman aktif
                                    </h2>

                                    <p class="mt-2 text-sm text-slate-500">
                                        Semua buku sudah dikembalikan.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- ===================================================== --}}
            {{-- PAGINATION --}}
            {{-- ===================================================== --}}
            <div class="border-t border-slate-100 bg-slate-50/50 px-6 py-5">

                {{ $peminjamans->links() }}

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- FOOTER INFO --}}
        {{-- ========================================================= --}}
        <div class="mt-6 flex items-start gap-3 rounded-2xl border border-primary-100 bg-white px-5 py-4 shadow-sm">

            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-primary-100">
                💡
            </div>

            <p class="text-xs leading-5 text-slate-500">

                Pastikan setiap pengembalian diproses dengan benar agar
                <span class="font-bold text-primary-700">
                    stok buku
                </span>
                dan data peminjaman tetap akurat.

            </p>

        </div>

    </div>

</div>

@endsection