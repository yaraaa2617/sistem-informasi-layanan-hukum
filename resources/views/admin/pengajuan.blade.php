@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Data Pengajuan Klien
</h1>
{{-- HEADER --}}
<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="text-3xl font-bold text-[#6B3F2A]">
            Data Pengajuan Klien
        </h1>
        <p class="text-gray-500 mt-1">
            Pantau dan kelola status permohonan akta & layanan hukum klien
        </p>
    </div>

<div class="bg-white border border-[#E5D3C1] rounded-2xl shadow overflow-hidden">
    <div class="bg-[#F8F1EA] text-[#6B3F2A] font-semibold px-4 py-2 rounded-xl text-sm self-start">
        {{ $pengajuan->count() }} Data Ditemukan
    </div>
</div>

    <table class="w-full">
{{-- FORM FILTER TAHUN, BULAN, & STATUS --}}
<div class="bg-white border border-[#E5D3C1] p-6 rounded-2xl shadow-sm mb-6">
    <form method="GET" action="{{ route('admin.pengajuan') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
        
        {{-- FILTER TAHUN --}}
        <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                Tahun
            </label>
            <select name="tahun" class="w-full border border-[#E5D3C1] p-3 rounded-xl focus:outline-none focus:border-[#6B3F2A] bg-white text-sm">
                <option value="">Semua Tahun</option>
                @foreach($listTahun as $t)
                    <option value="{{ $t }}" {{ (isset($tahun) && $tahun == $t) ? 'selected' : '' }}>
                        Tahun {{ $t }}
                    </option>
                @endforeach
            </select>
        </div>

        <thead class="bg-gray-100">
            <tr>
            <th class="p-4 text-left">Nama Pemohon</th>
            <th class="p-4 text-left">Layanan</th>
            <th class="p-4 text-left">Status</th>
            <th class="p-4 text-left">Progress</th>
            <th class="p-4 text-left">Aksi</th>
            </tr>
        </thead>
        {{-- FILTER BULAN --}}
        <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                Bulan
            </label>
            <select name="bulan" class="w-full border border-[#E5D3C1] p-3 rounded-xl focus:outline-none focus:border-[#6B3F2A] bg-white text-sm">
                <option value="">Semua Bulan</option>
                @php
                    $namaBulan = [
                        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                    ];
                @endphp
                @foreach($namaBulan as $num => $nama)
                    <option value="{{ $num }}" {{ (isset($bulan) && $bulan == $num) ? 'selected' : '' }}>
                        {{ $nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <tbody>
        {{-- FILTER STATUS --}}
        <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                Status
            </label>
            <select name="status" class="w-full border border-[#E5D3C1] p-3 rounded-xl focus:outline-none focus:border-[#6B3F2A] bg-white text-sm">
                <option value="">Semua Status</option>
                <option value="pending" {{ (isset($status) && $status == 'pending') ? 'selected' : '' }}>Pending</option>
                <option value="revisi" {{ (isset($status) && $status == 'revisi') ? 'selected' : '' }}>Berkas Belum Lengkap</option>
                <option value="disetujui" {{ (isset($status) && $status == 'disetujui') ? 'selected' : '' }}>Disetujui</option>
                <option value="diproses" {{ (isset($status) && $status == 'diproses') ? 'selected' : '' }}>Diproses</option>
                <option value="selesai" {{ (isset($status) && $status == 'selesai') ? 'selected' : '' }}>Selesai</option>
                <option value="dipanggil" {{ (isset($status) && $status == 'dipanggil') ? 'selected' : '' }}>Dipanggil</option>
            </select>
        </div>

    @foreach($pengajuan as $item)

    <tr class="border-b hover:bg-gray-50 transition">

        <td class="p-4 font-medium">
            {{ $item->nama }}
        </td>

        <td class="p-4">
            {{ $item->layanan->nama_layanan ?? '-' }}
        </td>

        <td class="p-4">

            @if($item->status == 'pending')

                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">
                    Pending
                </span>

            @elseif($item->status == 'revisi')

                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">
                    Berkas Belum Lengkap
                 </span>

            @elseif($item->status == 'disetujui')

                <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-sm font-semibold">
                    Disetujui
                 </span>

            @elseif($item->status == 'diproses')

                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">
                    Diproses
                </span>

            @elseif($item->status == 'selesai')

                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                    Selesai
                </span>

            @elseif($item->status == 'dipanggil')

                <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-semibold">
                    Dipanggil
                </span>

        {{-- TOMBOL FILTER & RESET --}}
        <div class="flex gap-2">
            <button type="submit" class="flex-1 bg-[#6B3F2A] hover:bg-[#4E342E] text-white p-3 rounded-xl font-semibold text-sm transition">
                🔍 Filter
            </button>
            @if(request()->hasAny(['tahun', 'bulan', 'status']) && (request('tahun') || request('bulan') || request('status')))
                <a href="{{ route('admin.pengajuan') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 p-3 rounded-xl font-semibold text-sm transition text-center">
                    Reset
                </a>
            @endif
        </div>

        </td>
    </form>
</div>

        <td class="p-4">
{{-- TABEL DATA PENGAJUAN --}}
<div class="bg-white border border-[#E5D3C1] rounded-2xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">

            @if($item->progress)
            <thead class="bg-[#F8F1EA] text-[#6B3F2A]">
                <tr>
                    <th class="p-4 text-left">No</th>
                    <th class="p-4 text-left">Nama Pemohon</th>
                    <th class="p-4 text-left">Layanan</th>
                    <th class="p-4 text-left">Tanggal Pengajuan</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-left">Progress</th>
                    <th class="p-4 text-left">Aksi</th>
                </tr>
            </thead>

                @if(str_contains(strtolower($item->progress), 'upload'))
            <tbody>
                @forelse($pengajuan as $item)
                <tr class="border-b hover:bg-gray-50 transition">

                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold inline-flex items-center gap-1">
                        📤 {{ $item->progress }}
                    </span>
                    <td class="p-4 text-gray-500">{{ $loop->iteration }}</td>

                @elseif(str_contains(strtolower($item->progress), 'selesai'))
                    <td class="p-4 font-semibold text-gray-800">
                        {{ $item->nama_pembeli ?? $item->nama_pemohon ?? $item->nama_penerima ?? $item->nama ?? '-' }}
                    </td>

                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold inline-flex items-center gap-1">
                        ✔ {{ $item->progress }}
                    </span>
                    <td class="p-4 text-gray-700">
                        {{ $item->layanan->nama_layanan ?? '-' }}
                    </td>

                @elseif(str_contains(strtolower($item->progress), 'belum lengkap') || str_contains(strtolower($item->progress), 'revisi'))
                    <td class="p-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                        {{ $item->tanggal_pengajuan
                            ? \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d M Y')
                            : '-' }}
                    </td>

                    <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-xs font-semibold inline-flex items-center gap-1">
                        ⚠️ {{ $item->progress }}
                    </span>
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
                        @elseif($item->status == 'dipanggil')
                            <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-semibold">
                                Dipanggil
                            </span>
                        @else
                            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-semibold">
                                {{ ucfirst($item->status) }}
                            </span>
                        @endif
                    </td>

                @else
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
                            <span class="text-gray-400 italic text-xs">
                                Belum ada progress
                            </span>
                        @endif
                    </td>

                    <span class="bg-[#F8F1EA] text-[#6B3F2A] border border-[#E5D3C1] px-3 py-1 rounded-full text-xs font-semibold">
                        {{ $item->progress }}
                    </span>
                    <td class="p-4">
                        <a href="{{ route('admin.pengajuan.show', $item->id) }}"
                           class="bg-[#6B3F2A] hover:bg-[#4E342E] text-white px-4 py-2 rounded-xl text-xs font-semibold transition inline-block">
                            Lihat Detail
                        </a>
                    </td>

                @endif
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="p-8 text-center text-gray-400 italic">
                        Tidak ada data pengajuan yang sesuai dengan filter.
                    </td>
                </tr>
                @endforelse
            </tbody>

            @else

                <span class="text-gray-400 italic text-sm">
                    Belum ada progress
                </span>

            @endif

        </td>

        <td class="p-4">
            <a href="{{ route('admin.pengajuan.show', $item->id) }}"
               class="bg-[#6B3F2A] hover:bg-[#4E342E] text-white px-4 py-2 rounded-xl transition">
                Lihat
            </a>

            
        </td>

    </tr>

    @endforeach

</tbody>

    </table>

        </table>
    </div>
</div>

@endsection

