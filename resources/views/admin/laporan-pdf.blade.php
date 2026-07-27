<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<style>

body{
    font-family: DejaVu Sans, sans-serif;
    font-size:12px;
    margin:25px;
}

.kop{
    width:100%;
    border-bottom:3px solid black;
    padding-bottom:15px;
    margin-bottom:25px;
}

.logo{
    width:85px;
    float:left;
    margin-right:20px;
}

.header{
    text-align:center;
}

.header h1{
    margin:0;
    font-size:28px;
}

.header h2{
    margin:5px 0;
    font-size:18px;
}

.header p{
    margin:3px 0;
    font-size:12px;
}

.clear{
    clear:both;
}

.laporan-title{
    text-align:center;
    margin:25px 0;
}

.laporan-title h2{
    margin-bottom:10px;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:15px;
}

th{
    background:#efefef;
}

th, td{
    border:1px solid black;
    padding:8px;
    text-align:left;
}

.ttd{
    width:300px;
    margin-left:auto;
    margin-top:60px;
    text-align:center;
}

</style>
</head>

<body>

{{-- KOP SURAT --}}
<div class="kop">

    <div class="header">

        <h1>KANTOR NOTARIS & PPAT</h1>

        <h2>MUHAMMAD BAIQUNI HAQQI, S.H.</h2>

        <p>
            Jl. Prof M. Yamin SH No.25E,
            Payo Lebar, Jelutung, Kota Jambi
        </p>

        <p>Telp. 0813-6885-0124</p>

        <p>Email : notaris@gmail.com</p>

    </div>

    <div class="clear"></div>

</div>

{{-- JUDUL --}}
<div class="laporan-title">

    <h2>LAPORAN PENGAJUAN KLIEN</h2>

    <p>
        Bulan :
        {{ DateTime::createFromFormat('!m', $bulan)->format('F') }}
        {{ $tahun }}
    </p>

</div>

{{-- TABEL --}}
<table>

    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="15%">Tanggal</th>
            <th width="20%">Nama</th>
            <th width="25%">Layanan</th>
            <th width="15%">Telepon</th>
            <th width="20%">Status</th>
        </tr>
    </thead>

    <tbody>

        @forelse($laporan as $item)

        <tr>
            <td>{{ $loop->iteration }}</td>

            <td>
                {{ $item->created_at->format('d-m-Y') }}
            </td>

            <td>
                {{ $item->nama }}
            </td>

            <td>
                {{ $item->layanan }}
            </td>

            <td>
    {{
        $item->telepon_pemohon
        ?? $item->telepon_pembeli
        ?? $item->telepon_penjual
        ?? '-'
    }}
</td>

            <td>
                {{ ucfirst($item->status) }}
            </td>
        </tr>

        @empty

        <tr>
            <td colspan="6" style="text-align:center;">
                Tidak ada data
            </td>
        </tr>

        @endforelse

    </tbody>

</table>

{{-- TANDA TANGAN --}}
<div class="ttd">

    <p>
        Jambi, {{ now()->format('d F Y') }}
    </p>

    <p>Hormat Kami,</p>

    <br><br><br><br>

    <b>
        MUHAMMAD BAIQUNI HAQQI, S.H.
    </b>

</div>

</body>
</html>
