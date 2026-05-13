<x-guest-layout>
    <div class="w-full max-w-[480px] bg-zinc-900/40 border border-zinc-800 backdrop-blur-md relative p-8 sm:p-10">
        <!-- TOP ACCENT -->
        <div class="absolute top-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-emerald-500/50 to-transparent"></div>
        
        <!-- CORNER DECOR -->
        <div class="absolute top-0 left-0 w-2 h-2 border-t border-l border-zinc-700"></div>
        <div class="absolute top-0 right-0 w-2 h-2 border-t border-r border-zinc-700"></div>
        <div class="absolute bottom-0 left-0 w-2 h-2 border-b border-l border-zinc-700"></div>
        <div class="absolute bottom-0 right-0 w-2 h-2 border-b border-r border-zinc-700"></div>

        <!-- HEADER -->
        <div class="mb-10 text-center">
            <div class="text-[10px] text-emerald-500 uppercase tracking-[0.4em] mb-2">Identity Request</div>
            <h1 class="text-2xl font-bold text-zinc-100 uppercase tracking-tighter italic">
                Registry
            </h1>
            <div class="mt-4 flex justify-center gap-1">
                <div class="h-[1px] w-8 bg-zinc-800"></div>
                <div class="h-[1px] w-1 bg-emerald-500"></div>
                <div class="h-[1px] w-8 bg-zinc-800"></div>
            </div>
        </div>

        <!-- FORM -->
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- NAME -->
            <div class="space-y-2 group">
                <label for="name" class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest block transition-colors group-focus-within:text-emerald-500">
                    Full_Name
                </label>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus
                    class="w-full bg-zinc-950/50 border border-zinc-800 px-4 py-2.5 text-sm text-zinc-100 focus:border-emerald-500/50 focus:ring-0 transition-all outline-none placeholder:text-zinc-700"
                    placeholder="ENTER_NAME">
                <x-input-error :messages="$errors->get('name')" class="mt-1 text-[10px] font-bold text-red-500 uppercase" />
            </div>

            <!-- EMAIL -->
            <div class="space-y-2 group">
                <label for="email" class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest block transition-colors group-focus-within:text-emerald-500">
                    Email_Address
                </label>
                <input id="email" type="email" name="email" :value="old('email')" required
                    class="w-full bg-zinc-950/50 border border-zinc-800 px-4 py-2.5 text-sm text-zinc-100 focus:border-emerald-500/50 focus:ring-0 transition-all outline-none placeholder:text-zinc-700"
                    placeholder="EMAIL_ID">
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-[10px] font-bold text-red-500 uppercase" />
            </div>

            <!-- PASSWORD -->
            <div class="space-y-2 group">
                <label for="password" class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest block transition-colors group-focus-within:text-emerald-500">
                    Pass_Code
                </label>
                <input id="password" type="password" name="password" required
                    class="w-full bg-zinc-950/50 border border-zinc-800 px-4 py-2.5 text-sm text-zinc-100 focus:border-emerald-500/50 focus:ring-0 transition-all outline-none placeholder:text-zinc-700"
                    placeholder="••••••••">
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-[10px] font-bold text-red-500 uppercase" />
            </div>

            <!-- CONFIRM PASSWORD -->
            <div class="space-y-2 group">
                <label for="password_confirmation" class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest block transition-colors group-focus-within:text-emerald-500">
                    Verify_Pass
                </label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="w-full bg-zinc-950/50 border border-zinc-800 px-4 py-2.5 text-sm text-zinc-100 focus:border-emerald-500/50 focus:ring-0 transition-all outline-none placeholder:text-zinc-700"
                    placeholder="••••••••">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-[10px] font-bold text-red-500 uppercase" />
            </div>

            <!-- ACTION BUTTON -->
            <div class="pt-4">
                <button type="submit" 
                    class="w-full bg-zinc-100 text-zinc-900 font-bold uppercase text-[11px] tracking-[0.3em] py-4 border border-transparent hover:bg-emerald-500 hover:text-white transition-all duration-300 shadow-lg shadow-emerald-500/5">
                    Initialize Account
                </button>
            </div>
        </form>

        <!-- FOOTER LINKS -->
        <div class="mt-8 pt-6 border-t border-zinc-800/50 text-center">
            <a href="{{ route('login') }}" class="text-[10px] text-zinc-500 hover:text-emerald-500 uppercase tracking-[0.2em] transition-colors">
                Existing Identity? Login
            </a>
        </div>
    </div>
</x-guest-layout>