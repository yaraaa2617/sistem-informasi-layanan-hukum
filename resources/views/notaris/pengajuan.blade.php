@extends('layouts.notaris')

@section('content')

<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="text-3xl font-bold text-[#5D4037]">
            Data Pengajuan Klien
        </h1>
        <p class="text-gray-500 mt-1">
            Daftar seluruh berkas permohonan akta dan layanan hukum klien yang masuk
        </p>
    </div>

    <div class="bg-[#F8F1EA] text-[#5D4037] font-semibold px-4 py-2 rounded-xl text-sm self-start">
        {{ $pengajuan->count() }} Total Pengajuan
    </div>
</div>

<div class="bg-white border border-[#E5D3C1] rounded-2xl shadow-sm overflow-hidden">
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
                        Belum ada data pengajuan klien.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection