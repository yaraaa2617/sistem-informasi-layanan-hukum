@extends('layouts.notaris')

@section('content')

{{-- HEADER --}}
<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="text-3xl font-bold text-[#5D4037]">
            Laporan Pengajuan Akta
        </h1>
        <p class="text-gray-500 mt-1">
            Rekapitulasi dan laporan data pengajuan layanan hukum per tahun & per bulan
        </p>
    </div>

    <div class="flex items-center gap-3">
        <a href="{{ route('notaris.laporan.pdf', ['tahun' => $tahun, 'bulan' => $bulan, 'status' => $status]) }}"
           target="_blank"
           class="bg-[#2E7D32] hover:bg-[#1B5E20] text-white px-5 py-2.5 rounded-xl font-semibold text-sm transition inline-flex items-center gap-2 shadow-sm">
            🖨️ Cetak PDF Laporan
        </a>
    </div>
</div>

{{-- FORM FILTER TAHUN, BULAN & STATUS --}}
<div class="bg-white border border-[#E5D3C1] p-6 rounded-2xl shadow-sm mb-8">
    <form method="GET" action="{{ route('notaris.laporan') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
        
        {{-- FILTER TAHUN --}}
        <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                Tahun
            </label>
            <select name="tahun" class="w-full border border-[#E5D3C1] p-3 rounded-xl focus:outline-none focus:border-[#5D4037] bg-white text-sm">
                <option value="semua" {{ $tahun === 'semua' ? 'selected' : '' }}>Semua Tahun</option>
                @foreach($listTahun as $t)
                    <option value="{{ $t }}" {{ ($tahun == $t && $tahun !== 'semua') ? 'selected' : '' }}>
                        Tahun {{ $t }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- FILTER BULAN --}}
        <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                Bulan (Opsional)
            </label>
            <select name="bulan" class="w-full border border-[#E5D3C1] p-3 rounded-xl focus:outline-none focus:border-[#5D4037] bg-white text-sm">
                <option value="">Semua Bulan (Setahun Penuh)</option>
                @php
                    $namaBulan = [
                        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                    ];
                @endphp
                @foreach($namaBulan as $num => $nama)
                    <option value="{{ $num }}" {{ ($bulan == $num) ? 'selected' : '' }}>
                        {{ $nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- FILTER STATUS --}}
        <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                Status
            </label>
            <select name="status" class="w-full border border-[#E5D3C1] p-3 rounded-xl focus:outline-none focus:border-[#5D4037] bg-white text-sm">
                <option value="">Semua Status</option>
                <option value="selesai" {{ ($status === 'selesai') ? 'selected' : '' }}>Selesai</option>
                <option value="diproses" {{ ($status === 'diproses') ? 'selected' : '' }}>Diproses</option>
                <option value="disetujui" {{ ($status === 'disetujui') ? 'selected' : '' }}>Disetujui</option>
                <option value="pending" {{ ($status === 'pending') ? 'selected' : '' }}>Pending</option>
                <option value="revisi" {{ ($status === 'revisi') ? 'selected' : '' }}>Berkas Belum Lengkap</option>
            </select>
        </div>

        {{-- TOMBOL FILTER & RESET --}}
        <div class="flex gap-2">
            <button type="submit" class="flex-1 bg-[#5D4037] hover:bg-[#4E342E] text-white p-3 rounded-xl font-semibold text-sm transition">
                🔍 Tampilkan
            </button>
            @if(request()->hasAny(['tahun', 'bulan', 'status']) && (request('tahun') != date('Y') || request('bulan') || request('status')))
                <a href="{{ route('notaris.laporan') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 p-3 rounded-xl font-semibold text-sm transition text-center">
                    Reset
                </a>
            @endif
        </div>

    </form>
</div>

