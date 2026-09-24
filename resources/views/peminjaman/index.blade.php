@extends('layouts.app')

@section('content')

<div class="p-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

        <div>
            <h1 class="text-2xl font-bold text-emerald-900">
                Data Peminjaman
            </h1>

            <p class="text-sm text-slate-500 mt-1">
                Daftar buku yang sedang dipinjam oleh pengguna.
            </p>
        </div>

    </div>


    {{-- ALERT --}}
    @if(session('success'))
        <div class="mb-5 rounded-xl bg-emerald-100 border border-emerald-200
                    text-emerald-700 px-4 py-3">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-5 rounded-xl bg-red-100 border border-red-200
                    text-red-700 px-4 py-3">
            {{ session('error') }}
        </div>
    @endif


    {{-- TABLE --}}
    <div class="bg-white rounded-2xl shadow-sm border border-emerald-100 overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-emerald-900 text-white">

                    <tr>
                        <th class="px-5 py-4 text-left">
                            No
                        </th>

                        <th class="px-5 py-4 text-left">
                            Peminjam
                        </th>

                        <th class="px-5 py-4 text-left">
                            Buku
                        </th>

                        <th class="px-5 py-4 text-left">
                            Tanggal Pinjam
                        </th>

                        <th class="px-5 py-4 text-left">
                            Jatuh Tempo
                        </th>

                        <th class="px-5 py-4 text-center">
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($peminjamans as $index => $peminjaman)

                        <tr class="hover:bg-emerald-50/50 transition">

                            <td class="px-5 py-4">
                                {{ $peminjamans->firstItem() + $index }}
                            </td>


                            {{-- PEMINJAM --}}
                            <td class="px-5 py-4">

                                <div class="font-semibold text-slate-800">
                                    {{ $peminjaman->user->name ?? '-' }}
                                </div>

                                <div class="text-xs text-slate-500">
                                    {{ $peminjaman->user->email ?? '-' }}
                                </div>

                            </td>


                            {{-- BUKU --}}
                            <td class="px-5 py-4">

                                <div class="font-semibold text-slate-800">
                                    {{ $peminjaman->buku->judul_buku ?? '-' }}
                                </div>

                                <div class="text-xs text-slate-500">
                                    Kode:
                                    {{ $peminjaman->buku->kode_buku ?? '-' }}
                                </div>

                            </td>


                            {{-- TANGGAL PINJAM --}}
                            <td class="px-5 py-4 text-slate-600">

                                {{ $peminjaman->tanggal_pinjam
                                    ? \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)
                                        ->translatedFormat('d F Y')
                                    : '-'
                                }}

                            </td>


                            {{-- JATUH TEMPO --}}
                            <td class="px-5 py-4">

                                @php
                                    $jatuhTempo = $peminjaman->tanggal_jatuh_tempo
                                        ? \Carbon\Carbon::parse($peminjaman->tanggal_jatuh_tempo)
                                        : null;

                                    $terlambat = $jatuhTempo && $jatuhTempo->isPast();
                                @endphp

                                <span class="{{ $terlambat
                                    ? 'text-red-600 font-semibold'
                                    : 'text-slate-600'
                                }}">

                                    {{ $jatuhTempo
                                        ? $jatuhTempo->translatedFormat('d F Y')
                                        : '-'
                                    }}

                                </span>

                                @if($terlambat)

                                    <div class="text-xs text-red-500 mt-1">
                                        Terlambat
                                    </div>

                                @endif

                            </td>


                            {{-- STATUS --}}
                            <td class="px-5 py-4 text-center">

                                <span class="inline-flex items-center px-3 py-1
                                             rounded-full text-xs font-semibold
                                             bg-blue-100 text-blue-700">

                                    Dipinjam

                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="px-5 py-12 text-center">

                                <div class="text-4xl mb-3">
                                    📚
                                </div>

                                <h3 class="font-semibold text-slate-700">
                                    Belum ada peminjaman
                                </h3>

                                <p class="text-sm text-slate-500 mt-1">
                                    Belum ada buku yang sedang dipinjam.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if($peminjamans->hasPages())

            <div class="px-5 py-4 border-t border-slate-100">
                {{ $peminjamans->links() }}
            </div>

        @endif

    </div>

</div>

@endsection