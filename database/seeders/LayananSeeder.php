<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    public function run(): void
    {
        Layanan::create([
            'nama_layanan' => 'Akta Jual Beli (AJB)',
            'deskripsi' => 'Pengurusan akta jual beli tanah dan bangunan.',
            'persyaratan' => 'KTP, KK, sertifikat tanah, dokumen pendukung.'
        ]);

        Layanan::create([
            'nama_layanan' => 'Akta Hibah',
            'deskripsi' => 'Pengurusan akta hibah tanah dan bangunan.',
            'persyaratan' => 'KTP, KK, sertifikat tanah, dokumen pendukung.'
        ]);

        Layanan::create([
            'nama_layanan' => 'Jasa Turun Waris',
            'deskripsi' => 'Pengurusan dokumen turun waris.',
            'persyaratan' => 'KTP ahli waris, KK, surat kematian, dokumen tanah.'
        ]);

        Layanan::create([
            'nama_layanan' => 'Akta Pembagian Hak Bersama (APHB)',
            'deskripsi' => 'Pengurusan pembagian hak bersama.',
            'persyaratan' => 'KTP, KK, sertifikat tanah, dokumen pendukung.'
        ]);
    }
}