<x-app-layout>
    <div class="p-6 max-w-7xl mx-auto space-y-8">
        
        <!-- HEADER -->
        <div class="relative overflow-hidden bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 md:p-10 rounded-[2.5rem] shadow-xl shadow-zinc-200/50 dark:shadow-none transition-all duration-300">
            <div class="absolute -right-10 -top-10 text-zinc-100 dark:text-zinc-800/50 text-9xl select-none font-black opacity-20 pointer-events-none">
                HELP
            </div>

            <div class="relative z-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-zinc-900 dark:text-zinc-100 tracking-tight mb-2">
                    Pusat <span class="text-sky-500">Bantuan</span>
                </h1>
                <p class="text-zinc-500 dark:text-zinc-400 font-medium flex items-center gap-2">
                    💡 Panduan operasional dan keterangan parameter sistem
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- STATUS EXPLANATION -->
            <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 rounded-[2.5rem] shadow-xl shadow-zinc-200/30 dark:shadow-none">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 bg-sky-50 rounded-2xl flex items-center justify-center text-xl">
                        📊
                    </div>
                    <h2 class="text-lg font-black text-zinc-900 dark:text-zinc-100 uppercase tracking-widest">
                        Keterangan Status
                    </h2>
                </div>

                <div class="space-y-6">
                    <div class="flex items-start gap-4 p-4 rounded-3xl bg-emerald-50 dark:bg-emerald-950/20 border border-emerald-100 dark:border-emerald-900/30">
                        <span class="text-2xl mt-1">✨</span>
                        <div>
                            <p class="text-sm font-black text-emerald-700 dark:text-emerald-400 uppercase tracking-widest mb-1">Status: Nyaman</p>
                            <p class="text-xs font-medium text-zinc-600 dark:text-zinc-400 leading-relaxed">
                                Suhu 18°C - 28°C & Kelembaban 50% - 65%. 
                                <br><span class="font-bold">Kondisi ruangan ideal untuk koleksi museum.</span>
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 rounded-3xl bg-red-50 dark:bg-red-950/20 border border-red-100 dark:border-red-900/30">
                        <span class="text-2xl mt-1">⚠️</span>
                        <div>
                            <p class="text-sm font-black text-red-700 dark:text-red-400 uppercase tracking-widest mb-1">Status: Tidak Nyaman</p>
                            <p class="text-xs font-medium text-zinc-600 dark:text-zinc-400 leading-relaxed">
                                Suhu > 28°C / < 18°C, atau Kelembaban > 65% / < 50%. 
                                <br><span class="font-bold">Sistem kontrol otomatis akan aktif (Fan/Heater).</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- USAGE GUIDE -->
            <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 rounded-[2.5rem] shadow-xl shadow-zinc-200/30 dark:shadow-none">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 bg-indigo-50 rounded-2xl flex items-center justify-center text-xl">
                        📝
                    </div>
                    <h2 class="text-lg font-black text-zinc-900 dark:text-zinc-100 uppercase tracking-widest">
                        Prosedur Operasi
                    </h2>
                </div>

                <div class="space-y-4">
                    @php
                        $steps = [
                            ['icon' => '🔑', 'text' => 'Login menggunakan akun terverifikasi.'],
                            ['icon' => '📱', 'text' => 'Pantau metrik sensor secara realtime di Dashboard.'],
                            ['icon' => '✅', 'text' => 'Verifikasi status kenyamanan lingkungan museum.'],
                            ['icon' => '⚡', 'text' => 'Sistem menstabilkan kondisi secara otomatis jika anomali terdeteksi.'],
                            ['icon' => '📂', 'text' => 'Akses menu History untuk audit data masa lampau.'],
                            ['icon' => '👥', 'text' => 'Menu About berisi detail pengembang sistem.'],
                        ];
                    @endphp

                    @foreach($steps as $index => $step)
                    <div class="flex items-center gap-4 group">
                        <div class="w-8 h-8 rounded-xl bg-zinc-50 dark:bg-zinc-950 flex items-center justify-center group-hover:bg-indigo-50 transition-all duration-300">
                            <span class="text-sm">{{ $step['icon'] }}</span>
                        </div>
                        <p class="text-xs font-bold text-zinc-600 dark:text-zinc-400 group-hover:text-zinc-900 dark:group-hover:text-zinc-100 transition-colors">
                            <span class="text-indigo-500 mr-2">{{ $index + 1 }}.</span> {{ $step['text'] }}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>



    </div>
</x-app-layout>