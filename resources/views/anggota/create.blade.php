@extends('layouts.app')

@section('content')

{{-- FONT INTER --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    rel="stylesheet"
>

<div
    class="min-h-screen bg-slate-100 px-4 py-6 sm:px-6 lg:px-8"
    style="font-family: 'Inter', sans-serif;"
>

    <div class="mx-auto max-w-4xl">

        {{-- BACK --}}
        <a
            href="{{ route('anggota.index') }}"
            class="group mb-6 inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition duration-200 hover:text-emerald-600"
        >
            <span
                class="flex h-8 w-8 items-center justify-center rounded-xl border border-slate-200 bg-white shadow-sm transition group-hover:-translate-x-1 group-hover:border-emerald-200 group-hover:bg-emerald-50"
            >
                ←
            </span>

            Kembali ke Anggota
        </a>


        {{-- HEADER --}}
        <div class="mb-8">

            <div class="mb-4 flex items-center gap-3">

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 text-xl shadow-sm ring-1 ring-emerald-200"
                >
                    👥
                </div>

                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-emerald-600">
                        Manajemen Anggota
                    </p>

                    <p class="mt-1 text-xs text-slate-400">
                        Perpustakaan Digital
                    </p>
                </div>

            </div>


            <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                Tambah Anggota
            </h1>

            <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                Tambahkan akun anggota baru untuk dapat menggunakan sistem
                perpustakaan digital.
            </p>

        </div>


        {{-- FORM CARD --}}
        <div
            class="overflow-hidden rounded-[28px] border border-slate-200 bg-white shadow-[0_20px_60px_-25px_rgba(15,23,42,0.25)]"
        >

            {{-- CARD HEADER --}}
            <div
                class="border-b border-slate-100 bg-gradient-to-r from-emerald-50 via-white to-green-50 px-6 py-6 sm:px-8"
            >

                <div class="flex items-center gap-4">

                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-white text-lg shadow-sm ring-1 ring-emerald-100"
                    >
                        ✦
                    </div>

                    <div>
                        <h2 class="font-bold text-slate-800">
                            Informasi Anggota
                        </h2>

                        <p class="mt-1 text-xs text-slate-400">
                            Isi data anggota dengan lengkap dan benar.
                        </p>
                    </div>

                </div>

            </div>


            {{-- FORM --}}
            <form
                action="{{ route('anggota.store') }}"
                method="POST"
                class="space-y-6 p-6 sm:p-8"
            >

                @csrf


                {{-- NAMA --}}
                <div>

                    <label
                        for="name"
                        class="mb-2.5 block text-sm font-bold text-slate-700"
                    >
                        Nama Lengkap
                    </label>

                    <div class="relative">

                        <div
                            class="pointer-events-none absolute inset-y-0 left-0 flex w-12 items-center justify-center text-slate-400"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a8.25 8.25 0 0 1 15 0"
                                />
                            </svg>
                        </div>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap anggota"
                            autocomplete="name"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50/70 py-3.5 pl-12 pr-4 text-sm font-medium text-slate-800 outline-none transition duration-200 placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10"
                        >

                    </div>

                    @error('name')
                        <p class="mt-2 flex items-center gap-1.5 text-xs font-medium text-red-500">
                            <span>⚠</span>
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- EMAIL --}}
                <div>

                    <label
                        for="email"
                        class="mb-2.5 block text-sm font-bold text-slate-700"
                    >
                        Email
                    </label>

                    <div class="relative">

                        <div
                            class="pointer-events-none absolute inset-y-0 left-0 flex w-12 items-center justify-center text-slate-400"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21.75 7.5v9A2.25 2.25 0 0 1 19.5 18.75h-15a2.25 2.25 0 0 1-2.25-2.25v-9A2.25 2.25 0 0 1 4.5 5.25h15a2.25 2.25 0 0 1 2.25 2.25Z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m3 6.75 8.45 6.338a.9.9 0 0 0 1.1 0L21 6.75"
                                />
                            </svg>
                        </div>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="contoh@email.com"
                            autocomplete="email"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50/70 py-3.5 pl-12 pr-4 text-sm font-medium text-slate-800 outline-none transition duration-200 placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10"
                        >

                    </div>

                    @error('email')
                        <p class="mt-2 flex items-center gap-1.5 text-xs font-medium text-red-500">
                            <span>⚠</span>
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- PASSWORD --}}
                <div>

                    <label
                        for="password"
                        class="mb-2.5 block text-sm font-bold text-slate-700"
                    >
                        Password
                    </label>

                    <div class="relative">

                        <div
                            class="pointer-events-none absolute inset-y-0 left-0 flex w-12 items-center justify-center text-slate-400"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <rect
                                    width="16"
                                    height="11"
                                    x="4"
                                    y="10"
                                    rx="2"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M8 10V7a4 4 0 0 1 8 0v3"
                                />
                            </svg>
                        </div>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Minimal 6 karakter"
                            autocomplete="new-password"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50/70 py-3.5 pl-12 pr-4 text-sm font-medium text-slate-800 outline-none transition duration-200 placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10"
                        >

                    </div>

                    @error('password')
                        <p class="mt-2 flex items-center gap-1.5 text-xs font-medium text-red-500">
                            <span>⚠</span>
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- KONFIRMASI PASSWORD --}}
                <div>

                    <label
                        for="password_confirmation"
                        class="mb-2.5 block text-sm font-bold text-slate-700"
                    >
                        Konfirmasi Password
                    </label>

                    <div class="relative">

                        <div
                            class="pointer-events-none absolute inset-y-0 left-0 flex w-12 items-center justify-center text-slate-400"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9Z"
                                />
                            </svg>
                        </div>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            placeholder="Ulangi password"
                            autocomplete="new-password"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50/70 py-3.5 pl-12 pr-4 text-sm font-medium text-slate-800 outline-none transition duration-200 placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10"
                        >

                    </div>

                </div>


                {{-- INFO --}}
                <div
                    class="rounded-2xl border border-emerald-100 bg-emerald-50/70 p-4"
                >

                    <div class="flex gap-3">

                        <div
                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-white text-sm shadow-sm"
                        >
                            💡
                        </div>

                        <div>
                            <p class="text-xs font-bold text-emerald-800">
                                Informasi
                            </p>

                            <p class="mt-1 text-xs leading-5 text-emerald-700/80">
                                Pastikan email dan password anggota sudah benar
                                sebelum menyimpan data.
                            </p>
                        </div>

                    </div>

                </div>


                {{-- BUTTON --}}
                <div
                    class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end"
                >

                    <a
                        href="{{ route('anggota.index') }}"
                        class="inline-flex items-center justify-center rounded-2xl border border-slate-200 bg-white px-6 py-3.5 text-sm font-bold text-slate-600 transition duration-200 hover:border-slate-300 hover:bg-slate-50 hover:text-slate-800"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="group inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-emerald-600 to-green-600 px-7 py-3.5 text-sm font-bold text-white shadow-lg shadow-emerald-200 transition duration-200 hover:-translate-y-0.5 hover:from-emerald-700 hover:to-green-700 hover:shadow-xl hover:shadow-emerald-200/70 active:translate-y-0"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 transition group-hover:scale-110"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 4.5v15m7.5-7.5h-15"
                            />
                        </svg>

                        Simpan Anggota
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection