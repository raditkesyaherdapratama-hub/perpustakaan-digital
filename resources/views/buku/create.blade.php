@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-primary-50 px-6 py-8">

    <div class="mx-auto max-w-6xl">

        {{-- HEADER --}}
        <div class="mb-8 flex flex-col justify-between gap-5 md:flex-row md:items-center">

            <div>

                <p class="text-sm font-semibold uppercase tracking-wider text-primary-600">
                    Manajemen Buku
                </p>

                <h1 class="mt-2 flex items-center gap-2.5 text-3xl font-bold tracking-tight text-primary-900">
                    <span>Tambah Buku</span>
                    <svg class="h-8 w-8 text-primary-600" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Tambahkan koleksi buku baru ke perpustakaan MI Al Falahiyyah Rajeg.
                </p>

            </div>


            {{-- TOMBOL KEMBALI --}}
            <a
                href="{{ route('buku.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm transition hover:border-primary-200 hover:bg-primary-50 hover:text-primary-700"
            >
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg>
                Kembali ke Koleksi
            </a>

        </div>


        {{-- FORM CARD --}}
        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

            {{-- FORM HEADER --}}
            <div class="border-b border-slate-100 bg-gradient-to-r from-primary-900 to-primary-700 px-6 py-6 text-white md:px-8">

                <div class="flex items-center gap-4">

                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/10 text-white shadow-inner backdrop-blur-sm">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
                    </div>

                    <div>

                        <h2 class="text-xl font-bold">
                            Informasi Buku
                        </h2>

                        <p class="mt-1 text-sm text-primary-100">
                            Lengkapi data buku dengan benar sebelum menyimpan.
                        </p>

                    </div>

                </div>

            </div>


            {{-- FORM --}}
            <form
                action="{{ route('buku.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="p-6 md:p-8"
            >

                @csrf


                {{-- ERROR VALIDASI --}}
                @if ($errors->any())

                    <div class="mb-8 rounded-2xl border border-red-200 bg-red-50 p-5">

                        <div class="flex gap-3">

                            <div class="flex h-7 w-7 flex-shrink-0 items-center justify-center rounded-full bg-red-100 text-red-600">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
                            </div>

                            <div>

                                <p class="font-semibold text-red-800">
                                    Data belum dapat disimpan
                                </p>

                                <ul class="mt-2 space-y-1 text-sm text-red-600">

                                    @foreach ($errors->all() as $error)

                                        <li>
                                            • {{ $error }}
                                        </li>

                                    @endforeach

                                </ul>

                            </div>

                        </div>

                    </div>

                @endif


                {{-- DATA UTAMA --}}
                <div class="mb-8">

                    <div class="mb-5">

                        <p class="text-xs font-bold uppercase tracking-widest text-primary-600">
                            DATA UTAMA
                        </p>

                        <h3 class="mt-1 text-lg font-bold text-slate-800">
                            Identitas Buku
                        </h3>

                    </div>


                    <div class="grid gap-6 md:grid-cols-2">


                        {{-- KODE BUKU --}}
                        <div>

                            <label
                                for="kode_buku"
                                class="mb-2 block text-sm font-semibold text-slate-700"
                            >
                                Kode Buku
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                id="kode_buku"
                                name="kode_buku"
                                value="{{ old('kode_buku') }}"
                                placeholder="Contoh: BK001"
                                required
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-primary-500 focus:bg-white focus:ring-4 focus:ring-primary-500/10"
                            >

                            @error('kode_buku')
                                <p class="mt-2 text-xs font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- KATEGORI --}}
                        <div>

                            <label
                                for="kategori_id"
                                class="mb-2 block text-sm font-semibold text-slate-700"
                            >
                                Kategori
                                <span class="text-red-500">*</span>
                            </label>

                            <select
                                id="kategori_id"
                                name="kategori_id"
                                required
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-primary-500 focus:bg-white focus:ring-4 focus:ring-primary-500/10"
                            >

                                <option value="">
                                    Pilih kategori buku
                                </option>

                                @foreach ($kategoris as $kategori)

                                    <option
                                        value="{{ $kategori->id }}"
                                        {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}
                                    >
                                        {{ $kategori->nama_kategori }}
                                    </option>

                                @endforeach

                            </select>

                            @error('kategori_id')
                                <p class="mt-2 text-xs font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- JUDUL --}}
                        <div class="md:col-span-2">

                            <label
                                for="judul_buku"
                                class="mb-2 block text-sm font-semibold text-slate-700"
                            >
                                Judul Buku
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                id="judul_buku"
                                name="judul_buku"
                                value="{{ old('judul_buku') }}"
                                placeholder="Masukkan judul buku"
                                required
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-primary-500 focus:bg-white focus:ring-4 focus:ring-primary-500/10"
                            >

                            @error('judul_buku')
                                <p class="mt-2 text-xs font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- PENGARANG --}}
                        <div>

                            <label
                                for="pengarang"
                                class="mb-2 block text-sm font-semibold text-slate-700"
                            >
                                Pengarang
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                id="pengarang"
                                name="pengarang"
                                value="{{ old('pengarang') }}"
                                placeholder="Nama pengarang"
                                required
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-primary-500 focus:bg-white focus:ring-4 focus:ring-primary-500/10"
                            >

                            @error('pengarang')
                                <p class="mt-2 text-xs font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- PENERBIT --}}
                        <div>

                            <label
                                for="penerbit"
                                class="mb-2 block text-sm font-semibold text-slate-700"
                            >
                                Penerbit
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                id="penerbit"
                                name="penerbit"
                                value="{{ old('penerbit') }}"
                                placeholder="Nama penerbit"
                                required
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-primary-500 focus:bg-white focus:ring-4 focus:ring-primary-500/10"
                            >

                            @error('penerbit')
                                <p class="mt-2 text-xs font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- TAHUN --}}
                        <div>

                            <label
                                for="tahun_terbit"
                                class="mb-2 block text-sm font-semibold text-slate-700"
                            >
                                Tahun Terbit
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="number"
                                id="tahun_terbit"
                                name="tahun_terbit"
                                value="{{ old('tahun_terbit') }}"
                                placeholder="Contoh: 2025"
                                min="1900"
                                max="{{ date('Y') + 1 }}"
                                required
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-primary-500 focus:bg-white focus:ring-4 focus:ring-primary-500/10"
                            >

                            @error('tahun_terbit')
                                <p class="mt-2 text-xs font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- STOK --}}
                        <div>

                            <label
                                for="stok"
                                class="mb-2 block text-sm font-semibold text-slate-700"
                            >
                                Stok Buku
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="number"
                                id="stok"
                                name="stok"
                                value="{{ old('stok', 0) }}"
                                placeholder="Jumlah buku"
                                min="0"
                                required
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-primary-500 focus:bg-white focus:ring-4 focus:ring-primary-500/10"
                            >

                            @error('stok')
                                <p class="mt-2 text-xs font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- SAMPUL --}}
                <div class="mb-8 border-t border-slate-100 pt-8">

                    <div class="mb-5">

                        <p class="text-xs font-bold uppercase tracking-widest text-primary-600">
                            COVER BUKU
                        </p>

                        <h3 class="mt-1 text-lg font-bold text-slate-800">
                            Sampul Buku
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Upload gambar sampul buku dalam format JPG, PNG, atau WEBP.
                        </p>

                    </div>


                    <label
                        for="sampul"
                        class="group flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-200 bg-slate-50 px-6 py-10 text-center transition hover:border-primary-400 hover:bg-primary-50"
                    >

                        <div class="mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-primary-100 text-primary-600 transition group-hover:scale-105">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/></svg>
                        </div>

                        <p class="font-semibold text-slate-700">
                            Klik untuk memilih sampul
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            JPG, JPEG, PNG, WEBP • Maksimal 2MB
                        </p>

                        <input
                            type="file"
                            id="sampul"
                            name="sampul"
                            accept=".jpg,.jpeg,.png,.webp"
                            class="hidden"
                        >

                    </label>

                    @error('sampul')
                        <p class="mt-2 text-xs font-medium text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- DESKRIPSI --}}
                <div class="mb-8 border-t border-slate-100 pt-8">

                    <div class="mb-5">

                        <p class="text-xs font-bold uppercase tracking-widest text-primary-600">
                            INFORMASI TAMBAHAN
                        </p>

                        <h3 class="mt-1 text-lg font-bold text-slate-800">
                            Deskripsi Buku
                        </h3>

                    </div>


                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        rows="5"
                        placeholder="Tuliskan deskripsi singkat mengenai buku..."
                        class="w-full resize-none rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-primary-500 focus:bg-white focus:ring-4 focus:ring-primary-500/10"
                    >{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')
                        <p class="mt-2 text-xs font-medium text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- ACTION --}}
                <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">

                    <a
                        href="{{ route('buku.index') }}"
                        class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-6 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-primary-600 px-7 py-3 text-sm font-bold text-white shadow-lg shadow-primary-600/20 transition hover:bg-primary-700 hover:-translate-y-0.5 hover:shadow-xl"
                    >
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                        <span>Simpan Buku</span>
                    </button>

                </div>

            </form>

        </div>


        {{-- FOOTER INFO --}}
        <div class="mt-5 flex items-center gap-2 px-2 text-xs text-slate-400">

            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/></svg>

            <span>
                Data buku akan tersimpan ke sistem perpustakaan secara aman.
            </span>

        </div>

    </div>

</div>

@endsection