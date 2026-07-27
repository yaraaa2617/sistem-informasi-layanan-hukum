@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-bold mb-4">Dashboard Grafik</h1>

<!-- FILTER TAHUN -->
<form method="GET" class="mb-6">
    <select name="tahun" onchange="this.form.submit()" class="p-2 border rounded">
        @for($i = 2020; $i <= 2026; $i++)
            <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>
                {{ $i }}
            </option>
        @endfor
    </select>
</form>

<div class="grid grid-cols-2 gap-6">

    <!-- CHART BULAN -->
    <div>
        <h2 class="font-bold mb-2">Per Bulan ({{ $tahun }})</h2>
        <div style="height: 350px;">
            <canvas id="chartBulan"></canvas>
        </div>
    </div>

    <!-- CHART LAYANAN -->
    <div>
        <h2 class="font-bold mb-2">Per Layanan</h2>
        <div style="height: 350px;">
            <canvas id="chartLayanan"></canvas>
        </div>
    </div>

</div>

<!-- DETAIL -->
<div class="mt-6 bg-white p-4 shadow rounded">
    <h2 class="font-bold mb-2">Detail Data Pengajuan</h2>
    <div id="detailBox">Klik grafik bulan untuk lihat data</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const perBulan = @json($perBulan);
const perLayanan = @json($perLayanan);
const tahun = @json($tahun);

/* CHART BULAN */
let chartBulan = new Chart(document.getElementById('chartBulan'), {
    type: 'bar',
    data: {
        labels: perBulan.map(i => 'Bulan ' + i.bulan),
        datasets: [{
            label: 'Pengajuan',
            data: perBulan.map(i => i.total),
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});

/* CHART LAYANAN */
new Chart(document.getElementById('chartLayanan'), {
    type: 'pie',
    data: {
        labels: perLayanan.map(i => i.layanan),
        datasets: [{
            data: perLayanan.map(i => i.total),
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});

/* CLICK CHART BULAN */
chartBulan.canvas.onclick = function(evt) {

    const points = chartBulan.getElementsAtEventForMode(
        evt,
        'nearest',
        { intersect: true },
        true
    );

    if (!points.length) return;

    const index = points[0].index;
    const bulan = perBulan[index].bulan;

    fetch(`/admin/grafik/detail?tahun=${tahun}&bulan=${bulan}`)
        .then(res => res.json())
        .then(data => {

            let html = '';

            if (data.length === 0) {
                html = `<p class="text-gray-500">Tidak ada data</p>`;
            } else {
                data.forEach(item => {
                    html += `
                        <div class="p-2 border-b">
                            <b>${item.layanan}</b> - ${item.status}<br>
                            <small>${item.created_at}</small>
                        </div>
                    `;
                });
            }

            document.getElementById('detailBox').innerHTML = html;
        });
};

</script>

@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const bulanData = @json($perBulan);
const layananData = @json($perLayanan);

const namaBulan = {
    1: 'Januari',
    2: 'Februari',
    3: 'Maret',
    4: 'April',
    5: 'Mei',
    6: 'Juni',
    7: 'Juli',
    8: 'Agustus',
    9: 'September',
    10: 'Oktober',
    11: 'November',
    12: 'Desember'
};

// Grafik Bulanan
new Chart(document.getElementById('chartBulan'), {
    type: 'bar',
    data: {
        labels: bulanData.map(item => namaBulan[item.bulan]),
        datasets: [{
            label: 'Jumlah Pengajuan',
            data: bulanData.map(item => item.total)
        }]
    }
});

// Grafik Layanan
new Chart(document.getElementById('chartLayanan'), {
    type: 'pie',
    data: {
        labels: layananData.map(item => item.layanan),
        datasets: [{
            data: layananData.map(item => item.total)
        }]
    }
});
</script>
