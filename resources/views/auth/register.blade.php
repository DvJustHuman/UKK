<x-guest-layout>
    <div class="w-full max-w-[480px] px-4">
        <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-10 sm:p-12 rounded-[2.5rem] shadow-2xl shadow-zinc-200/50 dark:shadow-none transition-all duration-300">
            
            <!-- HEADER -->
            <div class="mb-10 text-center">
<div class="w-16 h-16 bg-sky-50 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl shadow-sky-500/10 overflow-hidden">
    <img 
        src="{{ asset('images/logo.png') }}" 
        alt="Logo"
        class="w-full h-full object-contain p-2"
    >
</div>
                <h1 class="text-3xl font-black text-zinc-900 dark:text-zinc-100 tracking-tight">
                    Buat <span class="text-indigo-500">Akun</span>
                </h1>
                <p class="text-zinc-500 dark:text-zinc-400 font-medium mt-3">
                    Bergabunglah untuk mulai memantau museum.
                </p>
            </div>

            <!-- FORM -->
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- NAME -->
                <div class="space-y-2">
                    <label for="name" class="text-[10px] font-black text-zinc-400 uppercase tracking-widest ml-1">
                        Nama Lengkap
                    </label>
                    <div class="relative group">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-zinc-400">👤</span>
                        <input id="name" type="text" name="name" :value="old('name')" required autofocus
                            class="w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 pl-12 pr-4 py-4 rounded-2xl text-sm font-bold text-zinc-900 dark:text-zinc-100 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none"
                            placeholder="Nama Kamu">
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-red-600" />
                </div>

                <!-- EMAIL -->
                <div class="space-y-2">
                    <label for="email" class="text-[10px] font-black text-zinc-400 uppercase tracking-widest ml-1">
                        Alamat Email
                    </label>
                    <div class="relative group">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-zinc-400">📧</span>
                        <input id="email" type="email" name="email" :value="old('email')" required
                            class="w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 pl-12 pr-4 py-4 rounded-2xl text-sm font-bold text-zinc-900 dark:text-zinc-100 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none"
                            placeholder="Masukan Email">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-600" />
                </div>

                <!-- PASSWORD -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label for="password" class="text-[10px] font-black text-zinc-400 uppercase tracking-widest ml-1">
                            Kata Sandi
                        </label>
                        <input id="password" type="password" name="password" required
                            class="w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 px-4 py-4 rounded-2xl text-sm font-bold text-zinc-900 dark:text-zinc-100 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none"
                            placeholder="••••••••">
                    </div>
                    <div class="space-y-2">
                        <label for="password_confirmation" class="text-[10px] font-black text-zinc-400 uppercase tracking-widest ml-1">
                            Konfirmasi Kata Sandi
                        </label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            class="w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 px-4 py-4 rounded-2xl text-sm font-bold text-zinc-900 dark:text-zinc-100 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none"
                            placeholder="••••••••">
                    </div>
                </div>
                <div class="col-span-2">
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-600" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-red-600" />
                </div>

                <!-- ACTION BUTTON -->
                <div class="pt-6">
                    <button type="submit" 
                        class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-black py-4 rounded-2xl transition-all shadow-xl shadow-indigo-500/20 text-xs uppercase tracking-[0.2em]">
                        Buat Akun
                    </button>
                </div>
            </form>

            <!-- FOOTER LINKS -->
            <div class="mt-10 text-center">
                <p class="text-xs font-bold text-zinc-400">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="text-sky-500 hover:text-sky-600 font-black ml-1 transition-colors">
                        Masuk
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>