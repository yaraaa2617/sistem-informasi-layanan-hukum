@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Laporan Pengajuan
</h1>

{{-- FILTER --}}
<div class="bg-white p-6 rounded-2xl shadow mb-6">

    <form method="GET" action="{{ route('admin.laporan') }}" class="flex gap-4 items-center">

        <select name="bulan" class="border p-3 rounded-xl">

            @for($i = 1; $i <= 12; $i++)

                <option value="{{ $i }}"
                    {{ $bulan == $i ? 'selected' : '' }}>

                    {{ DateTime::createFromFormat('!m', $i)->format('F') }}

                </option>

            @endfor

        </select>

        <select name="tahun" class="border p-3 rounded-xl">

            @for($i = date('Y'); $i >= 2020; $i--)

                <option value="{{ $i }}"
                    {{ $tahun == $i ? 'selected' : '' }}>

                    {{ $i }}

                </option>

            @endfor

        </select>

        <button class="bg-[#6B3F2A] text-white px-5 py-3 rounded-xl">
            Tampilkan
        </button>

        <a href="{{ route('admin.laporan.pdf', [
                'bulan' => $bulan,
                'tahun' => $tahun
            ]) }}"
           class="bg-green-600 text-white px-5 py-3 rounded-xl">

            Cetak PDF

        </a>

    </form>

</div>

{{-- KARTU RINGKASAN --}}
<div class="grid grid-cols-3 gap-6 mb-8">

    <div class="bg-[#A77F60] text-white p-6 rounded-2xl shadow">
        <h2>Total Data</h2>
        <p class="text-4xl font-bold mt-4">
            {{ $laporan->count() }}
        </p>
    </div>

    <div class="bg-green-600 text-white p-6 rounded-2xl shadow">
        <h2>Selesai</h2>
        <p class="text-4xl font-bold mt-4">
            {{ $laporan->where('status','selesai')->count() }}
        </p>
    </div>

    <div class="bg-blue-600 text-white p-6 rounded-2xl shadow">
        <h2>Diproses</h2>
        <p class="text-4xl font-bold mt-4">
            {{ $laporan->where('status','diproses')->count() }}
        </p>
    </div>

</div>

{{-- TABEL --}}
<div class="bg-white rounded-2xl shadow overflow-hidden">

    <table class="w-full">

        <thead class="bg-[#6B3F2A] text-white">

            <tr>
                <th class="p-4 text-left">No</th>
                <th class="p-4 text-left">Nama</th>
                <th class="p-4 text-left">Layanan</th>
                <th class="p-4 text-left">Tanggal</th>
                <th class="p-4 text-left">Status</th>
            </tr>

        </thead>

        <tbody>

            @forelse($laporan as $item)

            <tr class="border-b">

                <td class="p-4">
                    {{ $loop->iteration }}
                </td>

                <td class="p-4">
                    {{ $item->nama }}
                </td>

                <td class="p-4">
                    {{ $item->layanan }}
                </td>

                <td class="p-4">
                    {{ $item->created_at->format('d M Y') }}
                </td>

                <td class="p-4">

                    @if($item->status == 'selesai')

                        <span class="text-green-600 font-bold">
                            Selesai
                        </span>

                    @else

                        <span class="text-blue-600 font-bold">
                            Diproses
                        </span>

                    @endif

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="5" class="text-center p-6 text-gray-500">
                    Tidak ada data laporan
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection
