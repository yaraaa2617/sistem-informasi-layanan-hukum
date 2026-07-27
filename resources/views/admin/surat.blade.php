@extends('layouts.admin')

@section('content')

<div class="bg-white p-6 rounded-xl shadow">

    <h2 class="text-2xl font-bold mb-4">
        Preview Surat (Admin)
    </h2>

    <p class="mb-4 text-gray-600">
        Ini hanya preview, bukan PDF user.
    </p>

    <iframe
        src="{{ route('user.surat.show', $pengajuan->id) }}"
        class="w-full h-[600px] border">
    </iframe>

    <a href="{{ route('user.surat.download', $pengajuan->id) }}"
       class="mt-4 inline-block bg-green-600 text-white px-4 py-2 rounded">
        Download PDF
    </a>

</div>

@endsection
