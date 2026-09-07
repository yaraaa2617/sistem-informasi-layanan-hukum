<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class GrafikController extends Controller
{
    public function index()
    {
        // 📅 PER BULAN
        $perBulan = Pengajuan::selectRaw('MONTH(tanggal_pengajuan) as bulan, COUNT(*) as total')
            ->whereYear('tanggal_pengajuan', date('Y'))
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // 🧾 PER LAYANAN
        $perLayanan = Pengajuan::join('layanans', 'pengajuan.layanan_id', '=', 'layanans.id')
            ->selectRaw('layanans.nama_layanan as layanan, COUNT(pengajuan.id) as total')
            ->whereYear('pengajuan.tanggal_pengajuan', date('Y'))
            ->groupBy('layanans.id', 'layanans.nama_layanan')
            ->get();

        return view('admin.grafik', compact('perBulan', 'perLayanan'));
    }
}
