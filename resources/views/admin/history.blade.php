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
            </div>
        </div>

        <!-- STATS / AVERAGES CARD ROW -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
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
        </div>

        <!-- FILTER AREA -->
        <div x-data="{ 
            filterType: '{{ request('min_suhu') ? 'min_suhu' : (request('max_suhu') ? 'max_suhu' : (request('min_kelembaban') ? 'min_kelembaban' : (request('max_kelembaban') ? 'max_kelembaban' : (request('from') || request('to') ? 'tanggal' : '')))) }}'
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
                            <option value="min_suhu">Suhu Minimal (°C)</option>
                            <option value="max_suhu">Suhu Maksimal (°C)</option>
                            <option value="min_kelembaban">Kelembaban Minimal (%RH)</option>
                            <option value="max_kelembaban">Kelembaban Maksimal (%RH)</option>
                            <option value="tanggal">Rentang Tanggal</option>
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
                        <input type="number" name="min_suhu" value="{{ request('min_suhu') }}" placeholder="Contoh: 20" :disabled="filterType !== 'min_suhu'"
                            class="w-full h-12 bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 text-sm focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all px-4">
                    </div>

                    <!-- Max Temperature -->
                    <div x-show="filterType === 'max_suhu'" x-cloak class="space-y-2">
                        <label class="flex items-center gap-2 text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest ml-1">
                            🌡️ Suhu Maksimal (°C)
                        </label>
                        <input type="number" name="max_suhu" value="{{ request('max_suhu') }}" placeholder="Contoh: 28" :disabled="filterType !== 'max_suhu'"
                            class="w-full h-12 bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 text-sm focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all px-4">
                    </div>

                    <!-- Min Humidity -->
                    <div x-show="filterType === 'min_kelembaban'" x-cloak class="space-y-2">
                        <label class="flex items-center gap-2 text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest ml-1">
                            💧 Lembab Minimal (%RH)
                        </label>
                        <input type="number" name="min_kelembaban" value="{{ request('min_kelembaban') }}" placeholder="Contoh: 50" :disabled="filterType !== 'min_kelembaban'"
                            class="w-full h-12 bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 text-sm focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all px-4">
                    </div>

                    <!-- Max Humidity -->
                    <div x-show="filterType === 'max_kelembaban'" x-cloak class="space-y-2">
                        <label class="flex items-center gap-2 text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest ml-1">
                            💧 Lembab Maksimal (%RH)
                        </label>
                        <input type="number" name="max_kelembaban" value="{{ request('max_kelembaban') }}" placeholder="Contoh: 65" :disabled="filterType !== 'max_kelembaban'"
                            class="w-full h-12 bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 text-sm focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all px-4">
                    </div>
                </div>

                <!-- Date Range (From & To) -->
                <div x-show="filterType === 'tanggal'" x-cloak class="col-span-1 md:col-span-2 lg:col-span-2 grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest ml-1">
                            📅 Dari Tanggal
                        </label>
                        <input type="date" name="from" value="{{ request('from') }}" :disabled="filterType !== 'tanggal'"
                            class="w-full h-12 bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 text-xs focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all px-3">
                    </div>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest ml-1">
                            📅 Sampai Tanggal
                        </label>
                        <input type="date" name="to" value="{{ request('to') }}" :disabled="filterType !== 'tanggal'"
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
                    <!-- Action: Download -->
                    <div class="col-span-1 md:col-span-2 lg:col-span-4 mt-6 pt-6 border-t border-zinc-100 dark:border-zinc-800 flex justify-end">
                        <a href="{{ route('admin.history.download', request()->all()) }}" class="h-12 px-8 flex items-center justify-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-black uppercase tracking-widest rounded-2xl transition-all shadow-lg shadow-emerald-500/20 whitespace-nowrap" title="Download CSV">
                            📥 Unduh Data CSV
                        </a>
                    </div>
                @endif
            </form>
        </div>

        <!-- TABLE AREA -->
        <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-[2.5rem] shadow-2xl shadow-zinc-200/50 dark:shadow-none overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-zinc-50/50 dark:bg-zinc-950/50 border-b border-zinc-100 dark:border-zinc-800 text-zinc-500 dark:text-zinc-400 text-xs font-black uppercase tracking-[0.2em]">
                            <th class="px-8 py-6">ID Data</th>
                            <th class="px-8 py-6">Parameter Lingkungan</th>
                            <th class="px-8 py-6 text-center">Status Analitik</th>
                            <th class="px-8 py-6 text-right">Waktu Perekaman</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800">
                        @forelse ($data as $item)
                        <tr class="group hover:bg-sky-50/30 dark:hover:bg-sky-500/5 transition-colors">
                            
                            <!-- ID -->
                            <td class="px-8 py-6">
                                <span class="text-xs font-black text-zinc-300 dark:text-zinc-700 group-hover:text-sky-500 transition-colors">
                                    #{{ str_pad($data->firstItem() + $loop->index, 4, '0', STR_PAD_LEFT) }}
                                </span>
                            </td>

                            <!-- METRICS -->
                            <td class="px-8 py-6">
                                <div class="flex gap-8 items-center">
                                    <div class="flex flex-col">
                                        <span class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-1">Suhu</span>
                                        <div class="flex items-center gap-2">
                                            <span class="text-sky-500">🌡️</span>
                                            <span class="text-lg font-extrabold text-zinc-900 dark:text-zinc-100">{{ $item->suhu }}°C</span>
                                        </div>
                                    </div>
                                    <div class="w-px h-10 bg-zinc-100 dark:bg-zinc-800"></div>
                                    <div class="flex flex-col">
                                        <span class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-1">Lembab</span>
                                        <div class="flex items-center gap-2">
                                            <span class="text-indigo-500">💧</span>
                                            <span class="text-lg font-extrabold text-zinc-900 dark:text-zinc-100">{{ $item->kelembaban }}%RH</span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!-- STATUS -->
                            <td class="px-8 py-6 text-center">
                                @if($item->suhu > 28 || $item->kelembaban > 65)
                                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 text-[10px] font-black uppercase tracking-widest border border-red-100 dark:border-red-900/30">
                                        ⚠️ Bahaya
                                    </span>
                                @elseif($item->suhu < 18 || $item->kelembaban < 50)
                                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 text-[10px] font-black uppercase tracking-widest border border-blue-100 dark:border-blue-900/30">
                                        ❄️ Ekstrem
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 dark:text-emerald-400 text-[10px] font-black uppercase tracking-widest border border-emerald-100 dark:border-emerald-900/30">
                                        ✨ Normal
                                    </span>
                                @endif
                            </td>

                            <!-- TIMESTAMP -->
                            <td class="px-8 py-6 text-right">
                                <div class="flex flex-col items-end">
                                    <span class="text-sm font-extrabold text-zinc-900 dark:text-zinc-100">
                                        {{ $item->created_at->format('d M Y') }}
                                    </span>
                                    <span class="text-[10px] font-bold text-zinc-400 uppercase tracking-tighter mt-1">
                                        {{ $item->created_at->format('H:i:s') }} WIB
                                    </span>
                                </div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-8 py-20 text-center">
                                <div class="flex flex-col items-center gap-4">
                                    <span class="text-6xl">📁</span>
                                    <p class="text-zinc-500 dark:text-zinc-400 font-bold uppercase tracking-[0.3em] text-xs">Data Tidak Ditemukan</p>
                                </div>
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