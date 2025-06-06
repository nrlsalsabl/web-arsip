<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Notifications\ExpiredItemNotification;

class NotifyExpiredItems extends Command
{
    protected $signature = 'notifikasi:expired';
    protected $description = 'Mengirim notifikasi untuk data yang sudah expired';

    public function handle()
    {
        // User yang menerima notifikasi
        $user = \App\Models\User::first(); // ubah sesuai user manajer

        $models = [
            'Bejana Tekan' => \App\Models\BejanaTekan::class,
            'Genset' => \App\Models\Genset::class,
            'Ketel Uap' => \App\Models\KetelUap::class,
            'Instalasi Hydrant' => \App\Models\InstalasiHydrant::class,
            'Instalasi Listrik' => \App\Models\InstalasiListrik::class,
            'Penyalur Petir' => \App\Models\PenyalurPetir::class,
            'Surat Izin Operator' => \App\Models\SuratIzinOperator::class,
            // Tambah model lain
        ];

        foreach ($models as $label => $model) {
            if (!method_exists($model, 'getExpiredItems')) {
                $this->warn("Model {$model} belum punya method getExpiredItems()");
                continue;
            }

            $items = $model::getExpiredItems();

            foreach ($items as $item) {
                $user->notify(new ExpiredItemNotification($item, $label));
                $this->info("Notifikasi dikirim untuk {$label} - Kode: {$item->kode}");
            }
        }

        $this->info('Selesai kirim notifikasi expired.');
    }
}
