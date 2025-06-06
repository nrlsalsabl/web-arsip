<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasExpirationDate;

class InstalasiHydrant extends Model
{
    protected $guarded = ['id'];
    use HasExpirationDate;
}
