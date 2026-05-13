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
                        'born' => '18/07/2007',
                        'gender' => 'Laki-laki',
                        'contact' => '0878616550555',
                        'email' => 'davisya123@gmail.com',
                        'photo' => 'images/members/davis.png'
                    ],

                    [
                        'name' => 'Bintang Aryaputra Maulana',
                        'role' => 'Anggota',
                        'born' => '31/10/2007',
                        'gender' => 'Laki-laki',
                        'contact' => '083117168234',
                        'email' => '-',
                        'photo' => 'images/members/bintang.jpg'
                    ],

                    [
                        'name' => 'Devina Aulia Azzahra',
                        'role' => 'Anggota',
                        'born' => '06/07/2006',
                        'gender' => 'Perempuan',
                        'contact' => '089520385898',
                        'email' => '-',
                        'photo' => 'images/members/devina.jpg'
                    ],

                    [
                        'name' => 'Dimas Nur Cipta Suseno',
                        'role' => 'Anggota',
                        'born' => '28/01/2008',
                        'gender' => 'Laki-laki',
                        'contact' => '088989540329',
                        'email' => '-',
                        'photo' => 'images/members/dimas.jpg'
                    ],

                    [
                        'name' => 'Elvira Nadya Rudyanto',
                        'role' => 'Anggota',
                        'born' => '04/11/2007',
                        'gender' => 'Perempuan',
                        'contact' => '083138748357',
                        'email' => 'elviranadyarudyanto04@gmail.com',
                        'photo' => 'images/members/elvira.jpg'
                    ],

                    [
                        'name' => 'Falakiah Allie Ravarianza',
                        'role' => 'Anggota',
                        'born' => '15/05/2008',
                        'gender' => 'Laki-laki',
                        'contact' => '085748680566',
                        'email' => 'falakiahallieravarianza31@gmail.com',
                        'photo' => 'images/members/falakiah.jpg'
                    ],

                    [
                        'name' => 'Imelda Zulfa Afrillia',
                        'role' => 'Anggota',
                        'born' => '28/04/2008',
                        'gender' => 'Perempuan',
                        'contact' => '083896229744',
                        'email' => 'imeldafrillia@gmail.com',
                        'photo' => 'images/members/imelda.jpg'
                    ],

                ];
            @endphp

            @foreach($members as $index => $m)

            <div class="group bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 rounded-[2.5rem]
                        hover:border-sky-500/50 hover:shadow-2xl hover:shadow-sky-500/10
                        transition-all duration-500
                        {{ $index == 6 ? 'md:col-span-2 lg:col-span-1 lg:col-start-2' : '' }}">

                <!-- HEADER CARD -->
                <div class="flex items-center gap-4 mb-8 pb-6 border-b border-zinc-100 dark:border-zinc-800
                            transition-colors group-hover:border-sky-500/20">

                    <!-- FOTO -->
                    <div class="w-16 h-16 rounded-2xl overflow-hidden border border-zinc-200 dark:border-zinc-700 shadow-md">
                        <img 
                            src="{{ asset($m['photo']) }}"
                            alt="{{ $m['name'] }}"
                            class="w-full h-full object-cover"
                        >
                    </div>

                    <!-- INFO -->
                    <div>
                        <h2 class="text-xs font-black text-sky-500 uppercase tracking-widest mb-1">
                            Anggota {{ $index + 1 }}
                        </h2>

                        <p class="text-sm font-extrabold text-zinc-900 dark:text-zinc-100 group-hover:text-sky-500 transition-colors">
                            {{ $m['role'] }}
                        </p>
                    </div>
                </div>

                <!-- DETAIL -->
                <div class="space-y-5">

                    <!-- NAMA -->
                    <div class="flex flex-col border-l-2 border-zinc-100 dark:border-zinc-800 pl-4 group-hover:border-sky-500/30 transition-colors">
                        <span class="text-[10px] font-black text-zinc-400 uppercase tracking-[0.2em] mb-1">
                            Nama Lengkap
                        </span>

                        <span class="text-sm font-bold text-zinc-900 dark:text-zinc-100">
                            {{ $m['name'] }}
                        </span>
                    </div>

                    <!-- GENDER -->
                    <div class="flex flex-col border-l-2 border-zinc-100 dark:border-zinc-800 pl-4 group-hover:border-sky-500/30 transition-colors">
                        <span class="text-[10px] font-black text-zinc-400 uppercase tracking-[0.2em] mb-1">
                            Jenis Kelamin / Tanggal Lahir
                        </span>

                        <span class="text-sm font-bold text-zinc-900 dark:text-zinc-100">
                            {{ $m['gender'] }} — {{ $m['born'] }}
                        </span>
                    </div>

                    <!-- KONTAK -->
                    <div class="flex flex-col border-l-2 border-zinc-100 dark:border-zinc-800 pl-4 group-hover:border-sky-500/30 transition-colors">
                        <span class="text-[10px] font-black text-zinc-400 uppercase tracking-[0.2em] mb-1">
                            Kontak & Email
                        </span>

                        <span class="text-sm font-extrabold text-sky-500 tracking-tight">
                            {{ $m['contact'] }}
                        </span>

                        <span class="text-[11px] font-medium text-zinc-500 dark:text-zinc-400 mt-0.5 truncate">
                            {{ $m['email'] }}
                        </span>
                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>
</x-app-layout>