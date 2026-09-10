<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Halaman profile
     */
    public function index()
    {
        $user = Auth::user();

        return view('profile.index', compact('user'));
    }

    /**
     * Update data profile
     */
    public function update(Request $request)
    {
        $user = Auth::user();

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
                Rule::unique('users', 'email')->ignore($user->id),
            ],

            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ], [
            'name.required' => 'Nama wajib diisi.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',

            'profile_photo.image' => 'File harus berupa gambar.',
            'profile_photo.mimes' => 'Foto harus JPG, JPEG, PNG, atau WEBP.',
            'profile_photo.max' => 'Ukuran foto maksimal 2 MB.',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        /*
        |--------------------------------------------------------------------------
        | FOTO PROFILE
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_photo')) {

            // Hapus foto lama
            if (
                $user->profile_photo &&
                Storage::disk('public')->exists($user->profile_photo)
            ) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // Simpan foto baru
            $path = $request->file('profile_photo')
                ->store('profile', 'public');

            $user->profile_photo = $path;
        }

        $user->save();

        return back()->with(
            'success',
            'Profile berhasil diperbarui.'
        );
    }

    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => [
                'required',
            ],

            'password' => [
                'required',
                'min:8',
                'confirmed',
            ],
        ], [
            'current_password.required' => 'Password lama wajib diisi.',

            'password.required' => 'Password baru wajib diisi.',
            'password.min' => 'Password baru minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | CEK PASSWORD LAMA
        |--------------------------------------------------------------------------
        */

        if (!Hash::check(
            $request->current_password,
            $user->password
        )) {
            return back()
                ->withErrors([
                    'current_password' =>
                        'Password lama tidak sesuai.',
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN PASSWORD BARU
        |--------------------------------------------------------------------------
        */

        $user->password = Hash::make(
            $request->password
        );

        $user->save();

        return back()->with(
            'success_password',
            'Password berhasil diperbarui.'
        );
    }
}