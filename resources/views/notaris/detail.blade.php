@extends('layouts.notaris')

@section('content')

{{-- HEADER & NAVIGASI --}}
<div class="mb-8">
    <a href="{{ route('notaris.pengajuan') }}"
       class="inline-flex items-center text-[#5D4037] font-semibold hover:underline mb-4 text-sm">
        ← Kembali ke Daftar Pengajuan
    </a>

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-[#5D4037]">
                Detail Pengajuan Akta
            </h1>
            <p class="text-gray-500 mt-1">
                Telaah informasi permohonan, data objek tanah, dan verifikasi berkas dokumen klien
            </p>
        </div>

        <div class="flex items-center gap-2">
            @if($pengajuan->status == 'pending')
                <span class="bg-yellow-100 text-yellow-800 px-4 py-2 rounded-xl text-sm font-semibold">
                    ⏳ Pending (Menunggu Verifikasi)
                </span>
            @elseif($pengajuan->status == 'revisi')
                <span class="bg-red-100 text-red-800 px-4 py-2 rounded-xl text-sm font-semibold">
                    ⚠️ Berkas Belum Lengkap
                </span>
            @elseif($pengajuan->status == 'disetujui')
                <span class="bg-emerald-100 text-emerald-800 px-4 py-2 rounded-xl text-sm font-semibold">
                    ✔ Disetujui
                </span>
            @elseif($pengajuan->status == 'diproses')
                <span class="bg-blue-100 text-blue-800 px-4 py-2 rounded-xl text-sm font-semibold">
                    🔄 Sedang Diproses
                </span>
            @elseif($pengajuan->status == 'selesai')
                <span class="bg-green-100 text-green-800 px-4 py-2 rounded-xl text-sm font-semibold">
                    ✅ Selesai
                </span>
            @endif
        </div>
    </div>
</div>

{{-- STATUS & PROGRESS OVERVIEW --}}
<div class="bg-white border border-[#E5D3C1] rounded-2xl p-6 shadow-sm mb-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Jenis Layanan</p>
            <p class="text-lg font-bold text-[#5D4037] mt-1">{{ $pengajuan->layanan->nama_layanan ?? '-' }}</p>
        </div>
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Progress Pengerjaan</p>
            <p class="text-lg font-bold text-[#5D4037] mt-1">
                {{ $pengajuan->progress ?? 'Belum ada progress' }}
            </p>
        </div>
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Tanggal Pengajuan</p>
            <p class="text-lg font-bold text-[#5D4037] mt-1">
                {{ $pengajuan->tanggal_pengajuan ? \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->format('d F Y') : '-' }}
            </p>
        </div>
    </div>

    @if($pengajuan->catatan_admin)
    <div class="mt-4 pt-4 border-t border-[#E5D3C1]">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Catatan Evaluasi / Admin:</p>
        <p class="text-sm text-gray-700 mt-1 bg-[#F8F1EA] p-3 rounded-xl border border-[#E5D3C1]">
            {{ $pengajuan->catatan_admin }}
        </p>
    </div>
    @endif
</div>

{{-- GRID DATA PEMOHON & OBJEK --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

    {{-- KARTU 1: DATA PARA PIHAK / PEMOHON --}}
    <div class="bg-white border border-[#E5D3C1] rounded-2xl p-6 shadow-sm">
        <h2 class="text-lg font-bold text-[#5D4037] mb-4 pb-3 border-b border-[#E5D3C1] flex items-center gap-2">
            👤 Identitas Pemohon & Para Pihak
        </h2>

        <div class="space-y-4 text-sm">
            @if($pengajuan->nama_penjual || $pengajuan->nama_pembeli)
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-3 rounded-xl">
                        <span class="text-gray-400 text-xs block">Pihak Pertama / Penjual</span>
                        <span class="font-semibold text-gray-800">{{ $pengajuan->nama_penjual ?? '-' }}</span>
                        <span class="text-xs text-gray-500 block mt-1">📞 {{ $pengajuan->telepon_penjual ?? '-' }}</span>
                    </div>
                    <div class="bg-gray-50 p-3 rounded-xl">
                        <span class="text-gray-400 text-xs block">Pihak Kedua / Pembeli</span>
                        <span class="font-semibold text-gray-800">{{ $pengajuan->nama_pembeli ?? '-' }}</span>
                        <span class="text-xs text-gray-500 block mt-1">📞 {{ $pengajuan->telepon_pembeli ?? '-' }}</span>
                    </div>
                </div>
            @endif

            @if($pengajuan->nama_pemberi || $pengajuan->nama_penerima)
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-3 rounded-xl">
                        <span class="text-gray-400 text-xs block">Pemberi Hibah</span>
                        <span class="font-semibold text-gray-800">{{ $pengajuan->nama_pemberi ?? '-' }}</span>
                        <span class="text-xs text-gray-500 block mt-1">📞 {{ $pengajuan->telepon_pemberi ?? '-' }}</span>
                    </div>
                    <div class="bg-gray-50 p-3 rounded-xl">
                        <span class="text-gray-400 text-xs block">Penerima Hibah</span>
                        <span class="font-semibold text-gray-800">{{ $pengajuan->nama_penerima ?? '-' }}</span>
                        <span class="text-xs text-gray-500 block mt-1">📞 {{ $pengajuan->telepon_penerima ?? '-' }}</span>
                    </div>
                </div>
                @if($pengajuan->hubungan_pemberi_penerima)
                <div class="bg-gray-50 p-3 rounded-xl">
                    <span class="text-gray-400 text-xs block">Hubungan Keluarga:</span>
                    <span class="font-semibold text-gray-800">{{ $pengajuan->hubungan_pemberi_penerima }}</span>
                </div>
                @endif
            @endif

            @if($pengajuan->nama_pemohon)
                <div class="bg-gray-50 p-3 rounded-xl">
                    <span class="text-gray-400 text-xs block">Nama Pemohon</span>
                    <span class="font-semibold text-gray-800">{{ $pengajuan->nama_pemohon }}</span>
                    <span class="text-xs text-gray-500 block mt-1">📞 {{ $pengajuan->telepon_pemohon ?? '-' }}</span>
                </div>
            @endif

            @if($pengajuan->nama_pewaris)
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-3 rounded-xl">
                        <span class="text-gray-400 text-xs block">Nama Pewaris</span>
                        <span class="font-semibold text-gray-800">{{ $pengajuan->nama_pewaris }}</span>
                        <span class="text-xs text-gray-500 block mt-1">Wafat: {{ $pengajuan->tanggal_meninggal ?? '-' }}</span>
                    </div>
                    <div class="bg-gray-50 p-3 rounded-xl">
                        <span class="text-gray-400 text-xs block">Jumlah Ahli Waris</span>
                        <span class="font-semibold text-gray-800">{{ $pengajuan->jumlah_ahli_waris ?? '-' }} orang</span>
                    </div>
                </div>
            @endif

            <div class="pt-2">
                <span class="text-gray-400 text-xs block">Akun Pemohon (User):</span>
                <span class="font-medium text-gray-700">{{ $pengajuan->user->name ?? '-' }} ({{ $pengajuan->user->email ?? '-' }})</span>
            </div>
        </div>
    </div>

    {{-- KARTU 2: DATA OBJEK TANAH & KEPERLUAN --}}
    <div class="bg-white border border-[#E5D3C1] rounded-2xl p-6 shadow-sm">
        <h2 class="text-lg font-bold text-[#5D4037] mb-4 pb-3 border-b border-[#E5D3C1] flex items-center gap-2">
            📍 Objek Tanah & Keterangan
        </h2>

        <div class="space-y-4 text-sm">
            <div class="bg-gray-50 p-3 rounded-xl">
                <span class="text-gray-400 text-xs block">Alamat / Lokasi Objek:</span>
                <span class="font-semibold text-gray-800">{{ $pengajuan->alamat_objek_tanah ?? '-' }}</span>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50 p-3 rounded-xl">
                    <span class="text-gray-400 text-xs block">Kecamatan</span>
                    <span class="font-semibold text-gray-800">{{ $pengajuan->kecamatan ?? '-' }}</span>
                </div>
                <div class="bg-gray-50 p-3 rounded-xl">
                    <span class="text-gray-400 text-xs block">Kabupaten / Kota</span>
                    <span class="font-semibold text-gray-800">{{ $pengajuan->kabupaten_kota ?? '-' }}</span>
                </div>
            </div>

            <div class="bg-gray-50 p-3 rounded-xl">
                <span class="text-gray-400 text-xs block">Tujuan Pengajuan:</span>
                <span class="font-medium text-gray-800">{{ $pengajuan->tujuan_pengajuan ?? '-' }}</span>
            </div>

            @if($pengajuan->keterangan)
            <div class="bg-gray-50 p-3 rounded-xl">
                <span class="text-gray-400 text-xs block">Keterangan Tambahan:</span>
                <span class="text-gray-700">{{ $pengajuan->keterangan }}</span>
            </div>
            @endif
        </div>
    </div>

</div>

{{-- BERKAS DOKUMEN PERSYARATAN --}}
<div class="bg-white border border-[#E5D3C1] rounded-2xl p-6 shadow-sm mb-8">
    <div class="flex items-center justify-between mb-6 pb-3 border-b border-[#E5D3C1]">
        <div>
            <h2 class="text-xl font-bold text-[#5D4037] flex items-center gap-2">
                📂 Berkas Dokumen Persyaratan
            </h2>
            <p class="text-xs text-gray-400 mt-1">Dokumen yang telah diunggah oleh klien untuk verifikasi notaris</p>
        </div>
        <span class="bg-[#F8F1EA] text-[#5D4037] px-3 py-1 rounded-xl text-xs font-semibold">
            {{ $pengajuan->dokumen->count() }} Berkas Diunggah
        </span>
    </div>

    @if($pengajuan->dokumen->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($pengajuan->dokumen as $dokumen)
            <div class="border border-[#E5D3C1] rounded-xl p-4 flex items-center justify-between gap-4 hover:bg-gray-50 transition">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-[#F8F1EA] text-[#5D4037] rounded-lg flex items-center justify-center font-bold text-lg">
                        📄
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800 text-sm">
                            {{ $dokumen->nama_dokumen }}
                        </h4>
                        <span class="text-xs text-gray-400 block mt-0.5">
                            {{ basename($dokumen->file_dokumen) }}
                        </span>
                    </div>
                </div>

                <a href="{{ asset('storage/' . $dokumen->file_dokumen) }}"
                   target="_blank"
                   class="bg-[#5D4037] hover:bg-[#4E342E] text-white px-4 py-2 rounded-lg text-xs font-semibold transition shrink-0">
                    Buka Berkas ↗
                </a>
            </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-10 border border-dashed border-[#E5D3C1] rounded-xl text-gray-400">
            <p class="text-2xl mb-2">📁</p>
            <p class="font-medium">Belum ada berkas dokumen yang diunggah.</p>
            <p class="text-xs mt-1 text-gray-400">Klien akan mengunggah berkas setelah pengajuan berstatus Disetujui.</p>
        </div>
    @endif
</div>

{{-- SURAT RESMI JIKA SUDAH DITERBITKAN --}}
@if($pengajuan->file_surat)
<div class="bg-white border border-[#E5D3C1] rounded-2xl p-6 shadow-sm mb-8 flex items-center justify-between">
    <div>
        <h3 class="font-bold text-[#5D4037] text-lg">Surat Pemberitahuan / Pemanggilan Resmi</h3>
        <p class="text-xs text-gray-500 mt-1">Surat dalam format PDF yang telah diterbitkan untuk klien</p>
    </div>
    <a href="{{ asset('storage/' . $pengajuan->file_surat) }}"
       target="_blank"
       class="bg-[#CCD67F] hover:bg-[#B8C267] text-[#4A4A20] px-5 py-2.5 rounded-xl font-semibold text-sm transition">
        Lihat Surat PDF ↗
    </a>
</div>
@endif

@endsection