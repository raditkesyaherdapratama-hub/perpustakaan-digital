@extends('layouts.app')

@section('content')

{{-- ========================================================= --}}
{{-- FONT INTER --}}
{{-- ========================================================= --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">


<div class="min-h-screen bg-slate-50 px-4 py-6 font-['Inter',sans-serif] sm:px-6 lg:px-8">

    <div class="mx-auto w-full max-w-7xl">


        {{-- ========================================================= --}}
        {{-- HEADER --}}
        {{-- ========================================================= --}}

        <div class="mb-7 overflow-hidden rounded-2xl bg-gradient-to-r from-emerald-900 via-emerald-800 to-emerald-700 shadow-lg">

            <div class="flex flex-col gap-6 px-6 py-7 sm:px-8 md:flex-row md:items-center md:justify-between">

                <div>

                    {{-- LABEL --}}

                    <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3 py-1.5 text-[10px] font-semibold uppercase tracking-wider text-emerald-100">

                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-300"></span>

                        Aktivitas Perpustakaan

                    </div>


                    {{-- TITLE --}}

                    <h1 class="text-2xl font-extrabold tracking-tight text-white sm:text-3xl">
                        Data Peminjaman Buku
                    </h1>


                    {{-- DESCRIPTION --}}

                    <p class="mt-2 max-w-xl text-sm leading-6 text-emerald-100">
                        Kelola dan pantau daftar buku yang sedang dipinjam oleh para anggota dengan mudah dan akurat.
                    </p>

                </div>


                {{-- TOTAL --}}

                <div class="flex w-fit items-center gap-3 rounded-xl border border-white/15 bg-white/10 px-4 py-3 backdrop-blur-md">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-white/10 text-emerald-200">

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                            />
                        </svg>

                    </div>


                    <div>

                        <p class="text-[10px] font-medium uppercase tracking-wider text-emerald-200">
                            Total Ditampilkan
                        </p>

                        <p class="mt-0.5 text-lg font-extrabold text-white">
                            {{ $peminjamans->total() ?? ($peminjamans->count() ?? 0) }}
                        </p>

                    </div>

                </div>

            </div>

        </div>



        {{-- ========================================================= --}}
        {{-- ALERT SUCCESS --}}
        {{-- ========================================================= --}}

        @if(session('success'))

            <div class="mb-5 flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3.5">

                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-emerald-500 text-sm font-bold text-white">
                    ✓
                </div>

                <div>

                    <p class="text-xs font-bold text-emerald-900">
                        Berhasil
                    </p>

                    <p class="mt-0.5 text-xs text-emerald-700">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        @endif



        {{-- ========================================================= --}}
        {{-- ALERT ERROR --}}
        {{-- ========================================================= --}}

        @if(session('error'))

            <div class="mb-5 flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-3.5">

                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-red-500 text-sm font-bold text-white">
                    ✕
                </div>

                <div>

                    <p class="text-xs font-bold text-red-900">
                        Terjadi Kesalahan
                    </p>

                    <p class="mt-0.5 text-xs text-red-700">
                        {{ session('error') }}
                    </p>

                </div>

            </div>

        @endif



        {{-- ========================================================= --}}
        {{-- TABLE CARD --}}
        {{-- ========================================================= --}}

        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">


            {{-- TABLE HEADER --}}

            <div class="flex flex-col gap-3 border-b border-slate-200 px-5 py-5 sm:px-6 md:flex-row md:items-center md:justify-between">

                <div>

                    <h2 class="text-base font-bold text-slate-900">
                        Daftar Peminjaman
                    </h2>

                    <p class="mt-1 text-xs text-slate-500">
                        Daftar buku yang saat ini sedang dipinjam oleh anggota.
                    </p>

                </div>


                <div class="inline-flex w-fit items-center rounded-lg bg-blue-50 px-3 py-2 text-[10px] font-bold uppercase tracking-wider text-blue-700">

                    <span class="mr-2 h-1.5 w-1.5 rounded-full bg-blue-500"></span>

                    Sedang Dipinjam

                </div>

            </div>



            {{-- ========================================================= --}}
            {{-- TABLE --}}
            {{-- ========================================================= --}}

            <div class="overflow-x-auto">

                <table class="w-full min-w-[900px] text-left">

                    {{-- TABLE HEAD --}}

                    <thead class="border-b border-slate-200 bg-slate-50">

                        <tr>

                            <th class="w-16 px-5 py-3.5 text-[10px] font-bold uppercase tracking-wider text-slate-500 sm:px-6">
                                No
                            </th>

                            <th class="px-5 py-3.5 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                Peminjam
                            </th>

                            <th class="px-5 py-3.5 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                Buku
                            </th>

                            <th class="px-5 py-3.5 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                Tanggal Pinjam
                            </th>

                            <th class="px-5 py-3.5 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                Jatuh Tempo
                            </th>

                            <th class="px-5 py-3.5 text-center text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                Status
                            </th>

                        </tr>

                    </thead>



                    {{-- TABLE BODY --}}

                    <tbody class="divide-y divide-slate-100">

                        @forelse($peminjamans as $index => $peminjaman)

                            <tr class="transition duration-150 hover:bg-emerald-50/30">


                                {{-- NO --}}

                                <td class="px-5 py-4 text-xs font-semibold text-slate-400 sm:px-6">

                                    {{ method_exists($peminjamans, 'firstItem')
                                        ? $peminjamans->firstItem() + $index
                                        : $index + 1
                                    }}

                                </td>



                                {{-- PEMINJAM --}}

                                <td class="px-5 py-4">

                                    <div class="flex items-center gap-3">

                                        {{-- AVATAR --}}

                                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-600 text-xs font-bold text-white">

                                            {{ strtoupper(substr($peminjaman->user->name ?? 'U', 0, 1)) }}

                                        </div>


                                        {{-- USER INFO --}}

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

                                    <div class="min-w-0">

                                        <p class="max-w-xs truncate text-sm font-semibold text-slate-800">
                                            {{ $peminjaman->buku->judul_buku ?? '-' }}
                                        </p>

                                        <p class="mt-0.5 text-[11px] text-slate-400">

                                            Kode:

                                            <span class="font-mono font-medium text-slate-600">
                                                {{ $peminjaman->buku->kode_buku ?? '-' }}
                                            </span>

                                        </p>

                                    </div>

                                </td>



                                {{-- TANGGAL PINJAM --}}

                                <td class="px-5 py-4">

                                    <div class="inline-flex items-center gap-2 text-xs font-medium text-slate-600">

                                        <svg
                                            class="h-4 w-4 text-slate-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                            />
                                        </svg>


                                        {{ $peminjaman->tanggal_pinjam
                                            ? \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->translatedFormat('d M Y')
                                            : '-'
                                        }}

                                    </div>

                                </td>



                                {{-- JATUH TEMPO --}}

                                <td class="px-5 py-4">

                                    @php

                                        $jatuhTempo = $peminjaman->tanggal_jatuh_tempo
                                            ? \Carbon\Carbon::parse($peminjaman->tanggal_jatuh_tempo)
                                            : null;

                                        $terlambat = $jatuhTempo && $jatuhTempo->isPast();

                                    @endphp


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

                                </td>



                                {{-- STATUS --}}

                                <td class="px-5 py-4 text-center">

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1.5 text-[10px] font-bold text-blue-700 ring-1 ring-inset ring-blue-600/20">

                                        <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>

                                        Dipinjam

                                    </span>

                                </td>

                            </tr>



                        @empty

                            {{-- EMPTY STATE --}}

                            <tr>

                                <td colspan="6" class="px-6 py-16 text-center">

                                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-2xl">
                                        📚
                                    </div>


                                    <h3 class="mt-4 text-sm font-bold text-slate-700">
                                        Belum Ada Peminjaman
                                    </h3>


                                    <p class="mt-1 text-xs text-slate-400">
                                        Saat ini belum ada buku yang sedang dipinjam oleh pengguna.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>



            {{-- ========================================================= --}}
            {{-- PAGINATION --}}
            {{-- ========================================================= --}}

            @if(method_exists($peminjamans, 'hasPages') && $peminjamans->hasPages())

                <div class="border-t border-slate-200 bg-slate-50 px-5 py-4 sm:px-6">

                    {{ $peminjamans->links() }}

                </div>

            @endif

        </div>

    </div>

</div>

@endsection