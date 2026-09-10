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

                <h1 class="mt-2 text-3xl font-bold tracking-tight text-primary-900">
                    Tambah Buku
                    <span class="ml-1">📚</span>
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
                ← Kembali ke Koleksi
            </a>

        </div>


        {{-- FORM CARD --}}
        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

            {{-- FORM HEADER --}}
            <div class="border-b border-slate-100 bg-gradient-to-r from-primary-900 to-primary-700 px-6 py-6 text-white md:px-8">

                <div class="flex items-center gap-4">

                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/10 text-3xl shadow-inner backdrop-blur-sm">
                        📖
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

                            <div class="text-xl">
                                ⚠️
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

                        <div class="mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-primary-100 text-3xl transition group-hover:scale-105">
                            🖼️
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
                        <span>＋</span>
                        Simpan Buku
                    </button>

                </div>

            </form>

        </div>


        {{-- FOOTER INFO --}}
        <div class="mt-5 flex items-center gap-2 px-2 text-xs text-slate-400">

            <span>🔒</span>

            <span>
                Data buku akan tersimpan ke sistem perpustakaan secara aman.
            </span>

        </div>

    </div>

</div>

@endsection