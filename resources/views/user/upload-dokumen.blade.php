@extends('layouts.user')

@section('content')

<h1 class="text-3xl font-bold mb-8 text-[#6B3F2A]">
    Upload Dokumen
</h1>

<div class="bg-white rounded-2xl shadow p-6">

    {{-- INFORMASI LAYANAN --}}
    <div class="mb-6">

        <h2 class="text-xl font-semibold text-[#6B3F2A]">
            {{ $pengajuan->layanan->nama_layanan }}
        </h2>

        <p class="text-gray-500 mt-1">
            Silakan upload seluruh dokumen persyaratan.
        </p>

    </div>


    {{-- ERROR --}}
    @if($errors->any())

        <div class="mb-6 bg-red-50 border border-red-300
                    text-red-700 p-4 rounded-xl">

            <p class="font-semibold mb-2">
                Dokumen belum lengkap:
            </p>

            <ul class="list-disc ml-5">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- FORM --}}
    <form action="{{ route('user.upload.dokumen.store', $pengajuan->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf


        @foreach($daftarDokumen as $nama => $field)

            <div class="mb-6">

                <label class="block mb-2 font-semibold text-gray-700">

                    {{ $nama }}

                    <span class="text-red-500">
                        *
                    </span>

                </label>


                <input
                    type="file"
                    name="{{ $field }}"
                    accept=".pdf,.jpg,.jpeg,.png"
                    class="border border-[#E5D3C1]
                           rounded-xl
                           w-full
                           p-3
                           bg-gray-50">


                <p class="text-sm text-gray-500 mt-1">
                    PDF, JPG, JPEG, PNG — maksimal 2 MB
                </p>

            </div>

        @endforeach


        <div class="flex gap-3">

            <a href="{{ route('user.histori') }}"
               class="bg-gray-200
                      hover:bg-gray-300
                      text-gray-700
                      px-6 py-3
                      rounded-xl">

                Batal

            </a>


            <button
                type="submit"
                class="bg-[#6B3F2A]
                       hover:bg-[#4E342E]
                       text-white
                       px-6 py-3
                       rounded-xl">

                Upload Semua Dokumen

            </button>

        </div>

    </form>

</div>

@endsection