@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100 px-6 py-8">

    <div class="mx-auto max-w-5xl">

        {{-- HEADER --}}
        <div class="mb-8">

            <p class="text-sm font-medium text-slate-400">
                Manajemen Buku
            </p>

            <h1 class="mt-1 text-3xl font-bold text-slate-900">
                Edit Buku
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Perbarui informasi koleksi buku 📚
            </p>

        </div>


        {{-- FORM --}}
        <div class="rounded-2xl bg-white p-6 shadow-sm md:p-8">

            <form
                action="{{ route('buku.update', $buku) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                @method('PUT')


                @if ($errors->any())

                    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-600">

                        <ul class="list-inside list-disc space-y-1">

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <div class="grid gap-6 md:grid-cols-2">


                    <div>

                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Kode Buku
                        </label>

                        <input
                            type="text"
                            name="kode_buku"
                            value="{{ old('kode_buku', $buku->kode_buku) }}"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                        >

                    </div>


                    <div>

                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Kategori
                        </label>

                        <select
                            name="kategori_id"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                        >

                            @foreach ($kategoris as $kategori)

                                <option
                                    value="{{ $kategori->id }}"
                                    @selected(old('kategori_id', $buku->kategori_id) == $kategori->id)
                                >
                                    {{ $kategori->nama_kategori }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="md:col-span-2">

                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Judul Buku
                        </label>

                        <input
                            type="text"
                            name="judul_buku"
                            value="{{ old('judul_buku', $buku->judul_buku) }}"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                        >

                    </div>


                    <div>

                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Pengarang
                        </label>

                        <input
                            type="text"
                            name="pengarang"
                            value="{{ old('pengarang', $buku->pengarang) }}"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                        >

                    </div>


                    <div>

                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Penerbit
                        </label>

                        <input
                            type="text"
                            name="penerbit"
                            value="{{ old('penerbit', $buku->penerbit) }}"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                        >

                    </div>


                    <div>

                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Tahun Terbit
                        </label>

                        <input
                            type="number"
                            name="tahun_terbit"
                            value="{{ old('tahun_terbit', $buku->tahun_terbit) }}"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                        >

                    </div>


                    <div>

                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Stok
                        </label>

                        <input
                            type="number"
                            name="stok"
                            value="{{ old('stok', $buku->stok) }}"
                            min="0"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                        >

                    </div>


                    <div class="md:col-span-2">

                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Sampul Buku
                        </label>

                        @if ($buku->sampul)

                            <img
                                src="{{ asset('storage/' . $buku->sampul) }}"
                                class="mb-4 h-40 w-28 rounded-xl object-cover shadow-sm"
                            >

                        @endif

                        <input
                            type="file"
                            name="sampul"
                            accept="image/*"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm file:mr-4 file:border-0 file:bg-blue-600 file:px-4 file:py-2 file:text-white"
                        >

                    </div>


                    <div class="md:col-span-2">

                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Deskripsi Buku
                        </label>

                        <textarea
                            name="deskripsi"
                            rows="5"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                        >{{ old('deskripsi', $buku->deskripsi) }}</textarea>

                    </div>

                </div>


                <div class="mt-8 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                    <a
                        href="{{ route('buku.index') }}"
                        class="rounded-xl bg-slate-100 px-6 py-3 text-center text-sm font-semibold text-slate-600 hover:bg-slate-200"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-200 hover:bg-blue-700"
                    >
                        Update Buku
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection