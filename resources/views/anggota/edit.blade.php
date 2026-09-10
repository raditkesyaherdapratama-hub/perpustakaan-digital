@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100 p-6">

    <div class="mx-auto max-w-4xl">

        {{-- HEADER --}}
        <div class="mb-8">

            <a
                href="{{ route('anggota.index') }}"
                class="mb-5 inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-blue-600"
            >
                ← Kembali ke Anggota
            </a>

            <p class="text-sm font-semibold uppercase tracking-wider text-blue-600">
                Manajemen Admin
            </p>

            <h1 class="mt-2 text-3xl font-bold text-slate-800">
                Edit Anggota ✏️
            </h1>

            <p class="mt-2 text-slate-500">
                Perbarui informasi anggota perpustakaan.
            </p>

        </div>


        {{-- FORM --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">

            <form
                action="{{ route('anggota.update', $anggota) }}"
                method="POST"
                class="space-y-6"
            >

                @csrf
                @method('PUT')


                {{-- NAMA --}}
                <div>

                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $anggota->name) }}"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    >

                    @error('name')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- EMAIL --}}
                <div>

                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $anggota->email) }}"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    >

                    @error('email')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- PASSWORD --}}
                <div>

                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Password Baru
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Kosongkan jika tidak ingin mengganti password"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    >

                    @error('password')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                    <p class="mt-2 text-xs text-slate-400">
                        Password hanya perlu diisi jika ingin mengganti password.
                    </p>

                </div>


                {{-- KONFIRMASI PASSWORD --}}
                <div>

                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Konfirmasi Password Baru
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Ulangi password baru"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    >

                </div>


                {{-- BUTTON --}}
                <div class="flex justify-end gap-3 border-t border-slate-100 pt-6">

                    <a
                        href="{{ route('anggota.index') }}"
                        class="rounded-xl bg-slate-100 px-5 py-3 font-semibold text-slate-600 transition hover:bg-slate-200"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="rounded-xl bg-blue-600 px-6 py-3 font-semibold text-white shadow-lg shadow-blue-200 transition hover:bg-blue-700"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection