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
            action="{{ route('warisan.store') }}">

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


        <button class="bg-[#6B3F2A] hover:bg-[#A77F60] text-white px-5 py-3 rounded-xl">
            Kirim Pengajuan
        </button>

    </form>

</div>

@endsection
