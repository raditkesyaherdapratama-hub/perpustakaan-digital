
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
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

        Schema::table('peminjaman', function (Blueprint $table) {
            $table->dateTime('batas_pengambilan')
                ->nullable()
                ->after('tanggal_jatuh_tempo');
        });
    }

    public function down(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->dropColumn('batas_pengambilan');
        });

        DB::statement("
            ALTER TABLE peminjaman
            MODIFY status ENUM(
                'dipinjam',
                'dikembalikan'
            ) NOT NULL DEFAULT 'dipinjam'
        ");
    }
};
