<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use Barryvdh\DomPDF\Facade\Pdf;

class NotarisController extends Controller
{
    public function index()
    {
        $total = Pengajuan::count();
        $pending = Pengajuan::where('status', 'pending')->count();
        $diproses = Pengajuan::where('status', 'diproses')->count();
        $selesai = Pengajuan::where('status', 'selesai')->count();

        $pengajuan = Pengajuan::with(['user', 'layanan'])
            ->latest()
            ->take(5)
            ->get();

        return view('notaris.dashboard', compact(
            'total',
            'pending',
            'diproses',
            'selesai',
            'pengajuan'
        ));
    }

    public function show($id)
    {
        $pengajuan = Pengajuan::with([
            'user',
            'layanan',
            'dokumen'
        ])->findOrFail($id);

        return view('notaris.detail', compact('pengajuan'));
    }

    public function pengajuan()
    {
        $pengajuan = Pengajuan::with(['user', 'layanan'])
            ->latest()
            ->get();

        return view('notaris.pengajuan', compact('pengajuan'));
    }

    public function laporan(Request $request)
    {
        $tahun = $request->tahun ?? date('Y');
        $bulan = $request->bulan;
        $status = $request->status;

        $query = Pengajuan::with(['user', 'layanan'])->latest();

        if ($tahun && $tahun !== 'semua') {
            $query->whereYear('tanggal_pengajuan', $tahun);
        }

        if ($bulan && $bulan !== 'semua') {
            $query->whereMonth('tanggal_pengajuan', $bulan);
        }

        if ($status && $status !== 'semua') {
            $query->where('status', $status);
        }

        $laporan = $query->get();

        // Statistik
        $totalPengajuan = $laporan->count();
        $totalSelesai = $laporan->where('status', 'selesai')->count();
        $totalDiproses = $laporan->where('status', 'diproses')->count();
        $totalPending = $laporan->whereIn('status', ['pending', 'revisi'])->count();

        // List tahun dinamis dari tanggal_pengajuan
        $listTahun = Pengajuan::whereNotNull('tanggal_pengajuan')
            ->selectRaw('YEAR(tanggal_pengajuan) as tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun')
            ->toArray();

        $currentYear = (int) date('Y');
        if (!in_array($currentYear, $listTahun)) {
            $listTahun[] = $currentYear;
            rsort($listTahun);
        }

        return view('notaris.laporan', compact(
            'laporan',
            'tahun',
            'bulan',
            'status',
            'listTahun',
            'totalPengajuan',
            'totalSelesai',
            'totalDiproses',
            'totalPending'
        ));
    }

    public function laporanPdf(Request $request)
    {
        $tahun = $request->tahun ?? date('Y');
        $bulan = $request->bulan;
        $status = $request->status;

        $query = Pengajuan::with(['user', 'layanan'])->latest();

        if ($tahun && $tahun !== 'semua') {
            $query->whereYear('tanggal_pengajuan', $tahun);
        }

        if ($bulan && $bulan !== 'semua') {
            $query->whereMonth('tanggal_pengajuan', $bulan);
        }

        if ($status && $status !== 'semua') {
            $query->where('status', $status);
        }

        $laporan = $query->get();

        $pdf = Pdf::loadView('notaris.laporan-pdf', compact(
            'laporan',
            'tahun',
            'bulan',
            'status'
        ));

        $namaFile = 'laporan-notaris-' . ($tahun ?: 'semua') . ($bulan ? '-bulan-' . $bulan : '') . '.pdf';
        return $pdf->download($namaFile);
    }
}