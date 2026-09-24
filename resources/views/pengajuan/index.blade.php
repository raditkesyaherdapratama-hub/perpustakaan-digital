@extends('layouts.app')

@section('title', 'Pengajuan Peminjaman')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Pengajuan Peminjaman
            </h1>

            <p class="text-sm text-slate-500 mt-1">
                Kelola pengajuan peminjaman buku dari pengguna.
            </p>
        </div>

        <div class="bg-amber-50 border border-amber-200 text-amber-700 px-4 py-2 rounded-xl text-sm">
            Menunggu:
            <span class="font-bold">
                {{ $peminjamans->total() }}
            </span>
            pengajuan
        </div>
    </div>


    {{-- Alert Success --}}
    @if(session('success'))
        <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
            {{ session('success') }}
        </div>
    @endif


    {{-- Alert Error --}}
    @if(session('error'))
        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            {{ session('error') }}
        </div>
    @endif


    {{-- Table --}}
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

        @if($peminjamans->count())

            <div class="overflow-x-auto">

                <table class="w-full text-sm">

                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>

                            <th class="px-5 py-4 text-left font-semibold text-slate-600">
                                No
                            </th>

                            <th class="px-5 py-4 text-left font-semibold text-slate-600">
                                Pengguna
                            </th>

                            <th class="px-5 py-4 text-left font-semibold text-slate-600">
                                Buku
                            </th>

                            <th class="px-5 py-4 text-left font-semibold text-slate-600">
                                Tanggal Pinjam
                            </th>

                            <th class="px-5 py-4 text-left font-semibold text-slate-600">
                                Jatuh Tempo
                            </th>

                            <th class="px-5 py-4 text-center font-semibold text-slate-600">
                                Status
                            </th>

                            <th class="px-5 py-4 text-center font-semibold text-slate-600">
                                Aksi
                            </th>

                        </tr>
                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        @foreach($peminjamans as $peminjaman)

                            <tr class="hover:bg-slate-50 transition">

                                {{-- No --}}
                                <td class="px-5 py-4 text-slate-500">
                                    {{ $peminjamans->firstItem() + $loop->index }}
                                </td>


                                {{-- User --}}
                                <td class="px-5 py-4">

                                    <div class="font-semibold text-slate-800">
                                        {{ $peminjaman->user->name ?? '-' }}
                                    </div>

                                    <div class="text-xs text-slate-500 mt-1">
                                        {{ $peminjaman->user->email ?? '-' }}
                                    </div>

                                </td>


                                {{-- Buku --}}
                                <td class="px-5 py-4">

                                    <div class="font-semibold text-slate-800">
                                        {{ $peminjaman->buku->judul_buku ?? '-' }}
                                    </div>

                                    <div class="text-xs text-slate-500 mt-1">
                                        Kode:
                                        {{ $peminjaman->buku->kode_buku ?? '-' }}
                                    </div>

                                </td>


                                {{-- Tanggal Pinjam --}}
                                <td class="px-5 py-4 text-slate-600">
                                    {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d/m/Y') }}
                                </td>


                                {{-- Jatuh Tempo --}}
                                <td class="px-5 py-4 text-slate-600">
                                    {{ \Carbon\Carbon::parse($peminjaman->tanggal_jatuh_tempo)->format('d/m/Y') }}
                                </td>


                                {{-- Status --}}
                                <td class="px-5 py-4 text-center">

                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-700">
                                        Menunggu
                                    </span>

                                </td>


                                {{-- Aksi --}}
                                <td class="px-5 py-4">

                                    <div class="flex items-center justify-center gap-2">

                                        {{-- Setujui --}}
                                        <form
                                            action="{{ route('pengajuan.setujui', $peminjaman) }}"
                                            method="POST"
                                        >
                                            @csrf

                                            <button
                                                type="submit"
                                                onclick="return confirm('Setujui pengajuan peminjaman ini?')"
                                                class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg bg-emerald-600 text-white text-xs font-semibold hover:bg-emerald-700 transition"
                                            >
                                                ✓ Setujui
                                            </button>

                                        </form>


                                        {{-- Tolak --}}
                                        <form
                                            action="{{ route('pengajuan.tolak', $peminjaman) }}"
                                            method="POST"
                                        >
                                            @csrf

                                            <button
                                                type="submit"
                                                onclick="return confirm('Tolak pengajuan peminjaman ini?')"
                                                class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg bg-red-50 text-red-600 border border-red-200 text-xs font-semibold hover:bg-red-100 transition"
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


            {{-- Pagination --}}
            @if($peminjamans->hasPages())

                <div class="px-5 py-4 border-t border-slate-200">
                    {{ $peminjamans->links() }}
                </div>

            @endif

        @else

            {{-- Empty State --}}
            <div class="py-16 text-center">

                <div class="text-5xl mb-4">
                    📋
                </div>

                <h3 class="text-lg font-semibold text-slate-700">
                    Belum ada pengajuan
                </h3>

                <p class="text-sm text-slate-500 mt-1">
                    Saat ini belum ada pengajuan peminjaman yang menunggu persetujuan.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection