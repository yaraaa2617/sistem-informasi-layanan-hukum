@extends('layouts.notaris')

@section('content')

<div class="p-8">

    <h1 class="text-3xl font-bold text-[#5D4037] mb-8">
        Dashboard Notaris
    </h1>

    <div class="grid grid-cols-4 gap-6 mb-8">

        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-gray-500">Total Pengajuan</p>
            <h2 class="text-4xl font-bold text-[#5D4037]">
                {{ $total }}
            </h2>
        </div>

        <div class="bg-yellow-100 rounded-xl shadow p-6">
            <p class="text-gray-600">Pending</p>
            <h2 class="text-4xl font-bold text-yellow-700">
                {{ $pending }}
            </h2>
        </div>

        <div class="bg-blue-100 rounded-xl shadow p-6">
            <p class="text-gray-600">Diproses</p>
            <h2 class="text-4xl font-bold text-blue-700">
                {{ $diproses }}
            </h2>
        </div>

        <div class="bg-green-100 rounded-xl shadow p-6">
            <p class="text-gray-600">Selesai</p>
            <h2 class="text-4xl font-bold text-green-700">
                {{ $selesai }}
            </h2>
        </div>

    </div>

    <div class="bg-white rounded-xl shadow">

        <div class="border-b p-5">
            <h2 class="text-xl font-bold">
                Pengajuan Terbaru
            </h2>
        </div>

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-3">No</th>
                    <th>Nama Klien</th>
                    <th>Layanan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($pengajuan as $item)

            <tr class="border-b hover:bg-gray-50">

                <td class="p-3">{{ $loop->iteration }}</td>

                <td>{{ $item->nama }}</td>

                <td>{{ $item->layanan->nama_layanan }}</td>

                <td>{{ $item->tanggal_pengajuan }}</td>

                <td>

                    @if($item->status=='pending')

                        <span class="bg-yellow-200 text-yellow-800 px-3 py-1 rounded-full">
                            Pending
                        </span>

                    @elseif($item->status=='diproses')

                        <span class="bg-blue-200 text-blue-800 px-3 py-1 rounded-full">
                            Diproses
                        </span>

                    @else

                        <span class="bg-green-200 text-green-800 px-3 py-1 rounded-full">
                            Selesai
                        </span>

                    @endif

                </td>

                <td>

                    <a href="{{ route('notaris.pengajuan.show',$item->id) }}"
                       class="bg-[#5D4037] text-white px-4 py-2 rounded hover:bg-[#7B5E57]">

                        Detail

                    </a>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6" class="text-center py-8 text-gray-500">

                    Belum ada data pengajuan.

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection