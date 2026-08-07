<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumen';

    protected $fillable = [
        'pengajuan_id',
        'nama_dokumen',
        'file_dokumen',
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }
}