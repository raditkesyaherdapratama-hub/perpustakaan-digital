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

</head>


<body
    class="min-h-screen bg-[#effcf4]"
    style="font-family: 'Inter', sans-serif;"
>

    {{-- BACKGROUND --}}
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

                {{-- GLOW --}}
                <div
                    class="absolute -inset-1 -z-10 rounded-[30px] bg-gradient-to-br from-emerald-300/30 via-transparent to-green-400/20 blur-xl"
                ></div>


                {{-- LOGO --}}
                <div class="mb-7 text-center">

                    <img
                        src="{{ asset('images/logo-mi-al-falahiyyah-HD (2).png') }}"
                        alt="Logo MI Al Falahiyyah Rajeg"
                        class="mx-auto h-24 w-24 object-contain"
                    >


                    <h1 class="mt-5 text-2xl font-extrabold tracking-tight text-slate-900">
                        Buat Akun
                    </h1>

                    <p class="mt-1 text-sm font-medium text-slate-500">
                        Bergabung dengan Perpustakaan Digital
                    </p>

                </div>


                {{-- ERROR --}}
                @if ($errors->any())

                    <div
                        class="mb-5 rounded-2xl border border-red-200 bg-red-50 px-4 py-3"
                    >

                        <p class="text-sm font-semibold text-red-700">
                            Periksa kembali data kamu
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
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm font-medium text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10"
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
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm font-medium text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10"
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
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm font-medium text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10"
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
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm font-medium text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10"
                        >

                    </div>


                    {{-- BUTTON --}}
                    <button
                        type="submit"
                        class="group relative mt-2 w-full overflow-hidden rounded-2xl bg-gradient-to-r from-emerald-600 to-green-700 py-3.5 text-sm font-bold text-white shadow-lg shadow-emerald-600/25 transition duration-300 hover:-translate-y-0.5 hover:from-emerald-500 hover:to-green-600 hover:shadow-xl hover:shadow-emerald-600/30 active:translate-y-0"
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