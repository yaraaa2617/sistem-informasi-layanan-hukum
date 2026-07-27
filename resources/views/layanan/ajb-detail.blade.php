@extends('layouts.app')

@section('content')

{{-- HERO --}}
<section class="relative h-[50vh]">

    <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?q=80&w=1973"
         class="absolute inset-0 w-full h-full object-cover">

    <div class="absolute inset-0 bg-black/60"></div>

    <div class="relative z-10 flex items-center
                justify-center h-full text-center text-white">

        <div class="reveal">

            <h1 class="text-6xl font-bold mb-6">
                Akta Jual Beli
            </h1>

            <p class="text-xl text-gray-200">
                Pengurusan AJB cepat, aman, dan terpercaya
            </p>

        </div>

    </div>

</section>

{{-- CONTENT --}}
<section class="py-24 bg-[#F8F5F2]">

    <div class="max-w-6xl mx-auto px-8">

        <div class="grid grid-cols-3 gap-8">

            {{-- DESKRIPSI --}}
            <div class="col-span-2">

                <div class="bg-white rounded-3xl shadow-lg p-10 mb-8 reveal">

                    <h2 class="text-4xl font-bold mb-6 text-[#6B3F2A]">
                        Tentang Layanan
                    </h2>

                    <p class="text-gray-600 leading-9 text-lg">

                        Akta Jual Beli (AJB) merupakan dokumen resmi
                        yang dibuat oleh PPAT sebagai bukti sah
                        peralihan hak atas tanah melalui transaksi jual beli.

                    </p>

                </div>

                {{-- SYARAT --}}
                <div class="bg-white rounded-3xl shadow-lg p-10 reveal">

                    <h2 class="text-4xl font-bold mb-8 text-[#6B3F2A]">
                        Persyaratan Dokumen
                    </h2>

                    <div class="space-y-5">

                        <div class="flex items-start gap-4">
                            <span class="text-[#6B3F2A] text-2xl leading-none">
                                •
                            </span>

                                <p class="text-lg leading-8 text-gray-700">
                                Fotokopi KTP dan KK dari seluruh pihak
                                pemegang hak bersama (misal: semua ahli waris)
                                dan pasangan (suami/istri) jika sudah menikah.
                                </p>

                        </div>

                        <div class="flex items-start gap-4">
                            <span class="text-[#6B3F2A] text-2xl leading-none">
                                •
                            </span>

                            <p class="text-lg leading-8 text-gray-700">
                                Fotokopi Akta Nikah / Buku Nikah para pihak.
                            </p>
                        </div>

                        <div class="flex items-start gap-4">
                            <span class="text-[#6B3F2A] text-2xl leading-none">
                                •
                            </span>

                            <p class="text-lg leading-8 text-gray-700">
                                Surat Keterangan Kematian
                                (apabila pembagian berasal dari harta
                                warisan pewaris yang telah meninggal).
                            </p>
                        </div>

                        <div class="flex items-start gap-4">
                            <span class="text-[#6B3F2A] text-2xl leading-none">
                                •
                            </span>

                            <p class="text-lg leading-8 text-gray-700">
                                Surat Keterangan Ahli Waris yang sah
                                dan diketahui oleh instansi berwenang
                                (Lurah dan Camat, atau penetapan pengadilan bagi WNI non-pribumi).
                            </p>
                        </div>

                        <div class="flex items-start gap-4">
                            <span class="text-[#6B3F2A] text-2xl leading-none">
                                •
                            </span>

                            <p class="text-lg leading-8 text-gray-700">
                                Sertifikat Asli (SHM atau HGB) dari properti atau tanah yang akan dibagi.
                            </p>
                        </div>

                        <div class="flex items-start gap-4">
                            <span class="text-[#6B3F2A] text-2xl leading-none">
                                •
                            </span>

                            <p class="text-lg leading-8 text-gray-700">
                                Bukti Pembayaran PBB (Pajak Bumi dan Bangunan) tahun terakhir.
                            </p>
                        </div>

                        <div class="flex items-start gap-4">
                            <span class="text-[#6B3F2A] text-2xl leading-none">
                                •
                            </span>

                            <p class="text-lg leading-8 text-gray-700">
                                Sertifikat asli
                            </p>
                        </div>

                    </div>

                </div>

            </div>

            {{-- SIDE --}}
            <div>

                <div class="bg-white rounded-3xl shadow-lg p-8 sticky top-24 reveal">

                    <h2 class="text-3xl font-bold mb-6 text-[#6B3F2A]">
                        Informasi
                    </h2>

                    <div class="space-y-6">

                        <div>

                            <p class="text-gray-500 mb-2">
                                Estimasi Proses
                            </p>

                            <h3 class="text-2xl font-bold">
                                3 - 7 Hari
                            </h3>

                        </div>

                        <div>

                            <p class="text-gray-500 mb-2">
                                Konsultasi
                            </p>

                            <h3 class="text-2xl font-bold">
                                Gratis
                            </h3>

                        </div>

                    </div>

                    <a href="{{ route('login') }}"
                       class="block mt-10 bg-[#6B3F2A]
                              hover:bg-[#8A5A44]
                              text-white text-center
                              py-4 rounded-2xl font-bold">

                        Ajukan Sekarang

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
