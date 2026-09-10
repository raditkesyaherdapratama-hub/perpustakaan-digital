<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    /**
     * Menampilkan semua anggota
     */
    public function index(Request $request)
    {
        $query = User::where('role', 'user');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        $anggotas = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('anggota.index', compact('anggotas'));
    }


    /**
     * Form tambah anggota
     */
    public function create()
    {
        return view('anggota.create');
    }


    /**
     * Simpan anggota
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'min:6',
                'confirmed',
            ],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
        ]);

        return redirect()
            ->route('anggota.index')
            ->with('success', 'Anggota berhasil ditambahkan.');
    }


    /**
     * Detail anggota
     */
    public function show(User $anggota)
    {
        $anggota->load([
            'peminjaman.buku',
            'peminjaman.pengembalian',
        ]);

        return view('anggota.show', compact('anggota'));
    }


    /**
     * Form edit anggota
     */
    public function edit(User $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }


    /**
     * Update anggota
     */
    public function update(Request $request, User $anggota)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $anggota->id,
            ],

            'password' => [
                'nullable',
                'min:6',
                'confirmed',
            ],
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make(
                $validated['password']
            );
        }

        $anggota->update($data);

        return redirect()
            ->route('anggota.index')
            ->with('success', 'Data anggota berhasil diperbarui.');
    }


    /**
     * Hapus anggota
     */
    public function destroy(User $anggota)
    {
        if ($anggota->id === auth()->id()) {
            return back()->with(
                'error',
                'Admin tidak dapat menghapus akun sendiri.'
            );
        }

        $anggota->delete();

        return redirect()
            ->route('anggota.index')
            ->with('success', 'Anggota berhasil dihapus.');
    }
}