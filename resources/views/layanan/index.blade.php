@extends('layouts.app')

@section('content')

{{-- HERO --}}
<section class="relative h-[45vh]">

    <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?q=80&w=2070"
         class="absolute inset-0 w-full h-full object-cover">

    <div class="absolute inset-0 bg-black/60"></div>

    <div class="relative z-10 flex items-center justify-center h-full">

        <div class="text-center text-white reveal">

            <h1 class="text-6xl font-bold mb-6">
                Layanan Kami
            </h1>

            <p class="text-xl text-gray-200">
                Pilih layanan pertanahan sesuai kebutuhan Anda
            </p>

        </div>

    </div>

</section>

{{-- LAYANAN --}}
<section class="py-24 bg-[#F8F5F2]">

    <div class="max-w-7xl mx-auto px-8">

        <div class="grid grid-cols-4 gap-8">

            {{-- AJB --}}
            <a href="{{ route('layanan.ajb.detail') }}"
               class="reveal bg-white rounded-3xl shadow-lg
                      overflow-hidden hover:-translate-y-3
                      transition duration-500">

                <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?q=80&w=1973"
                     class="w-full h-56 object-cover">

                <div class="p-6">

                    <h2 class="text-3xl font-bold mb-4 text-[#6B3F2A]">
                        AJB
                    </h2>

                    <p class="text-gray-600 leading-8 mb-6">
                        Pengurusan Akta Jual Beli tanah
                        secara aman dan legal.
                    </p>

                    <button class="bg-[#6B3F2A]
                                   text-white px-5 py-3 rounded-xl">

                        Ajukan Sekarang

                    </button>

                </div>

            </a>

            {{-- HIBAH --}}
            <a href="{{ route('layanan.hibah.detail') }}"
               class="reveal bg-white rounded-3xl shadow-lg
                      overflow-hidden hover:-translate-y-3
                      transition duration-500">

                <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?q=80&w=2070"
                     class="w-full h-56 object-cover">

                <div class="p-6">

                    <h2 class="text-3xl font-bold mb-4 text-[#6B3F2A]">
                        Hibah
                    </h2>

                    <p class="text-gray-600 leading-8 mb-6">
                        Pengurusan akta hibah tanah
                        dan bangunan terpercaya.
                    </p>

                    <button class="bg-[#6B3F2A]
                                   text-white px-5 py-3 rounded-xl">

                        Ajukan Sekarang

                    </button>

                </div>

            </a>

            {{-- WARISAN --}}
            <a href="{{ route('layanan.warisan.detail') }}"
               class="reveal bg-white rounded-3xl shadow-lg
                      overflow-hidden hover:-translate-y-3
                      transition duration-500">

                <img src="https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?q=80&w=1974"
                     class="w-full h-56 object-cover">

                <div class="p-6">

                    <h2 class="text-3xl font-bold mb-4 text-[#6B3F2A]">
                        Warisan
                    </h2>

                    <p class="text-gray-600 leading-8 mb-6">
                        Jasa turun waris dan pengurusan
                        dokumen ahli waris.
                    </p>

                    <button class="bg-[#6B3F2A]
                                   text-white px-5 py-3 rounded-xl">

                        Ajukan Sekarang

                    </button>

                </div>

            </a>

            {{-- APHB --}}
            <a href="{{ route('layanan.aphb.detail') }}"
               class="reveal bg-white rounded-3xl shadow-lg
                      overflow-hidden hover:-translate-y-3
                      transition duration-500">

                <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=2070"
                     class="w-full h-56 object-cover">

                <div class="p-6">

                    <h2 class="text-3xl font-bold mb-4 text-[#6B3F2A]">
                        APHB
                    </h2>

                    <p class="text-gray-600 leading-8 mb-6">
                        Akta pembagian hak bersama
                        untuk kepemilikan tanah.
                    </p>

                    <button class="bg-[#6B3F2A]
                                   text-white px-5 py-3 rounded-xl">

                        Ajukan Sekarang

                    </button>

                </div>

            </a>

        </div>

    </div>

</section>

@endsection
