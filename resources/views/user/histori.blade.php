@extends('layouts.user')

@section('content')

<h1 class="text-3xl font-bold mb-8 text-[#6B3F2A]">
    Histori Pengajuan
</h1>

<div class="bg-white p-4 rounded-lg shadow mb-5">

    <form method="GET" class="mb-4 flex items-center gap-3">

    <label class="font-semibold">Tahun :</label>

    <select name="tahun"
            onchange="this.form.submit()"
            class="border rounded px-3 py-2">

        @for($i = date('Y'); $i >= 2020; $i--)

            <option value="{{ $i }}"
                {{ $tahun == $i ? 'selected' : '' }}>

                {{ $i }}

            </option>

        @endfor

    </select>

</form>

    <table class="w-full">

        <thead class="bg-[#6B3F2A] text-white">
            <tr>
                <th class="p-4 text-left">Nama</th>
                <th class="p-4 text-left">Layanan</th>
                <th class="p-4 text-left">Tanggal</th>
                <th class="p-4 text-left">Status</th>
                <th class="p-4 text-left">Surat</th> {{-- TAMBAHAN --}}
            </tr>
        </thead>

        <tbody>

@foreach($pengajuan as $item)

<tr class="border-b">

    <td class="p-4">
    @if($item->layanan?->nama_layanan == 'Akta Jual Beli')
        {{ $item->nama_penjual }}

    @elseif($item->layanan?->nama_layanan == 'Akta Hibah')
        {{ $item->nama_penjual }}

    @elseif($item->layanan?->nama_layanan == 'Jasa Turun Waris')
        {{ $item->nama }}

    @elseif($item->layanan?->nama_layanan == 'APHB')
        {{ $item->nama }}

    @else
        {{ $item->nama }}
    @endif
</td>

    <td class="p-4">
        {{ $item->layanan->nama_layanan ?? '-' }}
    </td>

    <td class="p-4">
        {{ $item->tanggal_pengajuan
            ? \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d M Y')
            : '-' }}
    </td>

    <td class="p-4">

        @if($item->status == 'pending')

            <span class="text-yellow-500 font-bold">
                Menunggu Verifikasi
            </span>

        @elseif($item->status == 'revisi')

            <span class="text-red-600 font-bold">
                Berkas Belum Lengkap
            </span>

            @if($item->catatan_admin)
                <p class="text-sm text-red-500 mt-1">
                    {{ $item->catatan_admin }}
                </p>
            @endif

            <a href="{{ route('user.pengajuan.edit', $item->id) }}"
               class="inline-block mt-2 bg-yellow-500 text-white px-3 py-1 rounded">
                Perbaiki Dokumen
            </a>

            @elseif($item->status == 'disetujui')

    <span class="text-green-600 font-bold">
        Disetujui
    </span>

   @if($item->dokumen->isNotEmpty())

    <span class="inline-block mt-2 text-blue-600 font-semibold">
        ✔ Dokumen sudah diupload
    </span>

@else

    <a href="{{ route('user.upload.dokumen', $item->id) }}"
       class="inline-block mt-2 bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg">
        Upload Dokumen
    </a>

@endif

        @elseif($item->status == 'diproses')

            <span class="text-blue-500 font-bold">
                Sedang Diproses
            </span>

        @elseif($item->status == 'selesai')

            <span class="text-green-600 font-bold">
                Selesai
            </span>

        @else

            <span class="text-gray-500">-</span>

        @endif

    </td>

    {{-- KOLOM SURAT --}}
    <td class="p-4">

        @if($item->file_surat)

            <a href="{{ asset('storage/'.$item->file_surat) }}"
               target="_blank"
               class="text-blue-600 underline">

                Download Surat

            </a>

        @else

            <span class="text-gray-400">
                Belum ada surat
            </span>

        @endif

    </td>

</tr>

@endforeach

</tbody>

    </table>

</div>

@endsection
