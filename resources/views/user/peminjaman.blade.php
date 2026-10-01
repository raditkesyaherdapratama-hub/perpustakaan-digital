@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-primary-50 px-6 py-8">

    <div class="mx-auto max-w-7xl">

        {{-- HEADER --}}
        <div class="mb-8">

            <div class="flex flex-col justify-between gap-4 md:flex-row md:items-end">

                <div>

                    <p class="text-sm font-semibold uppercase tracking-wider text-primary-600">
                        Aktivitas Saya
                    </p>

                    <h1 class="mt-2 text-3xl font-bold tracking-tight text-primary-900">
                        Riwayat Peminjaman
                    </h1>

                    <p class="mt-2 text-slate-500">
                        Pantau semua aktivitas peminjaman buku kamu
                    </p>

                </div>

                {{-- BUTTON --}}
                <a
                    href="{{ route('buku.index') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-primary-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-primary-600/20 transition hover:-translate-y-0.5 hover:bg-primary-700 hover:shadow-xl"
                >
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    Jelajahi Buku
                </a>

            </div>

        </div>


        {{-- STATISTIK MINI --}}
        <div class="mb-8 grid gap-5 md:grid-cols-3">


            {{-- TOTAL --}}
            <div class="group relative overflow-hidden rounded-2xl border border-primary-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-primary-50 transition group-hover:bg-primary-100"></div>

                <div class="relative">

                    <div class="mb-5 flex items-center justify-between">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary-100 text-primary-600">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>

                        <span class="rounded-full bg-primary-50 px-3 py-1 text-xs font-bold uppercase tracking-wider text-primary-600">
                            Total
                        </span>

                    </div>

                    <p class="text-sm font-medium text-slate-500">
                        Total Peminjaman
                    </p>

                    <h2 class="mt-2 text-4xl font-bold text-primary-800">
                        {{ $peminjamans->total() }}
                    </h2>

                    <p class="mt-3 text-xs text-slate-400">
                        Seluruh riwayat peminjaman
                    </p>

                </div>

            </div>


            {{-- DIPINJAM --}}
            <div class="group relative overflow-hidden rounded-2xl border border-amber-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-amber-50 transition group-hover:bg-amber-100"></div>

                <div class="relative">

                    <div class="mb-5 flex items-center justify-between">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-100 text-amber-600">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>

                        <span class="rounded-full bg-amber-50 px-3 py-1 text-xs font-bold uppercase tracking-wider text-amber-600">
                            Aktif
                        </span>

                    </div>

                    <p class="text-sm font-medium text-slate-500">
                        Sedang Dipinjam
                    </p>

                    <h2 class="mt-2 text-4xl font-bold text-amber-600">
                        {{ $peminjamans->where('status', 'dipinjam')->count() }}
                    </h2>

                    <p class="mt-3 text-xs text-slate-400">
                        Buku yang masih dipinjam
                    </p>

                </div>

            </div>


            {{-- DIKEMBALIKAN --}}
            <div class="group relative overflow-hidden rounded-2xl border border-primary-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-primary-50 transition group-hover:bg-primary-100"></div>

                <div class="relative">

                    <div class="mb-5 flex items-center justify-between">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary-100 text-primary-600">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>

                        <span class="rounded-full bg-primary-50 px-3 py-1 text-xs font-bold uppercase tracking-wider text-primary-600">
                            Selesai
                        </span>

                    </div>

                    <p class="text-sm font-medium text-slate-500">
                        Dikembalikan
                    </p>

                    <h2 class="mt-2 text-4xl font-bold text-primary-600">
                        {{ $peminjamans->where('status', 'dikembalikan')->count() }}
                    </h2>

                    <p class="mt-3 text-xs text-slate-400">
                        Buku yang telah dikembalikan
                    </p>

                </div>

            </div>

        </div>


        {{-- RIWAYAT --}}
        <div class="overflow-hidden rounded-3xl border border-primary-100 bg-white shadow-sm">

            {{-- HEADER TABLE --}}
            <div class="flex flex-col justify-between gap-4 border-b border-slate-100 px-6 py-6 md:flex-row md:items-center">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-widest text-primary-600">
                        TRANSACTION HISTORY
                    </p>

                    <h2 class="mt-2 text-xl font-bold text-primary-900">
                        Daftar Peminjaman
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Riwayat aktivitas peminjaman buku kamu
                    </p>

                </div>

                <div class="flex items-center gap-2 rounded-xl bg-primary-50 px-4 py-2 text-xs font-semibold text-primary-700">

                    <span class="h-2 w-2 rounded-full bg-primary-500"></span>

                    Sistem Aktif

                </div>

            </div>


            {{-- TABLE --}}
            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead class="bg-primary-50/70">

                        <tr>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-primary-700">
                                Buku
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-primary-700">
                                Tanggal Pinjam
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-primary-700">
                                Jatuh Tempo
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-primary-700">
                                Status
                            </th>

                            <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-primary-700">
                                Detail
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        @forelse ($peminjamans as $peminjaman)

                            <tr class="group transition hover:bg-primary-50/50">

                                {{-- BUKU --}}
                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-4">

                                        <div class="flex h-14 w-11 shrink-0 items-center justify-center overflow-hidden rounded-xl border border-primary-100 bg-primary-50 text-primary-600 shadow-sm">

                                            @if ($peminjaman->buku->sampul)

                                                <img
                                                    src="{{ asset('storage/' . $peminjaman->buku->sampul) }}"
                                                    class="h-full w-full object-cover"
                                                >

                                            @else

                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>

                                            @endif

                                        </div>


                                        <div>

                                            <p class="font-bold text-primary-900 transition group-hover:text-primary-700">

                                                {{ $peminjaman->buku->judul_buku }}

                                            </p>

                                            <p class="mt-1 text-sm text-slate-400">

                                                {{ $peminjaman->buku->kategori->nama_kategori }}

                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- TANGGAL PINJAM --}}
                                <td class="px-6 py-5 text-sm font-medium text-slate-600">

                                    {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}

                                </td>


                                {{-- JATUH TEMPO --}}
                                <td class="px-6 py-5">

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-3 py-1.5 text-xs font-bold text-amber-700">

                                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/></svg>
                                        {{ \Carbon\Carbon::parse($peminjaman->tanggal_jatuh_tempo)->format('d M Y') }}

                                    </span>

                                </td>


                                {{-- STATUS --}}
                                <td class="px-6 py-5">

                                    @if ($peminjaman->status === 'dipinjam')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1.5 text-xs font-bold text-blue-700">

                                            <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>

                                            Dipinjam

                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-primary-50 px-3 py-1.5 text-xs font-bold text-primary-700">

                                            <span class="h-1.5 w-1.5 rounded-full bg-primary-500"></span>

                                            Dikembalikan

                                        </span>

                                    @endif

                                </td>


                                {{-- DETAIL --}}
                                <td class="px-6 py-5 text-right">

                                    <a
                                        href="{{ route('buku.show', $peminjaman->buku) }}"
                                        class="inline-flex items-center gap-2 rounded-xl bg-primary-50 px-4 py-2 text-sm font-semibold text-primary-700 transition hover:bg-primary-600 hover:text-white hover:shadow-md"
                                    >
                                        Lihat Buku
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="5"
                                    class="px-6 py-20 text-center"
                                >

                                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-primary-50 text-primary-600">
                                        <svg class="h-10 w-10" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                    </div>

                                    <h2 class="mt-5 text-xl font-bold text-primary-900">
                                        Belum ada riwayat
                                    </h2>

                                    <p class="mt-2 text-slate-500">
                                        Kamu belum pernah meminjam buku.
                                    </p>

                                    <a
                                        href="{{ route('buku.index') }}"
                                        class="mt-6 inline-flex items-center gap-2 rounded-xl bg-primary-600 px-5 py-3 font-semibold text-white shadow-lg shadow-primary-600/20 transition hover:bg-primary-700 hover:shadow-xl"
                                    >
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                        Jelajahi Buku
                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- PAGINATION --}}
            <div class="border-t border-slate-100 bg-slate-50/50 px-6 py-5">

                {{ $peminjamans->links() }}

            </div>

        </div>

    </div>

</div>

@endsection