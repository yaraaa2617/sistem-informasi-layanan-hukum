@extends('layouts.user')

@section('content')

{{-- HERO --}}
<div class="bg-gradient-to-r from-[#6B3F2A] to-[#A77F60]
            rounded-3xl p-10 text-white mb-10 shadow-lg">

    <div class="grid grid-cols-2 items-center gap-8">

        <div>

            <h1 class="text-5xl font-bold mb-4">
                Selamat Datang,
                {{ auth()->user()->name }}
            </h1>

            <p class="text-lg text-[#F5E6DA] mb-6">
                Kelola pengajuan layanan pertanahan Anda
                dengan cepat dan aman.
            </p>

            <a href="{{ route('user.layanan') }}"
               class="bg-white text-[#6B3F2A]
                      px-6 py-3 rounded-2xl font-semibold shadow">

                Ajukan Layanan

            </a>

        </div>

        <div class="flex justify-end">

            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                 class="w-72">

        </div>

    </div>

</div>

{{-- STATISTIK --}}
<div class="grid grid-cols-4 gap-6 mb-10">

    <div class="bg-white rounded-3xl p-6 shadow border border-[#E5D3C1]">

        <img src="https://img.icons8.com/?size=100&id=6440&format=png&color=000000"
        class="w-20 h-20 mb-4">

        <h2 class="text-gray-500">
            Total Pengajuan
        </h2>

        <p class="text-4xl font-bold text-[#6B3F2A] mt-3">
            {{ $total }}
        </p>

    </div>

    <div class="bg-yellow-50 rounded-3xl p-6 shadow border border-yellow-200">

        <img src="https://img.icons8.com/?size=100&id=15849&format=png&color=000000"
             class="w-20 h-20 mb-4">

        <h2 class="text-yellow-700">
            Pending
        </h2>

        <p class="text-4xl font-bold text-yellow-600 mt-3">
            {{ $pending }}
        </p>

    </div>

    <div class="bg-blue-50 rounded-3xl p-6 shadow border border-blue-200">

        <img src="https://img.icons8.com/?size=100&id=11678&format=png&color=000000"
             class="w-20 h-20 mb-4">

        <h2 class="text-blue-700">
            Diproses
        </h2>

        <p class="text-4xl font-bold text-blue-600 mt-3">
            {{ $diproses }}
        </p>

    </div>

    <div class="bg-green-50 rounded-3xl p-6 shadow border border-green-200">

        <img src="https://img.icons8.com/?size=100&id=11695&format=png&color=000000"
             class="w-20 h-20 mb-4">

        <h2 class="text-green-700">
            Selesai
        </h2>

        <p class="text-4xl font-bold text-green-600 mt-3">
            {{ $selesai }}
        </p>

    </div>

</div>

{{-- LAYANAN --}}
<h2 class="text-3xl font-bold mb-6">
    Layanan Kami
</h2>

<div class="grid grid-cols-4 gap-6 mb-12">

    {{-- AJB --}}
    <a href="{{ route('jualbeli') }}"
       class="bg-white rounded-3xl p-6 shadow
              hover:-translate-y-2 transition border border-[#E5D3C1]">

        <img src="https://img.icons8.com/?size=100&id=37930&format=png&color=000000"
             class="w-20 h-20 mb-4">

        <h3 class="text-xl font-bold mb-2">
            AJB
        </h3>

        <p class="text-gray-500">
            Akta Jual Beli
        </p>

    </a>

    {{-- HIBAH --}}
    <a href="{{ route('hibah') }}"
       class="bg-white rounded-3xl p-6 shadow
              hover:-translate-y-2 transition border border-[#E5D3C1]">

        <img src="https://img.icons8.com/?size=100&id=10993&format=png&color=000000"
             class="w-20 h-20 mb-4">

        <h3 class="text-xl font-bold mb-2">
            Hibah
        </h3>

        <p class="text-gray-500">
            Akta Hibah
        </p>

    </a>

    {{-- WARISAN --}}
    <a href="{{ route('warisan') }}"
       class="bg-white rounded-3xl p-6 shadow
              hover:-translate-y-2 transition border border-[#E5D3C1]">

        <img src="https://img.icons8.com/?size=100&id=6884&format=png&color=000000"
             class="w-20 h-20 mb-4">

        <h3 class="text-xl font-bold mb-2">
            Warisan
        </h3>

        <p class="text-gray-500">
            Jasa Turun Waris
        </p>

    </a>

    {{-- APHB --}}
    <a href="{{ route('aphb') }}"
       class="bg-white rounded-3xl p-6 shadow
              hover:-translate-y-2 transition border border-[#E5D3C1]">

        <img src="https://img.icons8.com/?size=100&id=53382&format=png&color=000000"
             class="w-20 h-20 mb-4">

        <h3 class="text-xl font-bold mb-2">
            APHB
        </h3>

        <p class="text-gray-500">
            Pembagian Hak Bersama
        </p>

    </a>

</div>

{{-- PENGAJUAN TERBARU --}}
<h2 class="text-3xl font-bold mb-6">
    Pengajuan Terbaru
</h2>

<div class="bg-white rounded-3xl shadow overflow-hidden">

    <table class="w-full">

        <thead class="bg-[#F8F1EA]">

            <tr>
                <th class="p-5 text-left">Layanan</th>
                <th class="p-5 text-left">Status</th>
                <th class="p-5 text-left">Tanggal</th>
                <th class="p-5 text-left">Surat</th>
            </tr>

        </thead>

        <tbody>

            @foreach($pengajuan as $item)

            <tr class="border-b hover:bg-gray-50">

                <td class="p-5 font-medium">
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

                <td class="p-5">

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
