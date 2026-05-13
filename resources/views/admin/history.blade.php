<x-app-layout>
    <div class="p-6 max-w-7xl mx-auto" style="font-family: 'JetBrains Mono', monospace;">

        <!-- HEADER (Mengikuti style yang kamu kirim) -->
        <div class="bg-white dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 p-6 md:p-8 mb-6 relative">
            <div class="absolute right-6 top-6 text-zinc-200 dark:text-zinc-800 text-4xl select-none font-bold">
                [LOGS]
            </div>

            <div class="relative z-10">
                <h1 class="text-2xl md:text-3xl font-bold text-zinc-900 dark:text-zinc-100 uppercase tracking-tight mb-2">
                    History Monitoring
                </h1>
                <p class="text-zinc-500 dark:text-zinc-400 text-sm">
                    > Arsip data sensor museum dalam urutan kronologis
                </p>

                <div class="flex flex-wrap gap-3 mt-6">
                    <div class="border border-zinc-300 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-900 px-3 py-1 text-zinc-600 dark:text-zinc-400 text-xs uppercase tracking-wider">
                        [ TOTAL ENTRY: {{ $data->total() }} ]
                    </div>
                </div>
            </div>
        </div>

        <!-- FILTER AREA -->
        <div class="bg-white dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 p-6 mb-6">
            <form action="{{ route('admin.history') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Search -->
                <div>
                    <label class="block text-[10px] text-zinc-500 uppercase tracking-widest mb-1">> Search</label>
                    <input type="text" name="search" value="{{ request('search') }}" 
                        placeholder="Search value..."
                        class="w-full bg-zinc-50 dark:bg-zinc-900 border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-zinc-100 text-xs focus:ring-0 focus:border-zinc-400">
                </div>

                <!-- Temperature Range -->
                <div class="md:col-span-1">
                    <label class="block text-[10px] text-zinc-500 uppercase tracking-widest mb-1">> Temperature (°C)</label>
                    <div class="flex gap-2">
                        <input type="number" name="min_suhu" value="{{ request('min_suhu') }}" placeholder="Min"
                            class="w-1/2 bg-zinc-50 dark:bg-zinc-900 border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-zinc-100 text-xs focus:ring-0 focus:border-zinc-400">
                        <input type="number" name="max_suhu" value="{{ request('max_suhu') }}" placeholder="Max"
                            class="w-1/2 bg-zinc-50 dark:bg-zinc-900 border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-zinc-100 text-xs focus:ring-0 focus:border-zinc-400">
                    </div>
                </div>

                <!-- Humidity Range -->
                <div class="md:col-span-1">
                    <label class="block text-[10px] text-zinc-500 uppercase tracking-widest mb-1">> Humidity (%)</label>
                    <div class="flex gap-2">
                        <input type="number" name="min_kelembaban" value="{{ request('min_kelembaban') }}" placeholder="Min"
                            class="w-1/2 bg-zinc-50 dark:bg-zinc-900 border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-zinc-100 text-xs focus:ring-0 focus:border-zinc-400">
                        <input type="number" name="max_kelembaban" value="{{ request('max_kelembaban') }}" placeholder="Max"
                            class="w-1/2 bg-zinc-50 dark:bg-zinc-900 border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-zinc-100 text-xs focus:ring-0 focus:border-zinc-400">
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-end gap-2">
                    <button type="submit" class="flex-1 bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 text-[10px] uppercase font-bold py-2 px-4 hover:bg-zinc-800 dark:hover:bg-zinc-200 transition-colors">
                        Apply Filter
                    </button>
                    <a href="{{ route('admin.history') }}" class="bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 text-[10px] uppercase font-bold py-2 px-4 hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-colors">
                        Reset
                    </a>
                </div>
            </form>
        </div>

        <!-- TABLE AREA -->
        <div class="bg-white dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 overflow-hidden">
            
            <!-- TABLE HEADER -->
            <div class="p-4 border-b border-zinc-100 dark:border-zinc-800 bg-zinc-50/50 dark:bg-zinc-900/50">
                <p class="text-[10px] text-zinc-500 uppercase tracking-[0.2em]">
                    > Query Result: all records descending
                </p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-zinc-200 dark:border-zinc-800 text-zinc-500 dark:text-zinc-400 text-xs uppercase tracking-widest">
                            <th class="px-6 py-4 font-bold"># ID</th>
                            <th class="px-6 py-4 font-bold">Data Metrics (Suhu & Lembab)</th>
                            <th class="px-6 py-4 font-bold text-center">Status</th>
                            <th class="px-6 py-4 font-bold text-right">Timestamp</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800">
                        @forelse ($data as $item)
                        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-900 transition-colors">
                            
                            <!-- ID -->
                            <td class="px-6 py-4 text-sm font-bold text-zinc-400 dark:text-zinc-600">
                                [{{ str_pad($data->firstItem() + $loop->index, 3, '0', STR_PAD_LEFT) }}]
                            </td>

                            <!-- METRICS -->
                            <td class="px-6 py-4">
                                <div class="flex gap-6 items-center">
                                    <div class="flex flex-col">
                                        <span class="text-[9px] text-zinc-400 uppercase">Suhu</span>
                                        <span class="text-lg font-bold text-zinc-900 dark:text-zinc-100">{{ $item->suhu }}°C</span>
                                    </div>
                                    <div class="flex flex-col border-l border-zinc-200 dark:border-zinc-800 pl-6">
                                        <span class="text-[9px] text-zinc-400 uppercase">Lembab</span>
                                        <span class="text-lg font-bold text-zinc-900 dark:text-zinc-100">{{ $item->kelembaban }}%</span>
                                    </div>
                                </div>
                            </td>

                            <!-- STATUS (Versi Minimalist Bracket) -->
                            <td class="px-6 py-4 text-center">
                                @if($item->suhu > 28 || $item->kelembaban > 65)
                                    <span class="text-red-600 dark:text-red-500 text-xs font-bold uppercase tracking-tighter">
                                        [!!] TIDAK NYAMAN
                                    </span>
                                @elseif($item->suhu < 18 || $item->kelembaban < 50)
                                    <span class="text-blue-600 dark:text-blue-500 text-xs font-bold uppercase tracking-tighter">
                                        [**] TIDAK NYAMAN
                                    </span>
                                @else
                                    <span class="text-green-600 dark:text-green-400 text-xs font-bold uppercase tracking-tighter">
                                        [OK] NYAMAN
                                    </span>
                                @endif
                            </td>

                            <!-- TIMESTAMP -->
                            <td class="px-6 py-4 text-right">
                                <div class="text-xs flex flex-col">
                                    <span class="text-zinc-900 dark:text-zinc-100 font-bold uppercase">
                                        {{ $item->created_at->
                                        format('d.M.Y') }}
                                    </span>
                                    <span class="text-zinc-500 dark:text-zinc-500 text-[10px]">
                                        {{ $item->created_at->format('H:i:s') }}
                                    </span>
                                </div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-zinc-500 text-xs uppercase tracking-[0.3em]">
                                > Data Tidak Ditemukan
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- PAGINATION (Minimalist Style) -->
        <div class="mt-6 dark:text-zinc-400">
            {{ $data->links() }}
        </div>

    </div>
</x-app-layout>