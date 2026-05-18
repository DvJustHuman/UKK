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
                    📍 Arsip kronologis data sensor museum
                </p>

                <div class="flex flex-wrap gap-3 mt-6">
                    <div class="bg-sky-50 dark:bg-sky-500/10 border border-sky-200 dark:border-sky-500/20 px-4 py-2 text-sky-600 dark:text-sky-400 text-xs font-black uppercase tracking-widest rounded-2xl">
                        Total Data: {{ $data->total() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- FILTER AREA -->
        <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 rounded-[2.5rem] shadow-xl shadow-zinc-200/30 dark:shadow-none">
            <form action="{{ route('admin.history') }}" method="GET" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-6">

                <!-- Date Range -->
                <div class="space-y-2 lg:col-span-1">
                    <label class="flex items-center gap-2 text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest ml-1">
                        📅 Rentang Tanggal
                    </label>
                    <div class="flex gap-2">
                        <input type="date" name="from" value="{{ request('from') }}"
                            class="w-1/2 bg-zinc-50 dark:bg-zinc-950 border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 text-xs focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all p-3">
                        <input type="date" name="to" value="{{ request('to') }}"
                            class="w-1/2 bg-zinc-50 dark:bg-zinc-950 border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 text-xs focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all p-3">
                    </div>
                </div>

                <!-- Temperature Range -->
                <div class="space-y-2">
                    <label class="flex items-center gap-2 text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest ml-1">
                        🌡️ Suhu (°C)
                    </label>
                    <div class="flex gap-2">
                        <input type="number" name="min_suhu" value="{{ request('min_suhu') }}" placeholder="Min"
                            class="w-1/2 bg-zinc-50 dark:bg-zinc-950 border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 text-sm focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all p-3">
                        <input type="number" name="max_suhu" value="{{ request('max_suhu') }}" placeholder="Max"
                            class="w-1/2 bg-zinc-50 dark:bg-zinc-950 border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 text-sm focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all p-3">
                    </div>
                </div>

                <!-- Humidity Range -->
                <div class="space-y-2">
                    <label class="flex items-center gap-2 text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest ml-1">
                        💧 Kelembaban (%)
                    </label>
                    <div class="flex gap-2">
                        <input type="number" name="min_kelembaban" value="{{ request('min_kelembaban') }}" placeholder="Min"
                            class="w-1/2 bg-zinc-50 dark:bg-zinc-950 border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 text-sm focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all p-3">
                        <input type="number" name="max_kelembaban" value="{{ request('max_kelembaban') }}" placeholder="Max"
                            class="w-1/2 bg-zinc-50 dark:bg-zinc-950 border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 text-sm focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 transition-all p-3">
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-end gap-2 w-full md:col-span-2 lg:col-span-2">
                    <button type="submit" class="flex-1 flex items-center justify-center gap-1 sm:gap-2 bg-sky-500 hover:bg-sky-600 text-white text-[10px] sm:text-xs font-black uppercase tracking-wider sm:tracking-widest py-4 px-2 sm:px-4 rounded-2xl transition-all shadow-lg shadow-sky-500/20 border border-transparent whitespace-nowrap">
                        Filter
                    </button>
                    <a href="{{ route('admin.history') }}" class="flex-1 flex items-center justify-center gap-1 sm:gap-2 bg-zinc-50 hover:bg-zinc-100 dark:bg-zinc-800 dark:hover:bg-zinc-700 text-zinc-700 dark:text-zinc-300 text-[10px] sm:text-xs font-black uppercase tracking-wider sm:tracking-widest py-4 px-2 sm:px-4 rounded-2xl transition-all shadow-lg shadow-zinc-200/10 dark:shadow-none border border-zinc-200 dark:border-zinc-700 whitespace-nowrap" title="Reset Filter">
                        🔄 Reset
                    </a>
                    <a href="{{ route('admin.history.download', request()->all()) }}" class="flex-1 flex items-center justify-center gap-1 sm:gap-2 bg-emerald-500 hover:bg-emerald-600 text-white text-[10px] sm:text-xs font-black uppercase tracking-wider sm:tracking-widest py-4 px-2 sm:px-4 rounded-2xl transition-all shadow-lg shadow-emerald-500/20 border border-transparent whitespace-nowrap" title="Download CSV">
                        📥 Download
                    </a>
                </div>
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
                                            <span class="text-lg font-extrabold text-zinc-900 dark:text-zinc-100">{{ $item->kelembaban }}%</span>
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