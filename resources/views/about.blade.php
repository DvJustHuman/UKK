<x-app-layout>
    <div class="p-6 max-w-7xl mx-auto space-y-8">
        
        <!-- HEADER -->
        <div class="relative overflow-hidden bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 md:p-10 rounded-[2.5rem] shadow-xl shadow-zinc-200/50 dark:shadow-none transition-all duration-300">
            <div class="absolute -right-10 -top-10 text-zinc-100 dark:text-zinc-800/50 text-9xl select-none font-black opacity-20 pointer-events-none">
                TIM
            </div>

            <div class="relative z-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-zinc-900 dark:text-zinc-100 tracking-tight mb-2">
                    Informasi <span class="text-sky-500">Kelompok</span>
                </h1>

                <p class="text-zinc-500 dark:text-zinc-400 font-medium flex items-center gap-2">
                    👥 Detail pengembang sistem monitoring museum (7 Personel)
                </p>
            </div>
        </div>

        <!-- GRID ANGGOTA -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @php
                $members = [

                    [
                        'name' => 'Davisya Satria Nanda',
                        'role' => 'Ketua Kelompok',
                        'task' => 'Website & IoT',
                        'born' => '18/07/2007',
                        'gender' => 'Laki-laki',
                        'contact' => '0878616550555',
                        'email' => 'davisya123@gmail.com',
                        'photo' => 'images/members/davis.png'
                    ],

                    [
                        'name' => 'Bintang Aryaputra Maulana',
                        'role' => 'Anggota',
                        'task' => 'Maket Museum',
                        'born' => '31/10/2007',
                        'gender' => 'Laki-laki',
                        'contact' => '083117168234',
                        'email' => '-',
                        'photo' => 'images/members/bintang.jpg'
                    ],

                    [
                        'name' => 'Devina Aulia Azzahra',
                        'role' => 'Anggota',
                        'task' => '-',
                        'born' => '06/07/2006',
                        'gender' => 'Perempuan',
                        'contact' => '089520385898',
                        'email' => '-',
                        'photo' => 'images/members/devina.jpg'
                    ],

                    [
                        'name' => 'Dimas Nur Cipta Suseno',
                        'role' => 'Anggota',
                        'task' => 'Pengelolaan WordPress',
                        'born' => '28/01/2008',
                        'gender' => 'Laki-laki',
                        'contact' => '088989540329',
                        'email' => '-',
                        'photo' => 'images/members/dimas.jpg'
                    ],

                    [
                        'name' => 'Elvira Nadya Rudyanto',
                        'role' => 'Anggota',
                        'task' => 'Desain Presentasi',
                        'born' => '04/11/2007',
                        'gender' => 'Perempuan',
                        'contact' => '083138748357',
                        'email' => 'elviranadyarudyanto04@gmail.com',
                        'photo' => 'images/members/elvira.jpg'
                    ],

                    [
                        'name' => 'Falakiah Allie Ravarianza',
                        'role' => 'Anggota',
                        'task' => 'Pembuatan Maket',
                        'born' => '15/05/2008',
                        'gender' => 'Laki-laki',
                        'contact' => '085748680566',
                        'email' => 'falakiahallieravarianza31@gmail.com',
                        'photo' => 'images/members/falakiah.jpg'
                    ],

                    [
                        'name' => 'Imelda Zulfa Afrillia',
                        'role' => 'Anggota',
                        'task' => 'Penyusunan Laporan',
                        'born' => '28/04/2008',
                        'gender' => 'Perempuan',
                        'contact' => '083896229744',
                        'email' => 'imeldafrillia@gmail.com',
                        'photo' => 'images/members/imelda.jpg'
                    ],

                ];
            @endphp

            @php
                $leader = $members[0];
                $anggotas = array_slice($members, 1);
            @endphp

            <!-- KETUA KELOMPOK (LEADER) -->
            <div class="col-span-1 md:col-span-2 lg:col-span-3 flex justify-center mb-6">
                <div class="w-full max-w-sm group relative overflow-hidden bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-[2.5rem] p-8 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-sky-500/10 hover:border-sky-500/50">
                    
                    <!-- Background Watermark -->
                    <div class="absolute -right-6 -bottom-6 text-9xl font-black text-zinc-100 dark:text-zinc-800/50 select-none pointer-events-none transform -rotate-12 group-hover:scale-110 transition-transform duration-500 opacity-50 z-0">
                        01
                    </div>

                    <!-- Badge Header -->
                    <div class="flex justify-between items-center mb-6 relative z-10">
                        <div class="px-4 py-1.5 rounded-full border border-sky-200 dark:border-sky-800/50 bg-sky-50 dark:bg-sky-950/30 text-sky-600 dark:text-sky-400">
                            <span class="text-[10px] font-black uppercase tracking-wider">
                                👑 {{ $leader['role'] }}
                            </span>
                        </div>
                    </div>

                    <!-- Profile Section -->
                    <div class="flex flex-col items-center mb-8 relative z-10">
                        <div class="w-28 h-28 aspect-square rounded-full p-1 border border-sky-400/50 dark:border-sky-500/30 shadow-md group-hover:border-sky-500 group-hover:scale-105 transition-all duration-500 mb-5">
                            <div class="w-full h-full aspect-square rounded-full border-4 border-white dark:border-zinc-900 overflow-hidden bg-zinc-100 dark:bg-zinc-800">
                                <img src="{{ asset($leader['photo']) }}" alt="{{ $leader['name'] }}" class="w-full h-full aspect-square object-cover group-hover:scale-110 transition-transform duration-700">
                            </div>
                        </div>
                        <h3 class="text-xl font-extrabold text-zinc-900 dark:text-zinc-100 text-center leading-tight">
                            {{ $leader['name'] }}
                        </h3>
                        <p class="text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest mt-2 group-hover:text-sky-500 transition-colors">
                            {{ $leader['gender'] }}
                        </p>
                    </div>

                    <!-- Details Grid -->
                    <div class="space-y-3 relative z-10">
                        <!-- Born -->
                        <div class="flex items-center gap-4 p-3.5 rounded-2xl bg-zinc-50 dark:bg-zinc-800/30 border border-zinc-100 dark:border-zinc-800 group-hover:border-sky-500/30 transition-colors">
                            <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-white dark:bg-zinc-800 flex items-center justify-center border border-zinc-200 dark:border-zinc-700 shadow-sm">
                                <svg class="w-5 h-5 text-zinc-400 group-hover:text-sky-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-black uppercase tracking-wider text-zinc-400">Tgl Lahir</p>
                                <p class="text-sm font-bold text-zinc-900 dark:text-zinc-100">{{ $leader['born'] }}</p>
                            </div>
                        </div>

                        <!-- Tugas -->
                        <div class="flex items-center gap-4 p-3.5 rounded-2xl bg-zinc-50 dark:bg-zinc-800/30 border border-zinc-100 dark:border-zinc-800 group-hover:border-sky-500/30 transition-colors">
                            <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-white dark:bg-zinc-800 flex items-center justify-center border border-zinc-200 dark:border-zinc-700 shadow-sm">
                                <svg class="w-5 h-5 text-zinc-400 group-hover:text-sky-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>
                            </div>
                            <div class="overflow-hidden">
                                <p class="text-[10px] font-black uppercase tracking-wider text-zinc-400">Tugas / Peran</p>
                                <p class="text-sm font-bold text-zinc-900 dark:text-zinc-100 truncate" title="{{ $leader['task'] }}">{{ $leader['task'] }}</p>
                            </div>
                        </div>

                        <!-- Contact -->
                        <div class="flex items-center gap-4 p-3.5 rounded-2xl bg-zinc-50 dark:bg-zinc-800/30 border border-zinc-100 dark:border-zinc-800 group-hover:border-sky-500/30 transition-colors">
                            <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-white dark:bg-zinc-800 flex items-center justify-center border border-zinc-200 dark:border-zinc-700 shadow-sm">
                                <svg class="w-5 h-5 text-zinc-400 group-hover:text-sky-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-black uppercase tracking-wider text-zinc-400">Telepon</p>
                                <p class="text-sm font-bold text-zinc-900 dark:text-zinc-100">{{ $leader['contact'] }}</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-center gap-4 p-3.5 rounded-2xl bg-zinc-50 dark:bg-zinc-800/30 border border-zinc-100 dark:border-zinc-800 group-hover:border-sky-500/30 transition-colors">
                            <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-white dark:bg-zinc-800 flex items-center justify-center border border-zinc-200 dark:border-zinc-700 shadow-sm">
                                <svg class="w-5 h-5 text-zinc-400 group-hover:text-sky-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="overflow-hidden">
                                <p class="text-[10px] font-black uppercase tracking-wider text-zinc-400">Email</p>
                                <p class="text-sm font-bold text-zinc-900 dark:text-zinc-100 truncate">{{ $leader['email'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ANGGOTA (MEMBERS) -->
            @foreach($anggotas as $index => $m)

            <div class="group relative overflow-hidden bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-[2.5rem] p-8 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-sky-500/10 hover:border-sky-500/50">
                
                <!-- Background Watermark -->
                <div class="absolute -right-6 -bottom-6 text-9xl font-black text-zinc-100 dark:text-zinc-800/50 select-none pointer-events-none transform -rotate-12 group-hover:scale-110 transition-transform duration-500 opacity-50 z-0">
                    {{ str_pad($index + 2, 2, '0', STR_PAD_LEFT) }}
                </div>

                <!-- Badge Header (Role only) -->
               <div class="flex justify-between items-center mb-6 relative z-10">
                   <div class="px-4 py-1.5 rounded-full border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800/50">
                        <span class="text-[10px] font-black uppercase tracking-wider text-zinc-500 dark:text-zinc-400 group-hover:text-sky-500 transition-colors">
                            {{ $m['role'] }}
                        </span>
                    </div>
                </div>

                <!-- Profile Section -->
                <div class="flex flex-col items-center mb-8 relative z-10">
                    <div class="w-28 h-28 aspect-square rounded-full p-1 border border-zinc-200 dark:border-zinc-700 shadow-md group-hover:border-sky-500/50 group-hover:scale-105 transition-all duration-500 mb-5">
                        <div class="w-full h-full aspect-square rounded-full border-4 border-white dark:border-zinc-900 overflow-hidden bg-zinc-100 dark:bg-zinc-800">
                            <img src="{{ asset($m['photo']) }}" alt="{{ $m['name'] }}" class="w-full h-full aspect-square object-cover group-hover:scale-110 transition-transform duration-700">
                        </div>
                    </div>
                    <h3 class="text-xl font-extrabold text-zinc-900 dark:text-zinc-100 text-center leading-tight">
                        {{ $m['name'] }}
                    </h3>
                    <p class="text-xs font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest mt-2 group-hover:text-sky-500 transition-colors">
                        {{ $m['gender'] }}
                    </p>
                </div>

                <!-- Details Grid -->
                <div class="space-y-3 relative z-10">
                    <!-- Born -->
                    <div class="flex items-center gap-4 p-3.5 rounded-2xl bg-zinc-50 dark:bg-zinc-800/30 border border-zinc-100 dark:border-zinc-800 group-hover:border-sky-500/30 transition-colors">
                        <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-white dark:bg-zinc-800 flex items-center justify-center border border-zinc-200 dark:border-zinc-700 shadow-sm">
                            <svg class="w-5 h-5 text-zinc-400 group-hover:text-sky-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-wider text-zinc-400">Tgl Lahir</p>
                            <p class="text-sm font-bold text-zinc-900 dark:text-zinc-100">{{ $m['born'] }}</p>
                        </div>
                    </div>

                    <!-- Tugas -->
                    <div class="flex items-center gap-4 p-3.5 rounded-2xl bg-zinc-50 dark:bg-zinc-800/30 border border-zinc-100 dark:border-zinc-800 group-hover:border-sky-500/30 transition-colors">
                        <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-white dark:bg-zinc-800 flex items-center justify-center border border-zinc-200 dark:border-zinc-700 shadow-sm">
                            <svg class="w-5 h-5 text-zinc-400 group-hover:text-sky-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-[10px] font-black uppercase tracking-wider text-zinc-400">Tugas / Peran</p>
                            <p class="text-sm font-bold text-zinc-900 dark:text-zinc-100 truncate" title="{{ $m['task'] }}">{{ $m['task'] }}</p>
                        </div>
                    </div>

                    <!-- Contact -->
                    <div class="flex items-center gap-4 p-3.5 rounded-2xl bg-zinc-50 dark:bg-zinc-800/30 border border-zinc-100 dark:border-zinc-800 group-hover:border-sky-500/30 transition-colors">
                        <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-white dark:bg-zinc-800 flex items-center justify-center border border-zinc-200 dark:border-zinc-700 shadow-sm">
                            <svg class="w-5 h-5 text-zinc-400 group-hover:text-sky-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-wider text-zinc-400">Telepon</p>
                            <p class="text-sm font-bold text-zinc-900 dark:text-zinc-100">{{ $m['contact'] }}</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-center gap-4 p-3.5 rounded-2xl bg-zinc-50 dark:bg-zinc-800/30 border border-zinc-100 dark:border-zinc-800 group-hover:border-sky-500/30 transition-colors">
                        <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-white dark:bg-zinc-800 flex items-center justify-center border border-zinc-200 dark:border-zinc-700 shadow-sm">
                            <svg class="w-5 h-5 text-zinc-400 group-hover:text-sky-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-[10px] font-black uppercase tracking-wider text-zinc-400">Email</p>
                            <p class="text-sm font-bold text-zinc-900 dark:text-zinc-100 truncate">{{ $m['email'] }}</p>
                        </div>
                    </div>
                </div>

            </div>

            @endforeach

        </div>

    </div>
</x-app-layout>