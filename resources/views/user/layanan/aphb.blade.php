@extends('layouts.user')

@section('content')

<form method="POST" action="{{ route('aphb.store') }}">
    @csrf

    <h2 class="text-2xl font-bold mb-6 text-blue-600">
        Data Pemohon
    </h2>

    <div class="grid grid-cols-2 gap-6 mb-8">

        <div>
            <label class="block mb-2 font-semibold">
                Nama Pemohon
            </label>
            <input type="text"
                   name="nama_pemohon"
                   class="w-full border rounded-xl p-4"
                   required>
        </div>

        <div>
            <label class="block mb-2 font-semibold">
                Nomor HP
            </label>
            <input type="text"
                   name="telepon_pemohon"
                   class="w-full border rounded-xl p-4"
                   required>
        </div>

        <div class="col-span-2">
            <label class="block mb-2 font-semibold">
                Alamat Objek Tanah
            </label>
            <textarea name="alamat_objek_tanah"
                      class="w-full border rounded-xl p-4"
                      required></textarea>
        </div>

        <div>
            <label class="block mb-2 font-semibold">
                Kecamatan
            </label>
            <input type="text"
                   name="kecamatan"
                   class="w-full border rounded-xl p-4"
                   required>
        </div>

        <div>
            <label class="block mb-2 font-semibold">
                Kabupaten/Kota
            </label>
            <input type="text"
                   name="kabupaten_kota"
                   class="w-full border rounded-xl p-4"
                   required>
        </div>

        <div>
            <label class="block mb-2 font-semibold">
                Tujuan Pengajuan
            </label>
            <textarea name="tujuan_pengajuan"
                      class="w-full border rounded-xl p-4"
                      required></textarea>
        </div>

        <div>
            <label class="block mb-2 font-semibold">
                Keterangan
            </label>
            <textarea name="keterangan"
                      class="w-full border rounded-xl p-4"></textarea>
        </div>

    </div>

    <button type="submit"
            class="bg-[#6B3F2A] hover:bg-[#A77F60] text-white px-5 py-3 rounded-xl">
        Kirim Pengajuan
    </button>

</form>

@endsection