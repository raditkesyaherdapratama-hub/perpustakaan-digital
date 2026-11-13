
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE peminjaman
            MODIFY status ENUM(
                'menunggu',
                'menunggu_diambil',
                'dipinjam',
                'ditolak',
                'dibatalkan',
                'kedaluwarsa',
                'dikembalikan'
            ) NOT NULL DEFAULT 'menunggu'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE peminjaman
            MODIFY status ENUM(
                'menunggu',
                'dipinjam',
                'ditolak',
                'dibatalkan',
                'kedaluwarsa',
                'dikembalikan'
            ) NOT NULL DEFAULT 'menunggu'
        ");
    }
};
