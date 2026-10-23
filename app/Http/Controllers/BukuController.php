<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    /**
     * Menampilkan koleksi buku dengan pencarian, filter, dan pagination.
     */
    public function index(Request $request)
    {
        $query = Buku::with('kategori');

        // Pencarian buku
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('judul_buku', 'like', '%' . $search . '%')
                    ->orWhere('kode_buku', 'like', '%' . $search . '%')
                    ->orWhere('pengarang', 'like', '%' . $search . '%')
                    ->orWhere('penerbit', 'like', '%' . $search . '%');
            });
        }

        // Filter berdasarkan kategori
        if ($request->filled('kategori_id')) {
            $query->where('kategori_id', $request->kategori_id);
        }

        // Statistik buku
        $totalBuku = Buku::count();

        $totalBukuTersedia = Buku::where('stok', '>', 0)->count();

        $totalBukuHabis = Buku::where('stok', 0)->count();

        // Pagination: 8 buku per halaman.
        // Parameter pencarian dan kategori tetap terbawa.
        $bukus = $query->latest()
            ->paginate(8)
            ->withQueryString();

        // Data kategori untuk filter
        $kategoris = Kategori::orderBy('nama_kategori')->get();

        $user = Auth::user();

        return view('buku.index', compact(
            'bukus',
            'kategoris',
            'totalBuku',
            'totalBukuTersedia',
            'totalBukuHabis',
            'user'
        ));
    }

    /**
     * Form tambah buku.
     */
    public function create()
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        $user = Auth::user();

        return view('buku.create', compact('kategoris', 'user'));
    }

    /**
     * Menyimpan buku baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id'  => ['required', 'exists:kategori,id'],
            'kode_buku'    => ['required', 'string', 'max:50', 'unique:buku,kode_buku'],
            'judul_buku'   => ['required', 'string', 'max:255'],
            'pengarang'    => ['required', 'string', 'max:255'],
            'penerbit'     => ['required', 'string', 'max:255'],
            'tahun_terbit' => [
                'required',
                'digits:4',
                'integer',
                'min:1900',
                'max:' . (date('Y') + 1),
            ],
            'stok'         => ['required', 'integer', 'min:0'],
            'sampul'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'deskripsi'    => ['nullable', 'string'],
        ]);

        // Simpan sampul buku
        if ($request->hasFile('sampul')) {
            $validated['sampul'] = $request->file('sampul')
                ->store('sampul', 'public');
        }

        Buku::create($validated);

        return redirect()
            ->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail buku.
     */
    public function show(Buku $buku)
    {
        $buku->load('kategori');

        return view('buku.show', compact('buku'));
    }

    /**
     * Form edit buku.
     */
    public function edit(Buku $buku)
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();

        return view('buku.edit', compact('buku', 'kategoris'));
    }

    /**
     * Memperbarui data buku.
     */
    public function update(Request $request, Buku $buku)
    {
        $validated = $request->validate([
            'kategori_id'  => ['required', 'exists:kategori,id'],
            'kode_buku'    => [
                'required',
                'string',
                'max:50',
                'unique:buku,kode_buku,' . $buku->id,
            ],
            'judul_buku'   => ['required', 'string', 'max:255'],
            'pengarang'    => ['required', 'string', 'max:255'],
            'penerbit'     => ['required', 'string', 'max:255'],
            'tahun_terbit' => [
                'required',
                'digits:4',
                'integer',
                'min:1900',
                'max:' . (date('Y') + 1),
            ],
            'stok'         => ['required', 'integer', 'min:0'],
            'sampul'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'deskripsi'    => ['nullable', 'string'],
        ]);

        // Ganti sampul jika ada file baru
        if ($request->hasFile('sampul')) {
            if ($buku->sampul) {
                Storage::disk('public')->delete($buku->sampul);
            }

            $validated['sampul'] = $request->file('sampul')
                ->store('sampul', 'public');
        }

        $buku->update($validated);

        return redirect()
            ->route('buku.index')
            ->with('success', 'Data buku berhasil diperbarui.');
    }

    /**
     * Menghapus buku.
     */
    public function destroy(Buku $buku)
    {
        // Hapus file sampul dari storage
        if ($buku->sampul) {
            Storage::disk('public')->delete($buku->sampul);
        }

        $buku->delete();

        return redirect()
            ->route('buku.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}
