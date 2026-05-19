<nav x-data="{ open: false }" class="bg-white/80 dark:bg-zinc-950/80 backdrop-blur-md border-b border-zinc-200/50 dark:border-zinc-800/50 sticky top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- LEFT -->
            <div class="flex items-center gap-8">
                <!-- LOGO -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group transition-transform duration-300 hover:scale-105">
                <div class="w-9 h-9 overflow-hidden rounded-xl">
                    <img 
                        src="{{ asset('images/logo.png') }}" 
                        alt="Logo"
                        class="w-full h-full object-cover"
                    >
                </div>
                    <div>
                        <h1 class="text-zinc-900 dark:text-zinc-100 font-extrabold text-base tracking-tight leading-none">
                            Museum<span class="text-sky-500">Pintar</span>
                        </h1>
                        <p class="text-zinc-500 dark:text-zinc-400 text-[10px] font-medium uppercase tracking-[0.2em] mt-0.5">
                            IoT Monitoring
                        </p>
                    </div>
                </a>

                <!-- DESKTOP MENU -->
                <div class="hidden md:flex items-center gap-1">
                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-medium transition-all duration-300 
                       {{ request()->routeIs('dashboard')
                           ? 'bg-sky-500 text-white shadow-lg shadow-sky-500/25'
                           : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900 hover:text-zinc-900 dark:hover:text-zinc-100' }}">
                        <div class="relative">
                            <span class="text-lg">📊</span>
                            <span class="absolute -top-1 -right-1 w-2 h-2 bg-white rounded-full animate-ping opacity-75"></span>
                        </div>
                        Beranda
                    </a>

                    <a href="{{ route('admin.history') }}"
                       class="flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-medium transition-all duration-300 
                       {{ request()->routeIs('admin.history')
                           ? 'bg-sky-500 text-white shadow-lg shadow-sky-500/25'
                           : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900 hover:text-zinc-900 dark:hover:text-zinc-100' }}">
                        <span class="text-lg">📂</span>
                        Riwayat
                    </a>

                    @auth
                        @if(Auth::user()->role == 'admin')
                            <a href="{{ url('/admin/users') }}"
                               class="flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-medium transition-all duration-300 
                               {{ request()->is('admin/users')
                                   ? 'bg-sky-500 text-white shadow-lg shadow-sky-500/25'
                                   : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900 hover:text-zinc-900 dark:hover:text-zinc-100' }}">
                                <span class="text-lg">👥</span>
                                Pengguna
                            </a>
                        @endif
                    @endauth

                    <a href="{{ route('help') }}"
                       class="flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-medium transition-all duration-300 
                       {{ request()->routeIs('help')
                           ? 'bg-sky-500 text-white shadow-lg shadow-sky-500/25'
                           : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900 hover:text-zinc-900 dark:hover:text-zinc-100' }}">
                        <span class="text-lg">❓</span>
                        Bantuan
                    </a>

                    <a href="{{ route('about') }}"
                       class="flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-medium transition-all duration-300 
                       {{ request()->routeIs('about')
                           ? 'bg-sky-500 text-white shadow-lg shadow-sky-500/25'
                           : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900 hover:text-zinc-900 dark:hover:text-zinc-100' }}">
                        <span class="text-lg">ℹ️</span>
                        Tentang
                    </a>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="hidden md:flex items-center gap-4">
                <div class="hidden lg:flex items-center gap-2 px-3 py-1.5 rounded-full bg-zinc-100 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 transition-colors duration-300">
                    <span>⏰</span>
                    <span id="live-clock" class="text-xs font-bold font-mono text-zinc-700 dark:text-zinc-300 tracking-tighter">--:--:--</span>
                </div>

                @auth
                    <!-- USER DROPDOWN -->
                    <div class="relative" x-data="{ dropdown: false }" x-cloak>

                        <button @click="dropdown = !dropdown"
                            class="flex items-center gap-2 bg-zinc-50 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 pl-3 pr-1.5 py-1.5 rounded-2xl transition-all duration-300 hover:border-sky-500/50">
                            <div class="text-right">
                                <p class="text-zinc-900 dark:text-zinc-100 text-xs font-bold leading-none">
                                    {{ Auth::user()->name }}
                                </p>
                                <p class="text-zinc-500 dark:text-zinc-400 text-[9px] uppercase font-bold mt-1 tracking-tighter">
                                    {{ Auth::user()->role == 'admin' ? 'Administrator' : 'Pengunjung' }}
                                </p>
                            </div>
                            <div class="w-8 h-8 rounded-xl bg-sky-500 flex items-center justify-center text-white font-bold text-sm shadow-md shadow-sky-500/20">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        </button>

                        <div x-show="dropdown"
                             x-cloak
                             @click.outside="dropdown = false"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-1 scale-95"
                             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                             x-transition:leave-end="opacity-0 translate-y-1 scale-95"
                             class="absolute right-0 mt-3 w-56 bg-white dark:bg-zinc-950 border border-zinc-200/50 dark:border-zinc-800/50 rounded-3xl shadow-2xl overflow-hidden z-50 p-1.5 backdrop-blur-xl">

                            <a href="{{ route('profile.edit') }}"
                               class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-zinc-700 dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-zinc-900 rounded-2xl transition-colors">
                                <span class="text-lg">👤</span>
                                Profil Akun
                            </a>

                            <div class="h-px bg-zinc-100 dark:bg-zinc-900 my-1 mx-2"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center gap-3 px-4 py-3 text-sm font-medium text-red-600 hover:bg-red-50 dark:hover:bg-red-950/20 rounded-2xl transition-colors">
                                    <span>🚪</span>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth

                @guest
                    <a href="{{ route('login') }}" 
                       class="flex items-center gap-2 px-6 py-2 rounded-2xl bg-zinc-900 dark:bg-zinc-100 text-sm font-bold text-white dark:text-zinc-900 hover:bg-sky-600 dark:hover:bg-sky-500 hover:text-white transition-all duration-300 shadow-lg shadow-zinc-900/10 dark:shadow-none">
                        <span>🔑</span>
                        Masuk
                    </a>
                @endguest
            </div>
            
            <!-- MOBILE BUTTON -->
            <div class="flex items-center md:hidden">
                <button @click.stop="open = !open"
                    class="text-zinc-500 dark:text-zinc-400 p-2 rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-950 hover:bg-sky-50 dark:hover:bg-sky-950/30 transition-all duration-300">
                    <span :class="{ 'hidden': open, 'block': !open }" class="text-xl">☰</span>
                    <span :class="{ 'hidden': !open, 'block': open }" class="text-xl text-sky-500">✕</span>
                </button>
            </div>

        </div>
    </div>

    <!-- MOBILE MENU -->
    <div x-show="open"
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         @click.outside="open = false"
         class="md:hidden bg-white dark:bg-zinc-950 border-t border-zinc-200 dark:border-zinc-800 p-4 space-y-2 rounded-b-3xl shadow-2xl">

        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition-all duration-300
           {{ request()->routeIs('dashboard') ? 'bg-sky-500 text-white' : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900' }}">
            <span class="text-xl">📊</span>
            Beranda
        </a>

        <a href="{{ route('admin.history') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition-all duration-300
           {{ request()->routeIs('admin.history') ? 'bg-sky-500 text-white' : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900' }}">
            <span class="text-xl">📂</span>
            Riwayat
        </a>

        @auth
            @if(Auth::user()->role == 'admin')
                <a href="{{ url('/admin/users') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition-all duration-300
                   {{ request()->is('admin/users') ? 'bg-sky-500 text-white' : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900' }}">
                    <span class="text-xl">👥</span>
                    Pengguna
                </a>
            @endif
        @endauth

        <a href="{{ route('help') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition-all duration-300
           {{ request()->routeIs('help') ? 'bg-sky-500 text-white' : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900' }}">
            <span class="text-xl">❓</span>
            Bantuan
        </a>

        <a href="{{ route('about') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition-all duration-300
           {{ request()->routeIs('about') ? 'bg-sky-500 text-white' : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900' }}">
            <span class="text-xl">ℹ️</span>
            Tentang
        </a>

        <!-- USER SECTION MOBILE -->
        @auth
            <div class="h-px bg-zinc-100 dark:bg-zinc-800 my-4"></div>
            <div class="flex items-center gap-3 px-4 mb-4">
                <div class="w-12 h-12 rounded-2xl bg-sky-500 flex items-center justify-center font-bold text-white text-lg shadow-lg shadow-sky-500/20">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <p class="font-extrabold text-sm text-zinc-900 dark:text-zinc-100 leading-none">{{ Auth::user()->name }}</p>
                    <p class="text-xs font-bold text-sky-500 mt-1 uppercase tracking-wider">{{ Auth::user()->role == 'admin' ? 'Administrator' : 'Pengunjung' }}</p>
                </div>
            </div>

            <div class="space-y-2">
                <a href="{{ route('profile.edit') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-900 transition-all">
                    <span class="text-xl">👤</span>
                    Profil Akun
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold text-red-600 hover:bg-red-50 dark:hover:bg-red-950/30 transition-all">
                        <span class="text-xl">🚪</span>
                        Keluar
                    </button>
                </form>
            </div>
        @endauth

        @guest
            <div class="pt-4">
                <a href="{{ route('login') }}"
                   class="flex items-center justify-center gap-2 w-full px-4 py-4 rounded-2xl bg-sky-500 text-white text-sm font-extrabold uppercase tracking-widest shadow-lg shadow-sky-500/20">
                    <span>🔑</span>
                    Masuk Sekarang
                </a>
            </div>
        @endguest
    </div>
</nav>