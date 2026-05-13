<nav x-data="{ open: false }" class="bg-white dark:bg-zinc-950 border-b border-zinc-200 dark:border-zinc-800 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- LEFT -->
            <div class="flex items-center gap-6">
                <!-- LOGO -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <div class="w-8 h-8 flex items-center justify-center text-zinc-900 dark:text-zinc-100 border border-zinc-200 dark:border-zinc-800 rounded bg-zinc-50 dark:bg-zinc-900 text-sm">
                        🏛️
                    </div>
                    <div>
                        <h1 class="text-zinc-900 dark:text-zinc-100 font-bold text-sm tracking-tight leading-none uppercase">
                            Museum
                        </h1>
                        <p class="text-zinc-500 dark:text-zinc-400 text-[10px] uppercase tracking-wider mt-0.5">
                            Monitoring System
                        </p>
                    </div>
                </a>

                <!-- DESKTOP MENU -->
                <div class="hidden md:flex items-center gap-2">
                    <a href="{{ route('dashboard') }}"
                       class="px-3 py-1.5 rounded border text-sm transition duration-200 
                       {{ request()->routeIs('dashboard')
                           ? 'bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-zinc-100 border-zinc-200 dark:border-zinc-800 shadow-sm'
                           : 'border-transparent text-zinc-600 dark:text-zinc-400 hover:bg-zinc-50 dark:hover:bg-zinc-900/50 hover:text-zinc-900 dark:hover:text-zinc-100' }}">
                        [ Dashboard ]
                    </a>

                    <a href="{{ route('admin.history') }}"
                       class="px-3 py-1.5 rounded border text-sm transition duration-200 
                       {{ request()->routeIs('admin.history')
                           ? 'bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-zinc-100 border-zinc-200 dark:border-zinc-800 shadow-sm'
                           : 'border-transparent text-zinc-600 dark:text-zinc-400 hover:bg-zinc-50 dark:hover:bg-zinc-900/50 hover:text-zinc-900 dark:hover:text-zinc-100' }}">
                        [ History ]
                    </a>

                    {{-- ADMIN ONLY --}}
                    @if(Auth::user()->role == 'admin')
                        <a href="{{ url('/admin/users') }}"
                           class="px-3 py-1.5 rounded border text-sm transition duration-200 
                           {{ request()->is('admin/users')
                               ? 'bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-zinc-100 border-zinc-200 dark:border-zinc-800 shadow-sm'
                               : 'border-transparent text-zinc-600 dark:text-zinc-400 hover:bg-zinc-50 dark:hover:bg-zinc-900/50 hover:text-zinc-900 dark:hover:text-zinc-100' }}">
                            [ Users ]
                        </a>
                    @endif

                    <a href="{{ route('help') }}"
                       class="px-3 py-1.5 rounded border text-sm transition duration-200 
                       {{ request()->routeIs('help')
                           ? 'bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-zinc-100 border-zinc-200 dark:border-zinc-800 shadow-sm'
                           : 'border-transparent text-zinc-600 dark:text-zinc-400 hover:bg-zinc-50 dark:hover:bg-zinc-900/50 hover:text-zinc-900 dark:hover:text-zinc-100' }}">
                        [ Help ]
                    </a>

                    <a href="{{ route('about') }}"
                       class="px-3 py-1.5 rounded border text-sm transition duration-200 
                       {{ request()->routeIs('about')
                           ? 'bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-zinc-100 border-zinc-200 dark:border-zinc-800 shadow-sm'
                           : 'border-transparent text-zinc-600 dark:text-zinc-400 hover:bg-zinc-50 dark:hover:bg-zinc-900/50 hover:text-zinc-900 dark:hover:text-zinc-100' }}">
                        [ About ]
                    </a>

                    <div class="ml-4 text-xs text-zinc-500 dark:text-zinc-400 bg-zinc-50 dark:bg-zinc-900 px-2 py-1 rounded border border-zinc-200 dark:border-zinc-800">
                        <span id="live-clock">--:--:--</span>
                    </div>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="hidden md:flex items-center gap-4">

                <!-- USER DROPDOWN -->
 <div class="relative" x-data="{ dropdown: false }" x-cloak>

    <button @click="dropdown = !dropdown"
        class="flex items-center gap-3 bg-white dark:bg-zinc-950 hover:bg-zinc-50 dark:hover:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 px-3 py-1.5 rounded transition duration-200">

        <div class="text-right">
            <p class="text-zinc-900 dark:text-zinc-100 text-sm font-bold leading-none">
                {{ Auth::user()->name }}
            </p>
            <p class="text-zinc-500 dark:text-zinc-400 text-[10px] uppercase mt-1">
                {{ Auth::user()->role }}
            </p>
        </div>

        <div class="w-8 h-8 rounded bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center text-zinc-900 dark:text-zinc-100 font-bold border border-zinc-200 dark:border-zinc-700 text-sm">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>

    </button>

    <div x-show="dropdown"
         x-cloak
         @click.outside="dropdown = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="absolute right-0 mt-2 w-48 bg-white dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded shadow-lg overflow-hidden z-50">

        <a href="{{ route('profile.edit') }}"
           class="block px-4 py-2 text-sm hover:bg-zinc-50 dark:hover:bg-zinc-900 border-b">
            > Profile
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                > Logout
            </button>
        </form>

    </div>

