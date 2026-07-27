@extends('layouts.admin')

@section('content')

<h1 class="text-4xl font-bold mb-2 text-[#6B3F2A]">
    Dashboard Admin
</h1>

<p class="text-gray-500 mb-8">
    Kelola seluruh pengajuan layanan klien.
</p>

{{-- CARD STATISTIK --}}
<div class="grid grid-cols-4 gap-6 mb-10">

    {{-- TOTAL --}}
    <div class="bg-white border border-[#E5D3C1]
                rounded-3xl shadow p-6">

        <div class="flex items-center justify-between">

            <div>
                <h2 class="text-gray-500">
                    Total Pengajuan
                </h2>

                <p class="text-4xl font-bold mt-3 text-[#6B3F2A]">
                    {{ $total }}
                </p>
            </div>

            <img src="https://cdn-icons-png.flaticon.com/512/2921/2921222.png"
                 class="w-16 h-16">
        </div>

    </div>

    {{-- PENDING --}}
    <div class="bg-yellow-50 border border-yellow-200
                rounded-3xl shadow p-6">

        <div class="flex items-center justify-between">

            <div>
                <h2 class="text-yellow-700">
                    Pending
                </h2>

                <p class="text-4xl font-bold mt-3 text-yellow-600">
                    {{ $pending }}
                </p>
            </div>

            <img src="https://cdn-icons-png.flaticon.com/512/5957/5957126.png"
                 class="w-16 h-16">
        </div>

    </div>

    {{-- DIPROSES --}}
    <div class="bg-blue-50 border border-blue-200
                rounded-3xl shadow p-6">

        <div class="flex items-center justify-between">

            <div>
                <h2 class="text-blue-700">
                    Diproses
                </h2>

                <p class="text-4xl font-bold mt-3 text-blue-600">
                    {{ $diproses }}
                </p>
            </div>

            <img src="https://cdn-icons-png.flaticon.com/512/3524/3524659.png"
                 class="w-16 h-16">
        </div>

    </div>

    {{-- SELESAI --}}
    <div class="bg-green-50 border border-green-200
                rounded-3xl shadow p-6">

        <div class="flex items-center justify-between">

            <div>
                <h2 class="text-green-700">
                    Selesai
                </h2>

                <p class="text-4xl font-bold mt-3 text-green-600">
                    {{ $selesai }}
                </p>
            </div>

            <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png"
                 class="w-16 h-16">
        </div>

    </div>

</div>

{{-- PENGAJUAN TERBARU --}}
<div class="bg-white border border-[#E5D3C1]
            rounded-3xl shadow overflow-hidden">

    <div class="p-6 border-b">

        <h2 class="text-2xl font-bold text-[#6B3F2A]">
            Pengajuan Terbaru
        </h2>

    </div>

    <table class="w-full">

        <thead class="bg-[#F8F1EA]">

            <tr>
                <th class="p-5 text-left">Nama</th>
                <th class="p-5 text-left">Layanan</th>
                <th class="p-5 text-left">Status</th>
                <th class="p-5 text-left">Tanggal</th>
            </tr>

        </thead>

        <tbody>

            @foreach($pengajuan as $item)

            <tr class="border-b hover:bg-gray-50">

                <td class="p-5">
                    {{ $item->nama }}
                </td>

                <td class="p-5">
                    {{ $item->layanan }}
                </td>

                <td class="p-5">

                    @if($item->status == 'pending')

                        <span class="bg-yellow-100 text-yellow-700
                                     px-4 py-2 rounded-full text-sm">
                            Pending
                        </span>

                    @elseif($item->status == 'diproses')

                        <span class="bg-blue-100 text-blue-700
                                     px-4 py-2 rounded-full text-sm">
                            Diproses
                        </span>

                    @else

                        <span class="bg-green-100 text-green-700
                                     px-4 py-2 rounded-full text-sm">
                            Selesai
                        </span>

                    @endif

                </td>

                <td class="p-5 text-gray-500">
                    {{ $item->created_at->format('d M Y') }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection
