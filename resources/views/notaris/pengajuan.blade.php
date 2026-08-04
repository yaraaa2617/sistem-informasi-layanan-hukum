@extends('layouts.notaris')

@section('content')

<div class="container mx-auto p-6">

    <h2 class="text-2xl font-bold mb-5">
        Data Pengajuan Klien
    </h2>

    <table class="w-full border border-gray-300">

        <thead class="bg-gray-200">
            <tr>
                <th class="p-3 border">No</th>
                <th class="p-3 border">Nama Klien</th>
                <th class="p-3 border">Layanan</th>
                <th class="p-3 border">Tanggal</th>
                <th class="p-3 border">Status</th>
                <th class="p-3 border">Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($pengajuan as $item)

        <tr>

            <td class="border p-2">{{ $loop->iteration }}</td>

            <td class="border p-2">{{ $item->nama }}</td>

            <td class="border p-2">{{ $item->layanan->nama_layanan }}</td>

            <td class="border p-2">{{ $item->tanggal_pengajuan }}</td>

            <td class="border p-2">{{ ucfirst($item->status) }}</td>

            <td class="border p-2">

                <a href="{{ route('notaris.pengajuan.show',$item->id) }}"
                   class="bg-blue-500 text-white px-3 py-1 rounded">
                    Detail
                </a>

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="6" class="text-center p-4">
                Belum ada data.
            </td>
        </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection