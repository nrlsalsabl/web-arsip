<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasExpirationDate;

class BejanaTekan extends Model
{
    protected $guarded = ['id'];
    use HasExpirationDate;
}
