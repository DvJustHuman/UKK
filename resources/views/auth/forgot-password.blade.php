<x-guest-layout>
    <div class="w-full max-w-[440px] px-4">
        <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-10 sm:p-12 rounded-[2.5rem] shadow-2xl shadow-zinc-200/50 dark:shadow-none transition-all duration-300">
            
            <!-- HEADER -->
            <div class="mb-10 text-center">
                <div class="w-16 h-16 bg-sky-50 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-6 shadow-xl shadow-sky-500/10">
                    🔑
                </div>
                <h1 class="text-3xl font-black text-zinc-900 dark:text-zinc-100 tracking-tight">
                    Reset <span class="text-sky-500">Access</span>
                </h1>
                <p class="text-zinc-500 dark:text-zinc-400 font-medium mt-3 text-sm leading-relaxed px-2">
                    Lupa password? Masukkan email Anda dan kami akan mengirimkan link reset.
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-6 bg-sky-50 dark:bg-sky-500/10 p-4 rounded-2xl text-sky-600 dark:text-sky-400 text-xs font-bold text-center border border-sky-100 dark:border-sky-500/20" :status="session('status')" />

            <!-- FORM -->
            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf

                <!-- EMAIL -->
                <div class="space-y-2">
                    <label for="email" class="text-[10px] font-black text-zinc-400 uppercase tracking-widest ml-1">
                        Email Address
                    </label>
                    <div class="relative group">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-zinc-400">📧</span>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            class="w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 pl-12 pr-4 py-4 rounded-2xl text-sm font-bold text-zinc-900 dark:text-zinc-100 focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 transition-all outline-none"
                            placeholder="name@example.com">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-600" />
                </div>

                <!-- ACTION BUTTON -->
                <div class="pt-4">
                    <button type="submit" 
                        class="w-full bg-sky-500 hover:bg-sky-600 text-white font-black py-4 rounded-2xl transition-all shadow-xl shadow-sky-500/20 text-xs uppercase tracking-[0.2em]">
                        Send Reset Link
                    </button>
                </div>
            </form>

            <!-- FOOTER LINKS -->
            <div class="mt-10 text-center">
                <a href="{{ route('login') }}" class="text-xs font-black text-zinc-400 hover:text-sky-500 transition-colors uppercase tracking-widest flex items-center justify-center gap-2">
                    ⬅️ Back to Sign In
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
