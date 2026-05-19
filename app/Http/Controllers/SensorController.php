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


  DB::table('sensors')->insert([
        'suhu' => $request->suhu,
        'kelembaban' => $request->kelembaban,
        'created_at' => now(),
        'updated_at' => now()
    ]);
                                                

        return response()->json(['message' => 'OK']);
    }

    public function index()
{
$latest = DB::table('sensors')->latest()->first();
$data = DB::table('sensors')->latest()->limit(10)->get();

    return view('user.dashboard', compact('latest', 'data'));
}

public function latest()
{
return DB::table('sensors')
    ->orderBy('id','desc')
    ->limit(100)
    ->get();
}
}