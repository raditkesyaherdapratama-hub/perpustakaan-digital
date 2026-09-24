<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Perpustakaan Digital' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Alpine JS --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

</head>


<body class="font-sans bg-emerald-50/30 text-slate-800 antialiased">

    @if (auth()->check() && !request()->routeIs('login', 'register'))

        <div class="flex min-h-screen">

            {{-- ========================================================= --}}
            {{-- SIDEBAR --}}
            {{-- ========================================================= --}}

            <aside
                class="w-64 min-h-screen bg-emerald-900 text-slate-200 flex flex-col border-r border-emerald-800/50 shadow-xl shrink-0"
            >

                {{-- LOGO --}}
                <div class="p-5 flex items-center gap-3 border-b border-emerald-800/60">

                    <img
                        src="{{ asset('images/logo-mi-al-falahiyyah-HD (2).png') }}"
                        alt="Logo MI Al Falahiyyah"
                        class="w-10 h-10 object-contain drop-shadow-md"
                    >

                    <div>

                        <h1 class="font-bold text-white text-base tracking-wide leading-tight">
                            Perpustakaan
                        </h1>

                        <p class="text-xs text-emerald-300 font-medium">
                            MI Al Falahiyyah
                        </p>

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- MENU NAVIGASI --}}
                {{-- ===================================================== --}}

                <div class="px-3 py-5 flex-1 overflow-y-auto">

                    <nav class="space-y-1">


                        {{-- ================================================= --}}
                        {{-- DASHBOARD --}}
                        {{-- ================================================= --}}

                        @php
                            $dashboardRoute = auth()->user()->role === 'admin'
                                ? 'admin.dashboard'
                                : 'user.dashboard';
                        @endphp


                        <a
                            href="{{ route($dashboardRoute) }}"
                            class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all
                            {{ request()->routeIs('*.dashboard')
                                ? 'text-white bg-emerald-700/80 shadow-sm border border-emerald-600/40'
                                : 'text-emerald-100/80 hover:text-white hover:bg-emerald-800/60' }}"
                        >

                            <svg
                                class="w-5 h-5 {{ request()->routeIs('*.dashboard') ? 'text-emerald-200' : 'text-emerald-300/70' }}"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                                />

                            </svg>

                            <span>
                                Dashboard
                            </span>

                        </a>


                        {{-- ================================================= --}}
                        {{-- KOLEKSI BUKU --}}
                        {{-- ================================================= --}}

                        <a
                            href="{{ route('buku.index') }}"
                            class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all
                            {{ request()->routeIs('buku.*') && !request()->routeIs('buku.create')
                                ? 'text-white bg-emerald-700/80 shadow-sm border border-emerald-600/40'
                                : 'text-emerald-100/80 hover:text-white hover:bg-emerald-800/60' }}"
                        >

                            <svg
                                class="w-5 h-5 {{ request()->routeIs('buku.*') && !request()->routeIs('buku.create') ? 'text-emerald-200' : 'text-emerald-300/70' }}"
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

                            <span>
                                Koleksi Buku
                            </span>

                        </a>


                        {{-- ================================================= --}}
                        {{-- USER --}}
                        {{-- ================================================= --}}

                        @if (auth()->user()->role === 'user')

                            <a
                                href="{{ route('user.peminjaman') }}"
                                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all
                                {{ request()->routeIs('user.peminjaman')
                                    ? 'text-white bg-emerald-700/80 shadow-sm border border-emerald-600/40'
                                    : 'text-emerald-100/80 hover:text-white hover:bg-emerald-800/60' }}"
                            >

                                <svg
                                    class="w-5 h-5 {{ request()->routeIs('user.peminjaman') ? 'text-emerald-200' : 'text-emerald-300/70' }}"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />

                                </svg>

                                <span>
                                    Riwayat Peminjaman
                                </span>

                            </a>

                        @endif


                        {{-- ================================================= --}}
                        {{-- ADMIN --}}
                        {{-- ================================================= --}}

                        @if (auth()->user()->role === 'admin')


                            {{-- ================================================= --}}
                            {{-- TAMBAH BUKU --}}
                            {{-- ================================================= --}}

                            <a
                                href="{{ route('buku.create') }}"
                                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all
                                {{ request()->routeIs('buku.create')
                                    ? 'text-white bg-emerald-700/80 shadow-sm border border-emerald-600/40'
                                    : 'text-emerald-100/80 hover:text-white hover:bg-emerald-800/60' }}"
                            >

                                <svg
                                    class="w-5 h-5 {{ request()->routeIs('buku.create') ? 'text-emerald-200' : 'text-emerald-300/70' }}"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />

                                </svg>

                                <span>
                                    Tambah Buku
                                </span>

                            </a>


                            {{-- ================================================= --}}
                            {{-- KELOLA KATEGORI --}}
                            {{-- ================================================= --}}

                            <a
                                href="{{ route('kategori.index') }}"
                                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all
                                {{ request()->routeIs('kategori.*')
                                    ? 'text-white bg-emerald-700/80 shadow-sm border border-emerald-600/40'
                                    : 'text-emerald-100/80 hover:text-white hover:bg-emerald-800/60' }}"
                            >

                                <svg
                                    class="w-5 h-5 {{ request()->routeIs('kategori.*') ? 'text-emerald-200' : 'text-emerald-300/70' }}"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"
                                    />

                                </svg>

                                <span>
                                    Kelola Kategori
                                </span>

                            </a>


                            {{-- ================================================= --}}
                            {{-- PENGAJUAN PEMINJAMAN --}}
                            {{-- ================================================= --}}

                            <a
                                href="{{ route('pengajuan.index') }}"
                                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all
                                {{ request()->routeIs('pengajuan.*')
                                    ? 'text-white bg-emerald-700/80 shadow-sm border border-emerald-600/40'
                                    : 'text-emerald-100/80 hover:text-white hover:bg-emerald-800/60' }}"
                            >

                                <svg
                                    class="w-5 h-5 {{ request()->routeIs('pengajuan.*') ? 'text-emerald-200' : 'text-emerald-300/70' }}"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5h6m-7 4h8m-8 4h8m-8 4h5M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"
                                    />

                                </svg>

                                <span>
                                    Pengajuan Peminjaman
                                </span>

                            </a>


                            {{-- ================================================= --}}
                            {{-- TRANSAKSI --}}
                            {{-- ================================================= --}}

                            <div
                                x-data="{
                                    open: {{ request()->routeIs('peminjaman.*', 'pengembalian.*') ? 'true' : 'false' }}
                                }"
                                class="pt-1"
                            >

                                {{-- TRANSAKSI HEADER --}}

                                <button
                                    type="button"
                                    @click="open = !open"
                                    class="w-full flex items-center justify-between gap-3 px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all
                                    {{ request()->routeIs('peminjaman.*', 'pengembalian.*')
                                        ? 'text-white bg-emerald-800/50'
                                        : 'text-emerald-100/80 hover:text-white hover:bg-emerald-800/60' }}"
                                >

                                    <span class="flex items-center gap-3">

                                        <svg
                                            class="w-5 h-5 text-emerald-300/70"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M8 7h12m0 0l-3-3m3 3l-3 3M16 17H4m0 0l3 3m-3-3l3-3"
                                            />

                                        </svg>

                                        <span>
                                            Transaksi
                                        </span>

                                    </span>


                                    <svg
                                        class="w-4 h-4 transition-transform"
                                        :class="{ 'rotate-180': open }"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 9l-7 7-7-7"
                                        />

                                    </svg>

                                </button>


                                {{-- SUB MENU TRANSAKSI --}}

                                <div
                                    x-show="open"
                                    x-cloak
                                    x-transition
                                    class="mt-1 ml-4 pl-3 border-l border-emerald-700/60 space-y-1"
                                >

                                    {{-- PEMINJAMAN --}}

                                    <a
                                        href="{{ route('peminjaman.index') }}"
                                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-all
                                        {{ request()->routeIs('peminjaman.*')
                                            ? 'text-white bg-emerald-700/80'
                                            : 'text-emerald-200/80 hover:text-white hover:bg-emerald-800/60' }}"
                                    >

                                        <svg
                                            class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 6v12m-6-6h12M5 4h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V5a1 1 0 011-1z"
                                            />

                                        </svg>

                                        <span>
                                            Peminjaman
                                        </span>

                                    </a>


                                    {{-- PENGEMBALIAN --}}

                                    <a
                                        href="{{ route('pengembalian.index') }}"
                                        class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-all
                                        {{ request()->routeIs('pengembalian.*')
                                            ? 'text-white bg-emerald-700/80'
                                            : 'text-emerald-200/80 hover:text-white hover:bg-emerald-800/60' }}"
                                    >

                                        <svg
                                            class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                            />

                                        </svg>

                                        <span>
                                            Pengembalian
                                        </span>

                                    </a>

                                </div>

                            </div>


                            {{-- ================================================= --}}
                            {{-- KELOLA ANGGOTA --}}
                            {{-- ================================================= --}}

                            <a
                                href="{{ route('anggota.index') }}"
                                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all
                                {{ request()->routeIs('anggota.*')
                                    ? 'text-white bg-emerald-700/80 shadow-sm border border-emerald-600/40'
                                    : 'text-emerald-100/80 hover:text-white hover:bg-emerald-800/60' }}"
                            >

                                <svg
                                    class="w-5 h-5 {{ request()->routeIs('anggota.*') ? 'text-emerald-200' : 'text-emerald-300/70' }}"
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

                                <span>
                                    Kelola Anggota
                                </span>

                            </a>


                            {{-- ================================================= --}}
                            {{-- LAPORAN --}}
                            {{-- ================================================= --}}

                            <a
                                href="{{ route('laporan.index') }}"
                                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all
                                {{ request()->routeIs('laporan.*')
                                    ? 'text-white bg-emerald-700/80 shadow-sm border border-emerald-600/40'
                                    : 'text-emerald-100/80 hover:text-white hover:bg-emerald-800/60' }}"
                            >

                                <svg
                                    class="w-5 h-5 {{ request()->routeIs('laporan.*') ? 'text-emerald-200' : 'text-emerald-300/70' }}"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a2 2 0 01.293.707V19a2 2 0 01-2 2z"
                                    />

                                </svg>

                                <span>
                                    Laporan
                                </span>

                            </a>

                        @endif

                    </nav>

                </div>


                {{-- ========================================================= --}}
                {{-- USER INFO & LOGOUT --}}
                {{-- ========================================================= --}}

                <div class="p-4 border-t border-emerald-800/60 space-y-3">

                    <div class="flex items-center gap-3 px-1">

                        <div
                            class="w-9 h-9 rounded-full bg-emerald-700 border border-emerald-500/50 flex items-center justify-center font-bold text-white text-sm"
                        >
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>

                        <div class="min-w-0 flex-1">

                            <p class="text-xs font-semibold text-white truncate">
                                {{ auth()->user()->name }}
                            </p>

                            <p class="text-[10px] capitalize text-emerald-300 font-medium">
                                {{ auth()->user()->role }}
                            </p>

                        </div>

                    </div>


                    {{-- LOGOUT --}}

                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="w-full flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium text-rose-300 hover:text-rose-100 hover:bg-rose-900/40 transition-all"
                        >

                            <svg
                                class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                />

                            </svg>

                            <span>
                                Keluar (Logout)
                            </span>

                        </button>

                    </form>

                </div>

            </aside>


            {{-- ========================================================= --}}
            {{-- MAIN CONTENT --}}
            {{-- ========================================================= --}}

            <main class="min-w-0 flex-1 flex flex-col">


                {{-- ===================================================== --}}
                {{-- TOPBAR --}}
                {{-- ===================================================== --}}

                <header
                    class="flex h-20 items-center justify-between gap-4 border-b border-emerald-100 bg-white px-6 shadow-sm"
                >

                    {{-- WELCOME --}}

                    <div>

                        <p class="text-xs text-slate-400 font-medium">
                            Selamat datang kembali 👋
                        </p>

                        <h2 class="font-bold text-emerald-950 text-lg">
                            {{ auth()->user()->name }}
                        </h2>

                    </div>


                    {{-- RIGHT HEADER --}}

                    <div class="flex items-center gap-4">


                        {{-- ================================================= --}}
                        {{-- NOTIFICATION --}}
                        {{-- ================================================= --}}

                        <div
                            x-data="{ open: false }"
                            class="relative"
                        >

                            <button
                                type="button"
                                @click="open = !open"
                                class="relative flex h-10 w-10 items-center justify-center rounded-xl border border-emerald-100 bg-white text-emerald-800 shadow-sm transition hover:border-emerald-200 hover:bg-emerald-50"
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.8"
                                    stroke="currentColor"
                                    class="h-5 w-5"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9a6 6 0 0 0-12 0v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.09 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                                    />

                                </svg>


                                @if (auth()->user()->unreadNotifications->count() > 0)

                                    <span
                                        class="absolute -right-1 -top-1 flex h-4 min-w-4 items-center justify-center rounded-full bg-rose-500 px-1 text-[9px] font-bold text-white ring-2 ring-white"
                                    >
                                        {{ auth()->user()->unreadNotifications->count() > 9 ? '9+' : auth()->user()->unreadNotifications->count() }}
                                    </span>

                                @endif

                            </button>


                            {{-- DROPDOWN --}}

                            <div
                                x-show="open"
                                x-cloak
                                @click.outside="open = false"
                                x-transition
                                class="absolute right-0 z-50 mt-3 w-80 overflow-hidden rounded-2xl border border-emerald-100 bg-white shadow-2xl"
                            >

                                <div
                                    class="flex items-center justify-between border-b border-slate-100 bg-emerald-50/50 px-4 py-3"
                                >

                                    <div>

                                        <h3 class="text-xs font-bold text-slate-800">
                                            Notifikasi
                                        </h3>

                                        <p class="text-[10px] text-slate-500">
                                            Informasi terbaru sistem
                                        </p>

                                    </div>


                                    @if (auth()->user()->unreadNotifications->count() > 0)

                                        <form
                                            action="{{ route('notifications.readAll') }}"
                                            method="POST"
                                        >

                                            @csrf

                                            <button
                                                type="submit"
                                                class="text-[10px] font-semibold text-emerald-600 hover:text-emerald-800"
                                            >
                                                Tandai dibaca
                                            </button>

                                        </form>

                                    @endif

                                </div>


                                <div class="max-h-80 overflow-y-auto">

                                    @forelse (auth()->user()->notifications->take(5) as $notification)

                                        @php

                                            $data = $notification->data;

                                            $tipe = $data['tipe'] ?? 'info';

                                            $iconClass = match ($tipe) {

                                                'success' => 'bg-emerald-100 text-emerald-700',

                                                'warning' => 'bg-amber-100 text-amber-700',

                                                'danger' => 'bg-rose-100 text-rose-700',

                                                default => 'bg-sky-100 text-sky-700',

                                            };

                                        @endphp


                                        <a
                                            href="{{ $data['url'] ?? '#' }}"
                                            class="flex gap-3 border-b border-slate-100 px-4 py-3 transition hover:bg-emerald-50/40 {{ $notification->read_at ? 'opacity-60' : 'bg-emerald-50/20' }}"
                                        >

                                            <div
                                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg text-xs font-bold {{ $iconClass }}"
                                            >
                                                !
                                            </div>


                                            <div class="min-w-0 flex-1">

                                                <div class="flex items-start justify-between gap-2">

                                                    <p class="text-xs font-bold text-slate-800 leading-snug">
                                                        {{ $data['judul'] ?? 'Notifikasi' }}
                                                    </p>


                                                    @if (!$notification->read_at)

                                                        <span
                                                            class="mt-1 h-2 w-2 shrink-0 rounded-full bg-emerald-500"
                                                        ></span>

                                                    @endif

                                                </div>


                                                <p class="mt-0.5 text-xs text-slate-500 leading-normal">
                                                    {{ $data['pesan'] ?? '' }}
                                                </p>


                                                <p class="mt-1 text-[10px] text-slate-400">
                                                    {{ $notification->created_at->diffForHumans() }}
                                                </p>

                                            </div>

                                        </a>

                                    @empty

                                        <div class="px-5 py-8 text-center">

                                            <p class="text-xs font-semibold text-slate-500">
                                                Belum ada notifikasi
                                            </p>

                                        </div>

                                    @endforelse

                                </div>

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- JAM WIB --}}
                        {{-- ================================================= --}}

                        <div
                            class="hidden items-center gap-3 rounded-xl border border-emerald-100 bg-white px-3.5 py-1.5 shadow-sm sm:flex"
                        >

                            <div class="relative flex h-2.5 w-2.5 items-center justify-center">

                                <span
                                    class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"
                                ></span>

                                <span
                                    class="relative inline-flex h-2 w-2 rounded-full bg-emerald-500"
                                ></span>

                            </div>


                            <div>

                                <div class="flex items-center gap-1.5 leading-none">

                                    <span
                                        id="wib-clock"
                                        class="text-base font-extrabold tracking-tight text-emerald-950"
                                    >
                                        00:00:00
                                    </span>

                                    <span
                                        class="rounded bg-emerald-100/70 px-1 py-0.5 text-[9px] font-extrabold text-emerald-800"
                                    >
                                        WIB
                                    </span>

                                </div>


                                <p
                                    id="wib-date"
                                    class="mt-1 text-[9px] font-medium text-slate-400"
                                >
                                    Memuat tanggal...
                                </p>

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- PROFILE --}}
                        {{-- ================================================= --}}

                        <a
                            href="{{ route('profile.index') }}"
                            class="shrink-0"
                        >

                            <img
                                src="{{ auth()->user()->profile_photo
                                    ? asset('storage/' . auth()->user()->profile_photo)
                                    : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&color=FFFFFF&background=047857' }}"
                                class="h-10 w-10 rounded-full border-2 border-emerald-200 object-cover shadow-sm transition hover:border-emerald-400"
                                alt="Profile"
                            >

                        </a>

                    </div>

                </header>


                {{-- ===================================================== --}}
                {{-- CONTENT --}}
                {{-- ===================================================== --}}

                <div class="flex-1 p-6">

                    @yield('content')

                </div>

            </main>

        </div>

    @else

        @yield('content')

    @endif


    {{-- ========================================================= --}}
    {{-- JAM WIB SCRIPT --}}
    {{-- ========================================================= --}}

    <script>

        function updateWIBClock() {

            const now = new Date();

            const timeOptions = {

                timeZone: 'Asia/Jakarta',

                hour: '2-digit',

                minute: '2-digit',

                second: '2-digit',

                hour12: false

            };


            const dateOptions = {

                timeZone: 'Asia/Jakarta',

                weekday: 'long',

                day: '2-digit',

                month: 'long',

                year: 'numeric'

            };


            let time = new Intl.DateTimeFormat(
                'id-ID',
                timeOptions
            ).format(now);


            time = time.replace(/\./g, ':');


            const date = new Intl.DateTimeFormat(
                'id-ID',
                dateOptions
            ).format(now);


            const clockElement = document.getElementById('wib-clock');

            const dateElement = document.getElementById('wib-date');


            if (clockElement) {
                clockElement.textContent = time;
            }


            if (dateElement) {
                dateElement.textContent = date;
            }

        }


        updateWIBClock();

        setInterval(updateWIBClock, 1000);

    </script>

</body>

</html>