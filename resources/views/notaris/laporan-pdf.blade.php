<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Laporan Pengajuan Notaris</title>

<style>
body {
    font-family: DejaVu Sans, sans-serif;
    font-size: 11px;
    margin: 20px;
    color: #333;
}

.kop {
    width: 100%;
    border-bottom: 3px double #333;
    padding-bottom: 12px;
    margin-bottom: 20px;
    text-align: center;
}

.kop h1 {
    margin: 0;
    font-size: 22px;
    color: #4E342E;
}

.kop h2 {
    margin: 4px 0;
    font-size: 16px;
    color: #111;
}

.kop p {
    margin: 2px 0;
    font-size: 10.5px;
    color: #555;
}

.laporan-title {
    text-align: center;
    margin: 20px 0 15px 0;
}

.laporan-title h3 {
    margin: 0 0 6px 0;
    font-size: 15px;
    text-transform: uppercase;
}

.laporan-title p {
    margin: 0;
    font-size: 11px;
    color: #666;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

th {
    background: #F5EEE6;
    color: #4E342E;
    font-weight: bold;
    padding: 7px;
    font-size: 10px;
    border: 1px solid #999;
}

td {
    border: 1px solid #ccc;
    padding: 6px;
    text-align: left;
    font-size: 10px;
}

.text-center {
    text-align: center;
}

.rekap {
    margin-top: 15px;
    width: 50%;
    float: left;
}

.rekap td {
    border: none;
    padding: 3px 0;
}

.ttd {
    width: 250px;
    float: right;
    margin-top: 25px;
    text-align: center;
}

.clear {
    clear: both;
}
</style>
</head>

<body>

{{-- KOP SURAT NOTARIS --}}
<div class="kop">
    <h1>KANTOR NOTARIS & PPAT</h1>
    <h2>MUHAMMAD BAIQUNI HAQQI, S.H.</h2>
    <p>Jl. Prof M. Yamin SH No.25E, Payo Lebar, Jelutung, Kota Jambi</p>
    <p>Telp: 0813-6885-0124 | Email: notaris@gmail.com</p>
</div>

{{-- JUDUL LAPORAN --}}
<div class="laporan-title">
    <h3>Laporan Rekapitulasi Pengajuan Akta</h3>
    <p>
        Periode: 
        @if($bulan && $bulan !== 'semua')
            Bulan {{ DateTime::createFromFormat('!m', $bulan)->format('F') }}
        @else
            Seluruh Bulan
        @endif
        Tahun {{ $tahun !== 'semua' ? $tahun : 'Semua Tahun' }}
    </p>
</div>

{{-- TABEL LAPORAN --}}
<table>
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="15%">Tanggal</th>
            <th width="25%">Nama Klien / Pemohon</th>
            <th width="25%">Jenis Layanan</th>
            <th width="15%">Status</th>
            <th width="15%">Progress</th>
        </tr>
    </thead>
    <tbody>
        @forelse($laporan as $item)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td class="text-center">
                {{ $item->tanggal_pengajuan ? \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d/m/Y') : '-' }}
            </td>
            <td>
                {{ $item->nama_pembeli ?? $item->nama_pemohon ?? $item->nama_penerima ?? $item->nama ?? '-' }}
            </td>
            <td>
                {{ $item->layanan->nama_layanan ?? '-' }}
            </td>
            <td class="text-center">
                {{ ucfirst($item->status) }}
            </td>
            <td>
                {{ $item->progress ?? '-' }}
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Tidak ada data pengajuan pada periode ini.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{-- REKAPITULASI & TANDA TANGAN --}}
<div style="margin-top: 20px;">
    <div class="rekap">
        <table>
            <tr>
                <td><strong>Total Pengajuan:</strong></td>
                <td>{{ $laporan->count() }} Berkas</td>
            </tr>
            <tr>
                <td><strong>Akta Selesai:</strong></td>
                <td>{{ $laporan->where('status', 'selesai')->count() }} Berkas</td>
            </tr>
            <tr>
                <td><strong>Sedang Diproses:</strong></td>
                <td>{{ $laporan->where('status', 'diproses')->count() }} Berkas</td>
            </tr>
            <tr>
                <td><strong>Menunggu / Revisi:</strong></td>
                <td>{{ $laporan->whereIn('status', ['pending', 'revisi'])->count() }} Berkas</td>
            </tr>
        </table>
    </div>

    <div class="ttd">
        <p>Jambi, {{ now()->format('d F Y') }}</p>
        <p>Notaris & PPAT,</p>
        <br><br><br><br>
        <p><strong><u>MUHAMMAD BAIQUNI HAQQI, S.H.</u></strong></p>
    </div>

    <div class="clear"></div>
</div>

</body>
</html>