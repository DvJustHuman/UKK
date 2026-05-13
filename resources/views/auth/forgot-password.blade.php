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
        <div class="mb-8">
            <div class="text-[10px] text-cyan-500 uppercase tracking-[0.4em] mb-2">Recovery Terminal</div>
            <h1 class="text-xl font-bold text-zinc-100 uppercase tracking-tighter italic">
                Lost Access
            </h1>
        </div>

        <div class="mb-6 text-[11px] text-zinc-500 uppercase tracking-wider leading-relaxed">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div class="space-y-2 group">
                <label for="email" class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest block transition-colors group-focus-within:text-cyan-500">
                    Target_Email
                </label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus
                    class="w-full bg-zinc-950/50 border border-zinc-800 px-4 py-3 text-sm text-zinc-100 focus:border-cyan-500/50 focus:ring-0 transition-all outline-none placeholder:text-zinc-700"
                    placeholder="IDENTIFY_EMAIL">
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-[10px] font-bold text-red-500 uppercase" />
            </div>

            <div class="pt-2">
                <button type="submit" 
                    class="w-full bg-zinc-100 text-zinc-900 font-bold uppercase text-[11px] tracking-[0.3em] py-4 border border-transparent hover:bg-cyan-500 hover:text-white transition-all duration-300">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>

        <!-- BACK LINK -->
        <div class="mt-8 pt-6 border-t border-zinc-800/50 text-center">
            <a href="{{ route('login') }}" class="text-[10px] text-zinc-500 hover:text-cyan-500 uppercase tracking-[0.2em] transition-colors">
                Return to Login
            </a>
        </div>
    </div>
</x-guest-layout>
