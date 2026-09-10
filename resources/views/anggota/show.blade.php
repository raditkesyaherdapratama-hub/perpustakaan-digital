@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100 p-6">

    <div class="mx-auto max-w-6xl">

        {{-- HEADER --}}
        <div class="mb-8">

            <a
                href="{{ route('anggota.index') }}"
                class="mb-5 inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-blue-600"
            >
                ← Kembali ke Anggota
            </a>

            <p class="text-sm font-semibold uppercase tracking-wider text-blue-600">
                Manajemen Admin
            </p>

            <h1 class="mt-2 text-3xl font-bold text-slate-800">
                Detail Anggota 👤
            </h1>

            <p class="mt-2 text-slate-500">
                Informasi lengkap anggota dan riwayat peminjaman.
            </p>

        </div>


        {{-- PROFILE --}}
        <div class="mb-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="flex flex-col gap-6 md:flex-row md:items-center">

                <div class="flex h-24 w-24 items-center justify-center rounded-full bg-blue-600 text-4xl font-bold text-white">

                    {{ strtoupper(substr($anggota->name, 0, 1)) }}

                </div>


                <div class="flex-1">

                    <h2 class="text-2xl font-bold text-slate-800">
                        {{ $anggota->name }}
                    </h2>

                    <p class="mt-2 text-slate-500">
                        {{ $anggota->email }}
                    </p>

                    <p class="mt-2 text-sm text-slate-400">
                        Bergabung {{ $anggota->created_at->format('d M Y') }}
                    </p>

                </div>


                <a
                    href="{{ route('anggota.edit', $anggota) }}"
                    class="rounded-xl bg-blue-600 px-5 py-3 text-center font-semibold text-white shadow-lg shadow-blue-200 transition hover:bg-blue-700"
                >
                    ✏️ Edit Anggota
                </a>

            </div>

        </div>


        {{-- RIWAYAT --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-100 px-6 py-5">

                <h2 class="text-lg font-bold text-slate-800">
                    Riwayat Peminjaman 📚
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Daftar buku yang pernah dipinjam anggota.
                </p>

            </div>


            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-slate-50">

                        <tr>

                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-500">
                                Buku
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-500">
                                Tanggal Pinjam
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-500">
                                Jatuh Tempo
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-500">
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        @forelse ($anggota->peminjaman as $peminjaman)

                            <tr class="transition hover:bg-slate-50">

                                <td class="px-6 py-4">

                                    <p class="font-semibold text-slate-800">
                                        {{ $peminjaman->buku->judul_buku }}
                                    </p>

                                    <p class="text-sm text-slate-400">
                                        {{ $peminjaman->buku->kode_buku }}
                                    </p>

                                </td>

                                <td class="px-6 py-4 text-slate-500">
                                    {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}
                                </td>

                                <td class="px-6 py-4 text-slate-500">
                                    {{ \Carbon\Carbon::parse($peminjaman->tanggal_jatuh_tempo)->format('d M Y') }}
                                </td>

                                <td class="px-6 py-4">

                                    @if ($peminjaman->status === 'dipinjam')

                                        <span class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">
                                            Sedang Dipinjam
                                        </span>

                                    @else

                                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                            Dikembalikan
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="4"
                                    class="px-6 py-16 text-center"
                                >

                                    <div class="text-5xl">
                                        📚
                                    </div>

                                    <p class="mt-4 font-semibold text-slate-700">
                                        Belum ada riwayat peminjaman
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection