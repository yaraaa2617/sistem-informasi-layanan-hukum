@extends('layouts.user')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Daftar Layanan
</h1>

<div class="grid grid-cols-3 gap-6">

    <div class="bg-white border border-[#E5D3C1] rounded-2xl shadow p-6">

        <h2 class="text-2xl font-bold mb-4">
            Jasa Turun Waris
        </h2>

        <p class="text-gray-600 mb-6">
            Pengurusan dan pembuatan akta tanah resmi.
        </p>

        <a href="{{ route('warisan') }}" class="bg-[#6B3F2A] hover:bg-[#A77F60] text-white px-5 py-3 rounded-xl">
            Ajukan
        </a>

    </div>

    <div class="bg-white border border-[#E5D3C1] rounded-2xl shadow p-6">

        <h2 class="text-2xl font-bold mb-4">
            Akta Hibah
        </h2>

        <p class="text-gray-600 mb-6">
            Pengurusan dan pembuatan akta tanah resmi.
        </p>

        <a href="{{ route('hibah') }}" class="bg-[#6B3F2A] hover:bg-[#A77F60] text-white px-5 py-3 rounded-xl">
            Ajukan
        </a>

    </div>

    <div class="bg-white border border-[#E5D3C1] rounded-2xl shadow p-6">

        <h2 class="text-2xl font-bold mb-4">
            Akta Jual Beli (AJB)
        </h2>

        <p class="text-gray-600 mb-6">
            Pengesahan dokumen legal dan administrasi.
        </p>

        <a href="{{ route('jualbeli') }}" class="bg-[#6B3F2A] hover:bg-[#A77F60] text-white px-5 py-3 rounded-xl">
            Ajukan
        </a>

    </div>

        <div class="bg-white border border-[#E5D3C1] rounded-2xl shadow p-6">

        <h2 class="text-2xl font-bold mb-4">
            Akta Pembagian Hak Bersama (APHB)
        </h2>

        <p class="text-gray-600 mb-6">
            Pengesahan dokumen legal dan administrasi.
        </p>

        <a href="{{ route('aphb') }}" class="bg-[#6B3F2A] hover:bg-[#A77F60] text-white px-5 py-3 rounded-xl">
            Ajukan
        </a>

    </div>

</div>

@endsection
