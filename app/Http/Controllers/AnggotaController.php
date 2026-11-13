<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        return redirect()->route('anggota.murid.index');
    }

    public function guru(Request $request)
    {
        return $this->tampilkanAnggota($request, 'guru');
    }

    public function murid(Request $request)
    {
        return $this->tampilkanAnggota($request, 'murid');
    }

    private function tampilkanAnggota(Request $request, string $jenis)
    {
        $query = User::where('role', 'user')
            ->where('jenis_anggota', $jenis);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        $anggotas = $query->latest()
            ->paginate(10)
            ->withQueryString();

        return view('anggota.index', compact('anggotas', 'jenis'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:6', 'confirmed'],
            'jenis_anggota' => ['required', 'in:guru,murid'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
            'jenis_anggota' => $validated['jenis_anggota'],
        ]);

        return redirect()
            ->route(
                $validated['jenis_anggota'] === 'guru'
                    ? 'anggota.guru.index'
                    : 'anggota.murid.index'
            )
            ->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function show(User $anggota)
    {
        $anggota->load([
            'peminjaman.buku',
            'peminjaman.pengembalian',
        ]);

        return view('anggota.show', compact('anggota'));
    }

    public function edit(User $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, User $anggota)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $anggota->id,
            ],
            'password' => ['nullable', 'min:6', 'confirmed'],
            'jenis_anggota' => ['required', 'in:guru,murid'],
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'jenis_anggota' => $validated['jenis_anggota'],
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $anggota->update($data);

        return redirect()
            ->route(
                $anggota->jenis_anggota === 'guru'
                    ? 'anggota.guru.index'
                    : 'anggota.murid.index'
            )
            ->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(User $anggota)
    {
        if ($anggota->id === auth()->id()) {
            return back()->with(
                'error',
                'Admin tidak dapat menghapus akun sendiri.'
            );
        }

        $jenis = $anggota->jenis_anggota;

        $anggota->delete();

        return redirect()
            ->route(
                $jenis === 'guru'
                    ? 'anggota.guru.index'
                    : 'anggota.murid.index'
            )
            ->with('success', 'Anggota berhasil dihapus.');
    }
}
