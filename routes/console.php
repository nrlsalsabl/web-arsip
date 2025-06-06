<?php

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('notifikasi:expired', function () {
    $this->call('notifikasi:expired'); // panggil command yang sudah kamu buat
})->describe('Kirim notifikasi expired');

app(Schedule::class)->command('notifikasi:expired')->everyMinute();