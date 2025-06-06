<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait HasExpirationDate
{
    public static function getExpiredItems(): Collection
    {
        return static::whereDate('tanggal_berlaku', '<', now())
            ->where('status', 'active')
            ->get();
    }
}
