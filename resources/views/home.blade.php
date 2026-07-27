@extends('layouts.app')

@section('content')

<section class=" reveal relative h-screen">

    {{-- Background --}}
    <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?q=80&w=2070"
         class="reveal absolute inset-0 w-full h-full object-cover">

    {{-- Overlay --}}
    <div class="reveal absolute inset-0 bg-black/50"></div>

    {{-- Content --}}
    <div class="reveal relative z-10 max-w-7xl mx-auto px-10 h-full
                flex items-center">

        <div class="reveal max-w-2xl text-white">

            <h1 class="reveal text-6xl font-bold leading-tight mb-6">

                Layanan Notaris dan PPAT yang
                Profesional dan Terpercaya

            </h1>

            <p class="reveal text-xl leading-9 text-gray-200 mb-8">

                Kami memberikan layanan hukum di bidang
                kenotariatan dan pertanahan secara profesional,
                transparan dan sesuai peraturan.

            </p>

            <div class="reveal flex gap-4">

                <a href="{{ route('register') }}"
                   class="bg-[#6B3F2A]
                          px-8 py-4 rounded-xl text-white font-semibold">

                    Daftar Klien

                </a>

                <a href="{{ route('layanan') }}"
                   class="border border-white
                          px-8 py-4 rounded-xl text-white">

                    Layanan

                </a>

            </div>

        </div>

    </div>

</section>

{{-- SECTION TENTANG KANTOR --}}
<section class=" reveal bg-[#6B3F2A] text-white py-24">

    <div class="reveal max-w-7xl mx-auto px-10 grid grid-cols-2 gap-16">

        <div>

            <p class="mb-5 text-[#E5D3C1]">
                Tentang Kantor
            </p>

            <h2 class="text-5xl font-bold mb-6">
                Notaris & PPAT
                Muhammad Baiquni Haqqi, S.H.
            </h2>

            <p class="text-lg leading-9 text-gray-200">

                Kantor Notaris & PPAT Muhammad Baiquni Haqqi
                menyediakan layanan pertanahan dan kenotariatan
                secara profesional, aman, dan terpercaya.

            </p>

        </div>

        <div>

            <img src="https://images.unsplash.com/photo-1556157382-97eda2d62296?q=80&w=1974"
                 class="rounded-3xl shadow-2xl">

        </div>

    </div>

</section>

<section class="reveal bg-[#F8F5F2] py-20">

    <div class="reveal max-w-6xl mx-auto px-10 grid grid-cols-3 gap-10 text-center">

        <div>

            <div class="reveal text-6xl mb-5 text-[#6B3F2A]">
                🏛️
            </div>

            <h3 class="reveal text-2xl font-bold mb-3">
                Profesional
            </h3>

            <p class="reveal text-gray-600 leading-8">
                Pelayanan hukum dengan standar profesional tinggi.
            </p>

        </div>

        <div>

            <div class="reveal text-6xl mb-5 text-[#6B3F2A]">
                🛡️
            </div>

            <h3 class="reveal text-2xl font-bold mb-3">
                Transparan
            </h3>

            <p class="reveal text-gray-600 leading-8">
                Proses layanan jelas dan sesuai aturan hukum.
            </p>

        </div>

        <div>

            <div class="reveal text-6xl mb-5 text-[#6B3F2A]">
                📍
            </div>

            <h3 class="reveal text-2xl font-bold mb-3">
                Strategis
            </h3>

            <p class="reveal text-gray-600 leading-8">
                Lokasi kantor mudah dijangkau dan nyaman.
            </p>

        </div>

    </div>

</section>
    {{-- FOOTER --}}
<section class="bg-[#2B1B12] text-white pt-20 pb-10">

    <div class="max-w-7xl mx-auto px-8">

        <div class="grid grid-cols-3 gap-12 mb-16">

            {{-- TENTANG --}}
            <div>

                <h2 class="text-3xl font-bold mb-6">
                    Notaris & PPAT
                </h2>

                <p class="text-gray-300 leading-8">

                    Melayani kebutuhan pertanahan seperti
                    AJB, Hibah, Warisan, dan APHB
                    secara profesional, aman,
                    dan terpercaya.

                </p>

            </div>

            {{-- KONTAK --}}
            <div>

                <h2 class="text-3xl font-bold mb-6">
                    Kontak
                </h2>

                <div class="space-y-5 text-gray-300">

                    <p>
                        📍 JL. Prof M. Yamin, SH, No. 25 E, Payo Lebar,
                        Lb. Bandung, Kec. Jelutung, Kota Jambi, Jambi 36124
                    </p>

                    <p>
                        📞 +62 813-6885-0124
                    </p>

                    <p>
                        ✉️ notaris@gmail.com
                    </p>

                    <p>
                        🕘 Senin - Jumat
                        08.00 - 17.00 WIB
                    </p>

                </div>

            </div>

            {{-- LAYANAN --}}
            <div>

                <h2 class="text-3xl font-bold mb-6">
                    Layanan
                </h2>

                <div class="space-y-4 text-gray-300">

                    <p>• Akta Jual Beli (AJB)</p>

                    <p>• Akta Hibah</p>

                    <p>• Jasa Turun Waris</p>

                    <p>• APHB</p>

                </div>

            </div>

        </div>

        {{-- MAPS --}}
        <div class="rounded-3xl overflow-hidden shadow-2xl mb-10">

<iframe
    src="https://www.google.com/maps?q=Kantor+Notaris+%26+PPAT+Muhammad+Baiquni+Haqqi,+SH&output=embed"
    width="100%"
    height="400"
    style="border:0;"
    allowfullscreen=""
    loading="lazy">
</iframe>

        </div>

        {{-- COPYRIGHT --}}
        <div class="border-t border-white/10 pt-6 text-center text-gray-400">

            © 2026 Notaris & PPAT Muhammad Baiquni Haqqi.
            All Rights Reserved.

        </div>

    </div>

</section>


@endsection
