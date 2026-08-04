<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Layanan;
use App\Models\Dokumen;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';

    protected $fillable = [

        'user_id',
        'layanan_id',

        'nama',
        'status',
        'tanggal_pengajuan',

        'nama_penjual',
        'telepon_penjual',

        'nama_pembeli',
        'telepon_pembeli',

        'telepon_pemohon',

        'catatan_admin',

        'file_surat',
        'progress',

    ];


    /*
    |------------------------------------------------------------------
    | RELASI USER
    |------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /*
    |------------------------------------------------------------------
    | RELASI LAYANAN
    |------------------------------------------------------------------
    */

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function dokumen()
{
    return $this->hasMany(Dokumen::class);
}
}