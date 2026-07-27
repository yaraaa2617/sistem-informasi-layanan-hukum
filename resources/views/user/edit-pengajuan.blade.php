@extends('layouts.user')

@section('content')

<div class="bg-white p-6 rounded-xl shadow">

    <h2 class="text-xl font-bold mb-4">
        Perbaiki Dokumen
    </h2>

    <div class="bg-red-50 border border-red-200 p-4 rounded mb-4">
        <strong>Catatan Admin:</strong><br>
        {{ $pengajuan->catatan_admin }}
    </div>

    <form method="POST"
          action="{{ route('user.pengajuan.update', $pengajuan->id) }}"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <label class="block mb-2 font-semibold">
            Upload Dokumen Revisi
        </label>

        <input type="file"
               name="dokumen_baru"
               class="w-full border rounded p-3">

        <button class="mt-4 bg-yellow-500 text-white px-4 py-2 rounded">
            Kirim Revisi
        </button>

    </form>

</div>

@endsection
