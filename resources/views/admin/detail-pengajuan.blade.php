@extends('layouts.admin')

@section('content')

{{-- ========================================================= --}}
{{-- JUDUL --}}
{{-- ========================================================= --}}

<div class="mb-8">

    <a href="{{ route('admin.pengajuan') }}"
       class="inline-flex items-center text-[#6B3F2A] font-semibold hover:underline mb-4">
        ← Kembali ke Pengajuan
    </a>

    <h1 class="text-3xl font-bold text-[#6B3F2A]">
        Detail Pengajuan
    </h1>

    <p class="text-gray-500 mt-1">
        Informasi lengkap pengajuan dan dokumen klien
    </p>

</div>


{{-- ========================================================= --}}
{{-- INFO LAYANAN --}}
{{-- ========================================================= --}}

<div class="bg-white border border-[#E5D3C1] p-6 rounded-2xl shadow mb-6">

    <h2 class="font-bold text-xl mb-2 text-[#6B3F2A]">
        Layanan
    </h2>

    <p class="text-gray-700">
        {{ $pengajuan->layanan->nama_layanan ?? '-' }}
    </p>

</div>


{{-- ========================================================= --}}
{{-- SURAT PEMANGGILAN --}}
{{-- ========================================================= --}}

<div class="bg-white border border-[#E5D3C1] p-6 rounded-2xl shadow mb-6">

    <div class="flex items-start justify-between gap-6">

        <div>

            <h2 class="text-2xl font-bold text-[#6B3F2A] mb-2">
                Surat Pemanggilan Klien
            </h2>

            <p class="text-gray-600">
                Sistem akan membuat surat pemanggilan dalam bentuk PDF
                dan dapat diakses oleh klien melalui dashboard.
            </p>

        </div>


        {{-- JIKA SURAT SUDAH ADA --}}
        @if($pengajuan->file_surat)

            <div class="flex gap-3">

                <a href="{{ asset('storage/' . $pengajuan->file_surat) }}"
                   target="_blank"
                   class="bg-[#CCD67F] hover:bg-[#B8C267] text-[#4A4A20] px-5 py-3 rounded-xl font-semibold">
                    Lihat Surat
                </a>

            </div>

        {{-- JIKA SURAT BELUM ADA --}}
        @else

            <form method="POST"
                  action="{{ route('admin.surat.kirim', $pengajuan->id) }}">

                @csrf

                <button type="submit"
                        class="bg-[#6B3F2A] hover:bg-[#A77F60] text-white px-5 py-3 rounded-xl font-semibold">
                    Kirim Surat Otomatis
                </button>

            </form>

        @endif

    </div>

</div>


{{-- ========================================================= --}}
{{-- PROGRESS AKTA --}}
{{-- ========================================================= --}}

<div class="bg-white border border-[#E5D3C1] p-6 rounded-2xl shadow mb-6">

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


    <div class="space-y-5">


        {{-- STEP 1 --}}
        <div class="flex items-start gap-4">

            <div class="w-5 h-5 rounded-full mt-1
                {{ in_array($pengajuan->status, ['pending', 'revisi', 'disetujui', 'diproses', 'selesai'])
                    ? 'bg-green-500'
                    : 'bg-gray-300' }}">
            </div>

            <div>

                <h3 class="font-bold text-lg">
                    Berkas Diterima
                </h3>

                <p class="text-gray-500">
                    Pengajuan klien sudah masuk ke sistem.
                </p>

            </div>

        </div>


        {{-- STEP 2 --}}
        <div class="flex items-start gap-4">

            <div class="w-5 h-5 rounded-full mt-1
                {{ $pengajuan->status == 'disetujui'
                    || $pengajuan->status == 'diproses'
                    || $pengajuan->status == 'selesai'
                    ? 'bg-green-500'
                    : 'bg-gray-300' }}">
            </div>

            <div>

                <h3 class="font-bold text-lg">
                    Pengajuan Disetujui
                </h3>

                <p class="text-gray-500">
                    Pengajuan telah diverifikasi dan disetujui admin.
                </p>

            </div>

        </div>


        {{-- STEP 3 --}}
        <div class="flex items-start gap-4">

            <div class="w-5 h-5 rounded-full mt-1
                {{ $pengajuan->status == 'diproses'
                    || $pengajuan->status == 'selesai'
                    ? 'bg-blue-500'
                    : 'bg-gray-300' }}">
            </div>

            <div>

                <h3 class="font-bold text-lg">
                    Akta Diproses
                </h3>

                <p class="text-gray-500">
                    Dokumen sedang diproses oleh admin/notaris.
                </p>

            </div>

        </div>


        {{-- STEP 4 --}}
        <div class="flex items-start gap-4">

            <div class="w-5 h-5 rounded-full mt-1
                {{ $pengajuan->status == 'selesai'
                    ? 'bg-green-600'
                    : 'bg-gray-300' }}">
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


{{-- ========================================================= --}}
{{-- STATUS PENGAJUAN --}}
{{-- ========================================================= --}}

<div class="bg-white border border-[#E5D3C1] p-6 rounded-2xl shadow mb-6">

    <h2 class="font-bold text-xl mb-4 text-[#6B3F2A]">
        Status Pengajuan
    </h2>


    <form method="POST"
          action="{{ route('admin.pengajuan.status', $pengajuan->id) }}">

        @csrf
        @method('PUT')


        {{-- STATUS --}}
        <div class="mb-4">

            <label class="block mb-2 font-semibold">
                Status
            </label>

            <select name="status"
                    class="w-full border border-[#E5D3C1] rounded-xl p-3">

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

        </div>


        {{-- CATATAN ADMIN --}}
        <div class="mb-4">

            <label class="block mb-2 font-semibold">
                Catatan Admin
            </label>

            <textarea
                name="catatan_admin"
                rows="4"
                class="w-full border border-[#E5D3C1] rounded-xl p-3"
                placeholder="Contoh: KTP belum jelas, NPWP belum diupload">{{ $pengajuan->catatan_admin }}</textarea>

        </div>


        <button type="submit"
                class="bg-[#6B3F2A] hover:bg-[#A77F60] text-white px-5 py-3 rounded-xl">
            Update Status
        </button>

    </form>

</div>


{{-- ========================================================= --}}
{{-- DATA KLIEN --}}
{{-- ========================================================= --}}

<div class="grid grid-cols-2 gap-6 mb-6">


    {{-- NAMA KLIEN --}}
    <div class="bg-white border border-[#E5D3C1] p-5 rounded-xl shadow">

        <h2 class="font-bold text-lg mb-2 text-[#6B3F2A]">
            Nama Klien
        </h2>

        <p class="text-gray-700">

            {{ $pengajuan->nama_pembeli
                ?? $pengajuan->nama_penerima
                ?? $pengajuan->nama_pemohon
                ?? $pengajuan->nama_penjual
                ?? $pengajuan->nama_pemberi
                ?? $pengajuan->nama }}

        </p>

    </div>


    {{-- NOMOR TELEPON --}}
    <div class="bg-white border border-[#E5D3C1] p-5 rounded-xl shadow">

        <h2 class="font-bold text-lg mb-2 text-[#6B3F2A]">
            Nomor Telepon
        </h2>

        <p class="text-gray-700">

            {{ $pengajuan->telepon_pembeli
                ?? $pengajuan->telepon_penerima
                ?? $pengajuan->telepon_pemohon
                ?? $pengajuan->telepon_penjual
                ?? $pengajuan->telepon_pemberi
                ?? '-' }}

        </p>

    </div>

</div>


{{-- ========================================================= --}}
{{-- DATA PENGAJUAN TAMBAHAN --}}
{{-- ========================================================= --}}

<div class="bg-white border border-[#E5D3C1] p-6 rounded-2xl shadow mb-6">

    <h2 class="font-bold text-xl mb-6 text-[#6B3F2A]">
        Data Pengajuan
    </h2>


    <div class="grid grid-cols-2 gap-6">


        {{-- ALAMAT TANAH --}}
        <div class="col-span-2">

            <h3 class="font-semibold mb-2">
                Alamat Objek Tanah
            </h3>

            <p class="text-gray-700">
                {{ $pengajuan->alamat_objek_tanah ?? '-' }}
            </p>

        </div>


        {{-- KECAMATAN --}}
        <div>

            <h3 class="font-semibold mb-2">
                Kecamatan
            </h3>

            <p class="text-gray-700">
                {{ $pengajuan->kecamatan ?? '-' }}
            </p>

        </div>


        {{-- KABUPATEN --}}
        <div>

            <h3 class="font-semibold mb-2">
                Kabupaten/Kota
            </h3>

            <p class="text-gray-700">
                {{ $pengajuan->kabupaten_kota ?? '-' }}
            </p>

        </div>


        {{-- TUJUAN --}}
        <div>

            <h3 class="font-semibold mb-2">
                Tujuan Pengajuan
            </h3>

            <p class="text-gray-700">
                {{ $pengajuan->tujuan_pengajuan ?? '-' }}
            </p>

        </div>


        {{-- KETERANGAN --}}
        <div>

            <h3 class="font-semibold mb-2">
                Keterangan
            </h3>

            <p class="text-gray-700">
                {{ $pengajuan->keterangan ?? '-' }}
            </p>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- DATA KHUSUS JUAL BELI --}}
{{-- ========================================================= --}}

@if(
    $pengajuan->nama_penjual ||
    $pengajuan->nama_pembeli
)

<div class="bg-white border border-[#E5D3C1] p-6 rounded-2xl shadow mb-6">

    <h2 class="font-bold text-xl mb-6 text-[#6B3F2A]">
        Data Penjual & Pembeli
    </h2>

    <div class="grid grid-cols-2 gap-6">


        <div>

            <h3 class="font-semibold mb-2">
                Nama Penjual
            </h3>

            <p>
                {{ $pengajuan->nama_penjual ?? '-' }}
            </p>

        </div>


        <div>

            <h3 class="font-semibold mb-2">
                Nomor HP Penjual
            </h3>

            <p>
                {{ $pengajuan->telepon_penjual ?? '-' }}
            </p>

        </div>


        <div>

            <h3 class="font-semibold mb-2">
                Nama Pembeli
            </h3>

            <p>
                {{ $pengajuan->nama_pembeli ?? '-' }}
            </p>

        </div>


        <div>

            <h3 class="font-semibold mb-2">
                Nomor HP Pembeli
            </h3>

            <p>
                {{ $pengajuan->telepon_pembeli ?? '-' }}
            </p>

        </div>

    </div>

</div>

@endif


{{-- ========================================================= --}}
{{-- DATA KHUSUS HIBAH --}}
{{-- ========================================================= --}}

@if(
    $pengajuan->nama_pemberi ||
    $pengajuan->nama_penerima
)

<div class="bg-white border border-[#E5D3C1] p-6 rounded-2xl shadow mb-6">

    <h2 class="font-bold text-xl mb-6 text-[#6B3F2A]">
        Data Hibah
    </h2>

    <div class="grid grid-cols-2 gap-6">


        <div>

            <h3 class="font-semibold mb-2">
                Nama Pemberi
            </h3>

            <p>
                {{ $pengajuan->nama_pemberi ?? '-' }}
            </p>

        </div>


        <div>

            <h3 class="font-semibold mb-2">
                Nomor HP Pemberi
            </h3>

            <p>
                {{ $pengajuan->telepon_pemberi ?? '-' }}
            </p>

        </div>


        <div>

            <h3 class="font-semibold mb-2">
                Nama Penerima
            </h3>

            <p>
                {{ $pengajuan->nama_penerima ?? '-' }}
            </p>

        </div>


        <div>

            <h3 class="font-semibold mb-2">
                Nomor HP Penerima
            </h3>

            <p>
                {{ $pengajuan->telepon_penerima ?? '-' }}
            </p>

        </div>


        <div>

            <h3 class="font-semibold mb-2">
                Hubungan Pemberi & Penerima
            </h3>

            <p>
                {{ $pengajuan->hubungan_pemberi_penerima ?? '-' }}
            </p>

        </div>

    </div>

</div>

@endif


{{-- ========================================================= --}}
{{-- DATA KHUSUS WARISAN --}}
{{-- ========================================================= --}}

@if(
    $pengajuan->nama_pewaris ||
    $pengajuan->tanggal_meninggal ||
    $pengajuan->jumlah_ahli_waris
)

<div class="bg-white border border-[#E5D3C1] p-6 rounded-2xl shadow mb-6">

    <h2 class="font-bold text-xl mb-6 text-[#6B3F2A]">
        Data Warisan
    </h2>

    <div class="grid grid-cols-2 gap-6">


        <div>

            <h3 class="font-semibold mb-2">
                Nama Pemohon
            </h3>

            <p>
                {{ $pengajuan->nama_pemohon ?? '-' }}
            </p>

        </div>


        <div>

            <h3 class="font-semibold mb-2">
                Nomor HP Pemohon
            </h3>

            <p>
                {{ $pengajuan->telepon_pemohon ?? '-' }}
            </p>

        </div>


        <div>

            <h3 class="font-semibold mb-2">
                Nama Pewaris
            </h3>

            <p>
                {{ $pengajuan->nama_pewaris ?? '-' }}
            </p>

        </div>


        <div>

            <h3 class="font-semibold mb-2">
                Tanggal Meninggal
            </h3>

            <p>
                {{ $pengajuan->tanggal_meninggal
                    ? \Carbon\Carbon::parse($pengajuan->tanggal_meninggal)->format('d-m-Y')
                    : '-' }}
            </p>

        </div>


        <div>

            <h3 class="font-semibold mb-2">
                Jumlah Ahli Waris
            </h3>

            <p>
                {{ $pengajuan->jumlah_ahli_waris ?? '-' }}
            </p>

        </div>

    </div>

</div>

@endif


{{-- ========================================================= --}}
{{-- CATATAN REVISI --}}
{{-- ========================================================= --}}

@if($pengajuan->status == 'revisi' && $pengajuan->catatan_admin)

<div class="bg-red-50 border border-red-200 p-6 rounded-2xl shadow mb-6">

    <h3 class="font-bold text-red-700 mb-2">
        Berkas Belum Lengkap
    </h3>

    <p class="text-red-600">
        {{ $pengajuan->catatan_admin }}
    </p>

</div>

@endif


{{-- ========================================================= --}}
{{-- DOKUMEN --}}
{{-- ========================================================= --}}

<div class="bg-white border border-[#E5D3C1] p-6 rounded-2xl shadow mb-6">

    <div class="flex items-center justify-between mb-6">

        <div>

            <h2 class="font-bold text-xl text-[#6B3F2A]">
                Dokumen
            </h2>

            <p class="text-gray-500 mt-1">
                Dokumen yang telah diupload oleh klien
            </p>

        </div>

        <div class="bg-[#F8F1EA] px-4 py-2 rounded-xl text-sm font-semibold text-[#6B3F2A]">

            {{ $pengajuan->dokumen->count() }} Dokumen

        </div>

    </div>


    @if($pengajuan->dokumen->count() > 0)

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            @foreach($pengajuan->dokumen as $dokumen)

                <div class="border border-[#E5D3C1] p-4 rounded-xl">

                    <div class="flex items-center justify-between gap-4">

                        <div>

                            <h3 class="font-semibold text-gray-800">
                                {{ $dokumen->nama_dokumen }}
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                {{ basename($dokumen->file_dokumen) }}
                            </p>

                        </div>

                        <a href="{{ asset('storage/' . $dokumen->file_dokumen) }}"
                           target="_blank"
                           class="shrink-0 bg-[#CCD67F] hover:bg-[#B8C267] text-[#4A4A20] px-4 py-2 rounded-lg font-semibold">
                            Lihat
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="border border-dashed border-[#E5D3C1] rounded-xl p-8 text-center">

            <p class="text-gray-500">
                Belum ada dokumen yang diupload oleh klien.
            </p>

            @if($pengajuan->status != 'disetujui')

                <p class="text-sm text-gray-400 mt-2">
                    Dokumen dapat diupload oleh klien setelah pengajuan disetujui.
                </p>

            @endif

        </div>

    @endif

</div>


@endsection