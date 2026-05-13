<x-guest-layout>
    <div class="w-full max-w-[420px] bg-zinc-900/40 border border-zinc-800 backdrop-blur-md relative p-8 sm:p-10">
        <!-- TOP ACCENT -->
        <div class="absolute top-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-cyan-500/50 to-transparent"></div>
        
        <!-- CORNER DECOR -->
        <div class="absolute top-0 left-0 w-2 h-2 border-t border-l border-zinc-700"></div>
        <div class="absolute top-0 right-0 w-2 h-2 border-t border-r border-zinc-700"></div>
        <div class="absolute bottom-0 left-0 w-2 h-2 border-b border-l border-zinc-700"></div>
        <div class="absolute bottom-0 right-0 w-2 h-2 border-b border-r border-zinc-700"></div>

        <!-- HEADER -->
        <div class="mb-10 text-center">
            <div class="text-[10px] text-cyan-500 uppercase tracking-[0.4em] mb-2">Access Portal</div>
            <h1 class="text-2xl font-bold text-zinc-100 uppercase tracking-tighter italic">
                {{ config('app.name') }}
            </h1>
            <div class="mt-4 flex justify-center gap-1">
                <div class="h-[1px] w-8 bg-zinc-800"></div>
                <div class="h-[1px] w-1 bg-cyan-500"></div>
                <div class="h-[1px] w-8 bg-zinc-800"></div>
            </div>
        </div>

        <!-- FORM -->
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- EMAIL -->
            <div class="space-y-2 group">
                <label for="email" class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest block transition-colors group-focus-within:text-cyan-500">
                    User_ID
                </label>
                <div class="relative">
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus
                        class="w-full bg-zinc-950/50 border border-zinc-800 px-4 py-3 text-sm text-zinc-100 focus:border-cyan-500/50 focus:ring-0 transition-all outline-none placeholder:text-zinc-700"
                        placeholder="IDENTIFY_EMAIL">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-[10px] font-bold text-red-500 uppercase" />
            </div>

            <!-- PASSWORD -->
            <div class="space-y-2 group">
                <div class="flex justify-between items-center">
                    <label for="password" class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest block transition-colors group-focus-within:text-cyan-500">
                        Pass_Code
                    </label>
                </div>
                <div class="relative">
                    <input id="password" type="password" name="password" required
                        class="w-full bg-zinc-950/50 border border-zinc-800 px-4 py-3 text-sm text-zinc-100 focus:border-cyan-500/50 focus:ring-0 transition-all outline-none placeholder:text-zinc-700"
                        placeholder="••••••••">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-[10px] font-bold text-red-500 uppercase" />
            </div>

            <!-- UTILITIES -->
            <div class="flex items-center justify-between pt-2">
                <label class="flex items-center cursor-pointer group">
                    <input type="checkbox" name="remember" class="w-3 h-3 border-zinc-800 text-cyan-600 focus:ring-0 rounded-none bg-zinc-950">
                    <span class="ms-2 text-[10px] text-zinc-500 uppercase tracking-wider group-hover:text-zinc-300 transition-colors">Keep Session</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-[10px] text-zinc-500 hover:text-cyan-500 uppercase tracking-wider transition-colors">
                        Lost_Access?
                    </a>
                @endif
            </div>

            <!-- ACTION BUTTON -->
            <div class="pt-4">
                <button type="submit" 
                    class="w-full bg-zinc-100 text-zinc-900 font-bold uppercase text-[11px] tracking-[0.3em] py-4 border border-transparent hover:bg-cyan-500 hover:text-white transition-all duration-300 shadow-lg shadow-cyan-500/5">
                    Establish Connection
                </button>
            </div>
        </form>

        <!-- FOOTER LINKS -->
        <div class="mt-10 pt-6 border-t border-zinc-800/50 text-center">
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-[10px] text-zinc-500 hover:text-cyan-500 uppercase tracking-[0.2em] transition-colors">
                    Request New Identity
                </a>
            @endif
        </div>
    </div>
</x-guest-layout>