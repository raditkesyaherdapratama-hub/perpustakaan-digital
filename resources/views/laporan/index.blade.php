@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-primary-50 px-6 py-8 font-[Inter]">

    <div class="mx-auto max-w-7xl">

        {{-- ========================================================= --}}
        {{-- HEADER --}}
        {{-- ========================================================= --}}

        <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">

            <div>

                {{-- BADGE --}}
                <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-primary-200 bg-primary-100 px-3 py-1">

                    <span class="h-2 w-2 rounded-full bg-primary-500"></span>

                    <span class="text-xs font-bold uppercase tracking-widest text-primary-700">
                        Manajemen Admin
                    </span>

                </div>

                <h1 class="text-3xl font-extrabold tracking-tight text-primary-950 md:text-4xl">
                    Laporan Perpustakaan
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Pantau dan analisis seluruh aktivitas perpustakaan secara terorganisir.
                </p>

            </div>


            {{-- STATUS SISTEM --}}
            <div class="flex items-center gap-3 rounded-2xl border border-primary-100 bg-white px-5 py-3 shadow-sm">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-primary-100 text-xl">
                    📊
                </div>

                <div>

                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Status Sistem
                    </p>

                    <p class="text-sm font-bold text-primary-700">
                        ● Sistem Aktif
                    </p>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- SUCCESS ALERT --}}
        {{-- ========================================================= --}}

        @if (session('success'))

            <div class="mb-6 flex items-center gap-4 rounded-2xl border border-primary-200 bg-primary-50 px-5 py-4 shadow-sm">

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary-100 text-lg">
                    ✅
                </div>

                <div>

                    <p class="text-sm font-bold text-primary-800">
                        Berhasil
                    </p>

                    <p class="text-sm text-primary-700">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- STATISTIK --}}
        {{-- ========================================================= --}}

        <div class="mb-8 grid gap-5 md:grid-cols-3">

            {{-- TOTAL PEMINJAMAN --}}
            <div class="group relative overflow-hidden rounded-3xl border border-primary-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-primary-100 transition group-hover:scale-110"></div>

                <div class="relative">

                    <div class="mb-5 flex items-center justify-between">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary-100 text-2xl">
                            📚
                        </div>

                        <span class="rounded-full bg-primary-50 px-3 py-1 text-xs font-bold text-primary-700">
                            PEMINJAMAN
                        </span>

                    </div>

                    <p class="text-sm font-medium text-slate-500">
                        Total Peminjaman
                    </p>

                    <h2 class="mt-2 text-4xl font-extrabold text-primary-800">
                        {{ $totalPeminjaman ?? 0 }}
                    </h2>

                    <p class="mt-3 text-xs text-slate-400">
                        Seluruh transaksi peminjaman
                    </p>

                </div>

            </div>


            {{-- AKTIF --}}
            <div class="group relative overflow-hidden rounded-3xl border border-emerald-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-emerald-50 transition group-hover:scale-110"></div>

                <div class="relative">

                    <div class="mb-5 flex items-center justify-between">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 text-2xl">
                            ⏳
                        </div>

                        <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700">
                            AKTIF
                        </span>

                    </div>

                    <p class="text-sm font-medium text-slate-500">
                        Peminjaman Aktif
                    </p>

                    <h2 class="mt-2 text-4xl font-extrabold text-emerald-700">
                        {{ $totalDipinjam ?? 0 }}
                    </h2>

                    <p class="mt-3 text-xs text-slate-400">
                        Buku masih berada pada anggota
                    </p>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- DIKEMBALIKAN --}}
            {{-- ===================================================== --}}

            <div class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-primary-800 via-primary-700 to-primary-600 p-6 text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:shadow-2xl">

                {{-- Dekorasi tanpa blur supaya warna tetap tajam --}}
                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-primary-500/30 transition duration-300 group-hover:scale-110"></div>

                <div class="relative">

                    <div class="mb-5 flex items-center justify-between">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/15 text-2xl ring-1 ring-white/20">
                            🔄
                        </div>

                        <span class="rounded-full border border-white/20 bg-white/15 px-3 py-1 text-xs font-bold text-white">
                            SELESAI
                        </span>

                    </div>

                    <p class="text-sm font-medium text-white/85">
                        Buku Dikembalikan
                    </p>

                    <h2 class="mt-2 text-4xl font-extrabold tracking-tight text-white">
                        {{ $totalPengembalian ?? 0 }}
                    </h2>

                    <p class="mt-3 text-xs font-medium text-white/80">
                        Transaksi telah selesai
                    </p>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- REPORT PANEL --}}
        {{-- ========================================================= --}}

        <div class="overflow-hidden rounded-3xl border border-primary-100 bg-white shadow-sm">

            {{-- PANEL HEADER --}}
            <div class="border-b border-primary-100 bg-gradient-to-r from-primary-50 via-white to-white px-6 py-6">

                <div class="flex flex-col justify-between gap-5 md:flex-row md:items-center">

                    <div class="flex items-center gap-4">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary-100 text-xl">
                            📋
                        </div>

                        <div>

                            <h2 class="text-xl font-extrabold text-primary-950">
                                Data Laporan
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Rekap aktivitas peminjaman dan pengembalian buku.
                            </p>

                        </div>

                    </div>


                    {{-- AKSI --}}
                    <div class="flex flex-wrap items-center gap-3">

                        {{-- TOTAL --}}
                        <div class="rounded-2xl border border-primary-100 bg-white px-5 py-3 shadow-sm">

                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Total Data
                            </p>

                            <p class="mt-1 text-xl font-extrabold text-primary-700">
                                {{ $peminjaman->count() ?? 0 }}
                            </p>

                        </div>


                        {{-- CETAK LAPORAN --}}
                        <a
                            href="{{ route('laporan.print', request()->query()) }}"
                            target="_blank"
                            class="inline-flex items-center gap-2 rounded-2xl bg-primary-700 px-5 py-4 text-sm font-bold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-primary-800 hover:shadow-lg"
                        >

                            <span class="text-lg">
                                🖨️
                            </span>

                            <span>
                                Cetak Laporan
                            </span>

                        </a>

                    </div>

                </div>

            </div>


            {{-- TABLE --}}
            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead class="bg-slate-50">

                        <tr>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                #
                            </th>

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

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        @forelse ($peminjaman ?? [] as $laporan)

                            <tr class="group transition duration-200 hover:bg-primary-50/50">

                                {{-- NOMOR --}}
                                <td class="px-6 py-5">

                                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-primary-50 text-sm font-bold text-primary-700">

                                        {{ $loop->iteration }}

                                    </span>

                                </td>


                                {{-- PEMINJAM --}}
                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-3">

                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-primary-100 font-bold text-primary-700">

                                            {{ strtoupper(substr($laporan->user->name ?? 'U', 0, 1)) }}

                                        </div>

                                        <div>

                                            <p class="font-bold text-slate-800">
                                                {{ $laporan->user->name ?? '-' }}
                                            </p>

                                            <p class="mt-1 text-xs text-slate-400">
                                                {{ $laporan->user->email ?? '-' }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- BUKU --}}
                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-3">

                                        <div class="flex h-11 w-11 shrink-0 items-center justify-center overflow-hidden rounded-xl bg-primary-50">

                                            @if (!empty($laporan->buku?->sampul))

                                                <img
                                                    src="{{ asset('storage/' . $laporan->buku->sampul) }}"
                                                    class="h-full w-full object-cover"
                                                    alt="{{ $laporan->buku->judul_buku }}"
                                                >

                                            @else

                                                <span class="text-xl">
                                                    📚
                                                </span>

                                            @endif

                                        </div>

                                        <div>

                                            <p class="font-bold text-slate-800">
                                                {{ $laporan->buku->judul_buku ?? '-' }}
                                            </p>

                                            <p class="mt-1 text-xs font-medium text-slate-400">
                                                {{ $laporan->buku->kode_buku ?? '-' }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- TANGGAL PINJAM --}}
                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-2">

                                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100">
                                            📅
                                        </div>

                                        <span class="text-sm font-medium text-slate-600">

                                            @if ($laporan->tanggal_pinjam ?? false)

                                                {{ \Carbon\Carbon::parse($laporan->tanggal_pinjam)->format('d M Y') }}

                                            @else

                                                -

                                            @endif

                                        </span>

                                    </div>

                                </td>


                                {{-- JATUH TEMPO --}}
                                <td class="px-6 py-5">

                                    @if ($laporan->tanggal_jatuh_tempo ?? false)

                                        <span class="inline-flex items-center gap-2 rounded-full border border-orange-200 bg-orange-50 px-3 py-1.5 text-xs font-bold text-orange-700">

                                            ⏰

                                            {{ \Carbon\Carbon::parse($laporan->tanggal_jatuh_tempo)->format('d M Y') }}

                                        </span>

                                    @else

                                        <span class="text-sm text-slate-400">
                                            -
                                        </span>

                                    @endif

                                </td>


                                {{-- STATUS --}}
                                <td class="px-6 py-5">

                                    @if (($laporan->status ?? '') === 'dipinjam')

                                        <span class="inline-flex items-center gap-2 rounded-full border border-primary-200 bg-primary-50 px-3 py-1.5 text-xs font-bold text-primary-700">

                                            <span class="h-2 w-2 rounded-full bg-primary-500"></span>

                                            Dipinjam

                                        </span>

                                    @elseif (($laporan->status ?? '') === 'dikembalikan')

                                        <span class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">

                                            <span class="h-2 w-2 rounded-full bg-emerald-500"></span>

                                            Dikembalikan

                                        </span>

                                    @elseif (($laporan->status ?? '') === 'menunggu')

                                        <span class="inline-flex items-center gap-2 rounded-full border border-yellow-200 bg-yellow-50 px-3 py-1.5 text-xs font-bold text-yellow-700">

                                            <span class="h-2 w-2 rounded-full bg-yellow-500"></span>

                                            Menunggu

                                        </span>

                                    @elseif (($laporan->status ?? '') === 'ditolak')

                                        <span class="inline-flex items-center gap-2 rounded-full border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-bold text-red-700">

                                            <span class="h-2 w-2 rounded-full bg-red-500"></span>

                                            Ditolak

                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-1.5 text-xs font-bold text-slate-600">

                                            <span class="h-2 w-2 rounded-full bg-slate-400"></span>

                                            {{ ucfirst($laporan->status ?? '-') }}

                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            {{-- EMPTY STATE --}}
                            <tr>

                                <td colspan="6" class="px-6 py-20 text-center">

                                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-primary-50 text-5xl">
                                        📊
                                    </div>

                                    <h2 class="mt-5 text-xl font-extrabold text-primary-950">
                                        Belum Ada Data Laporan
                                    </h2>

                                    <p class="mt-2 text-sm text-slate-500">
                                        Data aktivitas perpustakaan akan muncul di sini.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- PAGINATION --}}
            @if (isset($laporans) && method_exists($laporans, 'links'))

                <div class="border-t border-primary-100 bg-primary-50/30 px-6 py-5">

                    {{ $laporans->links() }}

                </div>

            @endif

        </div>


        {{-- ========================================================= --}}
        {{-- FOOTER INFO --}}
        {{-- ========================================================= --}}

        <div class="mt-6 flex items-start gap-4 rounded-2xl border border-primary-100 bg-white px-5 py-4 shadow-sm">

            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-primary-100">
                💡
            </div>

            <div>

                <p class="text-sm font-bold text-primary-800">
                    Informasi Laporan
                </p>

                <p class="mt-1 text-xs leading-5 text-slate-500">

                    Gunakan data laporan sebagai bahan pemantauan aktivitas
                    peminjaman dan pengembalian buku di perpustakaan

                    <span class="font-bold text-primary-700">
                        MI Al Falahiyyah Rajeg.
                    </span>

                </p>

            </div>

        </div>

    </div>

</div>

@endsection