@extends('layouts.user')

@section('content')

<form method="POST" action="{{ route('jualbeli.store') }}">
    @csrf

    {{-- DATA PENJUAL & PEMBELI --}}
    <h2 class="text-2xl font-bold mb-6 text-blue-600">
        Data Penjual & Pembeli
    </h2>

    <div class="grid grid-cols-2 gap-6 mb-8">

        <div>
            <label class="block mb-2 font-semibold">
                Nama Penjual
            </label>

            <input type="text"
                   name="nama_penjual"
                   value="{{ old('nama_penjual') }}"
                   class="w-full border rounded-xl p-4"
                   required>
        </div>

        <div>
            <label class="block mb-2 font-semibold">
                Nomor HP Penjual
            </label>

            <input type="text"
                   name="telepon_penjual"
                   value="{{ old('telepon_penjual') }}"
                   class="w-full border rounded-xl p-4"
                   required>
        </div>

        <div>
            <label class="block mb-2 font-semibold">
                Nama Pembeli
            </label>

            <input type="text"
                   name="nama_pembeli"
                   value="{{ old('nama_pembeli') }}"
                   class="w-full border rounded-xl p-4"
                   required>
        </div>

        <div>
            <label class="block mb-2 font-semibold">
                Nomor HP Pembeli
            </label>

            <input type="text"
                   name="telepon_pembeli"
                   value="{{ old('telepon_pembeli') }}"
                   class="w-full border rounded-xl p-4"
                   required>
        </div>

    </div>


    {{-- DATA OBJEK TANAH --}}
    <h2 class="text-2xl font-bold mb-6 text-blue-600">
        Data Objek Tanah
    </h2>

    <div class="grid grid-cols-2 gap-6 mb-8">

        <div class="col-span-2">
            <label class="block mb-2 font-semibold">
                Alamat Objek Tanah
            </label>

            <textarea name="alamat_objek_tanah"
                      class="w-full border rounded-xl p-4"
                      rows="3"
                      required>{{ old('alamat_objek_tanah') }}</textarea>
        </div>

        <div>
            <label class="block mb-2 font-semibold">
                Kecamatan
            </label>

            <input type="text"
                   name="kecamatan"
                   value="{{ old('kecamatan') }}"
                   class="w-full border rounded-xl p-4"
                   required>
        </div>

        <div>
            <label class="block mb-2 font-semibold">
                Kabupaten/Kota
            </label>

            <input type="text"
                   name="kabupaten_kota"
                   value="{{ old('kabupaten_kota') }}"
                   class="w-full border rounded-xl p-4"
                   required>
        </div>

        <div>
            <label class="block mb-2 font-semibold">
                Tujuan Pengajuan
            </label>

            <textarea name="tujuan_pengajuan"
                      class="w-full border rounded-xl p-4"
                      rows="3"
                      required>{{ old('tujuan_pengajuan') }}</textarea>
        </div>

        <div>
            <label class="block mb-2 font-semibold">
                Keterangan Tambahan
            </label>

            <textarea name="keterangan"
                      class="w-full border rounded-xl p-4"
                      rows="3">{{ old('keterangan') }}</textarea>
        </div>

    </div>


    {{-- TOMBOL --}}
    <button type="submit"
            class="bg-[#6B3F2A] hover:bg-[#A77F60] text-white px-5 py-3 rounded-xl">
        Kirim Pengajuan
    </button>

</form>

@endsection