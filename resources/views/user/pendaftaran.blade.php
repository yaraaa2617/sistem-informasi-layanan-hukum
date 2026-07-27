@extends('layouts.user')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Pendaftaran Layanan
</h1>

<div class="bg-white border border-[#E5D3C1] rounded-2xl shadow p-6">

    <form class="space-y-5">

        <div>
            <label class="block mb-2 font-semibold">
                Pilih Layanan
            </label>

            <select onchange="window.location.href=this.value"
            class="w-full border rounded-lg p-3">

                <option value="{{ route('aphb') }}">
                    Akta Pembagian Hak Bersama (APHB)
                </option>

                <option value="{{ route('jualbeli') }}">
                    Akta Jual Beli (AJB)
                </option>

                <option value="{{ route('hibah') }}">
                    Akta Hibah
                </option>

                <option value="{{ route('warisan') }}">
                    Jasa Turun Waris
                </option>

            </select>
        </div>

        <div>
            <label class="block mb-2 font-semibold">
                Nama Penjual
            </label>

            <input type="text"
                   class="w-full border rounded-lg p-3">
        </div>

        <div>
            <label class="block mb-2 font-semibold">
                Nomor Telepon Penjual
            </label>

            <input type="text"
                   class="w-full border rounded-lg p-3">
        </div>

        <div>
            <label class="block mb-2 font-semibold">
                Upload Dokumen
            </label>

            <input type="file"
                   class="w-full border rounded-lg p-3">
        </div>

        <div>
            <label class="block mb-2 font-semibold">
                Upload Dokumen
            </label>

            <input type="file"
                   class="w-full border rounded-lg p-3">
        </div>

        <button class="bg-[#6B3F2A] hover:bg-[#A77F60] text-white px-6 py-3 rounded-xl">
            Kirim Pendaftaran
        </button>

    </form>

</div>

@endsection
