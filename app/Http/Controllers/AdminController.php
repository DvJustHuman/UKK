<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminController extends Controller
{
    // DASHBOARD
    public function index()
    {
        $latest = Sensor::latest()->first();

        return view('admin.dashboard', [
            'suhu' => $latest->suhu ?? 0,
            'kelembaban' => $latest->kelembaban ?? 0
        ]);
    }

    // 🔥 KONTROL KIPAS
    public function kipas(Request $request)
    {
        $status = $request->status;

        // nanti kirim ke ESP / simpan ke database
        // contoh:
        // file_put_contents('status_kipas.txt', $status);

        return back()->with('success', 'Kipas diubah ke ' . $status);
    }

    // 📊 HISTORY (dengan filter + search)
    public function history(Request $request)
    {
        $query = Sensor::query();
        $query = $this->applyFilters($query, $request);

        $data = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();

        return view('admin.history', compact('data'));
    }

    // 📥 DOWNLOAD CSV
    public function download(Request $request)
    {
        $query = Sensor::query();
        $query = $this->applyFilters($query, $request);
        
        $data = $query->orderBy('id', 'desc')->get();

        $response = new StreamedResponse(function () use ($data) {
            $handle = fopen('php://output', 'w');
            
            // Header CSV
            fputcsv($handle, ['ID', 'Temperature (C)', 'Humidity (%)', 'Status', 'Timestamp']);

            foreach ($data as $item) {
                // Logic status yang sama dengan di Blade
                $status = '';
                if($item->suhu > 28 || $item->kelembaban > 65) {
                    $status = 'TIDAK NYAMAN (PANAS/LEMBAB)';
                } elseif($item->suhu < 18 || $item->kelembaban < 50) {
                    $status = 'TIDAK NYAMAN (DINGIN/KERING)';
                } else {
                    $status = 'NYAMAN';
                }

                fputcsv($handle, [
                    $item->id,
                    $item->suhu,
                    $item->kelembaban,
                    $status,
                    $item->created_at->toDateTimeString()
                ]);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="history_sensor_'.date('Ymd_His').'.csv"');

        return $response;
    }

    // 🛠️ PRIVATE FILTER LOGIC
    private function applyFilters($query, Request $request)
    {
        // 🔍 Search
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('suhu', 'like', '%' . $request->search . '%')
                  ->orWhere('kelembaban', 'like', '%' . $request->search . '%');
            });
        }

        // 📅 Filter tanggal (Menggunakan whereDate agar lebih akurat untuk range harian)
        if ($request->from) {
            $query->whereDate('created_at', '>=', $request->from);
        }
        if ($request->to) {
            $query->whereDate('created_at', '<=', $request->to);
        }

        // 🌡️ Filter Suhu (Min/Max)
        if ($request->min_suhu) {
            $query->where('suhu', '>=', $request->min_suhu);
        }
        if ($request->max_suhu) {
            $query->where('suhu', '<=', $request->max_suhu);
        }

        // 💧 Filter Kelembaban (Min/Max)
        if ($request->min_kelembaban) {
            $query->where('kelembaban', '>=', $request->min_kelembaban);
        }
        if ($request->max_kelembaban) {
            $query->where('kelembaban', '<=', $request->max_kelembaban);
        }

        return $query;
    }
}