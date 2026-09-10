@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100 px-6 py-8">

    <div class="mx-auto max-w-3xl">

        <div class="mb-8">

            <p class="text-sm font-semibold uppercase tracking-wider text-blue-600">
                Manajemen Perpustakaan
            </p>

            <h1 class="mt-2 text-3xl font-bold text-slate-800">
                Tambah Kategori
            </h1>

            <p class="mt-2 text-slate-500">
                Tambahkan kategori baru untuk koleksi buku 📚
            </p>

        </div>


        <div class="rounded-2xl bg-white p-8 shadow-sm">

            @if ($errors->any())

                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">

                    <ul class="list-disc pl-5">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                action="{{ route('kategori.store') }}"
                method="POST"
            >

                @csrf


                <div class="mb-6">

                    <label class="mb-2 block font-semibold text-slate-700">
                        Nama Kategori
                    </label>

                    <input
                        type="text"
                        name="nama_kategori"
                        value="{{ old('nama_kategori') }}"
                        placeholder="Contoh: Buku Pelajaran"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    >

                </div>


                <div class="mb-8">

                    <label class="mb-2 block font-semibold text-slate-700">
                        Deskripsi
                    </label>

                    <textarea
                        name="deskripsi"
                        rows="5"
                        placeholder="Masukkan deskripsi kategori..."
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    >{{ old('deskripsi') }}</textarea>

                </div>


                <div class="flex gap-3">

                    <a
                        href="{{ route('kategori.index') }}"
                        class="flex-1 rounded-xl bg-slate-100 py-3 text-center font-semibold text-slate-600 transition hover:bg-slate-200"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="flex-1 rounded-xl bg-blue-600 py-3 font-semibold text-white transition hover:bg-blue-700"
                    >
                        Simpan Kategori
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection