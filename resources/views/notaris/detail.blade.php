@extends('layouts.notaris')

@section('content')

<div class="container">

<div class="card shadow">

<div class="card-header bg-primary text-white">

Detail Pengajuan

</div>

<div class="card-body">

<p><b>Nama :</b> {{ $pengajuan->nama }}</p>

<p><b>Layanan :</b> {{ $pengajuan->layanan->nama_layanan }}</p>

<p><b>Status :</b> {{ ucfirst($pengajuan->status) }}</p>

<p><b>Tanggal :</b> {{ $pengajuan->tanggal_pengajuan }}</p>

<hr>

<h5>Dokumen</h5>

<table class="table table-bordered">

<thead>

<tr>

<th>Nama Dokumen</th>

<th>File</th>

</tr>

</thead>

<tbody>

@foreach($pengajuan->dokumen as $dokumen)

<tr>

<td>{{ $dokumen->nama_dokumen }}</td>

<td>

<a href="{{ asset('storage/'.$dokumen->file_dokumen) }}"
target="_blank"
class="btn btn-success btn-sm">

Lihat

</a>

</td>

</tr>

@endforeach

</tbody>

</table>

<a href="{{ route('notaris.dashboard') }}"
class="btn btn-secondary">

Kembali

</a>

</div>

</div>

</div>

@endsection