<x-guest-layout>
    <div class="w-full max-w-[440px] px-4">
        <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-10 sm:p-12 rounded-[2.5rem] shadow-2xl shadow-zinc-200/50 dark:shadow-none transition-all duration-300">
            
            <!-- HEADER -->
            <div class="mb-12 text-center">
<div class="w-16 h-16 bg-sky-50 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl shadow-sky-500/10 overflow-hidden">
    <img 
        src="{{ asset('images/logo.png') }}" 
        alt="Logo"
        class="w-full h-full object-contain p-2"
    >
</div>
                <h1 class="text-3xl font-black text-zinc-900 dark:text-zinc-100 tracking-tight">
                    Welcome <span class="text-sky-500">Back</span>
                </h1>
                <p class="text-zinc-500 dark:text-zinc-400 font-medium mt-3">
                    Silakan masuk untuk mengelola sistem.
                </p>
            </div>

            <!-- FORM -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- EMAIL -->
                <div class="space-y-2">
                    <label for="email" class="text-[10px] font-black text-zinc-400 uppercase tracking-widest ml-1">
                        Alamat Email
                    </label>
                    <div class="relative group">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-zinc-400">📧</span>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            class="w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 pl-12 pr-4 py-4 rounded-2xl text-sm font-bold text-zinc-900 dark:text-zinc-100 focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 transition-all outline-none"
                            placeholder="Masukan Email">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-600" />
                </div>

                <!-- PASSWORD -->
                <div class="space-y-2">
                    <div class="flex justify-between items-center px-1">
                        <label for="password" class="text-[10px] font-black text-zinc-400 uppercase tracking-widest">
                            Kata Sandi
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-[10px] font-black text-zinc-400 hover:text-sky-500 transition-colors uppercase tracking-widest">
                                Lupa?
                            </a>
                        @endif
                    </div>
                    <div class="relative group">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-zinc-400">🔐</span>
                        <input id="password" type="password" name="password" required
                            class="w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 pl-12 pr-4 py-4 rounded-2xl text-sm font-bold text-zinc-900 dark:text-zinc-100 focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 transition-all outline-none"
                            placeholder="Masukan Sandi">
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-600" />
                </div>

                <!-- REMEMBER ME -->
                <div class="flex items-center px-1">
                    <input type="checkbox" name="remember" id="remember" class="w-5 h-5 rounded-lg border-zinc-200 dark:border-zinc-800 text-sky-500 focus:ring-sky-500/20 bg-zinc-50 dark:bg-zinc-950 cursor-pointer">
                    <label for="remember" class="ms-3 text-xs font-bold text-zinc-500 dark:text-zinc-400 cursor-pointer">Ingat saya di perangkat ini</label>
                </div>

                <!-- ACTIONS -->
                <div class="space-y-4 pt-4">
                    <button type="submit" 
                        class="w-full bg-sky-500 hover:bg-sky-600 text-white font-black py-4 rounded-2xl transition-all shadow-xl shadow-sky-500/20 text-xs uppercase tracking-[0.2em]">
                        Masuk
                    </button>

                    <div class="relative flex items-center py-4">
                        <div class="flex-grow border-t border-zinc-100 dark:border-zinc-800"></div>
                        <span class="flex-shrink mx-6 text-[10px] font-black text-zinc-300 dark:text-zinc-700 uppercase tracking-[0.3em]">Atau</span>
                        <div class="flex-grow border-t border-zinc-100 dark:border-zinc-800"></div>
                    </div>

                    <a href="{{ route('dashboard') }}" 
                       class="w-full flex items-center justify-center gap-3 border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 py-4 rounded-2xl text-xs font-black text-zinc-600 dark:text-zinc-400 hover:bg-zinc-50 dark:hover:bg-zinc-800 transition-all uppercase tracking-widest shadow-sm">
                        <span>👥</span>
                        Masuk Sebagai Tamu
                    </a>
                </div>
            </form>

            <!-- FOOTER -->
            @if (Route::has('register'))
                <div class="mt-10 text-center">
                    <p class="text-xs font-bold text-zinc-400">
                        Tidak punya akun? 
                        <a href="{{ route('register') }}" class="text-sky-500 hover:text-sky-600 font-black ml-1 transition-colors">
                            Buat Akun
                        </a>
                    </p>
                </div>
            @endif
        </div>
    </div>
</x-guest-layout>