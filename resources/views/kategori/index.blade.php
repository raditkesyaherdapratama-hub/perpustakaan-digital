@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100 px-6 py-8">

    <div class="mx-auto max-w-7xl">

        {{-- HEADER --}}
        <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">

            <div>

                <p class="text-sm font-semibold uppercase tracking-widest text-primary-600">
                    Manajemen Perpustakaan
                </p>

                <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-slate-900 md:text-4xl">
                    Kelola Kategori 🏷️
                </h1>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                    Kelola kategori buku agar koleksi perpustakaan lebih
                    terorganisir dan mudah ditemukan.
                </p>

            </div>


            {{-- TAMBAH KATEGORI --}}
            <a
                href="{{ route('kategori.create') }}"
                class="inline-flex items-center justify-center gap-2 rounded-2xl bg-primary-600 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-primary-600/20 transition duration-300 hover:-translate-y-0.5 hover:bg-primary-700 hover:shadow-xl"
            >
                <span class="text-lg">＋</span>
                Tambah Kategori
            </a>

        </div>


        {{-- ALERT SUCCESS --}}
        @if(session('success'))

            <div class="mb-6 flex items-center gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-700">

                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-emerald-100">
                    ✓
                </div>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif


        {{-- STATISTIK --}}
        <div class="mb-8 grid gap-5 md:grid-cols-3">


            {{-- TOTAL KATEGORI --}}
            <div class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-primary-50 transition duration-500 group-hover:scale-125"></div>

                <div class="relative flex items-center justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Total Kategori
                        </p>

                        <h2 class="mt-2 text-4xl font-extrabold tracking-tight text-primary-700">
                            {{ $kategoris->count() }}
                        </h2>

                        <p class="mt-2 text-xs text-slate-400">
                            Kategori buku tersedia
                        </p>

                    </div>

                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-primary-100 text-3xl shadow-sm">
                        🏷️
                    </div>

                </div>

            </div>


            {{-- INFORMASI --}}
            <div class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-emerald-50 transition duration-500 group-hover:scale-125"></div>

                <div class="relative flex items-center justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Status Kategori
                        </p>

                        <h2 class="mt-2 text-2xl font-extrabold text-emerald-600">
                            Aktif
                        </h2>

                        <p class="mt-2 text-xs text-slate-400">
                            Sistem kategori berjalan
                        </p>

                    </div>

                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-3xl shadow-sm">
                        ✓
                    </div>

                </div>

            </div>


            {{-- SISTEM --}}
            <div class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-teal-50 transition duration-500 group-hover:scale-125"></div>

                <div class="relative flex items-center justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Perpustakaan
                        </p>

                        <h2 class="mt-2 text-xl font-extrabold text-teal-700">
                            MI Al Falahiyyah
                        </h2>

                        <p class="mt-2 text-xs text-slate-400">
                            Sistem perpustakaan digital
                        </p>

                    </div>

                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-teal-100 text-3xl shadow-sm">
                        📚
                    </div>

                </div>

            </div>

        </div>


        {{-- CONTENT --}}
        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">


            {{-- TABLE HEADER --}}
            <div class="flex flex-col justify-between gap-4 border-b border-slate-100 px-6 py-6 md:flex-row md:items-center">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-widest text-primary-600">
                        Data Kategori
                    </p>

                    <h2 class="mt-1 text-xl font-extrabold text-slate-900">
                        Daftar Kategori Buku
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Kelola kategori yang digunakan dalam koleksi buku.
                    </p>

                </div>


                <div class="rounded-full bg-primary-50 px-4 py-2 text-xs font-bold text-primary-700">

                    {{ $kategoris->count() }} Kategori

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
                                Nama Kategori
                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                Status
                            </th>

                            <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-slate-500">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        @forelse($kategoris as $kategori)

                            <tr class="group transition duration-200 hover:bg-primary-50/50">


                                {{-- NOMOR --}}
                                <td class="px-6 py-5">

                                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-100 text-sm font-bold text-slate-500 transition group-hover:bg-primary-100 group-hover:text-primary-700">

                                        {{ $loop->iteration }}

                                    </div>

                                </td>


                                {{-- NAMA --}}
                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-4">

                                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-primary-100 text-xl transition group-hover:bg-primary-600">

                                            🏷️

                                        </div>

                                        <div>

                                            <p class="font-bold text-slate-800">
                                                {{ $kategori->nama_kategori }}
                                            </p>

                                            <p class="mt-0.5 text-xs text-slate-400">
                                                Kategori koleksi buku
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- STATUS --}}
                                <td class="px-6 py-5">

                                    <span class="inline-flex items-center gap-2 rounded-full bg-emerald-100 px-3 py-1.5 text-xs font-bold text-emerald-700">

                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                        Aktif

                                    </span>

                                </td>


                                {{-- AKSI --}}
                                <td class="px-6 py-5">

                                    <div class="flex justify-end gap-2">


                                        {{-- EDIT --}}
                                        <a
                                            href="{{ route('kategori.edit', $kategori) }}"
                                            class="inline-flex items-center gap-1.5 rounded-xl border border-primary-200 bg-primary-50 px-4 py-2.5 text-xs font-bold text-primary-700 transition duration-200 hover:bg-primary-600 hover:text-white"
                                        >
                                            ✏️
                                            Edit
                                        </a>


                                        {{-- HAPUS --}}
                                        <form
                                            action="{{ route('kategori.destroy', $kategori) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus kategori ini?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="inline-flex items-center gap-1.5 rounded-xl border border-red-200 bg-red-50 px-4 py-2.5 text-xs font-bold text-red-600 transition duration-200 hover:bg-red-500 hover:text-white"
                                            >
                                                🗑️
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            {{-- EMPTY STATE --}}
                            <tr>

                                <td
                                    colspan="4"
                                    class="px-6 py-20 text-center"
                                >

                                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-3xl bg-primary-50 text-5xl">
                                        🏷️
                                    </div>

                                    <h2 class="mt-6 text-xl font-extrabold text-slate-900">
                                        Belum ada kategori
                                    </h2>

                                    <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">
                                        Belum ada kategori buku yang ditambahkan.
                                        Tambahkan kategori untuk mengelompokkan koleksi buku.
                                    </p>

                                    <a
                                        href="{{ route('kategori.create') }}"
                                        class="mt-6 inline-flex items-center gap-2 rounded-2xl bg-primary-600 px-6 py-3 font-bold text-white shadow-lg shadow-primary-600/20 transition hover:bg-primary-700"
                                    >
                                        ＋ Tambah Kategori
                                    </a>

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