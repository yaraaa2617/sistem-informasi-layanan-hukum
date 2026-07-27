@extends('layouts.app')

@section('content')

{{-- HERO --}}
<section class="relative h-[50vh]">

    <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?q=80&w=2070"
         class="absolute inset-0 w-full h-full object-cover">

    <div class="absolute inset-0 bg-black/60"></div>

    <div class="relative z-10 flex items-center justify-center h-full">

        <div class="text-center text-white reveal">

            <h1 class="text-6xl font-bold mb-6">
                Hubungi Kami
            </h1>

            <p class="text-xl text-gray-200">
                Konsultasi layanan pertanahan dengan mudah
            </p>

        </div>

    </div>

</section>

{{-- KONTAK --}}
<section class="py-24 bg-[#F8F5F2]">

    <div class="max-w-7xl mx-auto px-8">

        <div class="grid grid-cols-2 gap-12">

            {{-- INFORMASI --}}
            <div class="reveal">

                <p class="text-[#A77F60] font-semibold mb-4">
                    Informasi Kontak
                </p>

                <h2 class="text-5xl font-bold text-[#6B3F2A] mb-8">

                    Kantor Notaris & PPAT
                    Muhammad Baiquni Haqqi

                </h2>

                <div class="space-y-6">

                    <div class="bg-white rounded-3xl p-6 shadow-lg">

                        <h3 class="text-2xl font-bold mb-3">
                            📍 Alamat
                        </h3>

                        <p class="text-gray-600 leading-8">
                            JL. Prof M. Yamin, SH, No. 25 E, Payo Lebar,
                            Lb. Bandung, Kec. Jelutung, Kota Jambi, Jambi 36124
                        </p>

                    </div>

                    <div class="bg-white rounded-3xl p-6 shadow-lg">

                        <h3 class="text-2xl font-bold mb-3">
                            📞 Telepon
                        </h3>

                        <p class="text-gray-600">
                            +62 813-6885-0124
                        </p>

                    </div>

                    <div class="bg-white rounded-3xl p-6 shadow-lg">

                        <h3 class="text-2xl font-bold mb-3">
                            ✉️ Email
                        </h3>

                        <p class="text-gray-600">
                            notaris@gmail.com
                        </p>

                    </div>

                    <div class="bg-white rounded-3xl p-6 shadow-lg">

                        <h3 class="text-2xl font-bold mb-3">
                            🕘 Jam Operasional
                        </h3>

                        <p class="text-gray-600 leading-8">

                            Senin - Jumat :
                            08.00 - 17.00 WIB

                        </p>

                    </div>

                </div>

            </div>

            {{-- FORM --}}
            <div class="reveal">

                <div class="bg-white rounded-3xl p-10 shadow-xl">

                    <h2 class="text-4xl font-bold mb-8 text-[#6B3F2A]">

                        Kirim Pesan

                    </h2>

                    @if(session('success'))

                        <div class="bg-green-100 text-green-700
                                    p-4 rounded-2xl mb-6">

                            {{ session('success') }}

                        </div>

                    @endif

                    <form method="POST"
                          action="{{ route('kontak.store') }}"
                          class="space-y-6">

                        @csrf

                        <div>

                            <label class="block mb-2 font-semibold">
                                Nama
                            </label>

                            <input type="text"
                                   name="nama"
                                   class="w-full border border-[#E5D3C1]
                                          rounded-2xl p-4 focus:outline-none">

                        </div>

                        <div>

                            <label class="block mb-2 font-semibold">
                                Email
                            </label>

                            <input type="email"
                                   name="email"
                                   class="w-full border border-[#E5D3C1]
                                          rounded-2xl p-4 focus:outline-none">

                        </div>

                        <div>

                            <label class="block mb-2 font-semibold">
                                Pesan
                            </label>

                            <textarea name="pesan"
                                      rows="6"
                                      class="w-full border border-[#E5D3C1]
                                             rounded-2xl p-4 focus:outline-none"></textarea>

                        </div>

                        <button class="w-full bg-[#6B3F2A]
                                       hover:bg-[#A77F60]
                                       text-white py-4 rounded-2xl
                                       font-bold text-lg shadow-lg">

                            Kirim Pesan

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
