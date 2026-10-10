@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100 px-4 py-6 font-['Inter',sans-serif] sm:px-6 lg:px-8">

    <div class="mx-auto max-w-5xl">

        {{-- HEADER --}}
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

            <div>
                <div class="mb-2 flex items-center gap-2">
                    <span class="h-2 w-2 rounded-full bg-emerald-500 shadow-[0_0_10px_rgba(16,185,129,0.7)]"></span>

                    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-emerald-600">
                        Manajemen Buku
                    </p>
                </div>

                <h1 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                    Edit Buku
                </h1>

                <p class="mt-1.5 text-sm text-slate-500">
                    Perbarui informasi koleksi buku dengan data terbaru.
                </p>
            </div>

            <a
                href="{{ route('buku.index') }}"
                class="inline-flex w-fit items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 shadow-sm transition hover:border-emerald-200 hover:bg-emerald-50 hover:text-emerald-700"
            >
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>

                Kembali
            </a>

        </div>


        {{-- FORM CARD --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_8px_30px_rgba(15,23,42,0.06)]">

            {{-- CARD HEADER --}}
            <div class="border-b border-slate-100 bg-gradient-to-r from-emerald-50 via-white to-white px-5 py-4 sm:px-7">

                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-sm font-bold text-slate-800">
                            Informasi Koleksi
                        </h2>

                        <p class="mt-0.5 text-xs text-slate-500">
                            Pastikan data buku sudah sesuai sebelum disimpan.
                        </p>
                    </div>

                </div>

            </div>


            <form
                action="{{ route('buku.update', $buku) }}"
                method="POST"
                enctype="multipart/form-data"
                class="p-5 sm:p-7"
            >

                @csrf
                @method('PUT')


                {{-- ERROR --}}
                @if ($errors->any())
                    <div class="mb-6 flex gap-3 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-600">

                        <svg class="mt-0.5 h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M10.29 3.86l-8.18 14A2 2 0 003.84 21h16.32a2 2 0 001.73-3.14l-8.18-14a2 2 0 00-3.42 0z"/>
                        </svg>

                        <div>
                            <p class="mb-1 font-semibold">
                                Periksa kembali data berikut:
                            </p>

                            <ul class="list-inside list-disc space-y-1 text-xs">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                @endif


                {{-- FORM GRID --}}
                <div class="grid gap-5 md:grid-cols-2">


                    {{-- KODE BUKU --}}
                    <div>
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-600">
                            Kode Buku
                        </label>

                        <input
                            type="text"
                            name="kode_buku"
                            value="{{ old('kode_buku', $buku->kode_buku) }}"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-emerald-400 focus:bg-white focus:ring-4 focus:ring-emerald-100"
                        >
                    </div>


                    {{-- KATEGORI --}}
                    <div>
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-600">
                            Kategori
                        </label>

                        <select
                            name="kategori_id"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-emerald-400 focus:bg-white focus:ring-4 focus:ring-emerald-100"
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


                    {{-- JUDUL --}}
                    <div class="md:col-span-2">

                        <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-600">
                            Judul Buku
                        </label>

                        <input
                            type="text"
                            name="judul_buku"
                            value="{{ old('judul_buku', $buku->judul_buku) }}"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-800 outline-none transition focus:border-emerald-400 focus:bg-white focus:ring-4 focus:ring-emerald-100"
                        >

                    </div>


                    {{-- PENGARANG --}}
                    <div>

                        <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-600">
                            Pengarang
                        </label>

                        <input
                            type="text"
                            name="pengarang"
                            value="{{ old('pengarang', $buku->pengarang) }}"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-emerald-400 focus:bg-white focus:ring-4 focus:ring-emerald-100"
                        >

                    </div>


                    {{-- PENERBIT --}}
                    <div>

                        <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-600">
                            Penerbit
                        </label>

                        <input
                            type="text"
                            name="penerbit"
                            value="{{ old('penerbit', $buku->penerbit) }}"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-emerald-400 focus:bg-white focus:ring-4 focus:ring-emerald-100"
                        >

                    </div>


                    {{-- TAHUN --}}
                    <div>

                        <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-600">
                            Tahun Terbit
                        </label>

                        <input
                            type="number"
                            name="tahun_terbit"
                            value="{{ old('tahun_terbit', $buku->tahun_terbit) }}"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-emerald-400 focus:bg-white focus:ring-4 focus:ring-emerald-100"
                        >

                    </div>


                    {{-- STOK --}}
                    <div>

                        <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-600">
                            Stok
                        </label>

                        <input
                            type="number"
                            name="stok"
                            value="{{ old('stok', $buku->stok) }}"
                            min="0"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-emerald-400 focus:bg-white focus:ring-4 focus:ring-emerald-100"
                        >

                    </div>


                    {{-- SAMPUL --}}
                    <div class="md:col-span-2">

                        <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-600">
                            Sampul Buku
                        </label>

                        <div class="rounded-xl border border-dashed border-slate-300 bg-slate-50 p-4">

                            @if ($buku->sampul)

                                <div class="mb-4 flex items-center gap-4">

                                    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                                        <img
                                            src="{{ asset('storage/' . $buku->sampul) }}"
                                            class="h-36 w-24 object-cover"
                                            alt="Sampul {{ $buku->judul_buku }}"
                                        >
                                    </div>

                                    <div>
                                        <p class="text-sm font-semibold text-slate-700">
                                            Sampul saat ini
                                        </p>

                                        <p class="mt-1 text-xs leading-5 text-slate-500">
                                            Pilih file baru jika ingin mengganti sampul buku.
                                        </p>
                                    </div>

                                </div>

                            @endif

                            <input
                                type="file"
                                name="sampul"
                                accept="image/*"
                                class="w-full cursor-pointer rounded-lg border border-slate-200 bg-white text-sm text-slate-600 file:mr-4 file:cursor-pointer file:border-0 file:bg-emerald-600 file:px-4 file:py-2.5 file:text-xs file:font-semibold file:text-white hover:file:bg-emerald-700"
                            >

                            <p class="mt-2 text-xs text-slate-400">
                                Format gambar yang didukung sesuai validasi aplikasi.
                            </p>

                        </div>

                    </div>


                    {{-- DESKRIPSI --}}
                    <div class="md:col-span-2">

                        <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-600">
                            Deskripsi Buku
                        </label>

                        <textarea
                            name="deskripsi"
                            rows="5"
                            class="w-full resize-y rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm leading-6 text-slate-800 outline-none transition focus:border-emerald-400 focus:bg-white focus:ring-4 focus:ring-emerald-100"
                        >{{ old('deskripsi', $buku->deskripsi) }}</textarea>

                    </div>

                </div>


                {{-- ACTION --}}
                <div class="mt-7 flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">

                    <a
                        href="{{ route('buku.index') }}"
                        class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-slate-100 px-6 py-3 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:bg-slate-200"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-200 transition hover:bg-emerald-700 hover:shadow-emerald-300"
                    >

                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7"/>
                        </svg>

                        Update Buku

                    </button>

                </div>

            </form>

        </div>


        {{-- FOOTER INFO --}}
        <div class="mt-4 flex items-center justify-center gap-2 text-center text-xs text-slate-400">

            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                    d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>

            Pastikan informasi buku telah diperiksa sebelum melakukan pembaruan.

        </div>

    </div>

</div>

@endsection