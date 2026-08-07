<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Layanan;
use App\Models\Dokumen;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';

    protected $fillable = [

        // RELASI
        'user_id',
        'layanan_id',

        // DATA UMUM
        'nama',
        'status',
        'tanggal_pengajuan',

        // JUAL BELI
        'nama_penjual',
        'telepon_penjual',
        'nama_pembeli',
        'telepon_pembeli',

        // HIBAH
        'nama_pemberi',
        'telepon_pemberi',
        'nama_penerima',
        'telepon_penerima',
        'hubungan_pemberi_penerima',

        // WARISAN
        'nama_pemohon',
        'telepon_pemohon',
        'nama_pewaris',
        'tanggal_meninggal',
        'jumlah_ahli_waris',

        // APHB
        // memakai nama_pemohon dan telepon_pemohon

        // DATA OBJEK TANAH
        'alamat_objek_tanah',
        'kecamatan',
        'kabupaten_kota',

        // TUJUAN DAN KETERANGAN
        'tujuan_pengajuan',
        'keterangan',

        // ADMIN
        'catatan_admin',

        // SURAT
        'file_surat',

        // PROGRESS
        'progress',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI USER
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI LAYANAN
    |--------------------------------------------------------------------------
    */

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI DOKUMEN
    |--------------------------------------------------------------------------
    */

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class);
    }
}