@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100 px-6 py-8">

    <div class="mx-auto max-w-7xl">

        {{-- HEADER --}}
        <div class="mb-8">

            <p class="text-sm font-semibold uppercase tracking-wider text-blue-600">
                Dashboard User
            </p>

            <h1 class="mt-2 text-3xl font-bold text-slate-800">
                Halo, {{ auth()->user()->name }} 👋
            </h1>

            <p class="mt-2 text-slate-500">
                Selamat datang di Perpustakaan Digital MI Al Falahiyyah.
            </p>

        </div>


        {{-- WELCOME CARD --}}
        <div class="mb-8 overflow-hidden rounded-3xl bg-gradient-to-r from-blue-600 to-indigo-600 p-8 text-white shadow-lg">

            <div class="flex flex-col justify-between gap-6 md:flex-row md:items-center">

                <div>

                    <p class="text-blue-100">
                        Perpustakaan Digital
                    </p>

                    <h2 class="mt-2 text-3xl font-bold">
                        Temukan Buku Favoritmu 📚
                    </h2>

                    <p class="mt-3 max-w-xl text-blue-100">
                        Jelajahi koleksi buku dan pinjam buku dengan mudah melalui sistem perpustakaan digital.
                    </p>

                </div>

                <div class="text-7xl">
                    📚
                </div>

            </div>

        </div>


        {{-- MENU USER --}}
        <div class="grid gap-6 md:grid-cols-2">

            {{-- KOLEKSI BUKU --}}
            <a
                href="{{ route('buku.index') }}"
                class="group rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl"
            >

                <div class="flex items-center justify-between">

                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-100 text-3xl">
                        📚
                    </div>

                    <span class="text-slate-300 transition group-hover:text-blue-600">
                        →
                    </span>

                </div>

                <h3 class="mt-5 text-xl font-bold text-slate-800">
                    Koleksi Buku
                </h3>

                <p class="mt-2 text-sm text-slate-500">
                    Lihat dan cari berbagai koleksi buku yang tersedia di perpustakaan.
                </p>

            </a>


            {{-- RIWAYAT PEMINJAMAN --}}
            <a
                href="{{ route('user.peminjaman') }}"
                class="group rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl"
            >

                <div class="flex items-center justify-between">

                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-purple-100 text-3xl">
                        📖
                    </div>

                    <span class="text-slate-300 transition group-hover:text-purple-600">
                        →
                    </span>

                </div>

                <h3 class="mt-5 text-xl font-bold text-slate-800">
                    Riwayat Peminjaman
                </h3>

                <p class="mt-2 text-sm text-slate-500">
                    Lihat daftar buku yang sedang dipinjam dan riwayat peminjaman kamu.
                </p>

            </a>

        </div>


        {{-- INFO --}}
        <div class="mt-8 rounded-3xl border border-blue-100 bg-blue-50 p-6">

            <div class="flex gap-4">

                <div class="text-3xl">
                    💡
                </div>

                <div>

                    <h3 class="font-bold text-blue-800">
                        Informasi Perpustakaan
                    </h3>

                    <p class="mt-1 text-sm text-blue-700">
                        Jangan lupa mengembalikan buku sesuai tanggal jatuh tempo agar terhindar dari denda keterlambatan.
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection