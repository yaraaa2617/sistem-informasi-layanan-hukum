@extends('layouts.admin')

@section('content')

@php
    $totalSemua = $dataTahun->count();
    $selesaiCount = $dataTahun->where('status', 'selesai')->count();
    $diprosesCount = $dataTahun->where('status', 'diproses')->count();
    $pendingCount = $dataTahun->whereIn('status', ['pending', 'revisi'])->count();
    $disetujuiCount = $dataTahun->where('status', 'disetujui')->count();

    $persenSelesai = $totalSemua > 0 ? round(($selesaiCount / $totalSemua) * 100, 1) : 0;
    $persenDiproses = $totalSemua > 0 ? round(($diprosesCount / $totalSemua) * 100, 1) : 0;
    $persenPending = $totalSemua > 0 ? round(($pendingCount / $totalSemua) * 100, 1) : 0;

    // Petakan data 12 Bulan Lengkap
    $namaBulanLengkap = [
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    ];

    $bulanAktif = [];
    $bulanNihil = [];

    for ($m = 1; $m <= 12; $m++) {
        $namaBln = $namaBulanLengkap[$m];
        $row = $perBulan->firstWhere('bulan', $m);
        $jml = $row ? (int)$row->total : 0;

        if ($jml > 0) {
            $bulanAktif[$m] = [
                'nama' => $namaBln,
                'total' => $jml
            ];
        } else {
            $bulanNihil[] = $namaBln;
        }
    }

    // 1. Bulan Puncak (Tertinggi)
    $jumlahBulanPuncak = 0;
    $namaBulanPuncak = '-';
    if (!empty($bulanAktif)) {
        $maxVal = max(array_column($bulanAktif, 'total'));
        $jumlahBulanPuncak = $maxVal;
        $arrPuncak = array_filter($bulanAktif, fn($item) => $item['total'] === $maxVal);
        $namaBulanPuncak = implode(', ', array_column($arrPuncak, 'nama'));
    }

    // 2. Bulan Terendah yang Memiliki Permohonan (> 0)
    $jumlahBulanTerendah = 0;
    $namaBulanTerendah = '-';
    if (!empty($bulanAktif)) {
        $minVal = min(array_column($bulanAktif, 'total'));
        $jumlahBulanTerendah = $minVal;
        $arrTerendah = array_filter($bulanAktif, fn($item) => $item['total'] === $minVal);
        $namaBulanTerendah = implode(', ', array_column($arrTerendah, 'nama'));
    }

    // 3. Bulan Tanpa Permohonan (Nihil / 0)
    $textBulanNihil = !empty($bulanNihil) ? implode(', ', $bulanNihil) : 'Tidak ada (Semua bulan memiliki permohonan)';
    $countBulanNihil = count($bulanNihil);
    $jumlahBulanAktif = count($bulanAktif);
    $rataRataBulan = $jumlahBulanAktif > 0 ? round($totalSemua / $jumlahBulanAktif, 1) : 0;

    // Layanan Terbanyak
    $layananTerbanyakObj = $perLayanan->sortByDesc('total')->first();
    $namaLayananDominan = $layananTerbanyakObj ? $layananTerbanyakObj->layanan : '-';
    $jumlahLayananDominan = $layananTerbanyakObj ? $layananTerbanyakObj->total : 0;
    $persenLayananDominan = $totalSemua > 0 ? round(($jumlahLayananDominan / $totalSemua) * 100, 1) : 0;
@endphp

{{-- HEADER & FILTER TAHUN --}}
<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="text-3xl font-bold text-[#6B3F2A]">
            Dashboard Grafik & Analisis Data
        </h1>
        <p class="text-gray-500 mt-1">
            Visualisasi statistik permohonan layanan hukum, perbandingan bulanan, dan kesimpulan eksekutif
        </p>
    </div>

    <!-- FILTER TAHUN -->
    <form method="GET" class="flex items-center gap-3">
        <label class="font-semibold text-[#6B3F2A] whitespace-nowrap">Tahun:</label>
        <select name="tahun"
                onchange="this.form.submit()"
                class="bg-white border border-[#E5D3C1] text-[#6B3F2A] font-semibold rounded-xl px-4 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6B3F2A]">
            @for($i = date('Y'); $i >= 2020; $i--)
                <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>
                    Tahun {{ $i }}
                </option>
            @endfor
        </select>
    </form>
