<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Dokumen;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DAFTAR DOKUMEN PER LAYANAN
    |--------------------------------------------------------------------------
    */

    private function daftarDokumen($layananId)
    {
        return match ((int) $layananId) {

            // 1. AKTA JUAL BELI
            1 => [
                'KTP Penjual' => 'ktp_penjual',
                'KK Penjual' => 'kk_penjual',
                'Buku Nikah' => 'buku_nikah',
                'PBB Tanah' => 'pbb_tanah',
                'NPWP Penjual' => 'npwp_penjual',
                'Sertifikat Tanah' => 'sertifikat_tanah',
                'Foto Denah Lokasi' => 'foto_denah_lokasi',
                'KTP Pembeli' => 'ktp_pembeli',
                'KK Pembeli' => 'kk_pembeli',
                'NPWP Pembeli' => 'npwp_pembeli',
            ],

            // 2. AKTA HIBAH
            2 => [
                'KTP Pemberi' => 'ktp_pemberi',
                'KK Pemberi' => 'kk_pemberi',
                'KTP Penerima' => 'ktp_penerima',
                'KK Penerima' => 'kk_penerima',
                'Sertifikat Tanah' => 'sertifikat_tanah',
                'NPWP Pemberi' => 'npwp_pemberi',
                'Surat Hibah' => 'surat_hibah',
                'Foto Denah Lokasi' => 'foto_denah_lokasi',
            ],

            // 3. JASA TURUN WARIS
            3 => [
                'KTP Ahli Waris' => 'ktp_ahli_waris',
                'KK Ahli Waris' => 'kk_ahli_waris',
                'Surat Kematian' => 'surat_kematian',
                'Surat Keterangan Ahli Waris' => 'surat_keterangan_ahli_waris',
                'Sertifikat Tanah' => 'sertifikat_tanah',
                'NPWP Ahli Waris' => 'npwp_ahli_waris',
                'Foto Denah Lokasi' => 'foto_denah_lokasi',
            ],

            // 4. APHB
            4 => [
                'KTP Pemilik' => 'ktp_pemilik',
                'KK Pemilik' => 'kk_pemilik',
                'NPWP Pemilik' => 'npwp_pemilik',
                'Sertifikat Tanah' => 'sertifikat_tanah',
                'Surat Kesepakatan Bersama' => 'surat_kesepakatan_bersama',
                'Foto Denah Lokasi' => 'foto_denah_lokasi',
            ],

            default => [],
        };
    }


    /*
    |--------------------------------------------------------------------------
    | HALAMAN UPLOAD
    |--------------------------------------------------------------------------
    */

    public function create($id)
    {
        $pengajuan = Pengajuan::with('layanan')->findOrFail($id);

        // Pastikan pengajuan milik user yang sedang login
        if ($pengajuan->user_id != auth()->id()) {
            abort(403);
        }

        // Hanya pengajuan yang sudah disetujui yang boleh upload
        if ($pengajuan->status != 'disetujui') {
            return redirect()
                ->route('user.histori')
                ->with('error', 'Pengajuan belum disetujui admin.');
        }

        // Ambil daftar dokumen berdasarkan ID layanan
        $daftarDokumen = $this->daftarDokumen(
            $pengajuan->layanan_id
        );

        return view(
            'user.upload-dokumen',
            compact('pengajuan', 'daftarDokumen')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN DOKUMEN
    |--------------------------------------------------------------------------
    */

    public function store(Request $request, $id)
    {
        $pengajuan = Pengajuan::with('layanan')->findOrFail($id);

        // Pastikan pengajuan milik user yang sedang login
        if ($pengajuan->user_id != auth()->id()) {
            abort(403);
        }

        // Hanya pengajuan yang sudah disetujui yang boleh upload
        if ($pengajuan->status != 'disetujui') {
            return redirect()
                ->route('user.histori')
                ->with('error', 'Pengajuan belum disetujui admin.');
        }

        // Ambil daftar dokumen berdasarkan ID layanan
        $daftarDokumen = $this->daftarDokumen(
            $pengajuan->layanan_id
        );


        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $rules = [];

        foreach ($daftarDokumen as $nama => $field) {
            $rules[$field] = 'required|file|mimes:pdf,jpg,jpeg,png|max:2048';
        }

        $request->validate($rules);


        /*
        |--------------------------------------------------------------------------
        | SIMPAN FILE
        |--------------------------------------------------------------------------
        */

        foreach ($daftarDokumen as $nama => $field) {

            if ($request->hasFile($field)) {

                $file = $request->file($field);

                $namaFile = time()
                    . '_'
                    . $field
                    . '_'
                    . $file->getClientOriginalName();

                $path = $file->storeAs(
                    'dokumen',
                    $namaFile,
                    'public'
                );

                Dokumen::create([
                    'pengajuan_id' => $pengajuan->id,
                    'nama_dokumen' => $nama,
                    'file_dokumen' => $path,
                ]);
            }
        }

        return redirect()
            ->route('user.histori')
            ->with('success', 'Seluruh dokumen berhasil diupload.');
    }
}