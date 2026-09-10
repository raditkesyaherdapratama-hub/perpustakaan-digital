@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100 px-6 py-8 font-sans">

    <div class="mx-auto max-w-7xl">

        {{-- HEADER --}}
        <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">

            <div>

                {{-- BADGE --}}
                <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-4 py-1.5">

                    <span class="relative flex h-2.5 w-2.5">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                    </span>

                    <span class="text-xs font-bold uppercase tracking-[0.18em] text-emerald-700">
                        Manajemen Admin
                    </span>

                </div>


                {{-- TITLE --}}
                <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 md:text-4xl">
                    Kelola Anggota
                    <span class="text-emerald-600">👥</span>
                </h1>

                <p class="mt-2 max-w-xl text-sm leading-6 text-slate-500">
                    Kelola data anggota perpustakaan secara mudah, cepat, dan terorganisir.
                </p>

            </div>


            {{-- BUTTON TAMBAH --}}
            <a
                href="{{ route('anggota.create') }}"
                class="group inline-flex items-center justify-center gap-2 rounded-2xl bg-emerald-600 px-5 py-3.5 text-sm font-bold text-white shadow-lg shadow-emerald-200 transition duration-300 hover:-translate-y-1 hover:bg-emerald-700 hover:shadow-xl hover:shadow-emerald-200"
            >

                <span class="text-lg transition duration-300 group-hover:rotate-90">
                    +
                </span>

                Tambah Anggota

            </a>

        </div>


        {{-- ALERT SUCCESS --}}
        @if (session('success'))

            <div class="mb-6 flex items-center gap-4 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 shadow-sm">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-lg">
                    ✅
                </div>

                <div>

                    <p class="text-sm font-bold text-emerald-800">
                        Berhasil
                    </p>

                    <p class="text-sm text-emerald-700">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        @endif


        {{-- ALERT ERROR --}}
        @if (session('error'))

            <div class="mb-6 flex items-center gap-4 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 shadow-sm">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-red-100 text-lg">
                    ❌
                </div>

                <div>

                    <p class="text-sm font-bold text-red-800">
                        Terjadi Kesalahan
                    </p>

                    <p class="text-sm text-red-700">
                        {{ session('error') }}
                    </p>

                </div>

            </div>

        @endif


        {{-- STATISTIC CARDS --}}
        <div class="mb-6 grid gap-5 md:grid-cols-3">

            {{-- TOTAL ANGGOTA --}}
            <div class="relative overflow-hidden rounded-3xl border border-emerald-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-emerald-50"></div>

                <div class="relative flex items-center justify-between">

                    <div>

                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            Data Anggota
                        </p>

                        <h2 class="mt-2 text-3xl font-extrabold text-slate-900">
                            {{ $anggotas->total() }}
                        </h2>

                        <p class="mt-1 text-xs text-slate-400">
                            Total anggota terdaftar
                        </p>

                    </div>


                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-2xl shadow-inner">
                        👥
                    </div>

                </div>

            </div>


            {{-- STATUS --}}
            <div class="relative overflow-hidden rounded-3xl border border-emerald-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-emerald-50"></div>

                <div class="relative flex items-center justify-between">

                    <div>

                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            Status Sistem
                        </p>

                        <h2 class="mt-2 text-2xl font-extrabold text-emerald-600">
                            AKTIF
                        </h2>

                        <p class="mt-1 text-xs text-slate-400">
                            Sistem anggota berjalan normal
                        </p>

                    </div>


                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-2xl">
                        ⚡
                    </div>

                </div>

            </div>


            {{-- SYSTEM CARD --}}
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-700 via-emerald-800 to-emerald-950 p-6 text-white shadow-xl transition duration-300 hover:-translate-y-1 hover:shadow-2xl">

                <div class="absolute -right-10 -top-10 h-36 w-36 rounded-full bg-emerald-300/20 blur-2xl"></div>

                <div class="absolute -bottom-10 -left-10 h-28 w-28 rounded-full bg-emerald-400/10 blur-2xl"></div>

                <div class="relative">

                    <div class="mb-4 flex items-center justify-between">

                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/10 text-xl backdrop-blur-sm">
                            📚
                        </div>

                        <span class="rounded-full border border-white/20 bg-white/10 px-3 py-1 text-[10px] font-bold tracking-wider text-emerald-100 backdrop-blur-sm">
                            ONLINE
                        </span>

                    </div>

                    <p class="text-xs font-medium text-emerald-100">
                        Sistem Perpustakaan
                    </p>

                    <h2 class="mt-1 text-xl font-extrabold">
                        MI Al Falahiyyah
                    </h2>

                    <p class="mt-1 text-xs text-emerald-100">
                        Manajemen anggota digital
                    </p>

                </div>

            </div>

        </div>


        {{-- SEARCH --}}
        <div class="mb-6 rounded-3xl border border-emerald-100 bg-white p-5 shadow-sm">

            <form
                action="{{ route('anggota.index') }}"
                method="GET"
                class="flex flex-col gap-3 md:flex-row"
            >

                {{-- SEARCH INPUT --}}
                <div class="relative flex-1">

                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-lg">
                        🔍
                    </div>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari nama atau email anggota..."
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 py-3.5 pl-12 pr-4 text-sm font-medium text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-emerald-400 focus:bg-white focus:ring-4 focus:ring-emerald-100"
                    >

                </div>


                {{-- SEARCH BUTTON --}}
                <button
                    type="submit"
                    class="rounded-2xl bg-slate-900 px-7 py-3.5 text-sm font-bold text-white shadow-sm transition duration-300 hover:bg-emerald-700 hover:shadow-lg hover:shadow-emerald-100"
                >
                    Cari Anggota
                </button>


                {{-- RESET --}}
                @if(request('search'))

                    <a
                        href="{{ route('anggota.index') }}"
                        class="inline-flex items-center justify-center rounded-2xl border border-slate-200 bg-white px-6 py-3.5 text-sm font-bold text-slate-600 transition hover:border-red-200 hover:bg-red-50 hover:text-red-600"
                    >
                        Reset
                    </a>

                @endif

            </form>

        </div>


        {{-- TABLE CARD --}}
        <div class="overflow-hidden rounded-3xl border border-emerald-100 bg-white shadow-sm">

            {{-- TABLE HEADER --}}
            <div class="border-b border-emerald-100 bg-gradient-to-r from-emerald-50 via-white to-white px-6 py-5">

                <div class="flex flex-col justify-between gap-4 md:flex-row md:items-center">

                    <div class="flex items-center gap-3">

                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-emerald-100 text-xl">
                            👥
                        </div>

                        <div>

                            <h2 class="text-lg font-extrabold text-slate-900">
                                Daftar Anggota
                            </h2>

                            <p class="mt-1 text-xs text-slate-500">
                                Data anggota perpustakaan MI Al Falahiyyah
                            </p>

                        </div>

                    </div>


                    {{-- TOTAL --}}
                    <div class="inline-flex items-center gap-2 self-start rounded-xl border border-emerald-100 bg-white px-4 py-2 shadow-sm md:self-auto">

                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            TOTAL
                        </span>

                        <span class="text-sm font-extrabold text-emerald-600">
                            {{ $anggotas->total() }}
                        </span>

                    </div>

                </div>

            </div>


            {{-- TABLE --}}
            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-slate-50">

                        <tr>

                            <th class="px-6 py-4 text-left text-[11px] font-extrabold uppercase tracking-wider text-slate-500">
                                #
                            </th>

                            <th class="px-6 py-4 text-left text-[11px] font-extrabold uppercase tracking-wider text-slate-500">
                                Nama Anggota
                            </th>

                            <th class="px-6 py-4 text-left text-[11px] font-extrabold uppercase tracking-wider text-slate-500">
                                Email
                            </th>

                            <th class="px-6 py-4 text-left text-[11px] font-extrabold uppercase tracking-wider text-slate-500">
                                Bergabung
                            </th>

                            <th class="px-6 py-4 text-right text-[11px] font-extrabold uppercase tracking-wider text-slate-500">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        @forelse ($anggotas as $anggota)

                            <tr class="group transition duration-200 hover:bg-emerald-50/50">

                                {{-- NOMOR --}}
                                <td class="px-6 py-5 text-sm font-semibold text-slate-400">

                                    {{ $anggotas->firstItem() + $loop->index }}

                                </td>


                                {{-- NAMA --}}
                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-3">

                                        {{-- AVATAR --}}
                                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-700 text-sm font-extrabold text-white shadow-sm">

                                            {{ strtoupper(substr($anggota->name, 0, 1)) }}

                                        </div>


                                        <div>

                                            <p class="font-bold text-slate-800">
                                                {{ $anggota->name }}
                                            </p>

                                            <p class="mt-1 text-[11px] font-medium text-slate-400">
                                                Anggota Perpustakaan
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- EMAIL --}}
                                <td class="px-6 py-5">

                                    <span class="text-sm font-medium text-slate-600">
                                        {{ $anggota->email }}
                                    </span>

                                </td>


                                {{-- TANGGAL --}}
                                <td class="px-6 py-5">

                                    <span class="inline-flex items-center gap-2 rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">

                                        📅

                                        {{ $anggota->created_at->format('d M Y') }}

                                    </span>

                                </td>


                                {{-- AKSI --}}
                                <td class="px-6 py-5">

                                    <div class="flex justify-end gap-2">

                                        {{-- DETAIL --}}
                                        <a
                                            href="{{ route('anggota.show', $anggota) }}"
                                            class="rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-xs font-bold text-slate-600 shadow-sm transition duration-200 hover:border-emerald-200 hover:bg-emerald-50 hover:text-emerald-700"
                                        >
                                            Detail
                                        </a>


                                        {{-- EDIT --}}
                                        <a
                                            href="{{ route('anggota.edit', $anggota) }}"
                                            class="rounded-xl border border-emerald-100 bg-emerald-50 px-3.5 py-2 text-xs font-bold text-emerald-700 transition duration-200 hover:bg-emerald-600 hover:text-white"
                                        >
                                            Edit
                                        </a>


                                        {{-- DELETE --}}
                                        <form
                                            action="{{ route('anggota.destroy', $anggota) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus anggota ini?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="rounded-xl border border-red-100 bg-red-50 px-3.5 py-2 text-xs font-bold text-red-600 transition duration-200 hover:bg-red-600 hover:text-white"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            {{-- EMPTY --}}
                            <tr>

                                <td
                                    colspan="5"
                                    class="px-6 py-20 text-center"
                                >

                                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-emerald-50 text-5xl">
                                        👥
                                    </div>

                                    <h2 class="mt-5 text-xl font-extrabold text-slate-900">
                                        Belum ada anggota
                                    </h2>

                                    <p class="mt-2 text-sm text-slate-500">
                                        Belum terdapat data anggota di perpustakaan.
                                    </p>

                                    <a
                                        href="{{ route('anggota.create') }}"
                                        class="mt-6 inline-flex items-center gap-2 rounded-xl bg-emerald-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-emerald-100 transition hover:bg-emerald-700"
                                    >
                                        + Tambah Anggota
                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- PAGINATION --}}
            @if($anggotas->hasPages())

                <div class="border-t border-emerald-100 bg-emerald-50/30 px-6 py-5">

                    {{ $anggotas->links() }}

                </div>

            @endif

        </div>


        {{-- FOOTER INFO --}}
        <div class="mt-6 flex items-start gap-3 rounded-2xl border border-emerald-100 bg-white px-5 py-4 shadow-sm">

            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-100">
                💡
            </div>

            <p class="text-xs leading-5 text-slate-500">

                Data anggota digunakan untuk mengelola aktivitas perpustakaan.
                Pastikan informasi anggota selalu diperbarui agar
                <span class="font-bold text-emerald-700">
                    sistem perpustakaan
                </span>
                tetap akurat.

            </p>

        </div>

    </div>

</div>

@endsection