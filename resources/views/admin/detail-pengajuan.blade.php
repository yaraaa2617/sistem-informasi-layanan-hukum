@extends('layouts.admin')

@section('content')

<a href="{{ url()->previous() }}"
   class="inline-block mb-6 bg-[#6B3F2A] text-white px-5 py-2 rounded-xl hover:bg-[#4E342E]">
    ←
</a>

<h1 class="text-3xl font-bold mb-8">
    Detail Pengajuan
</h1>

@php
    $dokumen = json_decode($pengajuan->dokumen, true);
@endphp

{{-- CONTAINER UTAMA --}}
<div class="space-y-8">

    {{-- ========== INFO LAYANAN ========== --}}
    <div class="bg-white border border-[#E5D3C1] p-6 rounded-2xl shadow">

        <h2 class="font-bold text-xl mb-2 text-[#6B3F2A]">
            Layanan
        </h2>

        <p class="text-gray-700">
            {{ $pengajuan->layanan->nama_layanan ?? '-' }}
        </p>

    </div>

    {{-- ========== SURAT PEMANGGILAN (CARD TERPISAH) ========== --}}
<div class="bg-gradient-to-r from-[#F8F1EA] to-white
            border border-[#E5D3C1]
            p-6 rounded-2xl shadow">

    <div class="flex items-start justify-between">

        <div>

            <h2 class="text-2xl font-bold text-[#6B3F2A] mb-2">
                Surat Pemanggilan Klien
            </h2>

            <p class="text-gray-600">
                Sistem akan otomatis membuat surat PDF
                dan mengirimkannya ke dashboard klien.
            </p>

        </div>

@if($pengajuan->surat)

<span class="bg-green-100 text-green-700 px-4 py-2 rounded-xl">
    ✔ Surat Sudah Dikirim
</span>

@else

<form action="{{ route('admin.surat.kirim', $pengajuan->id) }}"
      method="POST">

    @csrf

    <button
        class="bg-[#6B3F2A] text-white px-5 py-3 rounded-xl">
        Kirim Surat Otomatis
    </button>

</form>

@endif

    </div>

</div>

{{-- ========== PROGRES AKTA ========== --}}
<div class="bg-white border border-[#E5D3C1] p-6 rounded-2xl shadow">

    <div class="flex items-center justify-between mb-6">

        <div>
            <h2 class="text-2xl font-bold text-[#6B3F2A]">
                Progress Akta
            </h2>

            <p class="text-gray-500 mt-1">
                Update perkembangan proses akta klien
            </p>
        </div>

        <div class="bg-[#F8F1EA] px-4 py-2 rounded-xl text-sm text-[#6B3F2A] font-semibold">
            Monitoring Progress
        </div>

    </div>

    <div class="space-y-4">

        {{-- STEP 1 --}}
        <div class="flex items-start gap-4">

            <div class="w-5 h-5 rounded-full mt-1
                        {{ $pengajuan->status == 'pending' ? 'bg-yellow-500' : 'bg-green-500' }}">
            </div>

            <div>
                <h3 class="font-bold text-lg">
                    Berkas Diterima
                </h3>

                <p class="text-gray-500">
                    Dokumen klien sudah masuk ke sistem.
                </p>
            </div>

        </div>

        {{-- STEP 2 --}}
        <div class="flex items-start gap-4">

            <div class="w-5 h-5 rounded-full mt-1
                        {{ $pengajuan->surat ? 'bg-green-500' : 'bg-gray-300' }}">
            </div>

            <div>
                <h3 class="font-bold text-lg">
                    Surat Pemanggilan Dikirim
                </h3>

                <p class="text-gray-500">
                    Klien sudah menerima surat untuk datang ke kantor.
                </p>
            </div>

        </div>

        {{-- STEP 3 --}}
        <div class="flex items-start gap-4">

            <div class="w-5 h-5 rounded-full mt-1
                        {{ $pengajuan->status == 'diproses' ? 'bg-blue-500' : 'bg-gray-300' }}">
            </div>

            <div>
                <h3 class="font-bold text-lg">
                    Akta Diproses
                </h3>

                <p class="text-gray-500">
                    Dokumen sedang diproses oleh admin.
                </p>
            </div>

        </div>

        {{-- STEP 4 --}}
        <div class="flex items-start gap-4">

            <div class="w-5 h-5 rounded-full mt-1
                        {{ $pengajuan->status == 'selesai' ? 'bg-green-600' : 'bg-gray-300' }}">
            </div>

            <div>
                <h3 class="font-bold text-lg">
                    Akta Selesai
                </h3>

                <p class="text-gray-500">
                    Akta sudah selesai dan siap diambil klien.
                </p>
            </div>

        </div>

    </div>

</div>

    {{-- ========== STATUS UPDATE ========== --}}
    <div class="bg-white border border-[#E5D3C1] p-6 rounded-2xl shadow">

        <h2 class="font-bold text-xl mb-4 text-[#6B3F2A]">
            Status Pengajuan
        </h2>

        <form method="POST"
              action="{{ route('admin.pengajuan.status', $pengajuan->id) }}"
              class="flex items-center gap-4">

            @csrf
            @method('PUT')

<select name="status"
        class="border border-[#E5D3C1] p-3 rounded-xl w-60">

    <option value="pending"
        {{ $pengajuan->status == 'pending' ? 'selected' : '' }}>
        Menunggu Verifikasi
    </option>

    <option value="revisi"
        {{ $pengajuan->status == 'revisi' ? 'selected' : '' }}>
        Berkas Belum Lengkap
    </option>

    <option value="disetujui"
    {{ $pengajuan->status == 'disetujui' ? 'selected' : '' }}>
    Disetujui
</option>

    <option value="diproses"
        {{ $pengajuan->status == 'diproses' ? 'selected' : '' }}>
        Diproses
    </option>

    <option value="selesai"
        {{ $pengajuan->status == 'selesai' ? 'selected' : '' }}>
        Selesai
    </option>

</select>

            <div class="mt-4">

    <label class="block mb-2 font-semibold">
        Catatan Admin
    </label>

    <textarea
        name="catatan_admin"
        rows="4"
        class="w-full border border-[#E5D3C1] rounded-xl p-3"
        placeholder="Contoh: KTP belum jelas, NPWP belum diupload">{{ $pengajuan->catatan_admin }}</textarea>

</div>


            <button class="bg-[#6B3F2A] text-white px-5 py-3 rounded-xl">
                Update
            </button>

        </form>

    </div>

    {{-- ========== DATA PENJUAL & PEMBELI ========== --}}
    <div class="grid grid-cols-2 gap-6">

        <div class="bg-white border border-[#E5D3C1] p-5 rounded-xl shadow">
            <h2 class="font-bold text-lg mb-2">Nama Klien</h2>

    <p>
        {{ $pengajuan->nama_pembeli
            ?? $pengajuan->nama_penjual
            ?? $pengajuan->nama }}
    </p>
        </div>

        <div class="bg-white border border-[#E5D3C1] p-5 rounded-xl shadow">
            <h2 class="font-bold text-lg mb-2">Nomor Telepon</h2>

    <p>
        {{ $pengajuan->telepon_pembeli
            ?? $pengajuan->telepon_penjual
            ?? $pengajuan->telepon_pemohon
            ?? '-' }}
    </p>
        </div>

    </div>

    {{-- CATATAN REVISI --}}
@if($pengajuan->status == 'revisi' && $pengajuan->catatan_admin)

<div class="bg-red-50 border border-red-300 p-4 rounded-xl shadow">

    <h3 class="font-bold text-red-700 mb-2">
        Berkas Belum Lengkap
    </h3>

    <p class="text-red-600">
        {{ $pengajuan->catatan_admin }}
    </p>

</div>

@endif

    {{-- ========== DOKUMEN ========== --}}
    <div class="bg-white border border-[#E5D3C1] p-6 rounded-2xl shadow">

        <h2 class="font-bold text-xl mb-6 text-[#6B3F2A]">
            Dokumen
        </h2>

        <div class="grid grid-cols-2 gap-4">

            @foreach($dokumen as $nama => $file)

                <div class="border border-[#E5D3C1] p-4 rounded-xl">

                    <h3 class="font-semibold mb-3">
                        {{ $nama }}
                    </h3>

                    <a href="{{ asset('storage/' . $file) }}"
                       target="_blank"
                       class="inline-block bg-[#CCD67F] px-4 py-2 rounded-lg">
                        Lihat Dokumen
                    </a>

                </div>

            @endforeach

        </div>

    </div>

</div>

@endsection
