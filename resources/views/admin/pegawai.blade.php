@extends('layouts.admin')

@section('content')

<div class="p-8">

    <h1 class="text-3xl font-bold mb-8">
        Data Pegawai
    </h1>

    <div class="bg-white border border-[#E5D3C1] rounded-2xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4 text-left">No</th>
                    <th class="p-4 text-left">Nama</th>
                    <th class="p-4 text-left">Email</th>
                    <th class="p-4 text-left">Jabatan</th>
                </tr>
            </thead>

            <tbody>

                <tr class="border-b">
                    <td class="p-4">1</td>
                    <td class="p-4">Fitri Maulida</td>
                    <td class="p-4">fitri@gmail.com</td>
                    <td class="p-4">Admin</td>
                </tr>

                <tr>
                    <td class="p-4">2</td>
                    <td class="p-4">Zakiyyatush Sholihah</td>
                    <td class="p-4">zakiyyatush@gmail.com</td>
                    <td class="p-4">Staff</td>
                </tr>

                 <tr>
                    <td class="p-4">2</td>
                    <td class="p-4">ZMuttakin</td>
                    <td class="p-4">muttakin@gmail.com</td>
                    <td class="p-4">Staff</td>
                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection
