@extends('layouts.user')

@section('content')

<a href="{{ url()->previous() }}"
   class="inline-flex items-center justify-center w-7 h-7 mb-3 bg-[#6B3F2A] text-white rounded-full text-sm hover:bg-[#4E342E]">
    ←
</a>

<h1 class="text-3xl font-bold mb-8">
    Balik Nama Waris
</h1>

<div class="bg-white border border-[#E5D3C1] rounded-2xl shadow p-6">

    <form method="POST"
            action="{{ route('warisan.store') }}"
            enctype="multipart/form-data">

        @csrf

        <div class="grid grid-cols-2 gap-6 mb-8">

            <div>
            <label class="block mb-2 font-semibold">
                Nama Pemohon
            </label>

            <input type="text"
                    name="nama_pemohon"
                   class="w-full border rounded-xl p-4">
        </div>

                <div>
            <label class="block mb-2 font-semibold">
                Nomor Telepon Pemohon
            </label>

            <input type="text"
                    name="telepon_pemohon"
                   class="w-full border rounded-xl p-4">
            </div>

            <div>
                     <label class="block mb-2 font-semibold">
                         Tanggal Pengajuan
                    </label>

                     <input type="date"
                            name="tanggal_pengajuan"
                            class="w-full border rounded-xl p-4"
                            required>
                </div>

        </div>

        <div class="grid grid-cols-2 gap-6 mb-8">
            <div>
            <label class="block mb-2 font-semibold">
                Upload KTP Ahli Waris
            </label>

            <input type="file"
                    name="ktp_ahli_waris"
                   class="w-full border rounded-xl p-4">
        </div>

        <div>
            <label class="block mb-2 font-semibold">
                Upload KK Semua Ahli Waris
            </label>

            <input type="file"
                    name="kk_ahli_waris"
                   class="w-full border rounded-xl p-4">
            </div>

        <div>
            <label class="block mb-2 font-semibold">
                Upload Surat Kematian
            </label>

            <input type="file"
                    name="surat_kematian"
                   class="w-full border rounded-xl p-4">
        </div>

                <div>
            <label class="block mb-2 font-semibold">
                Upload Surat Keterangan Ahli Waris
            </label>

            <input type="file"
                    name="surat_keterangan_ahli_waris"
                   class="w-full border rounded-xl p-4">
        </div>

                <div>
            <label class="block mb-2 font-semibold">
                Upload Sertifikat Tanah
            </label>

            <input type="file"
                    name="sertifikat_tanah"
                   class="w-full border rounded-xl p-4">
        </div>

                <div>
            <label class="block mb-2 font-semibold">
                Upload NPWP Ahli Waris (min 2 tahun terakhir)
            </label>

            <input type="file"
                    name="npwp_ahli_waris"
                   class="w-full border rounded-xl p-4">
        </div>

                <div>
            <label class="block mb-2 font-semibold">
                Upload Photo Denah Lokasi Tanah (Aplikasi Geotag)
            </label>

            <input type="file"
                    name="photo_denah_lokasi"
                   class="w-full border rounded-xl p-4">
        </div>
        </div>

        <button class="bg-[#6B3F2A] hover:bg-[#A77F60] text-white px-5 py-3 rounded-xl">
            Kirim Pengajuan
        </button>

    </form>

</div>

@endsection
