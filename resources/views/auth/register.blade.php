<x-guest-layout>

<div class="fixed inset-0 flex items-center justify-center bg-black overflow-hidden">

    <!-- 🖼️ BACKGROUND MUSEUM -->
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1520697222860-7f2f9e5f2c7c')] bg-cover bg-center opacity-30"></div>
    <div class="absolute inset-0 bg-black/85"></div>

    <!-- 🎭 VIGNETTE -->
    <div class="absolute inset-0 pointer-events-none"
         style="background: radial-gradient(circle, transparent 40%, rgba(0,0,0,0.92) 100%);">
    </div>

    <!-- 🔦 EMERALD SPOTLIGHT -->
    <div class="absolute inset-0"
         style="background: radial-gradient(circle at center, rgba(16,185,129,0.20) 0%, transparent 60%);">
    </div>

    <!-- 🎫 REGISTER CARD -->
    <div class="relative z-30 w-full max-w-md">

        <div class="bg-black/40 backdrop-blur-2xl border border-emerald-500/20 rounded-2xl p-8
                    shadow-[0_0_60px_rgba(16,185,129,0.15)]">

            <!-- TITLE -->
            <h2 class="text-3xl font-bold text-center text-emerald-400">
                Museum Registration
            </h2>

            <p class="text-center text-gray-300 text-sm mt-2">
                Create your access to the exhibition hall
            </p>

            <!-- FORM -->
            <form method="POST" action="{{ route('register') }}" class="mt-6">
                @csrf

                <!-- Name -->
                <input type="text" name="name" placeholder="Full Name"
                    class="w-full mb-3 px-4 py-2 rounded bg-black/50 text-white border border-gray-600
                           focus:border-emerald-400 focus:ring-emerald-400">

                <!-- Email -->
                <input type="email" name="email" placeholder="Email"
                    class="w-full mb-3 px-4 py-2 rounded bg-black/50 text-white border border-gray-600
                           focus:border-emerald-400 focus:ring-emerald-400">

                <!-- Password -->
                <input type="password" name="password" placeholder="Password"
                    class="w-full mb-3 px-4 py-2 rounded bg-black/50 text-white border border-gray-600
                           focus:border-emerald-400 focus:ring-emerald-400">

                <!-- Confirm -->
                <input type="password" name="password_confirmation" placeholder="Confirm Password"
                    class="w-full mb-3 px-4 py-2 rounded bg-black/50 text-white border border-gray-600
                           focus:border-emerald-400 focus:ring-emerald-400">

                <!-- BUTTON -->
                <button class="w-full bg-emerald-500 hover:bg-emerald-600 text-black font-bold py-2 rounded transition">
                    Register
                </button>
            </form>

            <!-- LOGIN LINK -->
            <div class="text-center mt-4">
                <p class="text-sm text-gray-300">
                    Already have access?
                    <a href="{{ route('login') }}"
                       class="text-emerald-400 hover:text-emerald-300 font-semibold">
                        Login
                    </a>
                </p>
            </div>

        </div>
    </div>

</div>

</x-guest-layout>