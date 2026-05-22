<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Monitoring Suhu & Kelembapan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h2 { margin: 0; padding: 0; }
        .header p { margin: 5px 0; color: #555; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Histori Monitoring Museum</h2>
        <p>Dicetak pada: {{ date('d M Y H:i:s') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Waktu Perekaman</th>
                <th class="text-center">Suhu (°C)</th>
                <th class="text-center">Kelembapan (%RH)</th>

                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $index => $item)
                @php
                    $status = 'Aman';
                    if($item->suhu > 30 || $item->kelembaban > 70) {
                        $status = 'Bahaya (Panas/Lembap)';
                    } elseif($item->suhu < 29 || $item->kelembaban < 50) {
                        $status = 'Berisiko (Dingin/Kering)';
                    }
                @endphp
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td class="text-center">{{ $item->suhu }}</td>
                    <td class="text-center">{{ $item->kelembaban }}</td>

                    <td>{{ $status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Data tidak ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
