<?php

namespace App\Http\Controllers;

class LayananController extends Controller
{
    /**
     * Menampilkan halaman layanan
     */
    public function index()
    {
        return view('layanan.index');
    }
}