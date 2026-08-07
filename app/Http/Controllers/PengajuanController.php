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
    $request->validate([
        'nama_penjual' => 'required',
        'telepon_penjual' => 'required',
        'nama_pembeli' => 'required',
        'telepon_pembeli' => 'required',

        'alamat_objek_tanah' => 'required',
        'kecamatan' => 'required',
        'kabupaten_kota' => 'required',
        'tujuan_pengajuan' => 'required',
        'keterangan' => 'nullable',
    ]);

    Pengajuan::create([
        'user_id' => auth()->id(),
        'layanan_id' => 1,

        'nama' => $request->nama_pembeli,

        'nama_penjual' => $request->nama_penjual,
        'telepon_penjual' => $request->telepon_penjual,

        'nama_pembeli' => $request->nama_pembeli,
        'telepon_pembeli' => $request->telepon_pembeli,

        'alamat_objek_tanah' => $request->alamat_objek_tanah,
        'kecamatan' => $request->kecamatan,
        'kabupaten_kota' => $request->kabupaten_kota,
        'tujuan_pengajuan' => $request->tujuan_pengajuan,
        'keterangan' => $request->keterangan,

        'tanggal_pengajuan' => now(),
        'status' => 'pending',
    ]);

    return redirect()
        ->route('user.histori')
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
        'nama_pemberi' => 'required',
        'telepon_pemberi' => 'required',

        'nama_penerima' => 'required',
        'telepon_penerima' => 'required',

        'alamat_objek_tanah' => 'required',
        'kecamatan' => 'required',
        'kabupaten_kota' => 'required',
        'hubungan_pemberi_penerima' => 'required',
        'tujuan_pengajuan' => 'required',
        'keterangan' => 'nullable',
    ]);

    Pengajuan::create([
        'user_id' => auth()->id(),
        'layanan_id' => 2,

        'nama' => $request->nama_penerima,

        'nama_penjual' => $request->nama_pemberi,
        'telepon_penjual' => $request->telepon_pemberi,

        'nama_pembeli' => $request->nama_penerima,
        'telepon_pembeli' => $request->telepon_penerima,

        'alamat_objek_tanah' => $request->alamat_objek_tanah,
        'kecamatan' => $request->kecamatan,
        'kabupaten_kota' => $request->kabupaten_kota,

        'hubungan_pemberi_penerima' =>
            $request->hubungan_pemberi_penerima,

        'tujuan_pengajuan' => $request->tujuan_pengajuan,
        'keterangan' => $request->keterangan,

        'tanggal_pengajuan' => now(),
        'status' => 'pending',
    ]);

    return redirect()
        ->route('user.histori')
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

        'alamat_objek_tanah' => 'required',
        'kecamatan' => 'required',
        'kabupaten_kota' => 'required',

        'nama_pewaris' => 'required',
        'tanggal_meninggal' => 'required|date',
        'jumlah_ahli_waris' => 'required|integer|min:1',

        'tujuan_pengajuan' => 'required',
        'keterangan' => 'nullable',
    ]);

    Pengajuan::create([
        'user_id' => auth()->id(),
        'layanan_id' => 3,

        'nama' => $request->nama_pemohon,
        'telepon_pemohon' => $request->telepon_pemohon,

        'alamat_objek_tanah' => $request->alamat_objek_tanah,
        'kecamatan' => $request->kecamatan,
        'kabupaten_kota' => $request->kabupaten_kota,

        'nama_pewaris' => $request->nama_pewaris,
        'tanggal_meninggal' => $request->tanggal_meninggal,
        'jumlah_ahli_waris' => $request->jumlah_ahli_waris,

        'tujuan_pengajuan' => $request->tujuan_pengajuan,
        'keterangan' => $request->keterangan,

        'tanggal_pengajuan' => now(),
        'status' => 'pending',
    ]);

    return redirect()
        ->route('user.histori')
        ->with('success', 'Pengajuan turun waris berhasil dikirim');
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

        'alamat_objek_tanah' => 'required',
        'kecamatan' => 'required',
        'kabupaten_kota' => 'required',

        'tujuan_pengajuan' => 'required',
        'keterangan' => 'nullable',
    ]);

    Pengajuan::create([
        'user_id' => auth()->id(),
        'layanan_id' => 4,

        'nama' => $request->nama_pemohon,
        'telepon_pemohon' => $request->telepon_pemohon,

        'alamat_objek_tanah' => $request->alamat_objek_tanah,
        'kecamatan' => $request->kecamatan,
        'kabupaten_kota' => $request->kabupaten_kota,

        'tujuan_pengajuan' => $request->tujuan_pengajuan,
        'keterangan' => $request->keterangan,

        'tanggal_pengajuan' => now(),
        'status' => 'pending',
    ]);

    return redirect()
        ->route('user.histori')
        ->with('success', 'Pengajuan APHB berhasil dikirim');
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
