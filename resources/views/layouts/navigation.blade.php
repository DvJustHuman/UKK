<nav x-data="{ open: false }"
    class="bg-gradient-to-r from-gray-900 to-gray-800 border-b border-gray-700 shadow-xl sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <!-- LEFT -->
            <div class="flex items-center gap-8">

                <!-- LOGO -->
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-2xl bg-emerald-500 flex items-center justify-center text-white text-lg shadow-lg">
                        🏛️
                    </div>

                    <div>
                        <h1 class="text-white font-bold text-lg leading-none">
                            Museum Monitoring
                        </h1>

                        <p class="text-gray-400 text-xs">
                            Smart Temperature System
                        </p>
                    </div>

                </a>

                <!-- DESKTOP MENU -->
                <div class="hidden md:flex items-center gap-3">

                    <!-- USER -->                  
                    <a href="{{ route('dashboard') }}"
class="px-4 py-2 rounded-xl transition duration-300
{{ request()->routeIs('dashboard')
    ? 'bg-emerald-500 text-white shadow-lg'
    : 'text-gray-200 hover:bg-gray-700 hover:text-white' }}">
                        📊 Dashboard
                    </a>

                    {{-- ADMIN ONLY --}}
                    @if(Auth::user()->role == 'admin')


<a href="{{ route('admin.history') }}"
class="px-4 py-2 rounded-xl transition duration-300
{{ request()->routeIs('admin.history')
    ? 'bg-emerald-500 text-white shadow-lg'
    : 'text-gray-200 hover:bg-gray-700 hover:text-white' }}">
                            📜 History
                        </a>

                       <a href="{{ url('/admin/users') }}"
class="px-4 py-2 rounded-xl transition duration-300
{{ request()->is('admin/users')
    ? 'bg-emerald-500 text-white shadow-lg'
    : 'text-gray-200 hover:bg-gray-700 hover:text-white' }}">
                            👥 Users
                        </a>

                    @endif

                    <a href="{{ route('help') }}"
                        class="px-4 py-2 rounded-xl transition duration-300
                        {{ request()->routeIs('help')
                            ? 'bg-emerald-500 text-white shadow-lg'
                            : 'text-gray-200 hover:bg-gray-700 hover:text-white' }}">
                        ❓ Bantuan
                    </a>

                    <div class="ml-4 text-sm text-emerald-400 font-semibold">
    🕒 <span id="live-clock">--:--:--</span>
</div>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="hidden md:flex items-center gap-4">

             <!-- STATUS -->
            <div id="systemStatus"
            class="bg-green-500/20 border border-green-500 px-4 py-2 rounded-2xl text-green-400 text-sm">

            ● Sensor Aktif  

             </div>

                <!-- USER DROPDOWN -->
                <div class="relative" x-data="{ dropdown: false }">

                    <button @click="dropdown = !dropdown"
                        class="flex items-center gap-3 bg-gray-800 hover:bg-gray-700 border border-gray-700 px-4 py-2 rounded-2xl transition duration-300">

                        <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center text-white font-bold shadow-lg">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        <div class="text-left">
                            <p class="text-white text-sm font-semibold leading-none">
                                {{ Auth::user()->name }}
                            </p>

                            <p class="text-gray-400 text-xs mt-1">
                                {{ Auth::user()->role }}
                            </p>
                        </div>

                        <svg class="w-4 h-4 text-gray-400"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>

                    </button>

                    <!-- DROPDOWN -->
                    <div x-show="dropdown"
                        @click.away="dropdown = false"
                        x-transition
                        class="absolute right-0 mt-3 w-56 bg-gray-800 border border-gray-700 rounded-2xl shadow-2xl overflow-hidden">

                        <a href="{{ route('profile.edit') }}"
                            class="block px-5 py-3 text-gray-200 hover:bg-gray-700 transition">
                            ⚙️ Profile
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit"
                                class="w-full text-left px-5 py-3 text-red-400 hover:bg-red-500/20 transition">
                                🚪 Logout
                            </button>
                        </form>

                    </div>

                </div>

            </div>

            <!-- MOBILE BUTTON -->
            <div class="flex items-center md:hidden">

                <button @click="open = ! open"
                    class="text-white p-2 rounded-xl bg-gray-800 hover:bg-gray-700 transition">

                    <svg class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path x-show="!open"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                        <path x-show="open"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />

                    </svg>

                </button>

            </div>

        </div>

    </div>

    <!-- MOBILE MENU -->
    <div x-show="open"
        x-transition
        class="md:hidden bg-gray-900 border-t border-gray-700">

        <div class="px-4 py-4 space-y-3">

            {{-- ADMIN ONLY --}}
            @if(Auth::user()->role == 'admin')

                <a href="{{ route('dashboard') }}"
                    class="block bg-gray-800 hover:bg-gray-700 text-white px-4 py-3 rounded-2xl transition">
                    📊 Dashboard
                </a>

                <a href="{{ route('admin.history') }}"
                    class="block bg-gray-800 hover:bg-gray-700 text-white px-4 py-3 rounded-2xl transition">
                    📜 History
                </a>

                <a href="{{ url('/admin/users') }}"
                    class="block bg-gray-800 hover:bg-gray-700 text-white px-4 py-3 rounded-2xl transition">
                    👥 Users
                </a>

            @endif

            <a href="{{ route('dashboard') }}"
                class="block bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-3 rounded-2xl transition shadow-lg">
                🖥️ Dashboard User
            </a>

            <a href="{{ route('help') }}"
                class="block bg-gray-800 hover:bg-gray-700 text-white px-4 py-3 rounded-2xl transition">
                ❓ Bantuan
            </a>

            <div class="border-t border-gray-700 pt-4 mt-4">

                <div class="flex items-center gap-3 mb-4">

                    <div class="w-12 h-12 rounded-full bg-emerald-500 flex items-center justify-center text-white font-bold shadow-lg">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <div>
                        <p class="text-white font-semibold">
                            {{ Auth::user()->name }}
                        </p>

                        <p class="text-gray-400 text-sm">
                            {{ Auth::user()->email }}
                        </p>
                    </div>

                </div>

                <a href="{{ route('profile.edit') }}"
                    class="block bg-gray-800 hover:bg-gray-700 text-white px-4 py-3 rounded-2xl mb-3 transition">
                    ⚙️ Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-3 rounded-2xl transition shadow-lg">
                        🚪 Logout
                    </button>
                </form>

            </div>

        </div>

    </div>

</nav>