</div>
            </div>
            
            <!-- MOBILE BUTTON -->
            <div class="flex items-center md:hidden">
                <button @click.stop="open = !open"
                    class="text-zinc-500 dark:text-zinc-400 p-2 rounded border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-950 hover:bg-zinc-50 dark:hover:bg-zinc-900 transition">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- MOBILE MENU -->
    <div x-show="open"
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         @click.outside="open = false"
         class="md:hidden bg-white dark:bg-zinc-950 border-t border-zinc-200 dark:border-zinc-800 px-4 py-4 space-y-3">

        <!-- DASHBOARD -->
        <a href="{{ route('dashboard') }}"
           class="block text-zinc-700 dark:text-zinc-300 px-3 py-2 border border-zinc-200 dark:border-zinc-700 rounded hover:bg-zinc-100 dark:hover:bg-zinc-800 text-sm transition duration-200
           {{ request()->routeIs('dashboard') ? 'bg-zinc-100 dark:bg-zinc-900 border-zinc-300 dark:border-zinc-600 font-bold' : '' }}">
            > Dashboard
        </a>

        <!-- HISTORY -->
        <a href="{{ route('admin.history') }}"
           class="block text-zinc-700 dark:text-zinc-300 px-3 py-2 border border-zinc-200 dark:border-zinc-700 rounded hover:bg-zinc-100 dark:hover:bg-zinc-800 text-sm transition duration-200
           {{ request()->routeIs('admin.history') ? 'bg-zinc-100 dark:bg-zinc-900 border-zinc-300 dark:border-zinc-600 font-bold' : '' }}">
            > History
        </a>

        <!-- ADMIN ONLY -->
        @if(Auth::user()->role == 'admin')
            <a href="{{ url('/admin/users') }}"
               class="block text-zinc-700 dark:text-zinc-300 px-3 py-2 border border-zinc-200 dark:border-zinc-700 rounded hover:bg-zinc-100 dark:hover:bg-zinc-800 text-sm transition duration-200
               {{ request()->is('admin/users') ? 'bg-zinc-100 dark:bg-zinc-900 border-zinc-300 dark:border-zinc-600 font-bold' : '' }}">
                > Users
            </a>
        @endif

        <!-- HELP -->
        <a href="{{ route('help') }}"
           class="block text-zinc-700 dark:text-zinc-300 px-3 py-2 border border-zinc-200 dark:border-zinc-700 rounded hover:bg-zinc-100 dark:hover:bg-zinc-800 text-sm transition duration-200
           {{ request()->routeIs('help') ? 'bg-zinc-100 dark:bg-zinc-900 border-zinc-300 dark:border-zinc-600 font-bold' : '' }}">
            > Help
        </a>

        <a href="{{ route('about') }}"
           class="block text-zinc-700 dark:text-zinc-300 px-3 py-2 border border-zinc-200 dark:border-zinc-700 rounded hover:bg-zinc-100 dark:hover:bg-zinc-800 text-sm transition duration-200
           {{ request()->routeIs('about') ? 'bg-zinc-100 dark:bg-zinc-900 border-zinc-300 dark:border-zinc-600 font-bold' : '' }}">
            > About
        </a>

        <!-- USER SECTION -->
        <div class="border-t border-zinc-200 dark:border-zinc-800 pt-4 mt-4">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center font-bold border border-zinc-200 dark:border-zinc-700">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <p class="font-bold text-sm text-zinc-900 dark:text-zinc-100 leading-none">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1 uppercase tracking-tight">{{ Auth::user()->role }}</p>
                </div>
            </div>

            <div class="space-y-2">
                <a href="{{ route('profile.edit') }}"
                   class="block px-3 py-2 border border-zinc-200 dark:border-zinc-700 rounded hover:bg-zinc-100 dark:hover:bg-zinc-800 text-sm transition duration-200">
                    > Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left px-3 py-2 border border-red-200 dark:border-red-900/50 text-red-600 rounded hover:bg-red-50 dark:hover:bg-red-950/50 text-sm transition duration-200">
                        > Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</nav>