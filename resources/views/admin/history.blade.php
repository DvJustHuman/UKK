<x-app-layout>
    <div class="p-6 max-w-7xl mx-auto space-y-8">

        <!-- HEADER -->
        <div class="relative overflow-hidden bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 md:p-10 rounded-[2.5rem] shadow-xl shadow-zinc-200/50 dark:shadow-none transition-all duration-300">
            <div class="absolute -right-10 -top-10 text-zinc-100 dark:text-zinc-800/50 text-9xl select-none font-black opacity-20 pointer-events-none">
                LOGS
            </div>

            <div class="relative z-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-zinc-900 dark:text-zinc-100 tracking-tight mb-2">
                    History <span class="text-sky-500">Monitoring</span>
                </h1>
                <p class="text-zinc-500 dark:text-zinc-400 font-medium flex items-center gap-2">
                    📍 Riwayat Data Suhu Ruang Pameran Museum
                </p>

                <div class="flex flex-wrap gap-3 mt-6">
                    <div class="bg-sky-50 dark:bg-sky-500/10 border border-sky-200 dark:border-sky-500/20 px-4 py-2 text-sky-600 dark:text-sky-400 text-xs font-black uppercase tracking-widest rounded-2xl">
                        Total Data: {{ $data->total() }}
                    </div>
                </div>

                <!-- QUICK DATE FILTERS -->
                <div class="flex flex-wrap gap-3 mt-4">
                    <a href="{{ route('admin.history', ['from' => now()->toDateString(), 'to' => now()->toDateString()]) }}" 
                       class="px-4 py-2 text-[10px] font-black uppercase tracking-widest rounded-xl transition-all {{ request('from') == now()->toDateString() && request('to') == now()->toDateString() ? 'bg-sky-500 text-white shadow-lg shadow-sky-500/25' : 'bg-zinc-100 dark:bg-zinc-800 hover:bg-sky-500 hover:text-white text-zinc-600 dark:text-zinc-300' }}">
                        📅 Hari Ini
                    </a>
                    <a href="{{ route('admin.history', ['from' => now()->startOfWeek()->toDateString(), 'to' => now()->endOfWeek()->toDateString()]) }}" 
                       class="px-4 py-2 text-[10px] font-black uppercase tracking-widest rounded-xl transition-all {{ request('from') == now()->startOfWeek()->toDateString() && request('to') == now()->endOfWeek()->toDateString() ? 'bg-sky-500 text-white shadow-lg shadow-sky-500/25' : 'bg-zinc-100 dark:bg-zinc-800 hover:bg-sky-500 hover:text-white text-zinc-600 dark:text-zinc-300' }}">
                        📅 Minggu Ini
                    </a>
                    <a href="{{ route('admin.history', ['from' => now()->startOfMonth()->toDateString(), 'to' => now()->endOfMonth()->toDateString()]) }}" 
                       class="px-4 py-2 text-[10px] font-black uppercase tracking-widest rounded-xl transition-all {{ request('from') == now()->startOfMonth()->toDateString() && request('to') == now()->endOfMonth()->toDateString() ? 'bg-sky-500 text-white shadow-lg shadow-sky-500/25' : 'bg-zinc-100 dark:bg-zinc-800 hover:bg-sky-500 hover:text-white text-zinc-600 dark:text-zinc-300' }}">
                        📅 Bulan Ini
                    </a>
                </div>
            </div>
        </div>

        <!-- STATS / AVERAGES CARD ROW -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Daily Average -->
            <div class="relative overflow-hidden bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 rounded-[2.5rem] shadow-xl shadow-zinc-200/30 dark:shadow-none transition-all duration-300">
                <div class="absolute -right-8 -bottom-8 text-zinc-100 dark:text-zinc-800/10 text-8xl select-none font-black opacity-30 pointer-events-none">
                    DAILY
                </div>
                <div class="relative z-10">
                    <span class="text-xs font-black uppercase tracking-widest text-sky-500">📈 Rata-Rata Harian</span>
                    <h3 class="text-sm font-bold text-zinc-400 dark:text-zinc-500 mt-1">24 Jam Terakhir</h3>
                    <div class="grid grid-cols-2 gap-6 mt-6">
                        <div>
                            <span class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest block mb-1">Suhu</span>
                            <span class="text-2xl font-extrabold text-zinc-900 dark:text-zinc-100">
                                {{ $dailyAvg && $dailyAvg->avg_suhu ? number_format($dailyAvg->avg_suhu, 1) : '--' }}°C
                            </span>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest block mb-1">Kelembaban</span>
                            <span class="text-2xl font-extrabold text-zinc-900 dark:text-zinc-100">
                                {{ $dailyAvg && $dailyAvg->avg_kelembaban ? number_format($dailyAvg->avg_kelembaban, 1) : '--' }}%
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Weekly Average -->
            <div class="relative overflow-hidden bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 rounded-[2.5rem] shadow-xl shadow-zinc-200/30 dark:shadow-none transition-all duration-300">
                <div class="absolute -right-8 -bottom-8 text-zinc-100 dark:text-zinc-800/10 text-8xl select-none font-black opacity-30 pointer-events-none">
                    WEEKLY
                </div>
                <div class="relative z-10">
                    <span class="text-xs font-black uppercase tracking-widest text-indigo-500">📆 Rata-Rata Mingguan</span>
                    <h3 class="text-sm font-bold text-zinc-400 dark:text-zinc-500 mt-1">7 Hari Terakhir</h3>
                    <div class="grid grid-cols-2 gap-6 mt-6">
                        <div>
                            <span class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest block mb-1">Suhu</span>
                            <span class="text-2xl font-extrabold text-zinc-900 dark:text-zinc-100">
                                {{ $weeklyAvg && $weeklyAvg->avg_suhu ? number_format($weeklyAvg->avg_suhu, 1) : '--' }}°C
                            </span>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest block mb-1">Kelembaban</span>
                            <span class="text-2xl font-extrabold text-zinc-900 dark:text-zinc-100">
                                {{ $weeklyAvg && $weeklyAvg->avg_kelembaban ? number_format($weeklyAvg->avg_kelembaban, 1) : '--' }}%
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Stats -->
            <div class="relative overflow-hidden bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 rounded-[2.5rem] shadow-xl shadow-zinc-200/30 dark:shadow-none transition-all duration-300">
                <div class="absolute -right-8 -bottom-8 text-zinc-100 dark:text-zinc-800/10 text-8xl select-none font-black opacity-30 pointer-events-none">
                    STATS
                </div>
                <div class="relative z-10">
                    <span class="text-xs font-black uppercase tracking-widest text-emerald-500">🛡️ Keamanan Koleksi</span>
                    <h3 class="text-sm font-bold text-zinc-400 dark:text-zinc-500 mt-1">30 Hari Terakhir</h3>
                    <div class="mt-6">
                        <span class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest block mb-1">Rasio Kondisi Aman</span>
                        <div class="flex items-center gap-3">
                            <span class="text-3xl font-extrabold text-zinc-900 dark:text-zinc-100">
                                {{ $securityStats }}%
                            </span>
                            @if($securityStats >= 80)
                                <span class="px-3 py-1 bg-emerald-500/10 text-emerald-500 text-[10px] font-black uppercase tracking-widest rounded-full border border-emerald-500/20">Optimal</span>
                            @elseif($securityStats >= 50)
                                <span class="px-3 py-1 bg-amber-500/10 text-amber-500 text-[10px] font-black uppercase tracking-widest rounded-full border border-amber-500/20">Waspada</span>
                            @else
                                <span class="px-3 py-1 bg-red-500/10 text-red-500 text-[10px] font-black uppercase tracking-widest rounded-full border border-red-500/20">Kritis</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FILTER AREA -->
        <div x-data="{ 
            filterType: '{{ request('min_suhu') ? 'min_suhu' : (request('max_suhu') ? 'max_suhu' : (request('min_kelembaban') ? 'min_kelembaban' : (request('max_kelembaban') ? 'max_kelembaban' : (request('from') || request('to') ? 'tanggal' : (request('kondisi') ? 'kondisi' : (request('ruang_museum') ? 'ruang_museum' : (request('jenis_koleksi') ? 'jenis_koleksi' : ''))))))) }}'
        }" class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 rounded-[2.5rem] shadow-xl shadow-zinc-200/30 dark:shadow-none">
            <form action="{{ route('admin.history') }}" method="GET" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 items-end">

                <!-- Select Filter Type -->
                <div class="space-y-2 col-span-1">
                    <label class="flex items-center gap-2 text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest ml-1">
                        🎯 Jenis Parameter
                    </label>
                    <div class="relative">
                        <select x-model="filterType" class="w-full h-12 bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 text-xs font-bold focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all pl-4 pr-10 appearance-none cursor-pointer">
                            <option value="">-- Pilih Jenis Filter --</option>
                            <option value="kondisi">Kondisi Ruangan</option>
                            <option value="ruang_museum">Ruang Museum</option>
                            <option value="jenis_koleksi">Jenis Koleksi</option>
                            <option value="min_suhu">Suhu Minimal (°C)</option>
                            <option value="max_suhu">Suhu Maksimal (°C)</option>
                            <option value="min_kelembaban">Kelembaban Minimal (%RH)</option>
                            <option value="max_kelembaban">Kelembaban Maksimal (%RH)</option>
                            <option value="tanggal">Rentang Tanggal & Jam</option>
                        </select>
                    </div>
                </div>

                <!-- Dynamic Input Container -->
                <div class="col-span-1 lg:col-span-1">
                    <!-- Default state / No filter -->
                    <div x-show="filterType === ''" class="space-y-2">
                        <label class="text-xs font-bold text-zinc-400 dark:text-zinc-600 uppercase tracking-widest block ml-1">
                            Masukkan Nilai
                        </label>
                        <input type="text" disabled placeholder="Pilih jenis filter"
                            class="w-full h-12 bg-zinc-100 dark:bg-zinc-950/40 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-400 dark:text-zinc-600 text-xs px-4 cursor-not-allowed">
                    </div>

                    <!-- Min Temperature -->
                    <div x-show="filterType === 'min_suhu'" x-cloak class="space-y-2">
                        <label class="flex items-center gap-2 text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest ml-1">
                            🌡️ Suhu Minimal (°C)
                        </label>
                        <input type="number" step="any" name="min_suhu" value="{{ request('min_suhu') }}" placeholder="Contoh: 20" :disabled="filterType !== 'min_suhu'"
                            class="w-full h-12 bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 text-sm focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all px-4">
                    </div>

                    <!-- Max Temperature -->
                    <div x-show="filterType === 'max_suhu'" x-cloak class="space-y-2">
                        <label class="flex items-center gap-2 text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest ml-1">
                            🌡️ Suhu Maksimal (°C)
                        </label>
                        <input type="number" step="any" name="max_suhu" value="{{ request('max_suhu') }}" placeholder="Contoh: 28" :disabled="filterType !== 'max_suhu'"
                            class="w-full h-12 bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 text-sm focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all px-4">
                    </div>

                    <!-- Min Humidity -->
                    <div x-show="filterType === 'min_kelembaban'" x-cloak class="space-y-2">
                        <label class="flex items-center gap-2 text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest ml-1">
                            💧 Lembab Minimal (%RH)
                        </label>
                        <input type="number" step="any" name="min_kelembaban" value="{{ request('min_kelembaban') }}" placeholder="Contoh: 50" :disabled="filterType !== 'min_kelembaban'"
                            class="w-full h-12 bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 text-sm focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all px-4">
                    </div>

                    <!-- Max Humidity -->
                    <div x-show="filterType === 'max_kelembaban'" x-cloak class="space-y-2">
                        <label class="flex items-center gap-2 text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest ml-1">
                            💧 Lembab Maksimal (%RH)
                        </label>
                        <input type="number" step="any" name="max_kelembaban" value="{{ request('max_kelembaban') }}" placeholder="Contoh: 65" :disabled="filterType !== 'max_kelembaban'"
                            class="w-full h-12 bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 text-sm focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all px-4">
                    </div>

                    <!-- Kondisi Ruangan -->
                    <div x-show="filterType === 'kondisi'" x-cloak class="space-y-2">
                        <label class="flex items-center gap-2 text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest ml-1">
                            🏛️ Kondisi Ruangan
                        </label>
                        <select name="kondisi" :disabled="filterType !== 'kondisi'"
                            class="w-full h-12 bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 text-sm focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all px-4">
                            <option value="">-- Pilih Kondisi --</option>
                            <option value="aman" {{ request('kondisi') == 'aman' ? 'selected' : '' }}>Aman</option>
                            <option value="lembap" {{ request('kondisi') == 'lembap' ? 'selected' : '' }}>Terlalu Lembap</option>
                            <option value="panas" {{ request('kondisi') == 'panas' ? 'selected' : '' }}>Terlalu Panas</option>
                            <option value="berisiko" {{ request('kondisi') == 'berisiko' ? 'selected' : '' }}>Berisiko Merusak Lukisan</option>
                        </select>
                    </div>

                    <!-- Ruang Museum -->
                    <div x-show="filterType === 'ruang_museum'" x-cloak class="space-y-2">
                        <label class="flex items-center gap-2 text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest ml-1">
                            🖼️ Ruang Museum
                        </label>
                        <select name="ruang_museum" :disabled="filterType !== 'ruang_museum'"
                            class="w-full h-12 bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 text-sm focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all px-4">
                            <option value="">-- Pilih Ruang Museum --</option>
                            <option value="Ruang Pameran 1" {{ request('ruang_museum') == 'Ruang Pameran 1' ? 'selected' : '' }}>Ruang Pameran 1</option>
                            <option value="Ruang Pameran 2" {{ request('ruang_museum') == 'Ruang Pameran 2' ? 'selected' : '' }}>Ruang Pameran 2</option>
                            <option value="Galeri Utama" {{ request('ruang_museum') == 'Galeri Utama' ? 'selected' : '' }}>Galeri Utama</option>
                        </select>
                    </div>

                    <!-- Jenis Koleksi -->
                    <div x-show="filterType === 'jenis_koleksi'" x-cloak class="space-y-2">
                        <label class="flex items-center gap-2 text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest ml-1">
                            🏺 Jenis Koleksi
                        </label>
                        <select name="jenis_koleksi" :disabled="filterType !== 'jenis_koleksi'"
                            class="w-full h-12 bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 text-sm focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all px-4">
                            <option value="">-- Pilih Jenis Koleksi --</option>
                            <option value="Lukisan" {{ request('jenis_koleksi') == 'Lukisan' ? 'selected' : '' }}>Lukisan</option>
                            <option value="Patung" {{ request('jenis_koleksi') == 'Patung' ? 'selected' : '' }}>Patung</option>
                            <option value="Tekstil" {{ request('jenis_koleksi') == 'Tekstil' ? 'selected' : '' }}>Tekstil</option>
                            <option value="Artefak Logam" {{ request('jenis_koleksi') == 'Artefak Logam' ? 'selected' : '' }}>Artefak Logam</option>
                        </select>
                    </div>
                </div>

                <!-- Date Range (From & To) -->
                <div x-show="filterType === 'tanggal'" x-cloak class="col-span-1 md:col-span-2 lg:col-span-2 grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest ml-1">
                            📅 Dari Waktu
                        </label>
                        <input type="datetime-local" name="from" value="{{ request('from') }}" :disabled="filterType !== 'tanggal'"
                            class="w-full h-12 bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 text-xs focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all px-3">
                    </div>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest ml-1">
                            📅 Sampai Waktu
                        </label>
                        <input type="datetime-local" name="to" value="{{ request('to') }}" :disabled="filterType !== 'tanggal'"
                            class="w-full h-12 bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 text-xs focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all px-3">
                    </div>
                </div>

                <!-- Spacer to push actions to right when date is not active -->
                <div x-show="filterType !== 'tanggal'" class="hidden lg:block lg:col-span-1"></div>

                <!-- Actions Container -->
                <div class="col-span-1 lg:col-span-1 grid grid-cols-2 gap-4">
                    <!-- Action: Filter -->
                    <button type="submit" class="h-12 flex items-center justify-center gap-2 bg-sky-500 hover:bg-sky-600 text-white text-xs font-black uppercase tracking-widest rounded-2xl transition-all shadow-lg shadow-sky-500/25 whitespace-nowrap">
                        🔍 Cari
                    </button>

                    <!-- Action: Reset -->
                    <a href="{{ route('admin.history') }}" class="h-12 flex items-center justify-center gap-2 bg-zinc-50 hover:bg-zinc-100 dark:bg-zinc-800 dark:hover:bg-zinc-700 text-zinc-700 dark:text-zinc-300 text-xs font-black uppercase tracking-widest rounded-2xl transition-all shadow-sm border border-zinc-200 dark:border-zinc-700 whitespace-nowrap" title="Reset Filter">
                        🔄 Reset
                    </a>
                </div>

                @if(Auth::check() && Auth::user()->role == 'admin')
                    <!-- Action: Download & Print -->
                    <div class="col-span-1 md:col-span-2 lg:col-span-4 mt-6 pt-6 border-t border-zinc-100 dark:border-zinc-800 flex flex-wrap justify-end gap-4">
                        <a href="{{ route('admin.history.pdf', request()->all()) }}" target="_blank" class="h-12 px-8 flex items-center justify-center gap-2 bg-indigo-500 hover:bg-indigo-600 text-white text-xs font-black uppercase tracking-widest rounded-2xl transition-all shadow-lg shadow-indigo-500/20 whitespace-nowrap" title="Unduh PDF">
                            🖨️ Cetak PDF
                        </a>
                        <a href="{{ route('admin.history.download', request()->all()) }}" class="h-12 px-8 flex items-center justify-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-black uppercase tracking-widest rounded-2xl transition-all shadow-lg shadow-emerald-500/20 whitespace-nowrap" title="Download Excel (CSV)">
                            📥 Unduh Excel (CSV)
                        </a>
                    </div>
                @endif
            </form>
        </div>

        <!-- TABLE AREA -->
        <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-[2.5rem] shadow-2xl shadow-zinc-200/50 dark:shadow-none overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left whitespace-nowrap">
                    <thead>
                        <tr class="bg-zinc-50/50 dark:bg-zinc-950/50 border-b border-zinc-100 dark:border-zinc-800 text-zinc-500 dark:text-zinc-400 text-xs font-black uppercase tracking-[0.2em]">
                            <th class="px-8 py-6">No.</th>
                            <th class="px-8 py-6">Parameter Lingkungan</th>
                            <th class="px-8 py-6 text-center">Ruang & Koleksi</th>
                            <th class="px-8 py-6 text-center">Status Analitik</th>
                            <th class="px-8 py-6 text-right">Waktu Perekaman</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800">
                        @forelse ($data as $item)
                        <tr class="group hover:bg-sky-50/30 dark:hover:bg-sky-500/5 transition-colors">
                            
                            <!-- ID -->
                            <td class="px-8 py-6">
                                <div class="text-sm font-black text-zinc-900 dark:text-zinc-100">{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</div>
                            </td>

                            <!-- METRICS -->
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-sky-100 dark:bg-sky-500/20 flex items-center justify-center text-sky-600 dark:text-sky-400">
                                            🌡️
                                        </div>
                                        <div>
                                            <div class="text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider mb-0.5">Suhu</div>
                                            <div class="text-sm font-black text-sky-600 dark:text-sky-400">{{ $item->suhu }}°C</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-indigo-100 dark:bg-indigo-500/20 flex items-center justify-center text-indigo-600 dark:text-indigo-400">
                                            💧
                                        </div>
                                        <div>
                                            <div class="text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider mb-0.5">Lembap</div>
                                            <div class="text-sm font-black text-indigo-600 dark:text-indigo-400">{{ $item->kelembaban }}%</div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!-- RUANG & KOLEKSI -->
                            <td class="px-8 py-6 text-center">
                                <div class="text-xs font-bold text-zinc-700 dark:text-zinc-300">
                                    {{ $item->ruang_museum ?? 'Semua Ruang' }}
                                </div>
                                <div class="text-[10px] font-medium text-zinc-500 mt-1">
                                    {{ $item->jenis_koleksi ?? 'Umum' }}
                                </div>
                            </td>

                            <!-- STATUS -->
                            <td class="px-8 py-6 text-center">
                                @if($item->suhu >= 18 && $item->suhu <= 28 && $item->kelembaban >= 50 && $item->kelembaban <= 65)
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-100/50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 text-xs font-bold border border-emerald-200 dark:border-emerald-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aman
                                    </span>
                                @elseif($item->suhu > 28 || $item->kelembaban > 65)
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-red-100/50 dark:bg-red-500/10 text-red-700 dark:text-red-400 text-xs font-bold border border-red-200 dark:border-red-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Bahaya (Panas/Lembap)
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-100/50 dark:bg-amber-500/10 text-amber-700 dark:text-amber-400 text-xs font-bold border border-amber-200 dark:border-amber-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Ekstrem (Dingin/Kering)
                                    </span>
                                @endif
                            </td>

                            <!-- TIMESTAMP -->
                            <td class="px-8 py-6 text-right">
                                <div class="text-sm font-bold text-zinc-700 dark:text-zinc-300">{{ $item->created_at->format('d M Y') }}</div>
                                <div class="text-xs text-zinc-500 font-medium mt-0.5">{{ $item->created_at->format('H:i:s') }}</div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-8 py-12 text-center">
                                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-zinc-100 dark:bg-zinc-800 text-2xl mb-4">
                                    🔍
                                </div>
                                <h3 class="text-zinc-900 dark:text-zinc-100 text-sm font-bold mb-1">Data Tidak Ditemukan</h3>
                                <p class="text-zinc-500 text-xs">Coba ubah filter pencarian Anda</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- PAGINATION -->
        <div class="flex justify-center">
            <div class="bg-white dark:bg-zinc-900 p-2 rounded-2xl border border-zinc-200 dark:border-zinc-800 shadow-xl shadow-zinc-200/50 dark:shadow-none">
                {{ $data->links() }}
            </div>
        </div>

    </div>
</x-app-layout>