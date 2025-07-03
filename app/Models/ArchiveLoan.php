<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveLoan extends Model
{
    protected $fillable = [
        'user_id',
        'archive_type',
        'archive_id',
        'document_name',
        'department',
        'loan_date',
        'return_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gaArchive()
    {
        return $this->belongsTo(GaArchiveData::class, 'archive_id');
    }

    public function vendorArchive()
    {
        return $this->belongsTo(VendorArchiveData::class, 'archive_id');
    }
}
