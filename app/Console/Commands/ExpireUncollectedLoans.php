<?php

namespace App\Console\Commands;

use App\Models\Peminjaman;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ExpireUncollectedLoans extends Command
{
    protected $signature = 'app:expire-uncollected-loans';

    protected $description = 'Memproses peminjaman yang melewati batas pengambilan buku';

    public function handle(): int
    {
        $jumlah = 0;

        Peminjaman::query()
            ->where('status', 'menunggu_diambil')
            ->whereNotNull('batas_pengambilan')
            ->where('batas_pengambilan', '<=', now())
            ->select('id')
            ->chunkById(100, function ($peminjamans) use (&$jumlah) {
                foreach ($peminjamans as $item) {
                    DB::transaction(function () use ($item, &$jumlah) {
                        $peminjaman = Peminjaman::whereKey($item->id)
                            ->lockForUpdate()
                            ->first();

                        // Cek ulang karena status mungkin sudah berubah.
                        if (
                            !$peminjaman ||
                            $peminjaman->status !== 'menunggu_diambil' ||
                            !$peminjaman->batas_pengambilan ||
                            $peminjaman->batas_pengambilan->isFuture()
                        ) {
                            return;
                        }

                        $buku = $peminjaman->buku()
                            ->lockForUpdate()
                            ->first();

                        if (!$buku) {
                            return;
                        }

                        $peminjaman->status = 'kedaluwarsa';
                        $peminjaman->save();

                        $buku->increment('stok');

                        $jumlah++;
                    });
                }
            });

        $this->info("Selesai. {$jumlah} peminjaman kedaluwarsa telah diproses.");

        return self::SUCCESS;
    }
}
