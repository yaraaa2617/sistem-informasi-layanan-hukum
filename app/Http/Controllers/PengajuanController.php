<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\Dokumen;
use Barryvdh\DomPDF\Facade\Pdf;

class PengajuanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | JUAL BELI
    |--------------------------------------------------------------------------
    */

    public function storeJualBeli(Request $request)
    {
        // VALIDASI
        $request->validate([

            'nama_penjual' => 'required',
            'telepon_penjual' => 'required',
            'tanggal_pengajuan' => 'required|date',

            // 'ktp_penjual' => 'required|file|mimes:jpg,jpeg,png,pdf',
            // 'kk_penjual' => 'required|file|mimes:jpg,jpeg,png,pdf',

            // 'buku_nikah' => 'required|file|mimes:jpg,jpeg,png,pdf',

            // 'pbb_tanah' => 'required|file|mimes:jpg,jpeg,png,pdf',

            // 'npwp_penjual' => 'required|file|mimes:jpg,jpeg,png,pdf',

            // 'sertifikat_tanah' => 'required|file|mimes:jpg,jpeg,png,pdf',

            // 'photo_denah_lokasi' => 'required|file|mimes:jpg,jpeg,png,pdf',

            'nama_pembeli' => 'required',
            'telepon_pembeli' => 'required',

            // 'ktp_pembeli' => 'required|file|mimes:jpg,jpeg,png,pdf',
            // 'kk_pembeli' => 'required|file|mimes:jpg,jpeg,png,pdf',
            // 'npwp_pembeli' => 'required|file|mimes:jpg,jpeg,png,pdf',

        ]);

        // UPLOAD FILE
        // $ktpPenjual = $request->file('ktp_penjual')->store('dokumen', 'public');

        // $kkPenjual = $request->file('kk_penjual')->store('dokumen', 'public');

        // $bukuNikah = $request->file('buku_nikah')->store('dokumen', 'public');

        // $pbbTanah = $request->file('pbb_tanah')->store('dokumen', 'public');

        // $npwpPenjual = $request->file('npwp_penjual')->store('dokumen', 'public');

        // $sertifikat = $request->file('sertifikat_tanah')->store('dokumen', 'public');

        // $denah = $request->file('photo_denah_lokasi')->store('dokumen', 'public');

        // $ktpPembeli = $request->file('ktp_pembeli')->store('dokumen', 'public');

        // $kkPembeli = $request->file('kk_pembeli')->store('dokumen', 'public');

        // $npwpPembeli = $request->file('npwp_pembeli')->store('dokumen', 'public');

        // SIMPAN DATABASE
        $pengajuan = Pengajuan::create([

        'user_id' => auth()->id(),

        'layanan_id' => 1,

        'nama' => $request->nama_pembeli,

        'nama_penjual' => $request->nama_penjual,
        'telepon_penjual' => $request->telepon_penjual,

        'nama_pembeli' => $request->nama_pembeli,
        'telepon_pembeli' => $request->telepon_pembeli,
        'tanggal_pengajuan' => $request->tanggal_pengajuan,

        'status' => 'pending',
        ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'KTP Penjual',
//     'file_dokumen' => $ktpPenjual,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'KK Penjual',
//     'file_dokumen' => $kkPenjual,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'Buku Nikah',
//     'file_dokumen' => $bukuNikah,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'PBB Tanah',
//     'file_dokumen' => $pbbTanah,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'NPWP Penjual',
//     'file_dokumen' => $npwpPenjual,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'Sertifikat Tanah',
//     'file_dokumen' => $sertifikat,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'Photo Denah Lokasi',
//     'file_dokumen' => $denah,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'KTP Pembeli',
//     'file_dokumen' => $ktpPembeli,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'KK Pembeli',
//     'file_dokumen' => $kkPembeli,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'NPWP Pembeli',
//     'file_dokumen' => $npwpPembeli,
// ]);


        return redirect()->route('user.histori')
            ->with('success', 'Pengajuan jual beli berhasil dikirim');
    }

    /*
    |--------------------------------------------------------------------------
    | HIBAH
    |--------------------------------------------------------------------------
    */

public function storeHibah(Request $request)
{
    $request->validate([

        // PEMBERI HIBAH
        'nama_pemberi' => 'required',
        'telepon_pemberi' => 'required',
        'tanggal_pengajuan' => 'required|date',

        // 'ktp_pemberi' => 'required|file|mimes:jpg,jpeg,png,pdf',

        // 'kk_pemberi' => 'required|file|mimes:jpg,jpeg,png,pdf',

        // PENERIMA HIBAH
        'nama_penerima' => 'required',
        'telepon_penerima' => 'required',

        // 'ktp_penerima' => 'required|file|mimes:jpg,jpeg,png,pdf',

        // 'kk_penerima' => 'required|file|mimes:jpg,jpeg,png,pdf',

        // DOKUMEN
        // 'sertifikat_tanah' => 'required|file|mimes:jpg,jpeg,png,pdf',

        // 'npwp' => 'required|file|mimes:jpg,jpeg,png,pdf',

        // 'surat_hibah' => 'required|file|mimes:jpg,jpeg,png,pdf',

        // 'photo_denah_lokasi' => 'required|file|mimes:jpg,jpeg,png,pdf',

    ]);

    /*
    |--------------------------------------------------------------------------
    | UPLOAD FILE
    |--------------------------------------------------------------------------
    */

    // $ktpPemberi = $request->file('ktp_pemberi')
    //     ->store('dokumen', 'public');

    // $kkPemberi = $request->file('kk_pemberi')
    //     ->store('dokumen', 'public');

    // $ktpPenerima = $request->file('ktp_penerima')
    //     ->store('dokumen', 'public');

    // $kkPenerima = $request->file('kk_penerima')
    //     ->store('dokumen', 'public');

    // $sertifikat = $request->file('sertifikat_tanah')
    //     ->store('dokumen', 'public');

    // $npwp = $request->file('npwp')
    //     ->store('dokumen', 'public');

    // $suratHibah = $request->file('surat_hibah')
    //     ->store('dokumen', 'public');

    // $denah = $request->file('photo_denah_lokasi')
    //     ->store('dokumen', 'public');

    /*
    |--------------------------------------------------------------------------
    | SIMPAN DATABASE
    |--------------------------------------------------------------------------
    */

    $pengajuan = Pengajuan::create([

        'user_id' => auth()->id(),

        'layanan_id' => 2,

        'nama' => $request->nama_penerima,

        'nama_penjual' => $request->nama_pemberi,
        'telepon_penjual' => $request->telepon_pemberi,

        'nama_pembeli' => $request->nama_penerima,
        'telepon_pembeli' => $request->telepon_penerima,

        'tanggal_pengajuan' => $request->tanggal_pengajuan,

        'status' => 'pending',

    ]);

//     Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'KTP Pemberi',
//     'file_dokumen' => $ktpPemberi,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'KK Pemberi',
//     'file_dokumen' => $kkPemberi,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'KTP Penerima',
//     'file_dokumen' => $ktpPenerima,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'KK Penerima',
//     'file_dokumen' => $kkPenerima,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'Sertifikat',
//     'file_dokumen' => $sertifikat,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'NPWP',
//     'file_dokumen' => $npwp,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'Surat Hibah',
//     'file_dokumen' => $suratHibah,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'Photo Denah Lokasi',
//     'file_dokumen' => $denah,
// ]);


    return redirect()->route('user.histori')
        ->with('success', 'Pengajuan hibah berhasil dikirim');
}

    /*
    |--------------------------------------------------------------------------
    | WARISAN
    |--------------------------------------------------------------------------
    */

public function storeWarisan(Request $request)
{
    $request->validate([

        'nama_pemohon' => 'required',
        'telepon_pemohon' => 'required',
        'tanggal_pengajuan' => 'required|date',

        // 'ktp_ahli_waris' => 'required|file|mimes:jpg,jpeg,png,pdf',
        // 'kk_ahli_waris' => 'required|file|mimes:jpg,jpeg,png,pdf',

        // 'surat_kematian' => 'required|file|mimes:jpg,jpeg,png,pdf',

        // 'surat_keterangan_ahli_waris' => 'required|file|mimes:jpg,jpeg,png,pdf',

        // 'sertifikat_tanah' => 'required|file|mimes:jpg,jpeg,png,pdf',

        // 'npwp_ahli_waris' => 'required|file|mimes:jpg,jpeg,png,pdf',

        // 'photo_denah_lokasi' => 'required|file|mimes:jpg,jpeg,png,pdf',

    ]);

    // UPLOAD FILE
    // $ktpAhliWaris = $request->file('ktp_ahli_waris')
    //     ->store('dokumen', 'public');

    // $kkAhliWaris = $request->file('kk_ahli_waris')
    //     ->store('dokumen', 'public');

    // $suratKematian = $request->file('surat_kematian')
    //     ->store('dokumen', 'public');

    // $suratAhliWaris = $request->file('surat_keterangan_ahli_waris')
    //     ->store('dokumen', 'public');

    // $sertifikat = $request->file('sertifikat_tanah')
    //     ->store('dokumen', 'public');

    // $npwp = $request->file('npwp_ahli_waris')
    //     ->store('dokumen', 'public');

    // $denah = $request->file('photo_denah_lokasi')
    //     ->store('dokumen', 'public');

    // SIMPAN DATABASE
    $pengajuan = Pengajuan::create([

        'user_id' => auth()->id(),

        'layanan_id' => 3,

        'nama' => $request->nama_pemohon,

        'telepon_pemohon' => $request->telepon_pemohon,

        'tanggal_pengajuan' => $request->tanggal_pengajuan,

        'status' => 'pending',

    ]);

//         Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'KTP Ahli Waris',
//     'file_dokumen' => $ktpAhliWaris,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'KK Ahli Waris',
//     'file_dokumen' => $kkAhliWaris,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'Surat Kematian',
//     'file_dokumen' => $suratKematian,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'Surat Ahli Waris',
//     'file_dokumen' => $suratAhliWaris,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'Sertifikat Tanah',
//     'file_dokumen' => $sertifikat,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'NPWP Ahli Waris',
//     'file_dokumen' => $npwp,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'Photo Denah Lokasi',
//     'file_dokumen' => $denah,
// ]);

    return redirect()->route('user.histori')
        ->with('success', 'Pengajuan warisan berhasil dikirim');
}

     /*
    |--------------------------------------------------------------------------
    | APHB
    |--------------------------------------------------------------------------
    */

    public function storeAPHB(Request $request)
{
    $request->validate([

        'nama_pemohon' => 'required',

        'telepon_pemohon' => 'required',

        'tanggal_pengajuan' => 'required|date',

        // 'ktp_pemilik' => 'required|file|mimes:jpg,jpeg,png,pdf',

        // 'kk_pemilik' => 'required|file|mimes:jpg,jpeg,png,pdf',

        // 'npwp_pemilik' => 'required|file|mimes:jpg,jpeg,png,pdf',

        // 'sertifikat_tanah' => 'required|file|mimes:jpg,jpeg,png,pdf',

        // 'surat_kesepakatan_bersama' => 'required|file|mimes:jpg,jpeg,png,pdf',

        // 'photo_denah_lokasi' => 'required|file|mimes:jpg,jpeg,png,pdf',

    ]);

    

    /*
    |--------------------------------------------------------------------------
    | UPLOAD FILE
    |--------------------------------------------------------------------------
    */

    // $ktp = $request->file('ktp_pemilik')
    //     ->store('dokumen', 'public');

    // $kk = $request->file('kk_pemilik')
    //     ->store('dokumen', 'public');

    // $npwp = $request->file('npwp_pemilik')
    //     ->store('dokumen', 'public');

    // $sertifikat = $request->file('sertifikat_tanah')
    //     ->store('dokumen', 'public');

    // $suratKesepakatan = $request->file('surat_kesepakatan_bersama')
    //     ->store('dokumen', 'public');

    // $denah = $request->file('photo_denah_lokasi')
    //     ->store('dokumen', 'public');

    /*
    |--------------------------------------------------------------------------
    | SIMPAN DATABASE
    |--------------------------------------------------------------------------
    */

    $pengajuan = Pengajuan::create([

        'user_id' => auth()->id(),

        'layanan_id' => 4,

        'nama' => $request->nama_pemohon,

        'telepon_pemohon' => $request->telepon_pemohon,

        'tanggal_pengajuan' => $request->tanggal_pengajuan,

        'status' => 'pending',

    ]);

//             Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'KTP Pemilik',
//     'file_dokumen' => $ktp,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'KK Pemilik',
//     'file_dokumen' => $kk,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'NPWP Pemilik',
//     'file_dokumen' => $npwp,
// ]);


// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'Sertifikat Tanah',
//     'file_dokumen' => $sertifikat,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'Surat Kesepakatan Bersama',
//     'file_dokumen' => $suratKesepakatan,
// ]);

// Dokumen::create([
//     'pengajuan_id' => $pengajuan->id,
//     'nama_dokumen' => 'Photo Denah Lokasi',
//     'file_dokumen' => $denah,
// ]);

    return redirect()->route('user.histori')
        ->with('success', 'Pengajuan APHB berhasil dikirim');
}

public function uploadDokumen($id)
{
    $pengajuan = Pengajuan::findOrFail($id);

    // hanya pemilik pengajuan
    if ($pengajuan->user_id != auth()->id()) {
        abort(403);
    }

    // hanya jika sudah disetujui
    if ($pengajuan->status != 'disetujui') {
        return redirect()->route('user.histori')
            ->with('error', 'Pengajuan belum disetujui.');
    }

    return view('user.upload-dokumen', compact('pengajuan'));
}

public function storeDokumen(Request $request, $id)
{
    // nanti di sini kita simpan semua file ke tabel dokumen
}

    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS ADMIN
    |--------------------------------------------------------------------------
    */

    public function index()
{
    $pengajuan = Pengajuan::with([
    'user',
    'layanan'
])->latest()->get();

    return view('admin.pengajuan', compact('pengajuan'));
}

    public function updateStatus(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

    $pengajuan->update([
        'status' => $request->status,
        'catatan_admin' => $request->catatan_admin,
    ]);

    return redirect()
        ->route('admin.pengajuan')
        ->with('success', 'Status berhasil diupdate');
    }

    public function adminPengajuan()
    {
        $pengajuan = Pengajuan::with([
    'user',
    'layanan'
])->latest()->get();

        return view('admin.pengajuan', compact('pengajuan'));
    }

    public function show($id)
    {
    $pengajuan = Pengajuan::with([
        'user',
        'layanan',
        'dokumen'
    ])->findOrFail($id);

    return view('admin.detail-pengajuan', compact('pengajuan'));
    }

    public function surat($id)
    {
        $pengajuan = Pengajuan::with([
    'user',
    'layanan'
])->findOrFail($id);

        return view('surat.pemberitahuan', [
        'pengajuan' => $pengajuan,
        'jadwal' => 'Senin, 10:00 WIB']);
    }

    /*
|--------------------------------------------------------------------------
| KIRIM SURAT KE USER
|--------------------------------------------------------------------------
*/

public function kirimSurat($id)
{
    $pengajuan = Pengajuan::with([
    'user',
    'layanan'
])->findOrFail($id);

    // Generate PDF
    $pdf = Pdf::loadView('surat.pemberitahuan', compact('pengajuan'));

    // Nama file
    $fileName = 'surat-' . $pengajuan->id . '.pdf';

    // Simpan ke storage
    \Storage::disk('public')->put(
        'surat/' . $fileName,
        $pdf->output()
    );

    // Simpan ke database
    $pengajuan->file_surat = 'surat/' . $fileName;
    $pengajuan->surat = 1;
    $pengajuan->status = 'diproses';
    $pengajuan->save();

    return back()->with(
        'success',
        'Surat PDF berhasil dibuat & dikirim'
    );
}

public function downloadSurat($id)
{
    $pengajuan = Pengajuan::with([
    'user',
    'layanan'
])->findOrFail($id);

    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView(
        'surat.pemberitahuan',
        compact('pengajuan')
    );

    return $pdf->download('surat-'.$pengajuan->id.'.pdf');
}

public function previewSurat($id)
{
    $pengajuan = Pengajuan::with([
        'user',
        'layanan'
    ])->findOrFail($id);

    return view('admin.surat', compact('pengajuan'));
}

    /*
|--------------------------------------------------------------------------
| UPDATE PROGRESS
|--------------------------------------------------------------------------
*/

public function updateProgress(Request $request, $id)
{
    $pengajuan = Pengajuan::findOrFail($id);

    $pengajuan->progress = $request->progress;

    $pengajuan->save();

    return redirect()
        ->back()
        ->with('success', 'Progress berhasil diupdate');
}

public function laporan(Request $request)
{
    $bulan = $request->bulan ?? date('m');
    $tahun = $request->tahun ?? date('Y');

    $laporan = Pengajuan::with([
            'user',
            'layanan'
        ])
        ->whereYear('tanggal_pengajuan', $tahun)
        ->whereMonth('tanggal_pengajuan', $bulan)
        ->where('status', 'selesai')
        ->latest()
        ->get();

    return view('admin.laporan', compact(
        'laporan',
        'bulan',
        'tahun'
    ));
}

public function laporanPdf(Request $request)
{
    $bulan = $request->bulan;
    $tahun = $request->tahun;

    $laporan = Pengajuan::with([
            'user',
            'layanan'
        ])
        ->whereYear('tanggal_pengajuan', $tahun)
        ->whereMonth('tanggal_pengajuan', $bulan)
        ->where('status', 'selesai')
        ->latest()
        ->get();

    $pdf = Pdf::loadView(
        'admin.laporan-pdf',
        compact('laporan', 'bulan', 'tahun')
    );

    return $pdf->download('laporan.pdf');
}

    /*
|--------------------------------------------------------------------------
| EDIT REVISI USER
|--------------------------------------------------------------------------
*/

public function edit($id)
{
    $pengajuan = Pengajuan::findOrFail($id);

    // hanya pemilik data
    if ($pengajuan->user_id != auth()->id()) {
        abort(403);
    }

    return view('user.edit-pengajuan', compact('pengajuan'));
}

public function update(Request $request, $id)
{
    $pengajuan = Pengajuan::findOrFail($id);

    // Hanya pemilik data yang boleh mengubah
    if ($pengajuan->user_id != auth()->id()) {
        abort(403);
    }

    if ($request->hasFile('dokumen_baru')) {

        $file = $request->file('dokumen_baru')
            ->store('dokumen', 'public');

        Dokumen::create([
            'pengajuan_id' => $pengajuan->id,
            'nama_dokumen' => 'Dokumen Revisi',
            'file_dokumen' => $file,
        ]);
    }

    $pengajuan->update([
        'status' => 'pending',
        'catatan_admin' => null,
    ]);

    return redirect()
        ->route('user.histori')
        ->with('success', 'Dokumen revisi berhasil dikirim');
}

}
