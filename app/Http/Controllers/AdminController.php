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

        // Dashboard Statistik
        $todayAvg = \Illuminate\Support\Facades\DB::table('sensors')
            ->whereDate('created_at', now()->toDateString())
            ->selectRaw('AVG(suhu) as avg_suhu, AVG(kelembaban) as avg_kelembaban')
            ->first();
            
        $amanCount = \Illuminate\Support\Facades\DB::table('sensors')
            ->whereBetween('suhu', [18, 28])
            ->whereBetween('kelembaban', [50, 65])
            ->count();
            
        $bahayaCount = \Illuminate\Support\Facades\DB::table('sensors')
            ->where(function($q) {
                $q->where('suhu', '<', 18)
                  ->orWhere('suhu', '>', 28)
                  ->orWhere('kelembaban', '<', 50)
                  ->orWhere('kelembaban', '>', 65);
            })
            ->count();

        return view('dashboard', [
            'suhu' => $latest->suhu ?? 0,
            'kelembaban' => $latest->kelembaban ?? 0,
            'todayAvg' => $todayAvg,
            'amanCount' => $amanCount,
            'bahayaCount' => $bahayaCount,
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

        // Hitung rata-rata harian (24 jam terakhir)
        $dailyAvg = \Illuminate\Support\Facades\DB::table('sensors')
            ->where('created_at', '>=', now()->subDay())
            ->selectRaw('AVG(suhu) as avg_suhu, AVG(kelembaban) as avg_kelembaban')
            ->first();

        // Hitung rata-rata mingguan (7 hari terakhir)
        $weeklyAvg = \Illuminate\Support\Facades\DB::table('sensors')
            ->where('created_at', '>=', now()->subWeek())
            ->selectRaw('AVG(suhu) as avg_suhu, AVG(kelembaban) as avg_kelembaban')
            ->first();

        // Statistik Keamanan Koleksi (30 hari terakhir)
        $total30Days = \Illuminate\Support\Facades\DB::table('sensors')
            ->where('created_at', '>=', now()->subDays(30))
            ->count();
            
        $safe30Days = \Illuminate\Support\Facades\DB::table('sensors')
            ->where('created_at', '>=', now()->subDays(30))
            ->whereBetween('suhu', [18, 28])
            ->whereBetween('kelembaban', [50, 65])
            ->count();
            
        $securityStats = $total30Days > 0 ? round(($safe30Days / $total30Days) * 100, 1) : 0;

        return view('admin.history', compact('data', 'dailyAvg', 'weeklyAvg', 'securityStats'));
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
            fputcsv($handle, ['ID', 'Temperature (C)', 'Humidity (%RH)', 'Status', 'Timestamp']);

            foreach ($data as $item) {
                // Logic status yang sama dengan di Blade
                $status = '';
                if($item->suhu > 25 || $item->kelembaban > 65) {
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

    // 🖨️ CETAK LAPORAN PDF
    public function pdf(Request $request)
    {
        $query = Sensor::query();
        $query = $this->applyFilters($query, $request);
        
        $data = $query->orderBy('id', 'desc')->get();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.report_pdf', compact('data'));
        
        return $pdf->download('laporan_monitoring_'.date('Ymd_His').'.pdf');
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

        // 🏛️ Filter Kondisi Ruangan
        if ($request->kondisi) {
            if ($request->kondisi === 'aman') {
                $query->whereBetween('suhu', [18, 28])
                      ->whereBetween('kelembaban', [50, 65]);
            } elseif ($request->kondisi === 'lembap') {
                $query->where('kelembaban', '>', 65);
            } elseif ($request->kondisi === 'panas') {
                $query->where('suhu', '>', 28);
            } elseif ($request->kondisi === 'berisiko') {
                $query->where(function($q) {
                    $q->where('suhu', '<', 18)
                      ->orWhere('suhu', '>', 28)
                      ->orWhere('kelembaban', '<', 50)
                      ->orWhere('kelembaban', '>', 65);
                });
            }
        }

        // 🖼️ Filter Ruang Museum
        if ($request->ruang_museum) {
            $query->where('ruang_museum', $request->ruang_museum);
        }

        // 🏺 Filter Jenis Koleksi
        if ($request->jenis_koleksi) {
            $query->where('jenis_koleksi', $request->jenis_koleksi);
        }

        return $query;
    }
}