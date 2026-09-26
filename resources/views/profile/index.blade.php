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

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            {{-- FOTO --}}
            <div class="reveal">

                <img src="{{ asset('images/kantor-notaris.jpg') }}"
                     alt="Kantor Notaris & PPAT Muhammad Baiquni Haqqi, S.H."
                     class="rounded-3xl shadow-2xl w-full h-[450px] object-cover">

            </div>

            {{-- TEXT --}}
            <div class="reveal">

                <p class="text-[#A77F60] font-semibold mb-4">
                    Tentang Kami
                </p>

                <h2 class="text-4xl lg:text-5xl font-bold mb-8 text-[#6B3F2A]">

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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

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

{{-- STRUKTUR ORGANISASI KANTOR --}}
<section class="py-24 bg-[#F8F5F2]" id="struktur-organisasi">
    <div class="max-w-7xl mx-auto px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16 reveal">
            <p class="text-[#A77F60] font-bold tracking-wider uppercase mb-3 text-sm">
                Tata Kelola & Manajemen
            </p>
            <h2 class="text-4xl lg:text-5xl font-bold text-[#6B3F2A] mb-6">
                Struktur Organisasi Kantor
            </h2>
            <p class="text-gray-600 text-lg leading-relaxed">
                Susunan jabatan, pembagian tugas fungsional, dan hubungan kerja antarbagian disusun secara terintegrasi untuk menjamin kepastian hukum, ketelitian akta, dan kenyamanan pelayanan bagi masyarakat.
            </p>
        </div>

        {{-- BAGAN PIMPINAN UTAMA (LEVEL 1) --}}
        <div class="flex justify-center mb-6 reveal">
            <div class="bg-gradient-to-br from-[#6B3F2A] to-[#4E342E] text-white rounded-3xl p-8 max-w-xl w-full shadow-2xl border-4 border-[#E5D3C1] text-center relative">
                <div class="w-20 h-20 mx-auto mb-4 bg-[#F8F1EA] text-[#6B3F2A] rounded-2xl flex items-center justify-center text-4xl shadow-md font-bold">
                    ⚖️
                </div>
                <span class="bg-[#A77F60] text-xs font-semibold px-4 py-1 rounded-full uppercase tracking-wider inline-block mb-2 text-[#FFF5EE]">
                    Pimpinan & Pejabat Pembuat Akta
                </span>
                <h3 class="text-2xl lg:text-3xl font-bold text-white mb-1">
                    Muhammad Baiquni Haqqi, S.H.
                </h3>
                <p class="text-[#E5D3C1] font-medium text-sm mb-4">
                    Notaris & Pejabat Pembuat Akta Tanah (PPAT)
                </p>
                
                <div class="bg-black/20 rounded-2xl p-4 text-left border border-white/10 text-xs text-gray-200">
                    <p class="font-bold text-[#F8F1EA] mb-2 uppercase tracking-wider text-[11px]">Tugas & Kewenangan Utama:</p>
                    <ul class="space-y-1.5 list-disc list-inside">
                        <li>Membuat dan mengesahkan seluruh Akta Otentik Notariil dan PPAT</li>
                        <li>Memastikan keselarasan proses hukum dengan UUJN dan peraturan pertanahan</li>
                        <li>Membina, mengawasi, dan bertanggung jawab atas kinerja seluruh divisi operasional</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- GARIS PENGHUBUNG VERTIKAL --}}
        <div class="flex justify-center">
            <div class="w-1 h-8 bg-[#A77F60]"></div>
        </div>

        {{-- LEVEL 2: KOORDINATOR OPERASIONAL & PROTOKOL --}}
        <div class="flex justify-center mb-6 reveal">
            <div class="bg-white border-2 border-[#A77F60] text-[#6B3F2A] rounded-2xl p-6 max-w-md w-full shadow-md text-center">
                <div class="w-12 h-12 mx-auto bg-[#F8F1EA] rounded-xl flex items-center justify-center text-2xl mb-2">
                    📋
                </div>
                <span class="bg-[#E5D3C1] text-[#6B3F2A] text-[11px] font-bold px-3 py-1 rounded-full uppercase mb-2 inline-block">
                    Manajemen & Tata Usaha
                </span>
                <h4 class="text-lg font-bold text-[#4E342E]">
                    Kepala Bagian Operasional & Protokol
                </h4>
                <p class="text-xs text-gray-600 mt-2 leading-relaxed">
                    Bertanggung jawab mengkoordinasikan alur kerja lintas divisi, pengelolaan warkah, dan jadwal resmi penandatanganan akta di hadapan Notaris.
                </p>
            </div>
        </div>

        {{-- GARIS PENGHUBUNG VERTIKAL --}}
        <div class="flex justify-center mb-4">
            <div class="w-1 h-8 bg-[#A77F60]"></div>
        </div>

        {{-- LEVEL 3: 4 DIVISI FUNGSIONAL --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
            
            {{-- DIVISI 1: KENOTARIATAN --}}
            <div class="reveal bg-white border border-[#E5D3C1] rounded-3xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="w-14 h-14 bg-[#F8F1EA] text-[#6B3F2A] rounded-2xl flex items-center justify-center text-3xl mb-5 shadow-sm">
                        📜
                    </div>
                    <span class="text-xs font-bold uppercase text-[#A77F60] tracking-wider block mb-1">
                        Divisi I
                    </span>
                    <h4 class="text-xl font-bold text-[#6B3F2A] mb-2">
                        Kenotariatan & Badan Hukum
                    </h4>
                    <p class="text-xs font-semibold text-gray-500 mb-4 pb-2 border-b border-gray-100">
                        Jabatan: Staf Perancang Minuta Akta
                    </p>
                    <div class="space-y-2 text-xs text-gray-600">
                        <p class="font-medium text-gray-800">Fungsi & Tugas Pokok:</p>
                        <ul class="space-y-1.5 list-disc list-inside text-gray-600">
                            <li>Penyusunan akta pendirian PT, CV, Yayasan, & Koperasi</li>
                            <li>Perjanjian bisnis, sewa-menyewa, & kuasa</li>
                            <li>Pelayanan Legalisasi & Waarmerking dokumen</li>
                            <li>Pendaftaran ke sistem AHU Kemenkumham</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-5 pt-3 border-t border-[#F8F1EA] text-[11px] text-[#A77F60] font-semibold">
                    Hubungan Kerja: Terhubung ke Bagian Verifikasi & Notaris
                </div>
            </div>

            {{-- DIVISI 2: PPAT --}}
            <div class="reveal bg-white border border-[#E5D3C1] rounded-3xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="w-14 h-14 bg-[#F8F1EA] text-[#6B3F2A] rounded-2xl flex items-center justify-center text-3xl mb-5 shadow-sm">
                        🏡
                    </div>
                    <span class="text-xs font-bold uppercase text-[#A77F60] tracking-wider block mb-1">
                        Divisi II
                    </span>
                    <h4 class="text-xl font-bold text-[#6B3F2A] mb-2">
                        PPAT & Pertanahan
                    </h4>
                    <p class="text-xs font-semibold text-gray-500 mb-4 pb-2 border-b border-gray-100">
                        Jabatan: Staf Peralihan Hak & Pendaftaran Tanah
                    </p>
                    <div class="space-y-2 text-xs text-gray-600">
                        <p class="font-medium text-gray-800">Fungsi & Tugas Pokok:</p>
                        <ul class="space-y-1.5 list-disc list-inside text-gray-600">
                            <li>Pembuatan Akta Jual Beli (AJB) & Hibah</li>
                            <li>Pengurusan Turun Waris & Pembagian Hak (APHB)</li>
                            <li>Pengecekan keabsahan sertifikat di BPN</li>
                            <li>Proses balik nama dan pemecahan sertifikat</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-5 pt-3 border-t border-[#F8F1EA] text-[11px] text-[#A77F60] font-semibold">
                    Hubungan Kerja: Terhubung ke BPN & Front Office
                </div>
            </div>

            {{-- DIVISI 3: VERIFIKASI & ARSIP --}}
            <div class="reveal bg-white border border-[#E5D3C1] rounded-3xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="w-14 h-14 bg-[#F8F1EA] text-[#6B3F2A] rounded-2xl flex items-center justify-center text-3xl mb-5 shadow-sm">
                        🗂️
                    </div>
                    <span class="text-xs font-bold uppercase text-[#A77F60] tracking-wider block mb-1">
                        Divisi III
                    </span>
                    <h4 class="text-xl font-bold text-[#6B3F2A] mb-2">
                        Verifikasi Berkas & Arsip
                    </h4>
                    <p class="text-xs font-semibold text-gray-500 mb-4 pb-2 border-b border-gray-100">
                        Jabatan: Staf Verifikator & Arsiparis Hukum
                    </p>
                    <div class="space-y-2 text-xs text-gray-600">
                        <p class="font-medium text-gray-800">Fungsi & Tugas Pokok:</p>
                        <ul class="space-y-1.5 list-disc list-inside text-gray-600">
                            <li>Validasi keaslian identitas (KTP, KK, NPWP, Surat Nikah)</li>
                            <li>Pemeriksaan warkah fisik & kelengkapan syarat</li>
                            <li>Penyimpanan warkah & Minuta Akta Notaris</li>
                            <li>Pencatatan Buku Repertorium & Klapper</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-5 pt-3 border-t border-[#F8F1EA] text-[11px] text-[#A77F60] font-semibold">
                    Hubungan Kerja: Penjaga Mutu Berkas Sebelum Akta Dibuat
                </div>
            </div>

            {{-- DIVISI 4: PELAYANAN & KEUANGAN --}}
            <div class="reveal bg-white border border-[#E5D3C1] rounded-3xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="w-14 h-14 bg-[#F8F1EA] text-[#6B3F2A] rounded-2xl flex items-center justify-center text-3xl mb-5 shadow-sm">
                        🤝
                    </div>
                    <span class="text-xs font-bold uppercase text-[#A77F60] tracking-wider block mb-1">
                        Divisi IV
                    </span>
                    <h4 class="text-xl font-bold text-[#6B3F2A] mb-2">
                        Pelayanan Klien & Keuangan
                    </h4>
                    <p class="text-xs font-semibold text-gray-500 mb-4 pb-2 border-b border-gray-100">
                        Jabatan: Front Office & Administrasi Keuangan
                    </p>
                    <div class="space-y-2 text-xs text-gray-600">
                        <p class="font-medium text-gray-800">Fungsi & Tugas Pokok:</p>
                        <ul class="space-y-1.5 list-disc list-inside text-gray-600">
                            <li>Penerimaan konsultasi dan permohonan klien</li>
                            <li>Pengaturan jadwal temu & penandatanganan akta</li>
                            <li>Pencatatan pembayaran honorarium & PNBP</li>
                            <li>Verifikasi pembayaran pajak BPHTB & PPh Final</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-5 pt-3 border-t border-[#F8F1EA] text-[11px] text-[#A77F60] font-semibold">
                    Hubungan Kerja: Pintu Utama Komunikasi dengan Klien
                </div>
            </div>

        </div>

        {{-- DIAGRAM ALUR KERJA & HUBUNGAN ANTARBAGIAN --}}
        <div class="bg-white border-2 border-[#E5D3C1] rounded-3xl p-8 lg:p-10 shadow-sm reveal">
            <div class="text-center max-w-2xl mx-auto mb-8">
                <span class="bg-[#F8F1EA] text-[#6B3F2A] text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-2 inline-block">
                    Alur Kerja Terintegrasi
                </span>
                <h3 class="text-2xl lg:text-3xl font-bold text-[#6B3F2A]">
                    Hubungan Kerja Antarbagian dalam Pelayanan
                </h3>
                <p class="text-xs text-gray-500 mt-2">
                    Setiap bagian saling berkoordinasi secara terpadu melalui 5 tahapan kerja terstandar:
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                
                <div class="bg-[#F8F5F2] border border-[#E5D3C1] p-5 rounded-2xl text-center relative flex flex-col justify-between">
                    <div>
                        <div class="w-9 h-9 bg-[#6B3F2A] text-white rounded-full flex items-center justify-center mx-auto text-sm font-bold mb-3 shadow">
                            1
                        </div>
                        <h5 class="font-bold text-sm text-[#6B3F2A] mb-1">Penerimaan & Konsultasi</h5>
                        <p class="text-xs text-gray-600 leading-relaxed">Front Office menerima data awal klien & permohonan layanan hukum.</p>
                    </div>
                    <div class="mt-3 text-[10px] font-semibold text-[#A77F60] bg-white py-1 px-2 rounded-lg border border-[#E5D3C1]">
                        Divisi Pelayanan
                    </div>
                </div>

                <div class="bg-[#F8F5F2] border border-[#E5D3C1] p-5 rounded-2xl text-center relative flex flex-col justify-between">
                    <div>
                        <div class="w-9 h-9 bg-[#6B3F2A] text-white rounded-full flex items-center justify-center mx-auto text-sm font-bold mb-3 shadow">
                            2
                        </div>
                        <h5 class="font-bold text-sm text-[#6B3F2A] mb-1">Verifikasi Dokumen</h5>
                        <p class="text-xs text-gray-600 leading-relaxed">Pemeriksaan keabsahan dokumen identitas & berkas pendukung fisik/digital.</p>
                    </div>
                    <div class="mt-3 text-[10px] font-semibold text-[#A77F60] bg-white py-1 px-2 rounded-lg border border-[#E5D3C1]">
                        Divisi Verifikasi
                    </div>
                </div>

                <div class="bg-[#F8F5F2] border border-[#E5D3C1] p-5 rounded-2xl text-center relative flex flex-col justify-between">
                    <div>
                        <div class="w-9 h-9 bg-[#6B3F2A] text-white rounded-full flex items-center justify-center mx-auto text-sm font-bold mb-3 shadow">
                            3
                        </div>
                        <h5 class="font-bold text-sm text-[#6B3F2A] mb-1">Penyusunan Draf Akta</h5>
                        <p class="text-xs text-gray-600 leading-relaxed">Draf akta dirancang sesuai kesepakatan para pihak & hukum yang berlaku.</p>
                    </div>
                    <div class="mt-3 text-[10px] font-semibold text-[#A77F60] bg-white py-1 px-2 rounded-lg border border-[#E5D3C1]">
                        Divisi Notariat / PPAT
                    </div>
                </div>

                <div class="bg-[#F8F5F2] border border-[#E5D3C1] p-5 rounded-2xl text-center relative flex flex-col justify-between">
                    <div>
                        <div class="w-9 h-9 bg-[#6B3F2A] text-white rounded-full flex items-center justify-center mx-auto text-sm font-bold mb-3 shadow">
                            4
                        </div>
                        <h5 class="font-bold text-sm text-[#6B3F2A] mb-1">Pengesahan & TTD</h5>
                        <p class="text-xs text-gray-600 leading-relaxed">Pembacaan akta oleh Notaris di hadapan para pihak dan saksi resmi.</p>
                    </div>
                    <div class="mt-3 text-[10px] font-semibold text-[#A77F60] bg-white py-1 px-2 rounded-lg border border-[#E5D3C1]">
                        Notaris & PPAT
                    </div>
                </div>

                <div class="bg-[#F8F5F2] border border-[#E5D3C1] p-5 rounded-2xl text-center relative flex flex-col justify-between">
                    <div>
                        <div class="w-9 h-9 bg-[#6B3F2A] text-white rounded-full flex items-center justify-center mx-auto text-sm font-bold mb-3 shadow">
                            5
                        </div>
                        <h5 class="font-bold text-sm text-[#6B3F2A] mb-1">Pendaftaran & Serah Akta</h5>
                        <p class="text-xs text-gray-600 leading-relaxed">Pengurusan ke BPN / AHU Online dan penyerahan salinan akta ke klien.</p>
                    </div>
                    <div class="mt-3 text-[10px] font-semibold text-[#A77F60] bg-white py-1 px-2 rounded-lg border border-[#E5D3C1]">
                        Divisi PPAT & Arsip
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

{{-- KEUNGGULAN --}}
<section class="py-24 bg-white">

    <div class="max-w-7xl mx-auto px-8 text-center">

        <h2 class="text-5xl font-bold mb-16 text-[#6B3F2A] reveal">

            Kenapa Memilih Kami

        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <div class="reveal bg-[#F8F5F2] rounded-3xl p-10 shadow-lg border border-[#E5D3C1]">

                <div class="text-6xl mb-6">
                    ⚖️
                </div>

                <h3 class="text-2xl font-bold mb-4 text-[#6B3F2A]">
                    Profesional
                </h3>

                <p class="text-gray-600 leading-8">
                    Dikerjakan oleh tenaga profesional
                    dan berpengalaman di bidang kenotariatan & pertanahan.
                </p>

            </div>

            <div class="reveal bg-[#F8F5F2] rounded-3xl p-10 shadow-lg border border-[#E5D3C1]">

                <div class="text-6xl mb-6">
                    🔒
                </div>

                <h3 class="text-2xl font-bold mb-4 text-[#6B3F2A]">
                    Aman & Legal
                </h3>

                <p class="text-gray-600 leading-8">
                    Data dan dokumen klien terjamin kerahasiaannya dengan perlindungan hukum yang kuat.
                </p>

            </div>

            <div class="reveal bg-[#F8F5F2] rounded-3xl p-10 shadow-lg border border-[#E5D3C1]">

                <div class="text-6xl mb-6">
                    ⚡
                </div>

                <h3 class="text-2xl font-bold mb-4 text-[#6B3F2A]">
                    Cepat & Transparan
                </h3>

                <p class="text-gray-600 leading-8">
                    Proses pengajuan terpantau jelas dengan kejelasan tahapan dan estimasi waktu.
                </p>

            </div>

        </div>

    </div>

</section>

{{-- CTA --}}
<section class="py-24 bg-[#6B3F2A] text-white">

    <div class="max-w-5xl mx-auto px-8 text-center reveal">

        <h2 class="text-4xl lg:text-5xl font-bold mb-6">

            Konsultasikan Kebutuhan Anda

        </h2>

        <p class="text-xl text-[#F5E6DA] mb-10">

            Kami siap membantu pengurusan dokumen kenotariatan dan
            pertanahan Anda secara aman dan profesional.

        </p>

        <a href="{{ route('kontak') }}"
           class="bg-white text-[#6B3F2A] hover:bg-[#F8F1EA]
                  px-8 py-4 rounded-2xl
                  font-bold text-lg shadow-xl transition inline-block">

            Hubungi Kami Sekarang →

        </a>

    </div>

</section>

@endsection