</div>

{{-- KARTU INDIKATOR UTAMA ATAS --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
    
    {{-- TOTAL PENGAJUAN --}}
    <div class="bg-white border border-[#E5D3C1] rounded-2xl p-5 shadow-sm flex items-center gap-4">
        <div class="w-12 h-12 bg-[#F8F1EA] text-[#6B3F2A] rounded-xl flex items-center justify-center text-2xl font-bold">
            📁
        </div>
        <div>
            <p class="text-xs font-medium text-gray-500">Total Pengajuan ({{ $tahun }})</p>
            <h3 class="text-2xl font-bold text-[#6B3F2A] mt-0.5">{{ $totalSemua }} <span class="text-sm font-normal text-gray-400">berkas</span></h3>
        </div>
    </div>

    {{-- BULAN PUNCAK --}}
    <div class="bg-white border border-[#E5D3C1] rounded-2xl p-5 shadow-sm flex items-center gap-4">
        <div class="w-12 h-12 bg-emerald-50 text-emerald-700 rounded-xl flex items-center justify-center text-2xl font-bold">
            📈
        </div>
        <div class="min-w-0 flex-1">
            <p class="text-xs font-medium text-gray-500">Bulan Puncak (Tertinggi)</p>
            <h3 class="text-lg font-bold text-emerald-800 mt-0.5 truncate" title="{{ $namaBulanPuncak }}">
                {{ $namaBulanPuncak }}
            </h3>
            <p class="text-[11px] text-gray-400 font-medium">{{ $jumlahBulanPuncak }} berkas masuk</p>
        </div>
    </div>

    {{-- BULAN TERENDAH (>0) --}}
    <div class="bg-white border border-[#E5D3C1] rounded-2xl p-5 shadow-sm flex items-center gap-4">
        <div class="w-12 h-12 bg-amber-50 text-amber-700 rounded-xl flex items-center justify-center text-2xl font-bold">
            📉
        </div>
        <div class="min-w-0 flex-1">
            <p class="text-xs font-medium text-gray-500">Bulan Terendah (>0)</p>
            <h3 class="text-lg font-bold text-amber-800 mt-0.5 truncate" title="{{ $namaBulanTerendah }}">
                {{ $namaBulanTerendah }}
            </h3>
            <p class="text-[11px] text-gray-400 font-medium">{{ $jumlahBulanTerendah }} berkas masuk</p>
        </div>
    </div>

    {{-- BULAN NIHIL --}}
    <div class="bg-white border border-[#E5D3C1] rounded-2xl p-5 shadow-sm flex items-center gap-4">
        <div class="w-12 h-12 bg-gray-100 text-gray-600 rounded-xl flex items-center justify-center text-2xl font-bold">
            ⏸️
        </div>
        <div>
            <p class="text-xs font-medium text-gray-500">Bulan Tanpa Permohonan</p>
            <h3 class="text-2xl font-bold text-gray-700 mt-0.5">{{ $countBulanNihil }} <span class="text-sm font-normal text-gray-400">bulan nihil</span></h3>
        </div>
    </div>

</div>

{{-- GRAFIK VISUALISASI --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">

    <!-- CHART 1: PER BULAN -->
    <div class="bg-white border border-[#E5D3C1] rounded-2xl p-6 shadow-sm flex flex-col">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="font-bold text-xl text-[#6B3F2A]">Tren Pengajuan per Bulan</h2>
                <p class="text-xs text-gray-400 mt-1">Klik pada batang grafik untuk memfilter tabel detail di bawah</p>
            </div>
            <span class="bg-[#F8F1EA] text-[#6B3F2A] text-xs font-semibold px-3 py-1 rounded-lg">
                Tahun {{ $tahun }}
            </span>
        </div>
        <div class="relative h-80 w-full">
            <canvas id="chartBulan"></canvas>
        </div>
    </div>

    <!-- CHART 2: PER LAYANAN -->
    <div class="bg-white border border-[#E5D3C1] rounded-2xl p-6 shadow-sm flex flex-col">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="font-bold text-xl text-[#6B3F2A]">Distribusi per Layanan</h2>
                <p class="text-xs text-gray-400 mt-1">Komposisi pengajuan berdasarkan jenis akta/layanan hukum</p>
            </div>
            <span class="bg-[#F8F1EA] text-[#6B3F2A] text-xs font-semibold px-3 py-1 rounded-lg">
                Tahun {{ $tahun }}
            </span>
        </div>
        <div class="relative h-80 w-full flex items-center justify-center">
            @if($perLayanan->count() > 0)
                <canvas id="chartLayanan"></canvas>
            @else
                <p class="text-gray-400 italic">Belum ada data layanan untuk tahun {{ $tahun }}</p>
            @endif
        </div>
    </div>

</div>

{{-- KESIMPULAN & RINGKASAN HASIL GRAFIK --}}
<div class="bg-white border border-[#E5D3C1] rounded-2xl p-6 lg:p-8 shadow-sm mb-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between pb-4 mb-6 border-b border-[#E5D3C1] gap-2">
        <div>
            <div class="flex items-center gap-2">
                <span class="text-2xl">📋</span>
                <h2 class="text-xl font-bold text-[#6B3F2A]">
                    Kesimpulan & Ringkasan Hasil Grafik (Tahun {{ $tahun }})
                </h2>
            </div>
            <p class="text-xs text-gray-500 mt-1">
                Rangkuman menyeluruh mencakup perbandingan bulan aktif, bulan terendah, bulan nihil, dan dominasi layanan
            </p>
        </div>
        <span class="bg-[#F8F1EA] text-[#6B3F2A] text-xs font-bold px-3 py-1.5 rounded-xl border border-[#E5D3C1] self-start">
            Analisis Eksekutif
        </span>
    </div>

    {{-- INFORMASI KOMPARASI BULAN (PUNCAK, TERENDAH, NIHIL) --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        
        <div class="bg-emerald-50/70 border border-emerald-200 p-4 rounded-2xl">
            <div class="flex items-center gap-2 text-emerald-800 font-bold text-xs uppercase tracking-wider mb-1">
                <span>📈</span> Bulan Puncak (Tertinggi)
            </div>
            <p class="text-base font-bold text-emerald-900">
                {{ $namaBulanPuncak }}
            </p>
            <p class="text-xs text-emerald-700 mt-0.5">
                Mencatat permohonan terbanyak: <strong>{{ $jumlahBulanPuncak }} berkas</strong>
            </p>
        </div>

        <div class="bg-amber-50/70 border border-amber-200 p-4 rounded-2xl">
            <div class="flex items-center gap-2 text-amber-800 font-bold text-xs uppercase tracking-wider mb-1">
                <span>📉</span> Bulan Terendah (>0)
            </div>
            <p class="text-base font-bold text-amber-900">
                {{ $namaBulanTerendah }}
            </p>
            <p class="text-xs text-amber-700 mt-0.5">
                Bulan terendah yang memiliki permohonan: <strong>{{ $jumlahBulanTerendah }} berkas</strong>
            </p>
        </div>

        <div class="bg-gray-50 border border-gray-200 p-4 rounded-2xl">
            <div class="flex items-center gap-2 text-gray-700 font-bold text-xs uppercase tracking-wider mb-1">
                <span>⏸️</span> Bulan Tanpa Permohonan (Nihil)
            </div>
            <p class="text-xs font-semibold text-gray-800 leading-relaxed mt-1">
                {{ $textBulanNihil }}
            </p>
            <p class="text-[11px] text-gray-500 mt-1">
                Total: <strong>{{ $countBulanNihil }} bulan</strong> tanpa permohonan masuk
            </p>
        </div>

    </div>

    {{-- 4 POIN-POIN KESIMPULAN NARATIF --}}
    <div class="bg-[#FAF7F5] border border-[#E5D3C1] rounded-2xl p-5">
        <h4 class="font-bold text-[#6B3F2A] text-sm mb-3 flex items-center gap-2">
            <span>💡</span> Poin-Poin Utama & Hasil Analisis Statistik:
        </h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs text-gray-700">
            
            {{-- POIN 1: TREN DAN VOLUME PERMOHONAN (MERANGKUM KESELURUHAN GRAFIK) --}}
            <div class="bg-white p-4 rounded-xl border border-[#E5D3C1] shadow-2xs flex flex-col justify-between">
                <div>
                    <div class="font-bold text-gray-900 mb-2 flex items-center gap-1.5 text-sm">
                        <span class="text-blue-600">●</span> 1. Tren dan Volume Permohonan Keseluruhan
                    </div>
                    @if($totalSemua > 0)
                        <div class="space-y-2 text-gray-600 leading-relaxed">
                            <p>
                                Sepanjang tahun <strong>{{ $tahun }}</strong>, tercatat total akumulasi <strong>{{ $totalSemua }} berkas pengajuan</strong> yang masuk ke kantor notaris, dengan rata-rata kecepatan berkas masuk sebesar <strong>{{ $rataRataBulan }} berkas/bulan</strong> pada <strong>{{ $jumlahBulanAktif }} bulan aktif</strong>.
                            </p>
                            <p class="bg-[#F8F5F2] p-2.5 rounded-lg border border-[#E5D3C1] text-[11.5px]">
                                📌 <strong>Rangkuman Sebaran Bulanan:</strong><br>
                                • <strong>Bulan Puncak:</strong> {{ $namaBulanPuncak }} ({{ $jumlahBulanPuncak }} berkas)<br>
                                • <strong>Bulan Terendah yang Memiliki Permohonan:</strong> {{ $namaBulanTerendah }} ({{ $jumlahBulanTerendah }} berkas)<br>
                                • <strong>Bulan Tanpa Permohonan (Nihil):</strong> {{ $textBulanNihil }}
                            </p>
                        </div>
                    @else
                        <p class="text-gray-500 italic">
                            Sepanjang tahun {{ $tahun }}, belum terdapat berkas permohonan yang masuk (seluruh bulan dari Januari hingga Desember tercatat tanpa permohonan).
                        </p>
                    @endif
                </div>
            </div>

            {{-- POIN 2: PREFERENSI LAYANAN HUKUM --}}
            <div class="bg-white p-4 rounded-xl border border-[#E5D3C1] shadow-2xs flex flex-col justify-between">
                <div>
                    <div class="font-bold text-gray-900 mb-2 flex items-center gap-1.5 text-sm">
                        <span class="text-amber-600">●</span> 2. Preferensi Layanan Hukum Terbanyak
                    </div>
                    @if($totalSemua > 0)
                        <div class="space-y-2 text-gray-600 leading-relaxed">
                            <p>
                                Kebutuhan masyarakat pada tahun {{ $tahun }} paling terkonsentrasi pada layanan <strong>{{ $namaLayananDominan }}</strong> yang mencakup <strong>{{ $persenLayananDominan }}%</strong> dari keseluruhan permohonan (<strong>{{ $jumlahLayananDominan }} berkas</strong>).
                            </p>
                            <p>
                                Dari total <strong>{{ $perLayanan->count() }} jenis layanan</strong> yang diajukan, permohonan akta pertanahan dan kenotariatan menunjukkan minat yang kuat pada layanan hukum dominan tersebut.
                            </p>
                        </div>
                    @else
                        <p class="text-gray-500 italic">
                            Data distribusi preferensi layanan hukum belum tersedia untuk tahun {{ $tahun }}.
                        </p>
                    @endif
                </div>
            </div>

            {{-- POIN 3: EFEKTIVITAS PENYELESAIAN --}}
            <div class="bg-white p-4 rounded-xl border border-[#E5D3C1] shadow-2xs flex flex-col justify-between">
                <div>
                    <div class="font-bold text-gray-900 mb-2 flex items-center gap-1.5 text-sm">
                        <span class="text-green-600">●</span> 3. Kinerja & Efektivitas Penyelesaian Akta
                    </div>
                    @if($totalSemua > 0)
                        <div class="space-y-2 text-gray-600 leading-relaxed">
                            <p>
                                Dari {{ $totalSemua }} berkas yang masuk, sebanyak <strong>{{ $selesaiCount }} berkas ({{ $persenSelesai }}%)</strong> telah berhasil diselesaikan secara tuntas hingga penerbitan akta resmi dan penyerahan warkah.
                            </p>
                            <p>
                                Sementara itu, sebanyak <strong>{{ $diprosesCount }} berkas ({{ $persenDiproses }}%)</strong> sedang dalam tahap pemrosesan/penyusunan draf, dan <strong>{{ $disetujuiCount }} berkas</strong> telah disetujui untuk upload dokumen fisik.
                            </p>
                        </div>
                    @else
                        <p class="text-gray-500 italic">
                            Rasio efektivitas penyelesaian akta akan otomatis terhitung saat ada berkas masuk.
                        </p>
                    @endif
                </div>
            </div>

            {{-- POIN 4: CATATAN TINDAK LANJUT & OPERASIONAL --}}
            <div class="bg-white p-4 rounded-xl border border-[#E5D3C1] shadow-2xs flex flex-col justify-between">
                <div>
                    <div class="font-bold text-gray-900 mb-2 flex items-center gap-1.5 text-sm">
                        <span class="text-purple-600">●</span> 4. Catatan Evaluasi & Tindak Lanjut
                    </div>
                    <div class="space-y-2 text-gray-600 leading-relaxed">
                        @if($pendingCount > 0)
                            <p>
                                Terdapat <strong>{{ $pendingCount }} berkas</strong> yang berstatus menunggu verifikasi awal atau perlu perbaikan dokumen persyaratan (revisi).
                            </p>
                            <p>
                                💡 <strong>Rekomendasi:</strong> Disarankan petugas admin segera menindaklanjuti berkas pending/revisi agar proses pembuatan akta dapat segera dilanjutkan ke tahap berikutnya.
                            </p>
                        @else
                            <p>
                                Seluruh berkas yang masuk pada tahun {{ $tahun }} telah tertangani dengan baik dan tidak ada antrean berkas yang tertahan pada status verifikasi awal atau revisi.
                            </p>
                            <p class="text-emerald-700 font-medium">
                                ✔ Efisiensi operasional berjalan optimal.
                            </p>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- DETAIL DATA TABEL --}}
<div class="bg-white border border-[#E5D3C1] rounded-2xl shadow-sm overflow-hidden mb-8">
    <div class="p-6 border-b border-[#E5D3C1] flex items-center justify-between">
        <div>
            <h2 id="detailTitle" class="text-xl font-bold text-[#6B3F2A]">
                Detail Pengajuan (Tahun {{ $tahun }})
            </h2>
            <p id="detailSubtitle" class="text-sm text-gray-500 mt-1">
                Menampilkan seluruh berkas masuk tahun {{ $tahun }}. Klik salah satu batang grafik bulan untuk menyaring.
            </p>
        </div>
        <button id="btnResetFilter"
                onclick="resetDetailFilter()"
                class="hidden text-sm bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-4 py-2 rounded-xl transition">
            Tampilkan Semua Bulan
        </button>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-[#F8F1EA] text-[#6B3F2A]">
                <tr>
                    <th class="p-4 text-left">Nama Pemohon</th>
                    <th class="p-4 text-left">Layanan</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-left">Progress</th>
                    <th class="p-4 text-left">Tanggal</th>
                    <th class="p-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody id="detailTableBody">
                @forelse($dataTahun as $item)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="p-4 font-semibold text-gray-800">
                        {{ $item->nama_pembeli ?? $item->nama_pemohon ?? $item->nama_penerima ?? $item->nama ?? '-' }}
                    </td>
                    <td class="p-4 text-gray-700">
                        {{ $item->layanan->nama_layanan ?? '-' }}
                    </td>
                    <td class="p-4">
                        @if($item->status == 'pending')
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">Pending</span>
                        @elseif($item->status == 'revisi')
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">Berkas Belum Lengkap</span>
                        @elseif($item->status == 'disetujui')
                            <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold">Disetujui</span>
                        @elseif($item->status == 'diproses')
                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">Diproses</span>
                        @elseif($item->status == 'selesai')
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">Selesai</span>
                        @else
                            <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-semibold">{{ ucfirst($item->status) }}</span>
                        @endif
                    </td>
                    <td class="p-4">
                        @if($item->progress)
                            @if(str_contains(strtolower($item->progress), 'upload'))
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold inline-flex items-center gap-1">
                                    📤 {{ $item->progress }}
                                </span>
                            @elseif(str_contains(strtolower($item->progress), 'selesai'))
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold inline-flex items-center gap-1">
                                    ✔ {{ $item->progress }}
                                </span>
                            @elseif(str_contains(strtolower($item->progress), 'belum lengkap') || str_contains(strtolower($item->progress), 'revisi'))
                                <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-xs font-semibold inline-flex items-center gap-1">
                                    ⚠️ {{ $item->progress }}
                                </span>
                            @else
                                <span class="bg-[#F8F1EA] text-[#6B3F2A] border border-[#E5D3C1] px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ $item->progress }}
                                </span>
                            @endif
                        @else
                            <span class="text-gray-400 italic text-xs">Belum ada progress</span>
                        @endif
                    </td>
                    <td class="p-4 text-gray-500 text-sm">
                        {{ $item->tanggal_pengajuan ? date('d M Y', strtotime($item->tanggal_pengajuan)) : '-' }}
                    </td>
                    <td class="p-4">
                        <a href="/admin/pengajuan/${item.id}"
                           class="bg-[#6B3F2A] hover:bg-[#4E342E] text-white px-3 py-1.5 rounded-lg text-xs font-semibold transition">
                            Lihat
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-8 text-center text-gray-400 italic">
                        Belum ada data pengajuan pada tahun {{ $tahun }}.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- SCRIPT CHART.JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const rawPerBulan = @json($perBulan);
    const rawPerLayanan = @json($perLayanan);
    const currentTahun = @json($tahun);

    const namaBulanList = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    // Petakan data 12 bulan
    const bulanTotals = Array(12).fill(0);
    rawPerBulan.forEach(item => {
        const b = parseInt(item.bulan);
        if (b >= 1 && b <= 12) {
            bulanTotals[b - 1] = parseInt(item.total);
        }
    });

    // 1. Inisialisasi Chart Bulanan
    const ctxBulan = document.getElementById('chartBulan');
    if (ctxBulan) {
        const chartBulan = new Chart(ctxBulan, {
            type: 'bar',
            data: {
                labels: namaBulanList,
                datasets: [{
                    label: 'Jumlah Pengajuan',
                    data: bulanTotals,
                    backgroundColor: '#6B3F2A',
                    hoverBackgroundColor: '#4E342E',
                    borderRadius: 6,
                    maxBarThickness: 40
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(ctx) {
                                return ` ${ctx.raw} Pengajuan (Klik untuk detail)`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            precision: 0
                        },
                        grid: { color: '#F3EAE1' }
                    },
                    x: {
                        grid: { display: false }
                    }
                }
            }
        });

        // Event Klik Batang Grafik Bulan
        ctxBulan.onclick = function(evt) {
            const points = chartBulan.getElementsAtEventForMode(
                evt,
                'nearest',
                { intersect: true },
                true
            );

            if (!points.length) return;

            const index = points[0].index;
            const bulanAngka = index + 1;
            const namaBulan = namaBulanList[index];

            loadDetailBulan(currentTahun, bulanAngka, namaBulan);
        };
    }

    // 2. Inisialisasi Chart Layanan
    const ctxLayanan = document.getElementById('chartLayanan');
    if (ctxLayanan && rawPerLayanan.length > 0) {
        new Chart(ctxLayanan, {
            type: 'doughnut',
            data: {
                labels: rawPerLayanan.map(item => item.layanan),
                datasets: [{
                    data: rawPerLayanan.map(item => parseInt(item.total)),
                    backgroundColor: [
                        '#6B3F2A',
                        '#A77F60',
                        '#D4A373',
                        '#CCD67F',
                        '#84A98C',
                        '#52796F',
                        '#457B9D'
                    ],
                    borderWidth: 2,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12,
                            padding: 14,
                            font: { size: 12 }
                        }
                    }
                }
            }
        });
    }
});

// Simpan data awal tabel untuk reset filter
const initialTableHtml = document.getElementById('detailTableBody') ? document.getElementById('detailTableBody').innerHTML : '';
const initialTitle = document.getElementById('detailTitle') ? document.getElementById('detailTitle').innerText : '';
const initialSubtitle = document.getElementById('detailSubtitle') ? document.getElementById('detailSubtitle').innerText : '';

function loadDetailBulan(tahun, bulan, namaBulan) {
    const tableBody = document.getElementById('detailTableBody');
    const title = document.getElementById('detailTitle');
    const subtitle = document.getElementById('detailSubtitle');
    const btnReset = document.getElementById('btnResetFilter');

    if (!tableBody) return;

    title.innerText = `Detail Pengajuan: Bulan ${namaBulan} ${tahun}`;
    subtitle.innerText = `Menampilkan berkas pengajuan khusus bulan ${namaBulan} ${tahun}.`;
    if (btnReset) btnReset.classList.remove('hidden');

    tableBody.innerHTML = `
        <tr>
            <td colspan="6" class="p-8 text-center text-gray-500">
                Memuat data bulan ${namaBulan}...
            </td>
        </tr>
    `;

    fetch(`{{ route('admin.grafik.detail') }}?tahun=${tahun}&bulan=${bulan}`)
        .then(res => res.json())
        .then(data => {
            if (!data || data.length === 0) {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="6" class="p-8 text-center text-gray-400 italic">
                            Tidak ada pengajuan pada bulan ${namaBulan} ${tahun}
                        </td>
                    </tr>
                `;
                return;
            }

            let html = '';
            data.forEach(item => {
                let statusBadge = '';
                const st = (item.status || '').toLowerCase();
                if (st === 'pending') {
                    statusBadge = '<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">Pending</span>';
                } else if (st === 'revisi') {
                    statusBadge = '<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">Berkas Belum Lengkap</span>';
                } else if (st === 'disetujui') {
                    statusBadge = '<span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold">Disetujui</span>';
                } else if (st === 'diproses') {
                    statusBadge = '<span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">Diproses</span>';
                } else if (st === 'selesai') {
                    statusBadge = '<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">Selesai</span>';
                } else {
                    statusBadge = `<span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-semibold">${item.status}</span>`;
                }

                let progressBadge = '';
                const prg = (item.progress || '').toLowerCase();
                if (!item.progress || item.progress === 'Belum ada progress') {
                    progressBadge = '<span class="text-gray-400 italic text-xs">Belum ada progress</span>';
                } else if (prg.includes('upload')) {
                    progressBadge = `<span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold inline-flex items-center gap-1">📤 ${item.progress}</span>`;
                } else if (prg.includes('selesai')) {
                    progressBadge = `<span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold inline-flex items-center gap-1">✔ ${item.progress}</span>`;
                } else if (prg.includes('belum lengkap') || prg.includes('revisi')) {
                    progressBadge = `<span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-xs font-semibold inline-flex items-center gap-1">⚠️ ${item.progress}</span>`;
                } else {
                    progressBadge = `<span class="bg-[#F8F1EA] text-[#6B3F2A] border border-[#E5D3C1] px-3 py-1 rounded-full text-xs font-semibold">${item.progress}</span>`;
                }

                html += `
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="p-4 font-semibold text-gray-800">${item.nama}</td>
                        <td class="p-4 text-gray-700">${item.layanan}</td>
                        <td class="p-4">${statusBadge}</td>
                        <td class="p-4">${progressBadge}</td>
                        <td class="p-4 text-gray-500 text-sm">${item.tanggal}</td>
                        <td class="p-4">
                            <a href="/admin/pengajuan/${item.id}"
                               class="bg-[#6B3F2A] hover:bg-[#4E342E] text-white px-3 py-1.5 rounded-lg text-xs font-semibold transition">
                                Lihat
                            </a>
                        </td>
                    </tr>
                `;
            });

            tableBody.innerHTML = html;
        })
        .catch(err => {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="6" class="p-8 text-center text-red-500">
                        Gagal memuat data: ${err.message}
                    </td>
                </tr>
            `;
        });
}

function resetDetailFilter() {
    const tableBody = document.getElementById('detailTableBody');
    const title = document.getElementById('detailTitle');
    const subtitle = document.getElementById('detailSubtitle');
    const btnReset = document.getElementById('btnResetFilter');

    if (tableBody) tableBody.innerHTML = initialTableHtml;
    if (title) title.innerText = initialTitle;
    if (subtitle) subtitle.innerText = initialSubtitle;
    if (btnReset) btnReset.classList.add('hidden');
}
</script>

@endsection