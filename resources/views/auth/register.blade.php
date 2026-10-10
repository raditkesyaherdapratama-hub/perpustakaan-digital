<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar | Perpustakaan Digital</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        /* Animasi bergerak untuk partikel salju/cahaya */
        @keyframes fall {
            0% {
                transform: translateY(-20px) translateX(0);
                opacity: 0;
            }
            20% {
                opacity: 0.8;
            }
            80% {
                opacity: 0.8;
            }
            100% {
                transform: translateY(105vh) translateX(30px);
                opacity: 0;
            }
        }
        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.75);
            border-radius: 50%;
            pointer-events: none;
            animation: fall linear infinite;
        }
    </style>

</head>


<body
    class="min-h-screen bg-gradient-to-br from-emerald-950 via-emerald-900 to-teal-950 text-slate-100 overflow-x-hidden relative"
    style="font-family: 'Inter', sans-serif;"
>

    {{-- CONTAINER PARTIKEL BERGERAK (DIGENERATE DENGAN JS) --}}
    <div id="particles-container" class="pointer-events-none fixed inset-0 overflow-hidden z-0">
        <div class="absolute -top-40 -left-40 h-[500px] w-[500px] rounded-full bg-emerald-500/30 blur-[120px] animate-pulse"></div>
        <div class="absolute -bottom-40 -right-40 h-[500px] w-[500px] rounded-full bg-teal-400/25 blur-[120px] animate-pulse" style="animation-duration: 4s;"></div>
    </div>


    {{-- MAIN --}}
    <main class="relative z-10 flex min-h-screen items-center justify-center px-4 py-12">

        <div class="w-full max-w-md">

            {{-- CARD AESTHETIC GLASSMORPHISM --}}
            <div
                class="relative rounded-[32px] border border-white/30 bg-white/95 p-8 shadow-[0_25px_60px_-15px_rgba(4,120,87,0.5)] backdrop-blur-2xl sm:p-10 text-slate-800 transition-all duration-300"
            >

                {{-- GLOW DI BELAKANG CARD --}}
                <div
                    class="absolute -inset-2 -z-10 rounded-[36px] bg-gradient-to-r from-emerald-500/40 via-teal-400/30 to-green-500/40 blur-xl opacity-75"
                ></div>


                {{-- LOGO --}}
                <div class="mb-7 text-center">

                    <div class="mx-auto flex h-24 w-24 items-center justify-center transform transition duration-300 hover:scale-110">

                        <img
                            src="{{ asset('images/logo-mi-al-falahiyyah-HD (2).png') }}"
                            alt="Logo MI Al Falahiyyah Rajeg"
                            class="h-full w-full object-contain drop-shadow-[0_10px_20px_rgba(5,150,105,0.3)]"
                        >

                    </div>


                    <h1 class="mt-5 text-2xl font-extrabold tracking-tight text-slate-900">
                        Buat Akun
                    </h1>

                    <p class="mt-1 text-sm font-semibold text-emerald-600">
                        Bergabung dengan Perpustakaan Digital
                    </p>

                </div>


                {{-- ERROR (DIPERBAIKI AMAN DARI MALFORMED LOOP) --}}
                @if ($errors->any())

                    <div
                        class="mb-5 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 shadow-sm"
                    >

                        <p class="text-sm font-semibold text-red-700">
                            Periksa kembali data kamu
                        </p>

                        <ul class="mt-1 text-xs text-red-600 space-y-1">

                            @foreach ($errors->all() as$error)

                                <li>
                                    • {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                {{-- FORM --}}
                <form
                    method="POST"
                    action="{{ route('register') }}"
                    class="space-y-4"
                >

                    @csrf


                    {{-- NAMA --}}
                    <div>

                        <label
                            for="name"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Nama Lengkap
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Masukkan nama lengkap"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50/80 px-4 py-3.5 text-sm font-medium text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/20"
                        >

                    </div>


                    {{-- EMAIL --}}
                    <div>

                        <label
                            for="email"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Email
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            placeholder="contoh@email.com"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50/80 px-4 py-3.5 text-sm font-medium text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/20"
                        >

                    </div>


                    {{-- PASSWORD --}}
                    <div>

                        <label
                            for="password"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Password
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="Minimal 8 karakter"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50/80 px-4 py-3.5 text-sm font-medium text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/20"
                        >

                    </div>


                    {{-- CONFIRM PASSWORD --}}
                    <div>

                        <label
                            for="password_confirmation"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Konfirmasi Password
                        </label>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Ulangi password"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50/80 px-4 py-3.5 text-sm font-medium text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/20"
                        >

                    </div>


                    {{-- BUTTON --}}
                    <button
                        type="submit"
                        class="group relative mt-2 w-full overflow-hidden rounded-2xl bg-gradient-to-r from-emerald-600 to-teal-600 py-3.5 text-sm font-bold text-white shadow-lg shadow-emerald-600/30 transition duration-300 hover:-translate-y-0.5 hover:from-emerald-500 hover:to-teal-500 hover:shadow-xl hover:shadow-emerald-600/50 active:translate-y-0"
                    >

                        <span class="relative z-10 flex items-center justify-center gap-2">

                            <span>
                                Buat Akun
                            </span>

                            <span class="transition-transform duration-300 group-hover:translate-x-1">
                                →
                            </span>

                        </span>

                    </button>

                </form>


                {{-- LOGIN --}}
                <div class="mt-7 border-t border-slate-100 pt-6 text-center">

                    <p class="text-sm text-slate-500">

                        Sudah punya akun?

                        <a
                            href="{{ route('login') }}"
                            class="font-bold text-emerald-600 transition hover:text-emerald-700"
                        >
                            Login sekarang
                        </a>

                    </p>

                </div>

            </div>


            {{-- FOOTER --}}
            <div class="mt-6 text-center">

                <p class="text-xs font-medium text-emerald-100/80">
                    © {{ date('Y') }} MI Al Falahiyyah Rajeg
                </p>

                <p class="mt-1 text-[11px] text-emerald-200/60">
                    Sistem Perpustakaan Digital
                </p>

            </div>

        </div>

    </main>


    {{-- SCRIPT JAVASCRIPT UNTUK MENJALANKAN PARTIKEL BERGERAK --}}
    <script>
        const container = document.getElementById('particles-container');
        const particleCount = 25;

        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            
            const size = Math.random() * 4 + 3;
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            
            particle.style.left = `${Math.random() * 100}%`;
            
            const duration = Math.random() * 7 + 5;
            particle.style.animationDuration = `${duration}s`;
            
            const delay = Math.random() * 8;
            particle.style.animationDelay = `${delay}s`;
            
            container.appendChild(particle);
        }
    </script>

</body>

</html>