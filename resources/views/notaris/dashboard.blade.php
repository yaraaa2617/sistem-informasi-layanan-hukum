@extends('layouts.notaris')

@section('content')

{{-- HEADER --}}
<div class="mb-8">
    <h1 class="text-3xl font-bold text-[#5D4037]">Dashboard Notaris</h1>
    <p class="text-gray-500 mt-1">Selamat datang, pantau perkembangan pengajuan akta klien di sini.</p>
</div>

{{-- KARTU STATISTIK --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

    <div class="bg-white border border-[#E5D3C1] rounded-2xl shadow-sm p-6 flex items-center gap-5">
        <div class="w-14 h-14 bg-[#F8F1EA] rounded-xl flex items-center justify-center text-2xl">📁</div>
        <div>
            <p class="text-sm text-gray-500 font-medium">Total Pengajuan</p>
            <h2 class="text-3xl font-bold text-[#5D4037] mt-1">{{ $total }}</h2>
        </div>
    </div>

    <div class="bg-yellow-50 border border-yellow-200 rounded-2xl shadow-sm p-6 flex items-center gap-5">
        <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center text-2xl">⏳</div>
        <div>
            <p class="text-sm text-yellow-700 font-medium">Menunggu Verifikasi</p>
            <h2 class="text-3xl font-bold text-yellow-700 mt-1">{{ $pending }}</h2>
        </div>
    </div>

    <div class="bg-blue-50 border border-blue-200 rounded-2xl shadow-sm p-6 flex items-center gap-5">
        <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center text-2xl">🔄</div>
        <div>
            <p class="text-sm text-blue-700 font-medium">Sedang Diproses</p>
            <h2 class="text-3xl font-bold text-blue-700 mt-1">{{ $diproses }}</h2>
        </div>
    </div>

    <div class="bg-green-50 border border-green-200 rounded-2xl shadow-sm p-6 flex items-center gap-5">
        <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center text-2xl">✅</div>
        <div>
            <p class="text-sm text-green-700 font-medium">Selesai</p>
            <h2 class="text-3xl font-bold text-green-700 mt-1">{{ $selesai }}</h2>
        </div>
    </div>

</div>

{{-- TABEL PENGAJUAN TERBARU --}}
<div class="bg-white border border-[#E5D3C1] rounded-2xl shadow-sm overflow-hidden">

    <div class="p-6 border-b border-[#E5D3C1] flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-[#5D4037]">Pengajuan Terbaru</h2>
            <p class="text-sm text-gray-400 mt-1">Menampilkan 5 pengajuan masuk paling terkini</p>
        </div>
        <a href="{{ route('notaris.pengajuan') }}"
           class="text-sm font-semibold text-[#5D4037] hover:underline">
            Lihat Semua →
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">

            <thead class="bg-[#F8F1EA] text-[#5D4037]">
                <tr>
                    <th class="p-4 text-left">No</th>
                    <th class="p-4 text-left">Nama Klien</th>
                    <th class="p-4 text-left">Layanan</th>
                    <th class="p-4 text-left">Tanggal</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-left">Progress</th>
                    <th class="p-4 text-left">Aksi</th>
                </tr>
            </thead>

            <tbody>

            @forelse($pengajuan as $item)

            <tr class="border-b hover:bg-gray-50 transition">

                <td class="p-4 text-gray-500">{{ $loop->iteration }}</td>

                <td class="p-4 font-semibold text-gray-800">
                    {{ $item->nama_pembeli ?? $item->nama_pemohon ?? $item->nama_penerima ?? $item->nama ?? '-' }}
                </td>

                <td class="p-4 text-gray-700">
                    {{ $item->layanan->nama_layanan ?? '-' }}
                </td>

                <td class="p-4 text-gray-500 text-sm">
                    {{ $item->tanggal_pengajuan
                        ? \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d M Y')
                        : '-' }}
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
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">
                                📤 {{ $item->progress }}
                            </span>
                        @elseif(str_contains(strtolower($item->progress), 'selesai'))
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">
                                ✔ {{ $item->progress }}
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
                       class="bg-[#5D4037] hover:bg-[#4E342E] text-white px-4 py-2 rounded-xl text-xs font-semibold transition">
                        Lihat Detail
                    </a>
                </td>

            </tr>

            @empty

            <tr>
                <td colspan="7" class="text-center py-10 text-gray-400 italic">
                    Belum ada data pengajuan.
                </td>
            </tr>

            @endforelse

            </tbody>

        </table>
    </div>

</div>

@endsection