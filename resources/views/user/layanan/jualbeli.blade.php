@extends('layouts.user')

@section('content')

<a href="{{ url()->previous() }}"
   class="inline-flex items-center justify-center w-7 h-7 mb-3 bg-[#6B3F2A] text-white rounded-full text-sm hover:bg-[#4E342E]">
    ←
</a>

<h1 class="text-3xl font-bold mb-8">
    Balik Nama Jual Beli
</h1>

<div class="bg-white border border-[#E5D3C1] rounded-2xl shadow p-6">

    <form method="POST"
          action="{{ route('jualbeli.store') }}"
          enctype="multipart/form-data">

        @csrf

        {{-- DATA PENJUAL --}}
        <h2 class="text-2xl font-bold mb-6 text-blue-600">
            Data Penjual
        </h2>

        <div class="grid grid-cols-2 gap-6 mb-8">

            <div>
                <label class="block mb-2 font-semibold">
                    Nama Penjual
                </label>

                <input type="text"
                       name="nama_penjual"
                       class="w-full border rounded-xl p-4">
            </div>

            <div>
                <label class="block mb-2 font-semibold">
                    Nomor Telepon Penjual
                </label>

                <input type="text"
                       name="telepon_penjual"
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
                    Upload KTP Penjual (Suami Istri/Anak/Orangtua)
                </label>

                <input type="file"
                       name="ktp_penjual"
                       class="w-full border rounded-xl p-4">
            </div>

            <div>
                <label class="block mb-2 font-semibold">
                    Upload KK Penjual
                </label>

                <input type="file"
                       name="kk_penjual"
                       class="w-full border rounded-xl p-4">
            </div>

                        <div>
                <label class="block mb-2 font-semibold">
                    Upload Buku Nikah (bila bercerai, Akta Cerai)
                </label>

                <input type="file"
                       name="buku_nikah"
                       class="w-full border rounded-xl p-4">
            </div>

                        <div>
                <label class="block mb-2 font-semibold">
                    Upload PBB Tanah
                </label>

                <input type="file"
                       name="pbb_tanah"
                       class="w-full border rounded-xl p-4">
            </div>

            <div>
                <label class="block mb-2 font-semibold">
                    Upload NPWP Penjual (min 2 tahun terakhir)
                </label>

                <input type="file"
                       name="npwp_penjual"
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
                    Upload Photo Denah Lokasi (Aplikasi Geotag)
                </label>

                <input type="file"
                       name="photo_denah_lokasi"
                       class="w-full border rounded-xl p-4">
            </div>

        </div>

        {{-- DATA PEMBELI --}}
        <h2 class="text-2xl font-bold mb-6 text-green-600">
            Data Pembeli
        </h2>

        <div class="grid grid-cols-2 gap-6 mb-8">

            <div>
                <label class="block mb-2 font-semibold">
                    Nama Pembeli
                </label>

                <input type="text"
                       name="nama_pembeli"
                       class="w-full border rounded-xl p-4">
            </div>

            <div>
                <label class="block mb-2 font-semibold">
                    Nomor Telepon Pembeli
                </label>

                <input type="text"
                       name="telepon_pembeli"
                       class="w-full border rounded-xl p-4">
            </div>

        </div>

        <div class="grid grid-cols-2 gap-6 mb-8">

            <div>
                <label class="block mb-2 font-semibold">
                    Upload KTP Pembeli
                </label>

                <input type="file"
                       name="ktp_pembeli"
                       class="w-full border rounded-xl p-4">
            </div>

            <div>
                <label class="block mb-2 font-semibold">
                    Upload KK Pembeli
                </label>

                <input type="file"
                       name="kk_pembeli"
                       class="w-full border rounded-xl p-4">
            </div>

            <div>
                <label class="block mb-2 font-semibold">
                    Upload NPWP Pembeli (min 2 tahun terakhir)
                </label>

                <input type="file"
                       name="npwp_pembeli"
                       class="w-full border rounded-xl p-4">
            </div>

        </div>

        <button class="bg-[#6B3F2A] hover:bg-[#A77F60] text-white px-5 py-3 rounded-xl">
            Kirim Pengajuan
        </button>

    </form>

</div>

@endsection
