<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Dokumen;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function create($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        // hanya pemilik pengajuan
        if ($pengajuan->user_id != auth()->id()) {
            abort(403);
        }

        // hanya jika sudah disetujui
        if ($pengajuan->status != 'disetujui') {
            return back()->with('error','Pengajuan belum disetujui admin.');
        }

        return view('user.upload-dokumen', compact('pengajuan'));
    }

    public function store(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        if ($pengajuan->user_id != auth()->id()) {
            abort(403);
        }

        // upload akan kita isi setelah Blade selesai

        return redirect()
            ->route('user.histori')
            ->with('success','Dokumen berhasil diupload');
    }
}