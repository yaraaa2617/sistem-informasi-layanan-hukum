@extends('layouts.admin')

@section('content')

<div class="p-8">

    <h1 class="text-3xl font-bold mb-8">
        Pendaftaran Layanan
    </h1>

    <div class="bg-white border border-[#E5D3C1] rounded-2xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4 text-left">Nama Klien</th>
                    <th class="p-4 text-left">Layanan</th>
                    <th class="p-4 text-left">Tanggal</th>
                    <th class="p-4 text-left">Status</th>
                </tr>
            </thead>

            <tbody>

                <tr class="border-b">
                    <td class="p-4">PT Maju Jaya</td>
                    <td class="p-4">Akta Tanah</td>
                    <td class="p-4">12 Mei 2026</td>
                    <td class="p-4 text-yellow-500 font-bold">
                        Pending
                    </td>
                </tr>

                <tr>
                    <td class="p-4">CV Teknologi</td>
                    <td class="p-4">Akta Pendirian</td>
                    <td class="p-4">10 Mei 2026</td>
                    <td class="p-4 text-green-600 font-bold">
                        Selesai
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection
