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

    <table>

            <td class="header">

                <h2>KANTOR NOTARIS & PPAT</h2>

                <h1>MUHAMMAD BAIQUNI HAQQI, S.H.</h1>

                <p>
                    Jl. Prof. M. Yamin, SH No.25E,
                    Payo Lebar, Jelutung, Kota Jambi
                </p>

                <p>
                    Telp. 0813-6885-0124
                </p>

                <p>
                    Email : notaris@gmail.com
                </p>

            </td>
    </table>

</div>

{{-- JUDUL --}}
<div class="judul">

    <h2>SURAT PEMANGGILAN KLIEN</h2>

    <p>
        Nomor :
        {{ sprintf('%03d', $pengajuan->id) }}/SPK/{{ date('Y') }}
    </p>

</div>

{{-- PENERIMA --}}
<p>
    Kepada Yth,
    <br>
    <b>{{ $pengajuan->nama }}</b>
    <br>
    Di Tempat
</p>

{{-- ISI --}}
<div class="isi">

    <p>
        Dengan hormat,
    </p>

    <p>
        Sehubungan dengan pengajuan layanan
        <b>{{ $pengajuan->layanan }}</b>,
        kami mengundang Saudara/i untuk hadir ke Kantor
        Notaris & PPAT Muhammad Baiquni Haqqi, S.H.
        guna melanjutkan proses administrasi dan
        penandatanganan dokumen yang diperlukan.
    </p>

</div>

{{-- DETAIL --}}
<div class="detail">

    <table>

        <tr>
            <td width="180">Nama Klien</td>
            <td>: {{ $pengajuan->nama }}</td>
        </tr>

        <tr>
            <td>Layanan</td>
            <td>: {{ $pengajuan->layanan }}</td>
        </tr>

        <tr>
            <td>Tanggal Surat</td>
            <td>: {{ now()->format('d F Y') }}</td>
        </tr>

        <tr>
            <td>Jadwal Kehadiran</td>
            <td>: {{ now()->addDays(2)->format('d F Y') }}</td>
        </tr>

        <tr>
            <td>Lokasi</td>
            <td>: Kantor Notaris & PPAT Muhammad Baiquni Haqqi, S.H.</td>
        </tr>

    </table>

</div>

{{-- PERSYARATAN --}}
<p>
    <b>Persyaratan yang wajib dibawa:</b>
</p>

<ul>
    <li>KTP Asli</li>
    <li>Kartu Keluarga Asli</li>
    <li>Bukti Pengajuan</li>
    <li>Dokumen pendukung lainnya (jika diperlukan)</li>
</ul>

<p>
    Demikian surat pemanggilan ini kami sampaikan.
    Atas perhatian dan kehadiran Saudara/i,
    kami ucapkan terima kasih.
</p>

{{-- TANDA TANGAN --}}
<div class="ttd">

    Jambi, {{ now()->format('d F Y') }}

    <br><br>

    Hormat Kami,

    <br>

    Kantor Notaris & PPAT

    <br><br><br>

    <b>
        MUHAMMAD BAIQUNI HAQQI, S.H.
    </b>

</div>

</body>
</html>
