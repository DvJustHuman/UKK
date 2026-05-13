<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;

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

        // 🔍 Search (Opsional, jika masih ingin ada search teks)
        if ($request->search) {
            $query->where('suhu', 'like', '%' . $request->search . '%')
                  ->orWhere('kelembaban', 'like', '%' . $request->search . '%');
        }

        // 📅 Filter tanggal
        if ($request->from && $request->to) {
            $query->whereBetween('created_at', [$request->from, $request->to]);
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

        $data = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();

        return view('admin.history', compact('data'));
    }
}