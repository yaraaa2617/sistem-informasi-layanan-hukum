@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10 px-6">

    <h1 class="text-3xl font-bold mb-6">
        Selamat datang, {{ auth()->user()->name }}
    </h1>

    <div class="grid grid-cols-3 gap-6">

        <div class="bg-white p-6 rounded-xl shadow">
            Total Klien: 500+
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            Dokumen: 120
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            Status: Aktif
        </div>

    </div>

</div>

@endsection
