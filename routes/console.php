
<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Cek peminjaman yang melewati batas pengambilan setiap menit.
Schedule::command('app:expire-uncollected-loans')
    ->everyMinute()
    ->withoutOverlapping();
