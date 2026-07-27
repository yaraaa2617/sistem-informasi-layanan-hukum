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
        $perBulan = Pengajuan::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->whereYear('created_at', date('Y'))
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // 🧾 PER LAYANAN
        $perLayanan = Pengajuan::selectRaw('layanan, COUNT(*) as total')
            ->groupBy('layanan')
            ->get();

        return view('admin.grafik', compact('perBulan', 'perLayanan'));
    }
}
