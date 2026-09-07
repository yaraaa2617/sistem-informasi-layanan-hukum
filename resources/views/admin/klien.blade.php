@extends('layouts.admin')

@section('content')

<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="text-3xl font-bold text-[#6B3F2A]">
            Data Klien (Selesai)
        </h1>
        <p class="text-gray-500 mt-1">
            Daftar klien yang pengajuan permohonan akta/layanan hukumnya telah selesai diproses
        </p>
    </div>

    <div class="bg-[#F8F1EA] text-[#6B3F2A] font-semibold px-4 py-2 rounded-xl text-sm self-start">
        {{ $klien->count() }} Klien Selesai
    </div>
</div>

<div class="bg-white border border-[#E5D3C1] rounded-2xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-[#F8F1EA] text-[#6B3F2A]">
                <tr>
                    <th class="p-4 text-left">No</th>
                    <th class="p-4 text-left">Nama Klien</th>
                    <th class="p-4 text-left">Layanan</th>
                    <th class="p-4 text-left">Kontak</th>
                    <th class="p-4 text-left">Tanggal</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-left">Surat</th>
                    <th class="p-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($klien as $item)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="p-4 text-gray-500">{{ $loop->iteration }}</td>
                    <td class="p-4 font-semibold text-gray-800">
                        {{ $item->nama_pembeli ?? $item->nama_pemohon ?? $item->nama_penerima ?? $item->nama ?? '-' }}
                    </td>
                    <td class="p-4 text-gray-700">
                        {{ $item->layanan->nama_layanan ?? '-' }}
                    </td>
                    <td class="p-4 text-sm">
                        <div class="text-gray-800 font-medium">{{ $item->user->email ?? '-' }}</div>
                        <div class="text-gray-400 text-xs mt-0.5">{{ $item->telepon_pembeli ?? $item->telepon_pemohon ?? $item->telepon_penerima ?? $item->user->telepon ?? '-' }}</div>
                    </td>
                    <td class="p-4 text-gray-500 text-sm">
                        {{ $item->tanggal_pengajuan ? date('d M Y', strtotime($item->tanggal_pengajuan)) : '-' }}
                    </td>
                    <td class="p-4">
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                            Selesai
                        </span>
                    </td>
                    <td class="p-4">
                        @if($item->file_surat)
                            <a href="{{ asset('storage/' . $item->file_surat) }}"
                               target="_blank"
                               class="text-blue-600 hover:underline text-xs font-semibold inline-flex items-center gap-1">
                                📄 Unduh
                            </a>
                        @else
                            <span class="text-gray-400 text-xs">-</span>
                        @endif
                    </td>
                    <td class="p-4">
                        <a href="{{ route('admin.pengajuan.show', $item->id) }}"
                           class="bg-[#6B3F2A] hover:bg-[#4E342E] text-white px-3 py-1.5 rounded-lg text-xs font-semibold transition">
                            Lihat Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="p-8 text-center text-gray-400 italic">
                        Belum ada klien dengan status pengajuan selesai.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
