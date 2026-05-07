<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SensorController extends Controller
{
    public function store(Request $request)
    {
        $suhu = $request->suhu;
        $kelembaban = $request->kelembaban;
if ($suhu < 20) {
    $status = 'Dingin';
} elseif ($suhu <= 30) {
    $status = 'Normal';
} else {
    $status = 'Panas';
}

DB::table('sensors')->insert([
    'suhu' => $suhu,
    'kelembaban' => $kelembaban,
    'status' => $status
]);

        return response()->json(['message' => 'OK']);
    }

    public function index()
{
$latest = DB::table('sensors')->latest()->first();
$data = DB::table('sensors')->latest()->limit(10)->get();

    return view('dashboard', compact('latest', 'data'));
}

public function latest()
{
return DB::table('sensors')
    ->orderBy('id','desc')
    ->limit(10)
    ->get();
}
}