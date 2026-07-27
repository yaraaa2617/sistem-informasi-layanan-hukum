@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Data Pengajuan Klien
</h1>

<div class="bg-white border border-[#E5D3C1] rounded-2xl shadow overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-100">
            <tr>
            <th class="p-4 text-left">Nama Pemohon</th>
            <th class="p-4 text-left">Layanan</th>
            <th class="p-4 text-left">Status</th>
            <th class="p-4 text-left">Progress</th>
            <th class="p-4 text-left">Aksi</th>
            </tr>
        </thead>

        <tbody>

    @foreach($pengajuan as $item)

    <tr class="border-b hover:bg-gray-50 transition">

        <td class="p-4 font-medium">
            {{ $item->nama }}
        </td>

        <td class="p-4">
            {{ $item->layanan }}
        </td>

        <td class="p-4">

            @if($item->status == 'pending')

                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">
                    Pending
                </span>

            @elseif($item->status == 'revisi')

                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">
                    Revisi Dokumen
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

            @endif

        </td>

        <td class="p-4">

            @if($item->progress)

                <span class="text-[#6B3F2A] font-semibold">
                    {{ $item->progress }}
                </span>

            @else

                <span class="text-gray-400 italic">
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

</div>

@endsection
