<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class PeminjamanNotification extends Notification
{
    use Queueable;

    public string $judul;
    public string $pesan;
    public string $tipe;
    public ?string $url;

    /**
     * Membuat notifikasi baru.
     */
    public function __construct(
        string $judul,
        string $pesan,
        string $tipe = 'info',
        ?string $url = null
    ) {
        $this->judul = $judul;
        $this->pesan = $pesan;
        $this->tipe = $tipe;
        $this->url = $url;
    }

    /**
     * Notifikasi disimpan ke database.
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Data yang disimpan pada kolom data tabel notifications.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'judul' => $this->judul,
            'pesan' => $this->pesan,
            'tipe' => $this->tipe,
            'url' => $this->url,
        ];
    }
}