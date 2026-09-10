<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KategoriController extends Controller
{
    /**
     * Menampilkan semua kategori
     */
    public function index()
    {
        $kategoris = Kategori::withCount('buku')
            ->latest()
            ->paginate(10);

        $user = Auth::user();

        return view('kategori.index', compact('kategoris', 'user'));
    }

    /**
     * Form tambah kategori
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Simpan kategori
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => [
                'required',
                'string',
                'max:255',
                'unique:kategori,nama_kategori',
            ],

            'deskripsi' => [
                'nullable',
                'string',
            ],
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.unique' => 'Kategori sudah tersedia.',
        ]);

        Kategori::create($validated);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Form edit kategori
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update kategori
     */
    public function update(
        Request $request,
        Kategori $kategori
    ) {
        $validated = $request->validate([
            'nama_kategori' => [
                'required',
                'string',
                'max:255',
                'unique:kategori,nama_kategori,' . $kategori->id,
            ],

            'deskripsi' => [
                'nullable',
                'string',
            ],
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.unique' => 'Kategori sudah tersedia.',
        ]);

        $kategori->update($validated);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Hapus kategori
     */
    public function destroy(Kategori $kategori)
    {
        if ($kategori->buku()->exists()) {
            return redirect()
                ->route('kategori.index')
                ->with(
                    'error',
                    'Kategori tidak dapat dihapus karena masih digunakan oleh buku.'
                );
        }

        $kategori->delete();

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}