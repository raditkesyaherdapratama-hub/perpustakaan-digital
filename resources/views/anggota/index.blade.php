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

                    <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3 py-1.5 text-[10px] font-semibold uppercase tracking-wider text-emerald-100">

                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-300"></span>

                        Manajemen Admin

                    </div>


                    <h1 class="text-2xl font-extrabold tracking-tight text-white sm:text-3xl">
                        Kelola Anggota
                        <span class="ml-1">👥</span>
                    </h1>


                    <p class="mt-2 max-w-xl text-sm leading-6 text-emerald-100">
                        Kelola data anggota perpustakaan secara mudah, cepat, dan terorganisir.
                    </p>

                </div>


                {{-- TAMBAH ANGGOTA --}}

                <a
                    href="{{ route('anggota.create') }}"
                    class="inline-flex w-fit items-center gap-2 rounded-xl bg-white px-4 py-3 text-xs font-bold text-emerald-800 shadow-sm transition duration-200 hover:bg-emerald-50 hover:shadow-md"
                >

                    <span class="text-base leading-none">
                        +
                    </span>

                    Tambah Anggota

                </a>

            </div>

        </div>



        {{-- ========================================================= --}}
        {{-- ALERT SUCCESS --}}
        {{-- ========================================================= --}}

        @if (session('success'))

            <div class="mb-5 flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3.5">

                <div class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-emerald-500 text-white">

                    <svg
                        class="h-4 w-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2.5"
                            d="M5 13l4 4L19 7"
                        />
                    </svg>

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

        @if (session('error'))

            <div class="mb-5 flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-3.5">

                <div class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-red-500 text-white">

                    <svg
                        class="h-4 w-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2.5"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>

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
        {{-- SEARCH --}}
        {{-- ========================================================= --}}

        <div class="mb-6 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">

            <form
                action="{{ route('anggota.index') }}"
                method="GET"
                class="flex flex-col gap-3 sm:flex-row"
            >

                <div class="relative flex-1">

                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">

                        <svg
                            class="h-4.5 w-4.5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                            />
                        </svg>

                    </div>


                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari nama atau email anggota..."
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3 pl-11 pr-4 text-sm font-medium text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-2 focus:ring-emerald-100"
                    >

                </div>


                <button
                    type="submit"
                    class="rounded-xl bg-slate-900 px-6 py-3 text-xs font-bold text-white transition duration-200 hover:bg-emerald-700"
                >
                    Cari
                </button>


                @if(request('search'))

                    <a
                        href="{{ route('anggota.index') }}"
                        class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-5 py-3 text-xs font-bold text-slate-600 transition duration-200 hover:border-red-200 hover:bg-red-50 hover:text-red-600"
                    >
                        Reset
                    </a>

                @endif

            </form>

        </div>



        {{-- ========================================================= --}}
        {{-- DATA ANGGOTA --}}
        {{-- ========================================================= --}}

        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">


            {{-- HEADER TABLE --}}

            <div class="flex flex-col gap-4 border-b border-slate-200 px-5 py-5 sm:px-6 md:flex-row md:items-center md:justify-between">

                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">

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
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                            />
                        </svg>

                    </div>


                    <div>

                        <h2 class="text-base font-bold text-slate-900">
                            Daftar Anggota
                        </h2>

                        <p class="mt-0.5 text-xs text-slate-500">
                            Data anggota perpustakaan MI Al Falahiyyah
                        </p>

                    </div>

                </div>


                {{-- TOTAL --}}

                <div class="flex items-center gap-2 self-start rounded-lg bg-slate-50 px-3 py-2 md:self-auto">

                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                        Total
                    </span>

                    <span class="text-sm font-bold text-emerald-700">
                        {{ $anggotas->total() }}
                    </span>

                </div>

            </div>



            {{-- ========================================================= --}}
            {{-- TABLE --}}
            {{-- ========================================================= --}}

            <div class="overflow-x-auto">

                <table class="w-full min-w-[800px] text-left">

                    <thead class="border-b border-slate-200 bg-slate-50">

                        <tr>

                            <th class="w-16 px-5 py-3.5 text-[10px] font-bold uppercase tracking-wider text-slate-500 sm:px-6">
                                #
                            </th>

                            <th class="px-5 py-3.5 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                Nama Anggota
                            </th>

                            <th class="px-5 py-3.5 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                Email
                            </th>

                            <th class="px-5 py-3.5 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                Bergabung
                            </th>

                            <th class="px-5 py-3.5 text-right text-[10px] font-bold uppercase tracking-wider text-slate-500">
                                Aksi
                            </th>

                        </tr>

                    </thead>



                    <tbody class="divide-y divide-slate-100">

                        @forelse ($anggotas as $anggota)

                            <tr class="group transition duration-150 hover:bg-emerald-50/30">


                                {{-- NOMOR --}}

                                <td class="px-5 py-4 text-xs font-semibold text-slate-400 sm:px-6">

                                    {{ $anggotas->firstItem() + $loop->index }}

                                </td>



                                {{-- NAMA --}}

                                <td class="px-5 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-600 text-xs font-bold text-white">

                                            {{ strtoupper(substr($anggota->name, 0, 1)) }}

                                        </div>


                                        <div class="min-w-0">

                                            <p class="truncate text-sm font-semibold text-slate-800">
                                                {{ $anggota->name }}
                                            </p>

                                            <p class="mt-0.5 text-[11px] text-slate-400">
                                                Anggota Perpustakaan
                                            </p>

                                        </div>

                                    </div>

                                </td>



                                {{-- EMAIL --}}

                                <td class="px-5 py-4">

                                    <span class="text-xs font-medium text-slate-600">
                                        {{ $anggota->email }}
                                    </span>

                                </td>



                                {{-- TANGGAL --}}

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

                                        {{ $anggota->created_at->format('d M Y') }}

                                    </div>

                                </td>



                                {{-- AKSI --}}

                                <td class="px-5 py-4 sm:px-6">

                                    <div class="flex justify-end gap-2">


                                        {{-- DETAIL --}}

                                        <a
                                            href="{{ route('anggota.show', $anggota) }}"
                                            class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-[11px] font-bold text-slate-600 transition duration-200 hover:border-emerald-200 hover:bg-emerald-50 hover:text-emerald-700"
                                        >
                                            Detail
                                        </a>



                                        {{-- EDIT --}}

                                        <a
                                            href="{{ route('anggota.edit', $anggota) }}"
                                            class="rounded-lg bg-emerald-50 px-3 py-2 text-[11px] font-bold text-emerald-700 transition duration-200 hover:bg-emerald-600 hover:text-white"
                                        >
                                            Edit
                                        </a>



                                        {{-- HAPUS --}}

                                        <form
                                            action="{{ route('anggota.destroy', $anggota) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus anggota ini?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="rounded-lg bg-red-50 px-3 py-2 text-[11px] font-bold text-red-600 transition duration-200 hover:bg-red-600 hover:text-white"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>



                        @empty

                            {{-- EMPTY STATE --}}

                            <tr>

                                <td colspan="5" class="px-6 py-16 text-center">

                                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-2xl">
                                        👥
                                    </div>


                                    <h3 class="mt-4 text-sm font-bold text-slate-800">
                                        Belum Ada Anggota
                                    </h3>


                                    <p class="mt-1 text-xs text-slate-400">
                                        Belum terdapat data anggota di perpustakaan.
                                    </p>


                                    <a
                                        href="{{ route('anggota.create') }}"
                                        class="mt-4 inline-flex items-center gap-2 rounded-lg bg-emerald-600 px-4 py-2.5 text-xs font-bold text-white transition hover:bg-emerald-700"
                                    >
                                        + Tambah Anggota
                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>



            {{-- ========================================================= --}}
            {{-- PAGINATION --}}
            {{-- ========================================================= --}}

            @if($anggotas->hasPages())

                <div class="border-t border-slate-200 bg-slate-50 px-5 py-4 sm:px-6">

                    {{ $anggotas->links() }}

                </div>

            @endif

        </div>



        {{-- ========================================================= --}}
        {{-- FOOTER INFO --}}
        {{-- ========================================================= --}}

        <div class="mt-5 flex items-start gap-3 rounded-xl border border-slate-200 bg-white px-4 py-3.5 shadow-sm">

            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-emerald-50 text-sm">
                💡
            </div>


            <p class="text-xs leading-5 text-slate-500">

                Data anggota digunakan untuk mengelola aktivitas perpustakaan.
                Pastikan informasi anggota selalu diperbarui agar

                <span class="font-semibold text-emerald-700">
                    sistem perpustakaan
                </span>

                tetap akurat.

            </p>

        </div>

    </div>

</div>

@endsection