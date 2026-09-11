<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Perpustakaan Digital' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans bg-primary-50 text-gray-800 antialiased">
    
    @if (auth()->check() && !request()->routeIs('login', 'register'))

        <div class="flex min-h-screen">

            {{-- SIDEBAR --}}
            <aside class="hidden w-72 flex-col bg-primary-900 text-white md:flex">

                <div class="flex h-20 items-center gap-3 border-b border-primary-800 px-6">

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-primary-600 text-2xl">
                        📚
                    </div>

                    <div>

                        <h1 class="font-bold">
                            Perpustakaan
                        </h1>

                        <p class="text-xs text-primary-200">
                            MI Al Falahiyyah
                        </p>

                    </div>

                </div>


                {{-- NAVBAR --}}
                <nav class="flex-1 space-y-2 px-4 py-6">

                    {{-- DASHBOARD --}}
                    @if (auth()->user()->role === 'admin')

                        <a
                            href="{{ route('admin.dashboard') }}"
                            class="flex items-center gap-3 rounded-xl px-4 py-3 transition hover:bg-primary-800 {{ request()->routeIs('admin.dashboard') ? 'bg-primary-600' : '' }}"
                        >
                            📊
                            <span>Dashboard</span>
                        </a>

                    @else

                        <a
                            href="{{ route('user.dashboard') }}"
                            class="flex items-center gap-3 rounded-xl px-4 py-3 transition hover:bg-primary-800 {{ request()->routeIs('user.dashboard') ? 'bg-primary-600' : '' }}"
                        >
                            📊
                            <span>Dashboard</span>
                        </a>

                    @endif


                    {{-- KOLEKSI BUKU --}}
                    <a
                        href="{{ route('buku.index') }}"
                        class="flex items-center gap-3 rounded-xl px-4 py-3 transition hover:bg-primary-800 {{ request()->routeIs('buku.*') ? 'bg-primary-600' : '' }}"
                    >
                        📚
                        <span>Koleksi Buku</span>
                    </a>


                    {{-- MENU USER --}}
                    @if (auth()->user()->role === 'user')

                        <a
                            href="{{ route('user.peminjaman') }}"
                            class="flex items-center gap-3 rounded-xl px-4 py-3 transition hover:bg-primary-800 {{ request()->routeIs('user.peminjaman') ? 'bg-primary-600' : '' }}"
                        >
                            📖
                            <span>Riwayat Peminjaman</span>
                        </a>

                    @endif


                    {{-- MENU ADMIN --}}
                    @if (auth()->user()->role === 'admin')

                        <div class="pt-6">

                            <p class="px-4 text-xs font-semibold uppercase tracking-wider text-primary-300">
                                Manajemen Admin
                            </p>

                        </div>


                        {{-- TAMBAH BUKU --}}
                        <a
                            href="{{ route('buku.create') }}"
                            class="flex items-center gap-3 rounded-xl px-4 py-3 transition hover:bg-primary-800 {{ request()->routeIs('buku.create') ? 'bg-primary-600' : '' }}"
                        >
                            ➕
                            <span>Tambah Buku</span>
                        </a>


                        {{-- KELOLA KATEGORI --}}
                        <a
                            href="{{ route('kategori.index') }}"
                            class="flex items-center gap-3 rounded-xl px-4 py-3 transition hover:bg-primary-800 {{ request()->routeIs('kategori.*') ? 'bg-primary-600' : '' }}"
                        >
                            🏷️
                            <span>Kelola Kategori</span>
                        </a>


                        {{-- PENGEMBALIAN --}}
                        <a
                            href="{{ route('pengembalian.index') }}"
                            class="flex items-center gap-3 rounded-xl px-4 py-3 transition hover:bg-primary-800 {{ request()->routeIs('pengembalian.*') ? 'bg-primary-600' : '' }}"
                        >
                            🔄
                            <span>Pengembalian</span>
                        </a>


                        {{-- KELOLA ANGGOTA --}}
                        <a
                            href="{{ route('anggota.index') }}"
                            class="flex items-center gap-3 rounded-xl px-4 py-3 transition hover:bg-primary-800 {{ request()->routeIs('anggota.*') ? 'bg-primary-600' : '' }}"
                        >
                            👥
                            <span>Kelola Anggota</span>
                        </a>


                        {{-- LAPORAN --}}
                        <a
                            href="{{ route('laporan.index') }}"
                            class="flex items-center gap-3 rounded-xl px-4 py-3 transition hover:bg-primary-800 {{ request()->routeIs('laporan.*') ? 'bg-primary-600' : '' }}"
                        >
                            📊
                            <span>Laporan</span>
                        </a>

                    @endif

                </nav>


                {{-- USER PROFILE --}}
                <div class="border-t border-primary-800 p-4">

                    <div class="mb-4 flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary-600 font-bold">

                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                        </div>

                        <div class="min-w-0">

                            <p class="truncate text-sm font-semibold">
                                {{ auth()->user()->name }}
                            </p>

                            <p class="text-xs capitalize text-primary-200">
                                {{ auth()->user()->role }}
                            </p>

                        </div>

                    </div>


                    {{-- LOGOUT --}}
                    <form action="{{ route('logout') }}" method="POST">

                        @csrf

                        <button
                            type="submit"
                            class="w-full rounded-xl bg-red-500/10 px-4 py-3 text-left text-sm font-semibold text-red-400 transition hover:bg-red-500 hover:text-white"
                        >
                            🚪 Logout
                        </button>

                    </form>

                </div>

            </aside>


            {{-- MAIN --}}
            <main class="min-w-0 flex-1">

                {{-- HEADER --}}
                <header class="flex min-h-20 items-center justify-between gap-4 border-b border-primary-100 bg-white px-4 py-4 shadow-sm sm:px-6">

                    {{-- WELCOME --}}
                    <div>

                        <p class="text-sm text-slate-400">
                            Selamat datang kembali 👋
                        </p>

                        <h2 class="font-bold text-primary-900">
                            {{ auth()->user()->name }}
                        </h2>

                    </div>


                    {{-- RIGHT HEADER --}}
                    <div class="flex items-center gap-3">


                        {{-- ========================================= --}}
                        {{-- JAM WIB --}}
                        {{-- ========================================= --}}
                        <div
                            class="flex items-center gap-3 rounded-2xl border border-primary-100 bg-white px-4 py-2 shadow-sm"
                        >

                            {{-- STATUS --}}
                            <div
                                class="relative flex h-8 w-8 items-center justify-center rounded-xl bg-primary-50"
                            >

                                <span class="relative flex h-2.5 w-2.5">

                                    <span
                                        class="absolute inline-flex h-full w-full animate-ping rounded-full bg-primary-400 opacity-50"
                                    ></span>

                                    <span
                                        class="relative inline-flex h-2.5 w-2.5 rounded-full bg-primary-500"
                                    ></span>

                                </span>

                            </div>


                            {{-- TIME --}}
                            <div>

                                <div class="flex items-center gap-2 leading-none">

                                    <span
                                        id="wib-clock"
                                        class="text-lg font-extrabold tracking-tight text-primary-900"
                                    >
                                        00:00:00
                                    </span>

                                    <span
                                        class="rounded-md bg-primary-50 px-1.5 py-1 text-[9px] font-extrabold tracking-wider text-primary-600"
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


                        {{-- ========================================= --}}
                        {{-- AVATAR --}}
                        {{-- ========================================= --}}
                        <div>

                            <a href="{{ route('profile.index') }}">

                                <img
                                    src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                                    class="h-14 w-14 rounded-full border-2 border-primary-200 object-cover"
                                    alt="Profile"
                                >

                            </a>

                        </div>

                    </div>

                </header>


                {{-- CONTENT --}}
                <div>

                    @yield('content')

                </div>

            </main>

        </div>

    @else

        @yield('content')

    @endif


    {{-- ========================================= --}}
    {{-- JAVASCRIPT JAM WIB --}}
    {{-- ========================================= --}}
    <script>

        function updateWIBClock() {

            const now = new Date();


            // ================================
            // WAKTU WIB
            // ================================
            const timeOptions = {

                timeZone: 'Asia/Jakarta',

                hour: '2-digit',

                minute: '2-digit',

                second: '2-digit',

                hour12: false

            };


            // ================================
            // TANGGAL WIB
            // ================================
            const dateOptions = {

                timeZone: 'Asia/Jakarta',

                weekday: 'long',

                day: '2-digit',

                month: 'long',

                year: 'numeric'

            };


            // ================================
            // FORMAT WAKTU
            // ================================
            const time = new Intl.DateTimeFormat(
                'id-ID',
                timeOptions
            ).format(now);


            // ================================
            // FORMAT TANGGAL
            // ================================
            const date = new Intl.DateTimeFormat(
                'id-ID',
                dateOptions
            ).format(now);


            // ================================
            // TAMPILKAN JAM
            // ================================
            const clockElement =
                document.getElementById('wib-clock');

            const dateElement =
                document.getElementById('wib-date');


            if (clockElement) {

                clockElement.textContent = time;

            }


            if (dateElement) {

                dateElement.textContent = date;

            }

        }


        // Jalankan saat halaman pertama kali dibuka
        updateWIBClock();


        // Update setiap 1 detik
        setInterval(updateWIBClock, 1000);

    </script>

</body>

</html>