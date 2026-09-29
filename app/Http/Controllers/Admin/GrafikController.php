<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class GrafikController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->tahun ? (int)$request->tahun : (int)date('Y');

        // 📅 PER BULAN
        $perBulan = Pengajuan::selectRaw('MONTH(tanggal_pengajuan) as bulan, COUNT(*) as total')
            ->whereYear('tanggal_pengajuan', $tahun)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // 🧾 PER LAYANAN
        $perLayanan = Pengajuan::join('layanans', 'pengajuan.layanan_id', '=', 'layanans.id')
            ->selectRaw('layanans.nama_layanan as layanan, COUNT(pengajuan.id) as total')
            ->whereYear('pengajuan.tanggal_pengajuan', $tahun)
            ->groupBy('layanans.id', 'layanans.nama_layanan')
            ->get();

        $dataTahun = Pengajuan::with(['user', 'layanan'])
            ->whereYear('tanggal_pengajuan', $tahun)
            ->latest()
            ->get();

        return view('admin.grafik', compact('perBulan', 'perLayanan', 'tahun', 'dataTahun'));
    }
}
