<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Perpustakaan Digital</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

</head>


<body
    class="min-h-screen bg-[#effcf4]"
    style="font-family: 'Inter', sans-serif;"
>

    {{-- BACKGROUND DECORATION --}}
    <div class="pointer-events-none fixed inset-0 overflow-hidden">

        <div
            class="absolute -left-32 -top-32 h-96 w-96 rounded-full bg-emerald-300/20 blur-3xl"
        ></div>

        <div
            class="absolute -bottom-32 -right-32 h-96 w-96 rounded-full bg-green-400/20 blur-3xl"
        ></div>

        <div
            class="absolute left-1/2 top-1/2 h-72 w-72 -translate-x-1/2 -translate-y-1/2 rounded-full bg-emerald-200/10 blur-3xl"
        ></div>

    </div>


    {{-- MAIN --}}
    <main class="relative flex min-h-screen items-center justify-center px-5 py-10">

        <div class="w-full max-w-md">

            {{-- CARD --}}
            <div
                class="relative rounded-[28px] border border-white/80 bg-white/95 p-7 shadow-[0_25px_70px_-20px_rgba(5,150,105,0.30)] backdrop-blur-xl sm:p-9"
            >

                {{-- GLOW BELAKANG CARD --}}
                <div
                    class="absolute -inset-1 -z-10 rounded-[30px] bg-gradient-to-br from-emerald-300/30 via-transparent to-green-400/20 blur-xl"
                ></div>


                {{-- LOGO --}}
                <div class="mb-7 text-center">

                    {{-- LOGO LANGSUNG MENYATU DENGAN CARD --}}
                    <div class="mx-auto flex h-24 w-24 items-center justify-center">

                        <img
                            src="{{ asset('images/logo-mi-al-falahiyyah-HD (2).png') }}"
                            alt="Logo MI Al Falahiyyah Rajeg"
                            class="h-full w-full object-contain drop-shadow-[0_8px_12px_rgba(5,150,105,0.18)]"
                        >

                    </div>


                    <h1 class="mt-5 text-2xl font-extrabold tracking-tight text-slate-900">
                        Perpustakaan Digital
                    </h1>

                    <p class="mt-1 text-sm font-medium text-slate-500">
                        MI Al Falahiyyah Rajeg
                    </p>

                </div>


                {{-- ERROR --}}
                @if ($errors->any())

                    <div
                        class="mb-5 rounded-2xl border border-red-200 bg-red-50 px-4 py-3"
                    >

                        <p class="text-sm font-semibold text-red-700">
                            Login gagal
                        </p>

                        <ul class="mt-1 text-xs text-red-600">

                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                {{-- SUCCESS --}}
                @if (session('success'))

                    <div
                        class="mb-5 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3"
                    >

                        <p class="text-sm font-semibold text-emerald-700">
                            {{ session('success') }}
                        </p>

                    </div>

                @endif


                {{-- FORM --}}
                <form
                    method="POST"
                    action="{{ route('login') }}"
                    class="space-y-5"
                >

                    @csrf


                    {{-- EMAIL --}}
                    <div>

                        <label
                            for="email"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Email
                        </label>

                        <div class="relative">

                            <div
                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400"
                            >
                                ✉️
                            </div>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="email"
                                placeholder="Masukkan email kamu"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 py-3.5 pl-11 pr-4 text-sm font-medium text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10"
                            >

                        </div>

                    </div>


                    {{-- PASSWORD --}}
                    <div>

                        <label
                            for="password"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Password
                        </label>

                        <div class="relative">

                            <div
                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400"
                            >
                                🔒
                            </div>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Masukkan password"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 py-3.5 pl-11 pr-4 text-sm font-medium text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10"
                            >

                        </div>

                    </div>


                    {{-- REMEMBER --}}
                    <div class="flex items-center justify-between">

                        <label class="flex cursor-pointer items-center gap-2">

                            <input
                                type="checkbox"
                                name="remember"
                                class="h-4 w-4 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500"
                            >

                            <span class="text-xs font-medium text-slate-500">
                                Ingat saya
                            </span>

                        </label>

                    </div>


                    {{-- BUTTON --}}
                    <button
                        type="submit"
                        class="group relative w-full overflow-hidden rounded-2xl bg-gradient-to-r from-emerald-600 to-green-700 py-3.5 text-sm font-bold text-white shadow-lg shadow-emerald-600/25 transition duration-300 hover:-translate-y-0.5 hover:from-emerald-500 hover:to-green-600 hover:shadow-xl hover:shadow-emerald-600/30 active:translate-y-0"
                    >

                        <span class="relative z-10 flex items-center justify-center gap-2">

                            <span>
                                Masuk ke Sistem
                            </span>

                            <span class="transition-transform duration-300 group-hover:translate-x-1">
                                →
                            </span>

                        </span>

                    </button>

                </form>


                {{-- REGISTER --}}
                <div class="mt-7 border-t border-slate-100 pt-6 text-center">

                    <p class="text-sm text-slate-500">

                        Belum punya akun?

                        <a
                            href="{{ route('register') }}"
                            class="font-bold text-emerald-600 transition hover:text-emerald-700"
                        >
                            Daftar sekarang
                        </a>

                    </p>

                </div>

            </div>


            {{-- FOOTER --}}
            <div class="mt-6 text-center">

                <p class="text-xs font-medium text-slate-400">
                    © {{ date('Y') }} MI Al Falahiyyah Rajeg
                </p>

                <p class="mt-1 text-[11px] text-slate-400">
                    Sistem Perpustakaan Digital
                </p>

            </div>

        </div>

    </main>

</body>

</html>