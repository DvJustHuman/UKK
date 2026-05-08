<?php

namespace App\Http\Controllers;

use App\Models\Sensor;

class UserDashboardController extends Controller
{
    public function index()
    {
        $latest = Sensor::latest()->first();

        return view('dashboard', [
            'suhu' => $latest->suhu ?? 0,
            'kelembaban' => $latest->kelembaban ?? 0,
        ]);
    }
}