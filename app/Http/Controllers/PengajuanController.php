<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
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

            'ktp_penjual' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'kk_penjual' => 'required|file|mimes:jpg,jpeg,png,pdf',

            'buku_nikah' => 'required|file|mimes:jpg,jpeg,png,pdf',

            'pbb_tanah' => 'required|file|mimes:jpg,jpeg,png,pdf',

            'npwp_penjual' => 'required|file|mimes:jpg,jpeg,png,pdf',

            'sertifikat_tanah' => 'required|file|mimes:jpg,jpeg,png,pdf',

            'photo_denah_lokasi' => 'required|file|mimes:jpg,jpeg,png,pdf',

            'nama_pembeli' => 'required',
            'telepon_pembeli' => 'required',

            'ktp_pembeli' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'kk_pembeli' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'npwp_pembeli' => 'required|file|mimes:jpg,jpeg,png,pdf',

        ]);

        // UPLOAD FILE
        $ktpPenjual = $request->file('ktp_penjual')->store('dokumen', 'public');

        $kkPenjual = $request->file('kk_penjual')->store('dokumen', 'public');

        $bukuNikah = $request->file('buku_nikah')->store('dokumen', 'public');

        $pbbTanah = $request->file('pbb_tanah')->store('dokumen', 'public');

        $npwpPenjual = $request->file('npwp_penjual')->store('dokumen', 'public');

        $sertifikat = $request->file('sertifikat_tanah')->store('dokumen', 'public');

        $denah = $request->file('photo_denah_lokasi')->store('dokumen', 'public');

        $ktpPembeli = $request->file('ktp_pembeli')->store('dokumen', 'public');

        $kkPembeli = $request->file('kk_pembeli')->store('dokumen', 'public');

        $npwpPembeli = $request->file('npwp_pembeli')->store('dokumen', 'public');

        // SIMPAN DATABASE
        Pengajuan::create([

        'user_id' => auth()->id(),

        'layanan_id' => 1,

        'layanan' => 'Akta Jual Beli',

        'nama' => $request->nama_pembeli,

        'nama_penjual' => $request->nama_penjual,
        'telepon_penjual' => $request->telepon_penjual,

        'nama_pembeli' => $request->nama_pembeli,
        'telepon_pembeli' => $request->telepon_pembeli,
        'tanggal_pengajuan' => $request->tanggal_pengajuan,

        'status' => 'pending',

        'dokumen' => json_encode([

        'ktp_penjual' => $ktpPenjual,
        'kk_penjual' => $kkPenjual,
        'buku_nikah' => $bukuNikah,
        'pbb_tanah' => $pbbTanah,
        'npwp_penjual' => $npwpPenjual,
        'sertifikat_tanah' => $sertifikat,
        'photo_denah_lokasi' => $denah,


        'ktp_pembeli' => $ktpPembeli,
        'kk_pembeli' => $kkPembeli,
        'npwp_pembeli' => $npwpPembeli,

    ])

]);

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

        'ktp_pemberi' => 'required|file|mimes:jpg,jpeg,png,pdf',

        'kk_pemberi' => 'required|file|mimes:jpg,jpeg,png,pdf',

        // PENERIMA HIBAH
        'nama_penerima' => 'required',
        'telepon_penerima' => 'required',

        'ktp_penerima' => 'required|file|mimes:jpg,jpeg,png,pdf',

        'kk_penerima' => 'required|file|mimes:jpg,jpeg,png,pdf',

        // DOKUMEN
        'sertifikat_tanah' => 'required|file|mimes:jpg,jpeg,png,pdf',

        'npwp' => 'required|file|mimes:jpg,jpeg,png,pdf',

        'surat_hibah' => 'required|file|mimes:jpg,jpeg,png,pdf',

        'photo_denah_lokasi' => 'required|file|mimes:jpg,jpeg,png,pdf',

    ]);

    /*
    |--------------------------------------------------------------------------
    | UPLOAD FILE
    |--------------------------------------------------------------------------
    */

    $ktpPemberi = $request->file('ktp_pemberi')
        ->store('dokumen', 'public');

    $kkPemberi = $request->file('kk_pemberi')
        ->store('dokumen', 'public');

    $ktpPenerima = $request->file('ktp_penerima')
        ->store('dokumen', 'public');

    $kkPenerima = $request->file('kk_penerima')
        ->store('dokumen', 'public');

    $sertifikat = $request->file('sertifikat_tanah')
        ->store('dokumen', 'public');

    $npwp = $request->file('npwp')
        ->store('dokumen', 'public');

    $suratHibah = $request->file('surat_hibah')
        ->store('dokumen', 'public');

    $denah = $request->file('photo_denah_lokasi')
        ->store('dokumen', 'public');

    /*
    |--------------------------------------------------------------------------
    | SIMPAN DATABASE
    |--------------------------------------------------------------------------
    */

    Pengajuan::create([

        'user_id' => auth()->id(),

        'layanan_id' => 2,

        'layanan' => 'Akta Hibah',

        'nama' => $request->nama_penerima,

        'nama_penjual' => $request->nama_pemberi,
        'telepon_penjual' => $request->telepon_pemberi,

        'nama_pembeli' => $request->nama_penerima,
        'telepon_pembeli' => $request->telepon_penerima,

        'tanggal_pengajuan' => $request->tanggal_pengajuan,

        'status' => 'pending',

        'dokumen' => json_encode([

            'ktp_pemberi' => $ktpPemberi,

            'kk_pemberi' => $kkPemberi,

            'ktp_penerima' => $ktpPenerima,

            'kk_penerima' => $kkPenerima,

            'sertifikat_tanah' => $sertifikat,

            'npwp' => $npwp,

            'surat_hibah' => $suratHibah,

            'photo_denah_lokasi' => $denah,

        ])

    ]);

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

        'ktp_ahli_waris' => 'required|file|mimes:jpg,jpeg,png,pdf',
        'kk_ahli_waris' => 'required|file|mimes:jpg,jpeg,png,pdf',

        'surat_kematian' => 'required|file|mimes:jpg,jpeg,png,pdf',

        'surat_keterangan_ahli_waris' => 'required|file|mimes:jpg,jpeg,png,pdf',

        'sertifikat_tanah' => 'required|file|mimes:jpg,jpeg,png,pdf',

        'npwp_ahli_waris' => 'required|file|mimes:jpg,jpeg,png,pdf',

        'photo_denah_lokasi' => 'required|file|mimes:jpg,jpeg,png,pdf',

    ]);

    // UPLOAD FILE
    $ktpAhliWaris = $request->file('ktp_ahli_waris')
        ->store('dokumen', 'public');

    $kkAhliWaris = $request->file('kk_ahli_waris')
        ->store('dokumen', 'public');

    $suratKematian = $request->file('surat_kematian')
        ->store('dokumen', 'public');

    $suratAhliWaris = $request->file('surat_keterangan_ahli_waris')
        ->store('dokumen', 'public');

    $sertifikat = $request->file('sertifikat_tanah')
        ->store('dokumen', 'public');

    $npwp = $request->file('npwp_ahli_waris')
        ->store('dokumen', 'public');

    $denah = $request->file('photo_denah_lokasi')
        ->store('dokumen', 'public');

    // SIMPAN DATABASE
    Pengajuan::create([

        'user_id' => auth()->id(),

        'layanan_id' => 3,

        'layanan' => 'Akta Warisan',

        'nama' => $request->nama_pemohon,

        'telepon_pemohon' => $request->telepon_pemohon,

        'tanggal_pengajuan' => $request->tanggal_pengajuan,

        'status' => 'pending',

        'dokumen' => json_encode([

            'ktp_ahli_waris' => $ktpAhliWaris,

            'kk_ahli_waris' => $kkAhliWaris,

            'surat_kematian' => $suratKematian,

            'surat_keterangan_ahli_waris' => $suratAhliWaris,

            'sertifikat_tanah' => $sertifikat,

            'npwp_ahli_waris' => $npwp,

            'photo_denah_lokasi' => $denah,

        ])

    ]);

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

        'ktp_pemilik' => 'required|file|mimes:jpg,jpeg,png,pdf',

        'kk_pemilik' => 'required|file|mimes:jpg,jpeg,png,pdf',

        'npwp_pemilik' => 'required|file|mimes:jpg,jpeg,png,pdf',

        'sertifikat_tanah' => 'required|file|mimes:jpg,jpeg,png,pdf',

        'surat_kesepakatan_bersama' => 'required|file|mimes:jpg,jpeg,png,pdf',

        'photo_denah_lokasi' => 'required|file|mimes:jpg,jpeg,png,pdf',

    ]);

    /*
    |--------------------------------------------------------------------------
    | UPLOAD FILE
    |--------------------------------------------------------------------------
    */

    $ktp = $request->file('ktp_pemilik')
        ->store('dokumen', 'public');

    $kk = $request->file('kk_pemilik')
        ->store('dokumen', 'public');

    $npwp = $request->file('npwp_pemilik')
        ->store('dokumen', 'public');

    $sertifikat = $request->file('sertifikat_tanah')
        ->store('dokumen', 'public');

    $suratKesepakatan = $request->file('surat_kesepakatan_bersama')
        ->store('dokumen', 'public');

    $denah = $request->file('photo_denah_lokasi')
        ->store('dokumen', 'public');

    /*
    |--------------------------------------------------------------------------
    | SIMPAN DATABASE
    |--------------------------------------------------------------------------
    */

    Pengajuan::create([

        'user_id' => auth()->id(),

        'layanan_id' => 4,

        'layanan' => 'APHB',

        'nama' => $request->nama_pemohon,

        'telepon_pemohon' => $request->telepon_pemohon,

        'tanggal_pengajuan' => $request->tanggal_pengajuan,

        'status' => 'pending',

        'dokumen' => json_encode([

            'ktp_pemilik' => $ktp,

            'kk_pemilik' => $kk,

            'npwp_pemilik' => $npwp,

            'sertifikat_tanah' => $sertifikat,

            'surat_kesepakatan_bersama' => $suratKesepakatan,

            'photo_denah_lokasi' => $denah,

        ])

    ]);

    return redirect()->route('user.histori')
        ->with('success', 'Pengajuan APHB berhasil dikirim');
}

    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS ADMIN
    |--------------------------------------------------------------------------
    */

    public function index()
{
    $pengajuan = Pengajuan::latest()->get();

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
        $pengajuan = Pengajuan::latest()->get();

        return view('admin.pengajuan', compact('pengajuan'));
    }

    public function show($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        return view('admin.detail-pengajuan', compact('pengajuan'));
    }

    public function surat($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

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
    $pengajuan = Pengajuan::findOrFail($id);

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
    $pengajuan = Pengajuan::findOrFail($id);

    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView(
        'surat.pemberitahuan',
        compact('pengajuan')
    );

    return $pdf->download('surat-'.$pengajuan->id.'.pdf');
}

public function previewSurat($id)
{
    $pengajuan = Pengajuan::findOrFail($id);

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

    $laporan = Pengajuan::
        whereYear('tanggal_pengajuan', $tahun)
        ->whereMonth('tanggal_pengajuan', $bulan)
        ->whereIn('status', ['selesai'])
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

    $laporan = Pengajuan::
            whereYear('tanggal_pengajuan', $tahun)
        ->whereMonth('tanggal_pengajuan', $bulan)
        ->whereIn('status', ['selesai'])
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

    if ($pengajuan->user_id != auth()->id()) {
        abort(403);
    }

    $dokumen = json_decode($pengajuan->dokumen, true);

    if ($request->hasFile('dokumen_baru')) {

        $file = $request->file('dokumen_baru')
            ->store('dokumen', 'public');

        $dokumen['dokumen_revisi'] = $file;
    }

    $pengajuan->update([
        'dokumen' => json_encode($dokumen),
        'status' => 'pending',
        'catatan_admin' => null,
    ]);

    return redirect()
        ->route('user.histori')
        ->with('success', 'Dokumen revisi berhasil dikirim');
}

}
