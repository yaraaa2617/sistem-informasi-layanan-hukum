@extends('layouts.app')

@section('content')

{{-- HERO --}}
<section class="relative h-[50vh]">

    <img src="https://images.unsplash.com/photo-1528740561666-dc2479dc08ab?q=80&w=2070"
         class="absolute inset-0 w-full h-full object-cover">

    <div class="absolute inset-0 bg-black/60"></div>

    <div class="relative z-10 flex items-center justify-center h-full">

        <div class="text-center text-white reveal">

            <h1 class="text-6xl font-bold mb-6">
                Profil Kantor
            </h1>

            <p class="text-xl text-gray-200">
                Profesional, Aman dan Terpercaya
            </p>

        </div>

    </div>

</section>

{{-- TENTANG --}}
<section class="py-24 bg-[#F8F5F2]">

    <div class="max-w-7xl mx-auto px-8">

        <div class="grid grid-cols-2 gap-16 items-center">

            {{-- FOTO --}}
            <div class="reveal">

                <img src="https://images.unsplash.com/photo-1556157382-97eda2d62296?q=80&w=1974"
                     class="rounded-3xl shadow-2xl">

            </div>

            {{-- TEXT --}}
            <div class="reveal">

                <p class="text-[#A77F60] font-semibold mb-4">
                    Tentang Kami
                </p>

                <h2 class="text-5xl font-bold mb-8 text-[#6B3F2A]">

                    Notaris & PPAT
                    Muhammad Baiquni Haqqi, S.H.

                </h2>

                <p class="text-lg text-gray-600 leading-9 mb-6">

                    Kantor Notaris dan PPAT yang bergerak
                    dalam bidang pelayanan pertanahan,
                    akta jual beli, hibah, warisan,
                    dan pembagian hak bersama.

                </p>

                <p class="text-lg text-gray-600 leading-9">

                    Kami berkomitmen memberikan pelayanan
                    hukum yang aman, profesional,
                    transparan dan terpercaya.

                </p>

            </div>

        </div>

    </div>

</section>

{{-- VISI MISI --}}
<section class="py-24 bg-white">

    <div class="max-w-7xl mx-auto px-8">

        <div class="grid grid-cols-2 gap-10">

            {{-- VISI --}}
            <div class="reveal bg-[#6B3F2A]
                        text-white rounded-3xl p-10 shadow-xl">

                <h2 class="text-4xl font-bold mb-6">
                    Visi
                </h2>

                <p class="text-lg leading-9 text-[#F5E6DA]">

                    Menjadi kantor notaris dan PPAT
                    terpercaya dalam memberikan layanan
                    hukum dan pertanahan yang profesional.

                </p>

            </div>

            {{-- MISI --}}
            <div class="reveal bg-[#A77F60]
                        text-white rounded-3xl p-10 shadow-xl">

                <h2 class="text-4xl font-bold mb-6">
                    Misi
                </h2>

                <ul class="space-y-4 text-lg text-[#FFF5EE]">

                    <li>✔ Memberikan pelayanan profesional</li>

                    <li>✔ Mengutamakan kepuasan klien</li>

                    <li>✔ Menjaga keamanan dokumen</li>

                    <li>✔ Proses cepat dan transparan</li>

                </ul>

            </div>

        </div>

    </div>

</section>

{{-- KEUNGGULAN --}}
<section class="py-24 bg-[#F8F5F2]">

    <div class="max-w-7xl mx-auto px-8 text-center">

        <h2 class="text-5xl font-bold mb-16 text-[#6B3F2A] reveal">

            Kenapa Memilih Kami

        </h2>

        <div class="grid grid-cols-3 gap-10">

            <div class="reveal bg-white rounded-3xl p-10 shadow-lg">

                <div class="text-6xl mb-6">
                    ⚖️
                </div>

                <h3 class="text-2xl font-bold mb-4">
                    Profesional
                </h3>

                <p class="text-gray-600 leading-8">
                    Dikerjakan oleh tenaga profesional
                    dan berpengalaman.
                </p>

            </div>

            <div class="reveal bg-white rounded-3xl p-10 shadow-lg">

                <div class="text-6xl mb-6">
                    🔒
                </div>

                <h3 class="text-2xl font-bold mb-4">
                    Aman
                </h3>

                <p class="text-gray-600 leading-8">
                    Data dan dokumen klien terjamin aman.
                </p>

            </div>

            <div class="reveal bg-white rounded-3xl p-10 shadow-lg">

                <div class="text-6xl mb-6">
                    ⚡
                </div>

                <h3 class="text-2xl font-bold mb-4">
                    Cepat
                </h3>

                <p class="text-gray-600 leading-8">
                    Proses pengajuan lebih cepat dan mudah.
                </p>

            </div>

        </div>

    </div>

</section>

{{-- CTA --}}
<section class="py-24 bg-[#6B3F2A] text-white">

    <div class="max-w-5xl mx-auto px-8 text-center reveal">

        <h2 class="text-5xl font-bold mb-6">

            Konsultasikan Kebutuhan Anda

        </h2>

        <p class="text-xl text-[#F5E6DA] mb-10">

            Kami siap membantu pengurusan dokumen
            pertanahan Anda.

        </p>

        <a href="{{ route('kontak') }}"
           class="bg-white text-[#6B3F2A]
                  px-8 py-4 rounded-2xl
                  font-bold text-lg shadow-xl">

            Hubungi Kami

        </a>

    </div>

</section>

@endsection
