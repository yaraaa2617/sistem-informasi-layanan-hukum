@extends('layouts.admin')

@section('content')

<div class="p-8">

    <h1 class="text-3xl font-bold mb-8">
        Data Klien
    </h1>

    <div class="bg-white border border-[#E5D3C1] rounded-2xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4 text-left">No</th>
                    <th class="p-4 text-left">Nama Klien</th>
                    <th class="p-4 text-left">Email</th>
                    <th class="p-4 text-left">Status</th>
                </tr>
            </thead>

            <tbody>

                <tr class="border-b">
                    <td class="p-4">1</td>
                    <td class="p-4">PT Maju Jaya</td>
                    <td class="p-4">majujaya@gmail.com</td>
                    <td class="p-4 text-green-600 font-bold">
                        Disetujui
                    </td>
                </tr>

                <tr>
                    <td class="p-4">2</td>
                    <td class="p-4">CV Teknologi</td>
                    <td class="p-4">teknologi@gmail.com</td>
                    <td class="p-4 text-yellow-500 font-bold">
                        Pending
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection
