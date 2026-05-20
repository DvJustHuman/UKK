<?php

namespace App\Http\Controllers;

use App\Models\Sensor;

class UserDashboardController extends Controller
{
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
}