@extends('layouts.app')

@section('content')

{{-- GOOGLE FONT INTER --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    rel="stylesheet"
>

<div class="min-h-screen bg-[#f0fdf4] px-4 py-8 font-[Inter] sm:px-6 lg:px-8">

    <div class="mx-auto max-w-6xl">

        {{-- ========================================================= --}}
        {{-- HEADER --}}
        {{-- ========================================================= --}}

        <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-end">

            <div>

                {{-- BADGE --}}
                <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1.5">

                    <span class="relative flex h-2.5 w-2.5">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                    </span>

                    <span class="text-xs font-bold uppercase tracking-widest text-emerald-700">
                        Account Settings
                    </span>

                </div>


                <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 md:text-4xl">
                    Profile
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Kelola informasi akun dan keamanan password Anda.
                </p>

            </div>


            {{-- STATUS --}}
            <div class="inline-flex items-center gap-3 self-start rounded-2xl border border-emerald-100 bg-white px-5 py-3 shadow-sm md:self-auto">

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-lg">
                    ⚙️
                </div>

                <div>

                    <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400">
                        Account Status
                    </p>

                    <p class="mt-0.5 text-sm font-bold text-emerald-700">
                        ● Active
                    </p>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- SUCCESS PROFILE --}}
        {{-- ========================================================= --}}

        @if(session('success'))

            <div class="mb-6 flex items-center gap-4 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 shadow-sm">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-lg">
                    ✓
                </div>

                <div>

                    <p class="text-sm font-bold text-emerald-800">
                        Berhasil
                    </p>

                    <p class="mt-0.5 text-sm text-emerald-700">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- SUCCESS PASSWORD --}}
        {{-- ========================================================= --}}

        @if(session('success_password'))

            <div class="mb-6 flex items-center gap-4 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 shadow-sm">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-lg">
                    🔐
                </div>

                <div>

                    <p class="text-sm font-bold text-emerald-800">
                        Password Berhasil Diubah
                    </p>

                    <p class="mt-0.5 text-sm text-emerald-700">
                        {{ session('success_password') }}
                    </p>

                </div>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- ERROR --}}
        {{-- ========================================================= --}}

        @if($errors->any())

            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 shadow-sm">

                <div class="flex items-start gap-4">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-red-100 text-lg">
                        !
                    </div>

                    <div>

                        <p class="mb-2 text-sm font-bold text-red-800">
                            Terjadi Kesalahan
                        </p>

                        <ul class="list-disc space-y-1 pl-5 text-sm text-red-700">

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- PROFILE AREA --}}
        {{-- ========================================================= --}}

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">


            {{-- ===================================================== --}}
            {{-- PROFILE CARD --}}
            {{-- ===================================================== --}}

            <div class="relative overflow-hidden rounded-[28px] border border-emerald-100 bg-white shadow-sm transition duration-300 hover:shadow-xl">

                {{-- DECORATION --}}
                <div class="absolute -right-16 -top-16 h-40 w-40 rounded-full bg-emerald-50"></div>

                <div class="absolute -bottom-20 -left-16 h-40 w-40 rounded-full bg-green-50"></div>


                <div class="relative p-7">

                    {{-- TOP LABEL --}}
                    <div class="mb-7 flex items-center justify-between">

                        <div>

                            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-600">
                                My Account
                            </p>

                            <p class="mt-1 text-xs text-slate-400">
                                Profile overview
                            </p>

                        </div>

                        <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-emerald-50 text-sm">
                            👤
                        </div>

                    </div>


                    {{-- FOTO --}}
                    <div class="text-center">

                        <div class="relative mx-auto w-fit">

                            {{-- RING --}}
                            <div class="absolute -inset-1 rounded-full bg-gradient-to-br from-emerald-400 via-green-500 to-emerald-700 opacity-80"></div>

                            <div class="relative rounded-full bg-white p-1">

                                @if($user->profile_photo)

                                    <img
                                        src="{{ asset('storage/' . $user->profile_photo) }}"
                                        class="h-32 w-32 rounded-full object-cover"
                                        alt="Profile"
                                    >

                                @else

                                    <div class="flex h-32 w-32 items-center justify-center rounded-full bg-gradient-to-br from-emerald-700 to-green-500">

                                        <span class="text-4xl font-extrabold text-white">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </span>

                                    </div>

                                @endif

                            </div>


                            {{-- ONLINE INDICATOR --}}
                            <div class="absolute bottom-2 right-2 flex h-7 w-7 items-center justify-center rounded-full border-4 border-white bg-emerald-500">

                                <span class="h-2 w-2 rounded-full bg-white"></span>

                            </div>

                        </div>


                        {{-- NAME --}}
                        <h2 class="mt-6 text-xl font-extrabold tracking-tight text-slate-900">
                            {{ $user->name }}
                        </h2>

                        {{-- EMAIL --}}
                        <p class="mt-1 break-all text-sm text-slate-500">
                            {{ $user->email }}
                        </p>


                        {{-- ROLE --}}
                        <div class="mt-5">

                            @if($user->role === 'admin')

                                <span class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-4 py-2 text-xs font-bold text-emerald-700">

                                    <span class="h-2 w-2 rounded-full bg-emerald-500"></span>

                                    Administrator

                                </span>

                            @else

                                <span class="inline-flex items-center gap-2 rounded-full border border-blue-200 bg-blue-50 px-4 py-2 text-xs font-bold text-blue-700">

                                    <span class="h-2 w-2 rounded-full bg-blue-500"></span>

                                    User

                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- DIVIDER --}}
                    <div class="my-7 h-px bg-slate-100"></div>


                    {{-- ACCOUNT INFO --}}
                    <div class="space-y-4">

                        <div class="flex items-center justify-between">

                            <span class="text-xs font-medium text-slate-400">
                                Status
                            </span>

                            <span class="text-xs font-bold text-emerald-600">
                                Active
                            </span>

                        </div>

                        <div class="flex items-center justify-between">

                            <span class="text-xs font-medium text-slate-400">
                                Role
                            </span>

                            <span class="text-xs font-bold capitalize text-slate-700">
                                {{ $user->role }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- DATA PROFILE --}}
            {{-- ===================================================== --}}

            <div class="relative overflow-hidden rounded-[28px] border border-emerald-100 bg-white shadow-sm transition duration-300 hover:shadow-xl lg:col-span-2">

                <div class="border-b border-slate-100 bg-gradient-to-r from-emerald-50 via-white to-white px-7 py-6">

                    <div class="flex items-center gap-4">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 text-xl">
                            ✏️
                        </div>

                        <div>

                            <h2 class="text-xl font-extrabold text-slate-900">
                                Informasi Profile
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Perbarui informasi akun Anda.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="p-7">

                    <form
                        action="{{ route('profile.update') }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf
                        @method('PUT')


                        {{-- NAMA --}}
                        <div class="mb-6">

                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-600">
                                Nama
                            </label>

                            <div class="relative">

                                <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                    👤
                                </span>

                                <input
                                    type="text"
                                    name="name"
                                    value="{{ old('name', $user->name) }}"
                                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 py-3.5 pl-11 pr-4 text-sm font-medium text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10"
                                >

                            </div>

                        </div>


                        {{-- EMAIL --}}
                        <div class="mb-6">

                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-600">
                                Email
                            </label>

                            <div class="relative">

                                <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                    ✉️
                                </span>

                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email', $user->email) }}"
                                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 py-3.5 pl-11 pr-4 text-sm font-medium text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10"
                                >

                            </div>

                        </div>


                        {{-- FOTO --}}
                        <div class="mb-7">

                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-600">
                                Foto Profile
                            </label>

                            <div class="rounded-2xl border-2 border-dashed border-emerald-100 bg-emerald-50/40 p-4 transition hover:border-emerald-300">

                                <input
                                    type="file"
                                    name="profile_photo"
                                    accept=".jpg,.jpeg,.png,.webp"
                                    class="block w-full cursor-pointer text-sm text-slate-600 file:mr-4 file:rounded-xl file:border-0 file:bg-emerald-700 file:px-4 file:py-2.5 file:text-sm file:font-bold file:text-white file:transition hover:file:bg-emerald-800"
                                >

                                <p class="mt-3 text-xs text-slate-500">
                                    JPG, JPEG, PNG atau WEBP. Maksimal 2 MB.
                                </p>

                            </div>

                        </div>


                        {{-- BUTTON --}}
                        <div class="flex justify-end">

                            <button
                                type="submit"
                                class="inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-emerald-700 to-green-600 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-emerald-700/20 transition duration-200 hover:-translate-y-0.5 hover:from-emerald-800 hover:to-green-700 hover:shadow-xl"
                            >

                                <span>
                                    ✓
                                </span>

                                Simpan Perubahan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- PASSWORD --}}
        {{-- ========================================================= --}}

        <div class="relative mt-6 overflow-hidden rounded-[28px] border border-emerald-100 bg-white shadow-sm transition duration-300 hover:shadow-xl">

            {{-- HEADER --}}
            <div class="border-b border-slate-100 bg-gradient-to-r from-emerald-50 via-white to-white px-7 py-6">

                <div class="flex items-center gap-4">

                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 text-xl">
                        🔐
                    </div>

                    <div>

                        <h2 class="text-xl font-extrabold text-slate-900">
                            Ubah Password
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Gunakan password yang kuat untuk menjaga keamanan akun.
                        </p>

                    </div>

                </div>

            </div>


            {{-- PASSWORD FORM --}}
            <div class="p-7">

                <form
                    action="{{ route('profile.password') }}"
                    method="POST"
                >

                    @csrf
                    @method('PUT')


                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">


                        {{-- PASSWORD LAMA --}}
                        <div>

                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-600">
                                Password Lama
                            </label>

                            <div class="relative">

                                <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                    🔑
                                </span>

                                <input
                                    type="password"
                                    name="current_password"
                                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 py-3.5 pl-11 pr-4 text-sm font-medium text-slate-800 outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10"
                                >

                            </div>

                        </div>


                        {{-- PASSWORD BARU --}}
                        <div>

                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-600">
                                Password Baru
                            </label>

                            <div class="relative">

                                <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                    🔒
                                </span>

                                <input
                                    type="password"
                                    name="password"
                                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 py-3.5 pl-11 pr-4 text-sm font-medium text-slate-800 outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10"
                                >

                            </div>

                        </div>


                        {{-- KONFIRMASI --}}
                        <div>

                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-600">
                                Konfirmasi Password Baru
                            </label>

                            <div class="relative">

                                <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                    🛡️
                                </span>

                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 py-3.5 pl-11 pr-4 text-sm font-medium text-slate-800 outline-none transition focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10"
                                >

                            </div>

                        </div>

                    </div>


                    {{-- PASSWORD INFO + BUTTON --}}
                    <div class="mt-7 flex flex-col justify-between gap-4 border-t border-slate-100 pt-6 md:flex-row md:items-center">

                        <div class="flex items-center gap-3">

                            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-emerald-50 text-sm">
                                💡
                            </div>

                            <p class="text-xs leading-5 text-slate-500">
                                Pastikan password baru mudah Anda ingat
                                <br class="hidden sm:block">
                                dan tidak dibagikan kepada orang lain.
                            </p>

                        </div>


                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-2xl bg-slate-900 px-6 py-3.5 text-sm font-bold text-white shadow-lg transition duration-200 hover:-translate-y-0.5 hover:bg-slate-800 hover:shadow-xl"
                        >

                            <span>
                                🔐
                            </span>

                            Ubah Password

                        </button>

                    </div>

                </form>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- FOOTER INFO --}}
        {{-- ========================================================= --}}

        <div class="mt-6 flex items-start gap-4 rounded-2xl border border-emerald-100 bg-white px-5 py-4 shadow-sm">

            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50">
                🛡️
            </div>

            <div>

                <p class="text-sm font-bold text-emerald-800">
                    Keamanan Akun
                </p>

                <p class="mt-1 text-xs leading-5 text-slate-500">
                    Jangan bagikan password atau informasi login Anda kepada orang lain.
                    Pastikan informasi akun selalu diperbarui.
                </p>

            </div>

        </div>

    </div>

</div>

@endsection