<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;

class NotarisController extends Controller
{
    public function index()
    {
    $total = Pengajuan::count();

    $pending = Pengajuan::where('status','pending')->count();

    $diproses = Pengajuan::where('status','diproses')->count();

    $selesai = Pengajuan::where('status','selesai')->count();

    $pengajuan = Pengajuan::with(['user','layanan'])
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
    $pengajuan = Pengajuan::with(['user','layanan'])
        ->latest()
        ->get();

    return view('notaris.pengajuan', compact('pengajuan'));
}
}