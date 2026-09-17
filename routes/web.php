<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LaporanController;


/*
|--------------------------------------------------------------------------
| ROOT
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});


/*
|--------------------------------------------------------------------------
| LOGIN & REGISTER
|--------------------------------------------------------------------------
*/

Route::get('/login', [
    AuthController::class,
    'showLogin'
])->name('login');

Route::post('/login', [
    AuthController::class,
    'login'
])->name('login.process');

Route::get('/register', [
    AuthController::class,
    'showRegister'
])->name('register');

Route::post('/register', [
    AuthController::class,
    'register'
])->name('register.process');


/*
|--------------------------------------------------------------------------
| AUTHENTICATED USER
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', [
        AuthController::class,
        'logout'
    ])->name('logout');


    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [
        ProfileController::class,
        'index'
    ])->name('profile.index');

    Route::put('/profile', [
        ProfileController::class,
        'update'
    ])->name('profile.update');

    Route::put('/profile/password', [
        ProfileController::class,
        'updatePassword'
    ])->name('profile.password');


    /*
    |--------------------------------------------------------------------------
    | NOTIFICATIONS
    |--------------------------------------------------------------------------
    */

    Route::post('/notifications/read-all', function (Request $request) {
        $request->user()->unreadNotifications->markAsRead();

        return back();
    })->name('notifications.readAll');


    /*
    |--------------------------------------------------------------------------
    | PEMINJAMAN USER
    |--------------------------------------------------------------------------
    */

    Route::post('/buku/{buku}/pinjam', [
        PeminjamanController::class,
        'pinjam'
    ])->name('peminjaman.pinjam');


    /*
    |--------------------------------------------------------------------------
    | KOLEKSI BUKU
    |--------------------------------------------------------------------------
    */

    Route::get('/buku', [
        BukuController::class,
        'index'
    ])->name('buku.index');


    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:admin')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | LAPORAN
        |--------------------------------------------------------------------------
        */

        Route::get('/laporan', [
            LaporanController::class,
            'index'
        ])->name('laporan.index');

        Route::get('/laporan/print', [
            LaporanController::class,
            'print'
        ])->name('laporan.print');


        /*
        |--------------------------------------------------------------------------
        | PENGEMBALIAN DAN PERSETUJUAN PEMINJAMAN
        |--------------------------------------------------------------------------
        */

        Route::get('/pengembalian', [
            PengembalianController::class,
            'index'
        ])->name('pengembalian.index');

        /*
        | Pengajuan peminjaman disetujui admin
        */

        Route::post('/pengembalian/{peminjaman}/setujui', [
            PengembalianController::class,
            'setujui'
        ])->name('pengembalian.setujui');

        /*
        | Pengajuan peminjaman ditolak admin
        */

        Route::post('/pengembalian/{peminjaman}/tolak', [
            PengembalianController::class,
            'tolak'
        ])->name('pengembalian.tolak');

        /*
        | Proses pengembalian buku
        */

        Route::post('/pengembalian/{peminjaman}', [
            PengembalianController::class,
            'kembalikan'
        ])->name('pengembalian.kembalikan');


        /*
        |--------------------------------------------------------------------------
        | ADMIN DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get('/admin/dashboard', [
            DashboardController::class,
            'admin'
        ])->name('admin.dashboard');


        /*
        |--------------------------------------------------------------------------
        | CRUD BUKU
        |--------------------------------------------------------------------------
        */

        Route::get('/buku/tambah', [
            BukuController::class,
            'create'
        ])->name('buku.create');

        Route::post('/buku', [
            BukuController::class,
            'store'
        ])->name('buku.store');

        Route::get('/buku/{buku}/edit', [
            BukuController::class,
            'edit'
        ])->name('buku.edit');

        Route::put('/buku/{buku}', [
            BukuController::class,
            'update'
        ])->name('buku.update');

        Route::delete('/buku/{buku}', [
            BukuController::class,
            'destroy'
        ])->name('buku.destroy');


        /*
        |--------------------------------------------------------------------------
        | CRUD KATEGORI
        |--------------------------------------------------------------------------
        */

        Route::get('/kategori', [
            KategoriController::class,
            'index'
        ])->name('kategori.index');

        Route::get('/kategori/tambah', [
            KategoriController::class,
            'create'
        ])->name('kategori.create');

        Route::post('/kategori', [
            KategoriController::class,
            'store'
        ])->name('kategori.store');

        Route::get('/kategori/{kategori}/edit', [
            KategoriController::class,
            'edit'
        ])->name('kategori.edit');

        Route::put('/kategori/{kategori}', [
            KategoriController::class,
            'update'
        ])->name('kategori.update');

        Route::delete('/kategori/{kategori}', [
            KategoriController::class,
            'destroy'
        ])->name('kategori.destroy');


        /*
        |--------------------------------------------------------------------------
        | CRUD ANGGOTA
        |--------------------------------------------------------------------------
        */

        Route::get('/anggota', [
            AnggotaController::class,
            'index'
        ])->name('anggota.index');

        Route::get('/anggota/tambah', [
            AnggotaController::class,
            'create'
        ])->name('anggota.create');

        Route::post('/anggota', [
            AnggotaController::class,
            'store'
        ])->name('anggota.store');

        Route::get('/anggota/{anggota}', [
            AnggotaController::class,
            'show'
        ])->name('anggota.show');

        Route::get('/anggota/{anggota}/edit', [
            AnggotaController::class,
            'edit'
        ])->name('anggota.edit');

        Route::put('/anggota/{anggota}', [
            AnggotaController::class,
            'update'
        ])->name('anggota.update');

        Route::delete('/anggota/{anggota}', [
            AnggotaController::class,
            'destroy'
        ])->name('anggota.destroy');

    });


    /*
    |--------------------------------------------------------------------------
    | DETAIL BUKU
    |--------------------------------------------------------------------------
    */

    Route::get('/buku/{buku}', [
        BukuController::class,
        'show'
    ])->name('buku.show');


    /*
    |--------------------------------------------------------------------------
    | USER
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:user')->group(function () {

        Route::get('/user/dashboard', [
            DashboardController::class,
            'user'
        ])->name('user.dashboard');

        Route::get('/user/peminjaman', [
            PeminjamanController::class,
            'riwayat'
        ])->name('user.peminjaman');

    });

});