{{-- KARTU RINGKASAN STATISTIK --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white border border-[#E5D3C1] rounded-2xl shadow-sm p-6 flex items-center gap-4">
        <div class="w-12 h-12 bg-[#F8F1EA] rounded-xl flex items-center justify-center text-xl">📁</div>
        <div>
            <p class="text-xs font-medium text-gray-500">Total Pengajuan</p>
            <h3 class="text-2xl font-bold text-[#5D4037] mt-0.5">{{ $totalPengajuan }}</h3>
        </div>
    </div>

    <div class="bg-green-50 border border-green-200 rounded-2xl shadow-sm p-6 flex items-center gap-4">
        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-xl">✅</div>
        <div>
            <p class="text-xs font-medium text-green-700">Akta Selesai</p>
            <h3 class="text-2xl font-bold text-green-700 mt-0.5">{{ $totalSelesai }}</h3>
        </div>
    </div>

    <div class="bg-blue-50 border border-blue-200 rounded-2xl shadow-sm p-6 flex items-center gap-4">
        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-xl">🔄</div>
        <div>
            <p class="text-xs font-medium text-blue-700">Sedang Diproses</p>
            <h3 class="text-2xl font-bold text-blue-700 mt-0.5">{{ $totalDiproses }}</h3>
        </div>
    </div>

    <div class="bg-yellow-50 border border-yellow-200 rounded-2xl shadow-sm p-6 flex items-center gap-4">
        <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center text-xl">⏳</div>
        <div>
            <p class="text-xs font-medium text-yellow-700">Menunggu / Revisi</p>
            <h3 class="text-2xl font-bold text-yellow-700 mt-0.5">{{ $totalPending }}</h3>
        </div>
    </div>
</div>

{{-- TABEL DATA LAPORAN --}}
<div class="bg-white border border-[#E5D3C1] rounded-2xl shadow-sm overflow-hidden">
    <div class="p-6 border-b border-[#E5D3C1] flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-[#5D4037]">Data Laporan Pengajuan</h2>
            <p class="text-xs text-gray-400 mt-1">
                Periode: 
                @if($bulan)
                    {{ DateTime::createFromFormat('!m', $bulan)->format('F') }}
                @else
                    Seluruh Bulan
                @endif
                {{ $tahun !== 'semua' ? $tahun : '(Semua Tahun)' }}
            </p>
        </div>
        <span class="bg-[#F8F1EA] text-[#5D4037] px-3 py-1 rounded-xl text-xs font-semibold">
            {{ $laporan->count() }} Data Tercatat
        </span>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-[#F8F1EA] text-[#5D4037]">
                <tr>
                    <th class="p-4 text-left">No</th>
                    <th class="p-4 text-left">Tanggal Pengajuan</th>
                    <th class="p-4 text-left">Nama Klien / Pemohon</th>
                    <th class="p-4 text-left">Layanan</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-left">Progress</th>
                    <th class="p-4 text-left">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($laporan as $item)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="p-4 text-gray-500">{{ $loop->iteration }}</td>

                    <td class="p-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                        {{ $item->tanggal_pengajuan
                            ? \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d M Y')
                            : '-' }}
                    </td>

                    <td class="p-4 font-semibold text-gray-800">
                        {{ $item->nama_pembeli ?? $item->nama_pemohon ?? $item->nama_penerima ?? $item->nama ?? '-' }}
                    </td>

                    <td class="p-4 text-gray-700">
                        {{ $item->layanan->nama_layanan ?? '-' }}
                    </td>

                    <td class="p-4">
                        @if($item->status == 'pending')
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                                Pending
                            </span>
                        @elseif($item->status == 'revisi')
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                Berkas Belum Lengkap
                            </span>
                        @elseif($item->status == 'disetujui')
                            <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold">
                                Disetujui
                            </span>
                        @elseif($item->status == 'diproses')
                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                                Diproses
                            </span>
                        @elseif($item->status == 'selesai')
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                Selesai
                            </span>
                        @else
                            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-semibold">
                                {{ ucfirst($item->status) }}
                            </span>
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
                                <span class="bg-[#F8F1EA] text-[#5D4037] border border-[#E5D3C1] px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ $item->progress }}
                                </span>
                            @endif
                        @else
                            <span class="text-gray-400 italic text-xs">Belum ada progress</span>
                        @endif
                    </td>

                    <td class="p-4">
                        <a href="{{ route('notaris.pengajuan.show', $item->id) }}"
                           class="bg-[#5D4037] hover:bg-[#4E342E] text-white px-4 py-2 rounded-xl text-xs font-semibold transition inline-block">
                            Lihat Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="p-8 text-center text-gray-400 italic">
                        Tidak ada data pengajuan pada periode yang dipilih.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection