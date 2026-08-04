@extends('layouts.user')

@section('content')

<h1 class="text-3xl font-bold mb-8 text-[#6B3F2A]">
    Upload Dokumen
</h1>

<div class="bg-white rounded-2xl shadow p-6">

    <div class="mb-6">
        <h2 class="text-xl font-semibold">
            {{ $pengajuan->layanan->nama_layanan }}
        </h2>

        <p class="text-gray-500">
            Silakan upload seluruh dokumen persyaratan.
        </p>
    </div>

    <form action="{{ route('user.upload.dokumen.store', $pengajuan->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-5">
            <label class="block mb-2 font-semibold">
                KTP
            </label>

            <input type="file"
                   name="ktp"
                   class="border rounded-lg w-full p-3">
        </div>

        <div class="mb-5">
            <label class="block mb-2 font-semibold">
                Kartu Keluarga
            </label>

            <input type="file"
                   name="kk"
                   class="border rounded-lg w-full p-3">
        </div>

        <div class="mb-5">
            <label class="block mb-2 font-semibold">
                Dokumen Pendukung
            </label>

            <input type="file"
                   name="dokumen_lain"
                   class="border rounded-lg w-full p-3">
        </div>

        <button
            class="bg-[#6B3F2A] hover:bg-[#4E342E] text-white px-6 py-3 rounded-xl">

            Upload Dokumen

        </button>

    </form>

</div>

@endsection