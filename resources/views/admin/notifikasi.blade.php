@extends('layouts.admin')

@section('content')

<div class="p-8">

    <h1 class="text-3xl font-bold mb-8">
        Notifikasi
    </h1>

    <div class="space-y-4">

        <div class="bg-white p-5 rounded-xl shadow border-l-4 border-blue-500">
            Klien baru melakukan pendaftaran layanan.
        </div>

        <div class="bg-white p-5 rounded-xl shadow border-l-4 border-green-500">
            Pengajuan Akta Tanah telah selesai.
        </div>

        <div class="bg-white p-5 rounded-xl shadow border-l-4 border-yellow-500">
            Ada data klien yang perlu diverifikasi.
        </div>

    </div>

</div>

@endsection
